<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use App\Client;
use App\Post;
use App\City;
use App\Division;
use App\Category;
use App\Subcategory;
use App\Messages;
use App\Review;

class ClientController extends Controller
{


  //user registration
    public function registerIndex()
    {
        return view('frontend.register');
    }
    public function userRegistration(Request $request)
    {
        $request->validate([
        'fullname' => 'required',
        'email' => 'required|unique:clients',
        'address'=>'required',
        'password1'=>'required',
        'password2' =>'required',
        'mobile_no' => 'required|unique:clients',

    ]);

    if($request->password1 != $request->password2){
      session()->flash('error_password', 'Password did not matched!');
      return redirect()->route('user.register');
    }else{
      $user = new Client();

     $user->full_name = $request->fullname;
     $user->email = $request->email;
     $user->mobile_no = $request->mobile_no;
     $user->address = $request->address;
     $user->password = $request->password1;

     $user->save();

    session()->flash('register_success', 'Registration Successfull, Please Login!');
     return redirect()->route('user.login');

    }


    }
    //user login
    public function userLogin(Request $request)
    {
      return view('frontend.login');
    }

    //usre login post
    public function userLoginPost(Request $request){
      $request->validate([
            'email_mobile' => 'required',
            'password' => 'required',
             ]);

             $user_email = Client::where('email', $request->email_mobile)->first();
             $user_mobile = Client::where('mobile_no', $request->email_mobile)->first();

             if($user_email){
               if($user_email->password != $request->password){
                 session()->flash('password_uerror', 'password is incorrect!');
                 return redirect()->route('user.login');
               }else{
                 session(['user_email' => $user_email->email]);
                 session(['full_name'=>$user_email->full_name]);
                 session(['role' => $user_email->role]);
                 return redirect()->route('user.dashboard');
               }

             }else if($user_mobile){
               if($user_mobile->password != $request->password){
                    session()->flash('password_uerror', 'password is incorrect!');
                     return redirect()->route('user.login');
               }else{
                 session(['user_mobile' => $user_mobile->mobile_no]);
                    session(['full_name'=>$user_mobile->full_name]);
                 session(['role' => $user_mobile->role]);
                 return redirect()->route('user.dashboard');
               }

             }else{
               session()->flash('login_uerror', 'Check your email/mobile or password');
               return redirect()->route('user.login');
             }
    }


public function userLogout(Request $request){
  $request->session()->flush();
  session()->flash('logout_msg', 'Logout Successfull.');
        return redirect()->route('user.login');
}

    //dashboard
    public function userDashboard(){
      $posts  = Post::all();
      return view('frontend.dashboard', compact('posts'));
    }

    //user post submit

    public function userPostSubmit(Request $request){
      //dd(str_replace(" ", "-", $request->title));
      $request->validate([
      'title' => 'required',
      'category_name' => 'required',
      'subcategory_name'=>'required',
      'location'=>'required',
      'city_name' =>'required',
      'negotiation' => 'required',
        'image1' => 'required|max:20240',
      'body' => 'required',
      'status' => 'required',

  ]);



$post = new Post();
$user = DB::table('clients')->where('email', $request->clientemail)->first();
//dd($user->id);
      $post->client_id = $user->id ;
			$post->client_email = $user->email ;
			$post->title = $request->title;
		  $post->slug = str_replace(" ", "-", $request->title);
			$post->category_name = $request->category_name;
			$post->subcategory_name = $request->subcategory_name;
			$post->division_name = $request->location;
			$post->citie_name = $request->city_name;
			$post->price = $request->price;
			if($request->negotiation == 'Yes'){
        $post->negotiation = 1;
      }else{
        $post->negotiation = 0;
      }
			$post->status = $request->status;
			$post->body = $request->body;


      if ($request->hasFile('image1')) {
          $image = $request->file('image1');
          $img = uniqid('photo_', true).$post->client_email.str_random(10).'.'.$image->getClientOriginalExtension();
          $location = 'images/'.$img;
          Image::make($image)->save($location);
          $post->image1 =$location;

          }

      if($request->image2){
        $image = $request->file('image2');
        $img = uniqid('photo_', true).$post->client_email.str_random(10).'.'.$image->getClientOriginalExtension();
        $location = 'images/'.$img;
        Image::make($image)->save($location);
        $post->image2 =$location;

      }

      if($request->image3){
        $image = $request->file('image3');
        $img = uniqid('photo_', true).$post->client_email.str_random(10).'.'.$image->getClientOriginalExtension();
        $location = 'images/'.$img;
        Image::make($image)->save($location);
        $post->image3 =$location;
      }


$post->body = $request->body;

$post->save();
 session()->flash('post_success', 'Posted Successfully.');
return redirect()->route('user.dashboard');

}


public function deletePost(Request $request){

  $post = Post::find($request->post_id);
  if($post->image1){
    unlink($post->image1);
  }
  if($post->image2){
      unlink($post->image2);
  }
  if($post->image3){
      unlink($post->image3);
  }
session()->flash('post_delete', 'Post Deleted Successfully.');
  $post->delete();
  return redirect()->route('user.dashboard');

}

public function postDetail(Request $request, $id, $slug) {
  $post = DB::table('posts')->where('id', $request->id)->first();
  $client =  DB::table('clients')->where('id', $post->client_id)->first();
    //$review =  DB::table('reviews')->where('post_id', $post->id);


return view('frontend.details', compact('post','client'));
}


//star review
public function postReview(Request $request){
  $rev = DB::table('reviews')->where('ip_address', $request->ip())->first();
  if($rev){
      session()->flash('review_error', 'you allready reviewed once.');
      return redirect('/details/'.$request->post_id.'/'.$request->slug);
  }else{
  $review = new Review();

  $review->ip_address = $request->ip();
  $review->star = $request->review;
  $review->post_id = $request->post_id;

$review->save();
session()->flash('review_success', 'Thanks for the review.');
return redirect('/details/'.$request->post_id.'/'.$request->slug);
}
}

//post contact
public function postMessage(Request $request){

  $request->validate([
  'name' => 'required',
  'email' => 'required',
  'body'=>'required',
]);
$message = new Messages();

$message->post_id = $request->post_id;
$message->client_id = $request->client_id;
$message->name = $request->name;
$message->email = $request->email;
$message->body = $request->body;

$message->save();
session()->flash('message_success', 'Message sent successfully.');
return redirect('/details/'.$request->post_id.'/'.$request->slug);


}


//notification
public function messageNotification(Request $request){
  $messages = DB::table('messages')->where('post_id', $request->post_id);
  dd($messages);
  return view('frontend.notification', compact('messages'));
}
}


/*
$request->validate([
      'username' => 'required',
      'password' => 'required',
       ]);

        $admin = Admin::where('username', $request->username)->first();
        if ($admin) {
            if ($admin->password == $request->password) {
                session(['username' => $admin->username]);
                session(['role' => $admin->role]);
            }

            if ($admin->role == 'admin') {
                return redirect()->route('admin.index');
            } elseif ($admin->role == 'moderator') {
                return redirect()->route('admin.moderator.index');
            } else {
                session()->flash('error_login', 'Email or Password is incorrect!');
                return redirect()->route('admin.login');
            }
        } else {
            session()->flash('error_login', 'Email or Password is incorrect!');
            return redirect()->route('admin.login');
        }

*/
