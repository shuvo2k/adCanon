<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\Division;
use App\City;
use App\Category;
use App\Subcategory;
use App\blogCategory;
use App\blogSubCategory;
use App\blogTag;
use App\blogPost;
use App\Client;
use App\Post;

use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{

//admin login page
    public function adminLogin()
    {
        return view('admin.login');
    }

    //admin login post request
    public function adminLoginSubmit(Request $request)
    {
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
    }

    //moderator login index
    public function adminModeratorIndex()
    {
        return view('admin.moderator_index');
    }

    //admin hope page
    public function adminIndex()
    {
        return view('admin.index');
    }

    //admin moderator logout
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('admin.login');
    }
    //moderator table
    public function moderatorList()
    {
        $admins = Admin::all();
        return view('admin.moderator_list', compact('admins'));
    }

    //admin moderator add
    public function addModeratorPost(Request $request)
    {
        $request->validate([
      'fullName' => 'required',
      'userName' => 'required|unique:admins',
      'email' => 'required|unique:admins',
      'role' => 'required',
      'password' => 'required',
      'password' => 'required',
      'mobile' => 'required',
      'image' => 'required|max:10240'

       ]);

        $admin = new Admin();

        $admin->full_name = $request->fullName;
        $admin->username = $request->userName;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->password = $request->password;
        $admin->mobile_no = $request->mobile;

        //image save
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = 'images/'.$img;
            Image::make($image)->save($location);
            $admin->image =$location;
        }

        $admin->save();

        return redirect()->route('admin.moderator.list');
    }

    //delete moderator
    public function deleteModerator(Request $request, $id)
    {
        $admin = Admin::find($id);
        if ($admin->image) {
            unlink($admin->image);
        }
        $admin->delete();
        return redirect()->route('admin.moderator.list');
    }





    /*===============================Division=============================================*/
    //division
    public function divisionList()
    {
        $divisions = Division::all();
        return view('admin.division', compact('divisions'));
    }

    //add division
    public function addDivision(Request $request)
    {
        $division = new Division();

        $request->validate([
    'division' => 'required',
  ]);

        $division->division_name = $request->division;
        $division->save();
        return redirect()->route('admin.division');
    }


    public function deleteDivision(Request $request, $id)
    {
        $division = Division::find($id);
        $division->delete();
        return redirect()->route('admin.division');
    }


    public function editDivisionJson(Request $request)
    {
        $division = Division::where('id', $request->id)->first();
        return response()->json($division);
    }

    public function editDivision(Request $request)
    {
        $division = Division::find($request->id);
        //update the subcategory table category_name
        DB::table('cities')->where('division_id', $request->id)->update(['division_name' => $request->division]);

        $division->division_name = $request->division;
        $division->save();

        return redirect()->route('admin.division');
    }


    /*====================================City==============================================*/
    //cities
    public function cityList()
    {
        $cities = City::all();
        $divisions = Division::all();
        return view('admin.cities', compact('cities', 'divisions'));
    }

    public function addCity(Request $request)
    {
        $request->validate([
    'division_name' => 'required',
    'city_name' => 'required'
  ]);

        $division = Division::where('division_name', $request->division_name)->first();
        $city = new City();

        $city->division_id = $division->id;
        $city->division_name = $request->division_name;
        $city->city_name = $request->city_name;

        $city->save();
        return redirect()->route('admin.city');
    }

    public function deleteCity(Request $request, $id)
    {
        $city = City::find($id);
        $city->delete();
        return redirect()->route('admin.city');
    }


    public function editCityJson(Request $request)
    {
        $city = City::where('id', $request->id)->first();

        return response()->json($city);
    }

    public function editCity(Request $request)
    {
        $city = City::find($request->id);

        $city->city_name = $request->city;
        $city->save();

        return redirect()->route('admin.city');
    }


    /*========================================category==========================================*/
    //category
    public function categoryList()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }



    //add category
    public function addCategory(Request $request)
    {
        $category = new Category();

        $request->validate([
    'category' => 'required',
    'icon_class'=>'required'
    ]);

        $category->category_name = $request->category;
        $category->icon_class = $request->icon_class;
      if($request->main_category){
          $category->main_category = $request->main_category;
      }
        $category->save();
        return redirect()->route('admin.categories');
    }



    //delete category
    public function deleteCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.categories');
    }

    //edit category
    public function editCategory(Request $request)
    {
        $category = Category::find($request->id);
        //update the subcategory table category_name
        DB::table('subcategories')->where('categorie_id', $request->id)->update(['category_name' => $request->ecategory]);

        $category->category_name = $request->ecategory;
        $category->icon_class = $request->icon_class;

        $category->save();

        return redirect()->route('admin.categories');
    }


    //return category json
    public function getCategoryJson(Request $request)
    {
        //$category = DB::table('categories')->where('id', $request->id)->first();
        $category = Category::where('id', $request->id)->first();
        return response()->json($category);
    }

    /*=========================================sub category======================================*/
    //sub category
    public function subCategoryList()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.sub-category', compact('subcategories', 'categories'));
    }



    public function addSubCategory(Request $request)
    {
        $request->validate([
      'category' => 'required',
      'subcategory' => 'required'
    ]);

        $category = Category::where('category_name', $request->category)->first();
        $subcategory = new Subcategory();

        $subcategory->categorie_id = $category->id;
        $subcategory->category_name = $category->category_name;
        $subcategory->subcategory_name = $request->subcategory;

        $subcategory->save();
        return redirect()->route('admin.subcategories');
    }

    //edit sub category
    public function editSubCategory(Request $request)
    {
        $scategory = Subcategory::find($request->id);

        $scategory->subcategory_name = $request->subcategory;
        $scategory->save();

        return redirect()->route('admin.subcategories');
    }


    public function deleteSubCategory(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect()->route('admin.subcategories');
    }

    public function editSubCategoryJson(Request $request)
    {
        $scategory = Subcategory::where('id', $request->id)->first();

        return response()->json($scategory);
    }
