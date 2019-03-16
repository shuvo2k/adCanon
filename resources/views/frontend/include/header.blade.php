<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', 'Ad Canon')</title>
	<!-- styles -->
	<link rel="stylesheet" href="{!! asset('frontend/vendor/font-awesome-4.7.0/css/font-awesome.min.css') !!}">
	<link rel="stylesheet" href="{!! asset('frontend/css/bootstrap.min.css') !!}">
	<!-- <link rel="stylesheet" href="css/select2.min.css"> -->
@stack('user_dashboard_style')
	<link rel="stylesheet" href="{!! asset('frontend/css/main3.css') !!}">
	<style>


	</style>


</head>

<body>


	<div class="top-header">
		<div class="container">
			<div class="top-logo">
				<img src="{!! asset('frontend/images/clasify.png') !!}" alt="">
			</div>
			<div class="top-buttons">
				@if (session()->has('role'))
				<p>welcome {{ Session::get('full_name')  }}</p>
				<a href="{!! route('user.logout') !!}"><button class="btn btn-warning">লগআউট</button></a>
			@else
				<a href="login.html"><button class="btn btn-success">লগইন</button></a>
				<a href="register.html"><button class="btn btn-warning">রেজিস্টার</button></a>
				@endif
			</div>
		</div>
	</div>
	<!-- ======================================= navigation ================================================-->
	<section class="navigation">

		<nav class="navbar navbar-expand-md fixed-top" id="navbar">

			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsExampleDefault">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link nvlink" href="index3.html">নীড় পাতা</a>
						</li>
						<li class="nav-item">
							<a class="nav-link nvlink" href="all_posts.html">সকল অ্যড</a>
						</li>
						<li class="nav-item">
							<a class="nav-link nvlink" href="all_posts.html">বাসা/মেস ভাড়া</a>
						</li>
						<li class="nav-item">
							<a class="nav-link nvlink" href="all_posts.html">দৈনন্দিন সার্ভিস</a>
						</li>
						<li class="nav-item">
							<a class="nav-link nvlink" href="online_work.html">অনলাইন কাজ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link nvlink" href="#">প্রয়োজনীয় যোগাযোগ</a>
						</li>

						<li class="nav-item">
							<a class="nav-link nvlink" href="blog.html">ব্লগ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link nvlink" href="user_dashboard.html"> ড্যাসবোর্ড</a>
						</li>

					</ul>

				</div>
			</div>
		</nav>



	</section><!-- end section  -->
	<!-- ==========================================end navigation========================================== -->
    @yield('content')



	<!-- ====================================== footer ================================================-->
	<section class="footer-section">
		<!--footer start-->
		<div class="footer-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<h3>ABOUT Classify</h3>
						<div class="footer-logo"><img src="http://hassandesigns.top/html/classified/images/footer-logo.png" alt=""></div>
						<p>Integer ac lorem sit amet est rhoncus dapi bus don cad pede acus morbi elit nunc molestie at ultrices eu eleifen lorem ut dictum erat masa... <a href="about-us.html">Read More</a></p>
					</div>
					<div class="col-md-2 col-sm-6">
						<h3>Quick LInks</h3>
						<ul class="footer-links">
							<li><a href="#.">Home</a></li>
							<li><a href="#.">About Us</a></li>
							<li><a href="#.">Features</a></li>
							<li><a href="#.">Categories</a></li>
							<li><a href="#.">Blog</a></li>
							<li><a href="#.">Contact Us</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6">
						<h3>MAIN CATEGORIES</h3>
						<ul class="footer-category">
							<li><a href="#.">Electronics</a></li>
							<li><a href="#.">Vahicles</a></li>
							<li><a href="#.">Bikes</a></li>
							<li><a href="#.">Animals</a></li>
							<li><a href="#.">Toys</a></li>
							<li><a href="#."> Furniture</a></li>
							<li><a href="#.">Marketing</a></li>
							<li><a href="#.">Technology</a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-3 col-sm-6">
						<h3>MAIN CATEGORIES</h3>
						<div class="address">Lorem # 38, Ispum Hill, Lorem, WA 12345 </div>
						<div class="info"><i class="fa fa-phone" aria-hidden="true"></i> <a href="#.">(777) 123 4567</a></div>
						<div class="info"><i class="fa fa-fax" aria-hidden="true"></i> <a href="#.">(123) 456 7890</a></div>
					</div>
				</div>
				<div class="copyright">Copyright © 2017 Classify - All Rights Reserved.</div>
			</div>
		</div>

		<!--footer end-->



	</section>
	<!-- ==========================================end footer ========================================== -->

	</div>

	<!-- scripts -->

	<script src="{!! asset('frontend/js/jquery.min.js') !!}"></script>
	<script src="{!! asset('frontend/js/poper.min.js') !!}"></script>
	<script src="{!! asset('frontend/js/bootstrap.min.js') !!}"></script>
	<!-- <script src="js/select2.min.js"></script> -->
	<script src="{!! asset('frontend/js/main3.js') !!}"></script>
@stack('dashboard_script')
</body>

</html>
