@extends('frontend.include.header')

@section('page-title')
Login
@endsection



@section('content')
<!-- ======================================= sec 1 ================================================-->
<section class="">

	<div class="container">

		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 login-form">
				<div>
					<!-- session message -->
					@if (session()->has('register_success'))
					<div class="alert alert-danger">
						{{ session('register_success') }}
					</div>
					@endif
					<!-- end session -->
					<!-- session message -->
					@if (session()->has('login_uerror'))
					<div class="alert alert-danger">
						{{ session('login_uerror') }}
					</div>
					@endif
					<!-- end session -->

					<!-- session message -->
					@if (session()->has('password_uerror'))
					<div class="alert alert-danger">
						{{ session('password_uerror') }}
					</div>
					@endif
					<!-- end session -->

					<!-- session message -->
					@if (session()->has('logout_msg'))
					<div class="alert alert-danger">
						{{ session('logout_msg') }}
					</div>
					@endif
					<!-- end session -->
					<h3>লগইন করুন</h3>
					<form action="{!! route('user.login.post') !!}" method="POST">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="exampleInputEmail1">ইমেইল অথবা মোবাইল নাম্বার</label>
							<input type="text" name="email_mobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ইমেইল অথবা মোবাইল নাম্বার লিখুন">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">পাসওয়ার্ড</label>
							<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="পাসওয়ার্ড লিখুন">
						</div>

						<button class="btn btn-success" type="submit">প্রবেশ করুন</button>

					</form>
					<p style="text-align:center;">একাউন্ট নেই ? রেজিস্টার করুন । পাসওয়ার্ড মনে নেই ? <br>এখানে <a href=""> ক্লিক করুন</a> ।</p>
				</div>

			</div>

			<div class="col-md-2 addvertise">
				<img src="images/verticalad.png" alt="feature">
			</div>
		</div>
	</div>
</section>
<!-- ========================================== sec1 end========================================== -->
@endsection