/*=============================================clients and posts========================*/
public function siteUsers(){
  $clients = Client::all();
return view('admin.users', compact('clients'));
}

public function deleteUsers(Request $request, $id){
  $user = Client::find($id);
  $user->delete();
  session()->flash('user_delete', 'User Deleted Successfully.');
  return redirect()->route('admin.clients');
}

public function userPosts(){
$posts = Post::all();
return view('admin.user_posts', compact('posts'));
}

public function userPostDelete(Request $request, $id){
  
}




    /*=======================================Blog=====================================*/
    //blog category
    public function blogCategoryList()
    {
        $blogCategory = blogCategory::all();
        return view('admin.blog.blog_category', compact('blogCategory'));
    }

    public function addBlogCategory(Request $request)
    {
        $bcategory = new blogCategory();

        $request->validate([
  'category' => 'required',
  ]);

        $bcategory->category_name = $request->category;
        $bcategory->save();
        return redirect()->route('admin.blog.categories');
    }


    public function deleteBlogCategory(Request $request, $id)
    {
        $category = blogCategory::find($id);
        $category->delete();
        return redirect()->route('admin.blog.categories');
    }


    public function getBlogCategoryJson(Request $request)
    {
        $category = blogCategory::where('id', $request->id)->first();

        return response()->json($category);
    }


    public function editBlogCategory(Request $request)
    {
        $category = blogCategory::find($request->id);
        //update the subcategory table category_name
        DB::table('blog_sub_categories')->where('blog_categorie_id', $request->id)->update(['blog_categorie_name' => $request->ecategory]);

        $category->category_name = $request->ecategory;
        $category->save();

        return redirect()->route('admin.blog.categories');
    }



    //blog subcategory
    public function blogSubCategoryList()
    {
        $subcat = blogSubCategory::all();
        $cats = blogCategory::all();
        return view('admin.blog.blog_subcategory', compact('subcat', 'cats'));
    }

    public function blogaddSubCategory(Request $request)
    {
    }

    public function blogdeleteSubCategory(Request $request)
    {
    }

    public function blogeditSubCategoryJson(Request $request)
    {
    }

    public function blogeditSubCategory(Request $request)
    {
    }




    //blog tags
    public function blogTagList()
    {
        return view('admin.blog.blog_tags');
    }

    //blog post

    public function blogPostList()
    {
        return view('admin.blog.blog_post');
    }

    //end
}
