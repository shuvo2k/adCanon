@extends('frontend.include.header')

@section('page-title')
Home
@endsection




@section('content')
@include('frontend.include.search')
	<!-- ==========================================end navigation========================================== -->
	<!-- ======================================= category ================================================-->
	<section class="post-categories">
		<section id="cat-location" class="home-section">
			<div class="container bg-white cat-loc-container">
				<div class="row">
					<div class="col-md-9">
						<div class="cat-list-wrapper">
							<h3 class="cat-title">টপ ক্যাটেগরি
							</h3>
							<br><br>
							<div class="row">
						@foreach ($category as $cat)
							<div class="col-md-3 col-sm-4 col-6">
								<div class="cat-box text-center">
									<div class="icon"><i style="color:#485eb7;" class="{{ $cat->icon_class }}"></i></a>
									</div>
									<a class="cat-box-title" href="">{{ $cat->category_name }}
										<span class="count"></span></a>
								</div>
							</div>
						@endforeach
								{{-- <div class="col-md-3 col-sm-4 col-6">
									<div class="cat-box text-center">
										<div class="icon"><i style="color:#268610;" class="fa fa-car" aria-hidden="true"></i></a>
										</div>
										<a class="cat-box-title" href="">গাড়ি
											<span class="count">(229)</span></a>
									</div>
								</div>
								<div class="col-md-3 col-sm-4 col-6">
									<div class="cat-box text-center">
										<div class="icon"><a href=""><i style="color:#771313;" class="fa fa-home" aria-hidden="true"></i></a>
										</div>
										<a class="cat-box-title" href="">প্রপার্টি
											<span class="count">(102)</span></a>
									</div>
								</div>
							 --}}
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="city-list-wrapper">
							<h3 class="cat-title">পপুলার শহর
							</h3>

							<ul class="home-city-list">
							@foreach ($division as $d)
								<li>
									<a href=""><i class="fa fa-map-marker" style="color:green;margin-right:4px;"> </i> {{ $d->division_name }}</a>
								</li>

							@endforeach

							</ul>
						</div>
					</div>

				</div> <br><br>
			</div>
		</section>
	</section>
	<!-- ==========================================end category========================================== -->
	<!-- ======================================= posts ================================================-->
	<section class="all-posts">

		<!-- first cat post -->
		<div class="container featured-posts " id="featured-posts-container">
			<div class="post-heading">
		@foreach ($category as $cat)
			@if ($cat->main_category == '1')
				@php
					$cat_name1 = $cat->category_name;
				@endphp
				<h3 class="">{{$cat->category_name}}
				</h3>
			@endif

		@endforeach

				<p>খুজে নিন আপনার পছন্দের পন্য / বিজ্ঞাপন দিন </p>
			</div>
			<br>
			<!-- details card section starts from here -->
			<section class="details-card">
				<div class="container">
					<div class="row">
					@foreach ($post as $p)


					@if (trim($cat_name1) == trim($p->category_name) && $p->featured == 1)
						<div class="col-md-4">
							<a href="{!! route('post.details') !!}{{'/'.$p->id.'/'.$p->slug  }}" style="color:black;">
									<div class="card-content">
										<div class="card-img">
											<img src="{!! asset('') !!}{{ $p->image1 }}" alt="">
										@if ($p->price)
											<span>
												<h4>৫০০/-</h4>
											</span>
										@endif
										</div>
										<div class="card-desc">
											<h3>{{ $p->title }}</h3>

											<!-- <p><b>Beds : </b> 3  <b>Baths : </b>3 <b>Size : </b> +/-1250sqft</p> -->
												<p><b><i style="color:#217f96;" class="fa fa-tag"> </i> ক্যাটেগরি : </b> {{ $p->category_name }} , {{ $p->subcategory_name }}
											<p><b><i style="color:green;" class="fa fa-map-marker" style="color:#00C9A7;margin-right:4px;"> </i> লোকেশন : </b> {{ $p->division_name }} , {{ $p->citie_name }}</p>

											</p> <!-- <a href="#" class="btn-card">Read</a> -->
										</div>
										<div class="card-footer">
											<div>
												<li class="rating"> <span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span>3/5 (32)</span></li>

												<li class="date"><i style="color:#057514;" class="fa fa-clock-o" aria-hidden="true"> </i> ৩ সপ্তাহ আগে
												</li>

											</div>
										</div>
									</div>
								</a>
						</div><!-- SINGLE POST -->
					@endif
					@endforeach


					</div>
					<div class="catpost-button">
						<button class="btn btn-success">এ বিষয়ে সকল বিজ্ঞাপন</button>
					</div>
				</div>
			</section>
			<!-- details card section starts from here -->







		</div>
		<!-- sencond cat post -->
		<div class="container featured-posts " id="featured-posts-container">
			<div class="post-heading">
				@foreach ($category as $cat)
					@if ($cat->main_category == '2')
						@php
							$cat_name2 = $cat->category_name;
						@endphp
						<h3 class="">{{$cat->category_name}}
						</h3>
					@endif

				@endforeach
				<p>খুজে নিন আপনার প্রয়োজনীয় সেবা / বিজ্ঞাপন দিন</p>
			</div>
			<br>
			<!-- details card section starts from here -->
			<section class="details-card">
				<div class="container">
					<div class="row">
					@foreach ($post as $p)

					@if (trim($cat_name2) == trim($p->category_name) && $p->featured == 1)
						<div class="col-md-4">
							<a href="{!! route('post.details') !!}{{'/'.$p->id.'/'.$p->slug  }}" style="color:black;">
									<div class="card-content">
										<div class="card-img">
											<img src="{!! asset('') !!}{{ $p->image1 }}" alt="">
										@if ($p->price)
											<span>
												<h4>৫০০/-</h4>
											</span>
										@endif
										</div>
										<div class="card-desc">
											<h3>{{ $p->title }}</h3>

											<!-- <p><b>Beds : </b> 3  <b>Baths : </b>3 <b>Size : </b> +/-1250sqft</p> -->
												<p><b><i style="color:#217f96;" class="fa fa-tag"> </i> ক্যাটেগরি : </b> {{ $p->category_name }} , {{ $p->subcategory_name }}
											<p><b><i style="color:green;" class="fa fa-map-marker" style="color:#00C9A7;margin-right:4px;"> </i> লোকেশন : </b> {{ $p->division_name }} , {{ $p->citie_name }}</p>

											</p> <!-- <a href="#" class="btn-card">Read</a> -->
										</div>
										<div class="card-footer">
											<div>
												<li class="rating"> <span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span>3/5 (32)</span></li>

												<li class="date"><i style="color:#057514;" class="fa fa-clock-o" aria-hidden="true"> </i> ৩ সপ্তাহ আগে
												</li>

											</div>
										</div>
									</div>
								</a>
						</div><!-- SINGLE POST -->
					@endif
					@endforeach


					</div>
					<div class="catpost-button">
						<button class="btn btn-success">এ বিষয়ে সকল বিজ্ঞাপন</button>
					</div>

				</div>
			</section>
			<!-- details card section starts from here -->







		</div>
		<!-- third cat post -->
		<div class="container featured-posts " id="featured-posts-container">
			<div class="post-heading">
				@foreach ($category as $cat)
					@if ($cat->main_category == '3')
						@php
							$cat_name3 = $cat->category_name;
						@endphp
						<h3 class="">{{$cat->category_name}}
						</h3>
					@endif

				@endforeach
				<p>খুজে নিন আপনার পছন্দের ডেভলপার / বিজ্ঞাপন দিন </p>
			</div>
			<br>
			<!-- details card section starts from here -->
			<section class="details-card">
				<div class="container">
					<div class="row">
					@foreach ($post as $p)

					@if (trim($cat_name3) == trim($p->category_name) && $p->featured == 1)

						<div class="col-md-4">
						<a href="{!! route('post.details') !!}{{'/'.$p->id.'/'.$p->slug  }}" style="color:black;">
								<div class="card-content">
									<div class="card-img">
										<img src="{!! asset('') !!}{{ $p->image1 }}" alt="">
									@if ($p->price)
										<span>
											<h4>৫০০/-</h4>
										</span>
									@endif
									</div>
									<div class="card-desc">
										<h3>{{ $p->title }}</h3>

										<!-- <p><b>Beds : </b> 3  <b>Baths : </b>3 <b>Size : </b> +/-1250sqft</p> -->
											<p><b><i style="color:#217f96;" class="fa fa-tag"> </i> ক্যাটেগরি : </b> {{ $p->category_name }} , {{ $p->subcategory_name }}
										<p><b><i style="color:green;" class="fa fa-map-marker" style="color:#00C9A7;margin-right:4px;"> </i> লোকেশন : </b> {{ $p->division_name }} , {{ $p->citie_name }}</p>

										</p> <!-- <a href="#" class="btn-card">Read</a> -->
									</div>
									<div class="card-footer">
										<div>
											<li class="rating"> <span class="fa fa-star checked"></span>
												<span class="fa fa-star checked"></span>
												<span class="fa fa-star checked"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span>3/5 (32)</span></li>

											<li class="date"><i style="color:#057514;" class="fa fa-clock-o" aria-hidden="true"> </i> ৩ সপ্তাহ আগে
											</li>

										</div>
									</div>
								</div>
							</a>
						</div>

						<!-- SINGLE POST -->
					@endif
					@endforeach


					</div>
					<div class="catpost-button">
						<button class="btn btn-success">এ বিষয়ে সকল বিজ্ঞাপন</button>
					</div>
				</div>
			</section>
			<!-- details card section starts from here -->







		</div>





	</section>
	<!-- ==========================================end posts========================================== -->
	<!-- ======================================= sec 1 ================================================-->

	<section class=""></section>
	<!-- ========================================== sec1 end========================================== -->
	<!-- ======================================= banner================================================-->
	<section class="helpcall">
		<div class="container">
			<div class="row">

				<h1>যেকোন সমস্যায় ডায়াল করুন - ০১৭৬২০৫২১২০ ।</h1>

			</div>
		</div>
	</section>
	<!-- ==========================================end navigation========================================== -->

@endsection
