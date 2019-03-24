@extends('frontend.include.header')

@section('page-title')
Search
@endsection

@push('user_dashboard_style')
<link rel="stylesheet" href="{!! asset('frontend/css/details.css') !!}">
</style>
@endpush

@section('content')
@include('frontend.include.search')
<!-- ==========================================end search========================================== -->
{{-- <!-- add -->
<div class="container addvertise-banner">
	<div class="row">
		<img src="images/verticalad2.png" class="img-responsive mx-auto d-block" alt="">
	</div>
</div> --}}
<!-- ======================================= category ================================================-->
<section class="all-posts">
	<div class="container">
		<div class="row">
			<!-- left sidebar sec -->
			<div class="col-md-3 post-filter">
				<div class="card">
					<div class="card-header">
						পোস্ট ফিল্টার
					</div>
					<div class="card-body">




					</div>
				</div>
			</div>
			<!-- main sec -->
			<div class="col-md-8 post-card">
				<div class="card text-center">
					<div class="card-header">
						সকল বিজ্ঞাপন
					</div>
					<div class="card-body">

						@if ($posts)
						@foreach ($posts as $post)
						@if ($post->featured)
						<div class="card product-card" style="margin-bottom:25px;">
							<div class="card-body">
								<a href="{!! route('post.details') !!}{{'/'.$post->id.'/'.$post->slug  }}" style="color:black;">
									<div class="row">
										<div class="col-md-4 product-img"> <img src="{!! asset('') !!}{{ $post->image1 }}" class="pull-left float-left img-thumbnail" alt=""></div>
										<div class="col-md-8 content">
											<h4 class="media-heading">{{ $post->title }}</h4>
											<li class="tag-ctg" style="font-size:14px; margin-bottom:2px;"><i style="color: #39c339fc;font-size:bold;margin-right:5px;" class="fa fa-tag" aria-hidden="true"> </i> {{ $post->category_name }} , {{ $post->subcategory_name }}
											</li>
											<li class="place" style="font-size:14px; margin-bottom:2px;"><i style="color: #39c339fc;font-size:bold;margin-right:5px;" class="fa fa-map-marker" aria-hidden="true"> </i> {{ $post->division_name }} , {{ $post->citie_name }}</li>

											<li class="date" style="font-size:14px; margin-bottom:2px;"><i style="color: #39c339fc;font-size:bold;margin-right:5px;" class="fa fa-clock-o" aria-hidden="true"> </i> {{ $post->created_at->format('d/m/Y') }}
											</li>
											<li class="rating" style="font-size:14px; margin-bottom:2px;"> <span class="fa fa-star checked"></span>
												<span class="fa fa-star checked"></span>
												<span class="fa fa-star checked"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span>3/5 (32)</span></li>
											@if ($post->price)
											<div class="amount"><span>5000</span></div>
											@else

											@endif
										</div>

									</div>
								</a>

							</div>



						</div>
						@endif

						@endforeach

						@foreach ($posts as $post)
						@if(!$post->featured)

							<div class="card product-card2" style="margin-bottom:25px;">
								<div class="card-body">
									<a href="{!! route('post.details') !!}{{'/'.$post->id.'/'.$post->slug  }}" style="color:black;">
										<div class="row">
											<div class="col-md-4 product-img"> <img src="{!! asset('') !!}{{ $post->image1 }}" class="pull-left float-left img-thumbnail" alt=""></div>
											<div class="col-md-8 content">
												<h4 class="media-heading">{{ $post->title }}</h4>
												<li class="tag-ctg" style="font-size:14px; margin-bottom:2px;"><i style="color: #39c339fc;font-size:bold;margin-right:5px;" class="fa fa-tag" aria-hidden="true"> </i> {{ $post->category_name }} , {{ $post->subcategory_name }}
												</li>
												<li class="place" style="font-size:14px; margin-bottom:2px;"><i style="color: #39c339fc;font-size:bold;margin-right:5px;" class="fa fa-map-marker" aria-hidden="true"> </i> {{ $post->division_name }} , {{ $post->citie_name }}</li>

												<li class="date" style="font-size:14px; margin-bottom:2px;"><i style="color: #39c339fc;font-size:bold;margin-right:5px;" class="fa fa-clock-o" aria-hidden="true"> </i> {{ $post->created_at->format('d/m/Y') }}
												</li>
												<li class="rating" style="font-size:14px; margin-bottom:2px;"> <span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span>3/5 (32)</span></li>
												@if ($post->price)
												<div class="amount"><span>5000</span></div>
												@else

												@endif
											</div>

										</div>
									</a>

								</div>



							</div>
							@endif
							@endforeach
							@endif
					</div>

				</div><!-- .card -->

			</div>
			<!-- main end -->
			<!-- addvertise -->
			<div class="col-md-1 allpost_side_add">
				<img src="images/verticalad.png" alt="">
			</div>

		</div>

	</div>
</section>
<!-- ==========================================end category========================================== -->

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
