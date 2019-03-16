@extends('frontend.include.header')

@section('page-title')
Register
@endsection



@section('content')
	<!-- ======================================= sec 1 ================================================-->
	<section class="">

		<div class="container">

		 <div class="row">
<div class="col-md-2"></div>
			 <div class="col-md-offset-2 col-md-6 signup-form">
				 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
@endif


				 <div>
					 <h3> রেজিস্ট্রেশন করুন</h3>
<!-- session message -->
                        @if (session()->has('error_password'))
                          <div class="alert alert-danger">
                            {{ session('error_password') }}
                          </div>
                          @endif
                          <!-- end session -->

					 <form action="{!! route('user.register.post') !!}" method="POST">
{{ csrf_field() }}
						 <div class="form-group">
							 <label for="exampleInputEmail1">সম্পুর্ন নাম</label>
							 <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="সম্পুর্ন নাম লিখুন">
						 </div>

						 <div class="form-group">
							 <label for="exampleInputPassword1">ইমেইল</label>
							 <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="ইমেইল লিখুন">
						 </div>
						 <div class="form-group">
							<label for="exampleInputPassword1">মোবাইল নাম্বার</label>
							<input type="number" name="mobile_no" class="form-control" id="exampleInputPassword1" placeholder="মোবাইল নাম্বার লিখুন">
						</div>
						 <div class="form-group">
							 <label for="exampleInputPassword1">ঠিকানা</label>
							 <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="ঠিকানা লিখুন">
						 </div>

						 <div class="form-group">
							 <label for="exampleInputPassword1">পাসওয়ার্ড</label>
							 <input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="পাসওয়ার্ড লিখুন">
						 </div>
						 <div class="form-group">
							 <label for="exampleInputPassword1">পাসওয়ার্ড কনর্ফাম</label>
							 <input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="আবার পাসওয়ার্ড লিখুন">
						 </div>



						 <button type="submit" class="btn btn-primary">রেজিস্টার করুন</button>
					 </form>
					 <p style="text-align:center;">একাউন্ট আছে ? লগইন করুন ।</p>
				 </div>

			 </div>
			 <div class="col-md-2 addvertise">
				 <img src="{!! asset('frontend/images/verticalad.png') !!}" alt="feature">
			 </div>
		 </div>
	 </div>
	</section>
	<!-- ========================================== sec1 end========================================== -->
@endsection
