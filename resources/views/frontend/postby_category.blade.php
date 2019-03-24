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
<!-- post filter accordine -->


				<ul id="tree1">

						<li><a href="#">Category</a>
@foreach ($category as $cat)
								<ul>
										<li>{{ $cat->category_name }}
												<ul>
													<li>all</li>
													@foreach ($subcategory as $subcat)
														@if ($cat->category_name == $subcat->category_name)
															<li><a href="">{{ $subcat->subcategory_name }}</a></li>
														@endif
													@endforeach
												</ul>
										</li>

								</ul>
							@endforeach

						</li>


						<li><a href="#">Division</a>
@foreach ($division as $div)
								<ul>
										<li>{{ $div->division_name }}
												<ul>
													<li>all</li>
													@foreach ($city as $c)
														@if ($div->division_name == $c->division_name)
															<li><a href="">{{ $c->city_name }}</a></li>
														@endif
													@endforeach
												</ul>
										</li>

								</ul>
							@endforeach

						</li>
				</ul>


<!-- end accordine -->


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

							<div class="card-body">
								@php
									$i = 0;
								@endphp




														@if ($posts)

														@foreach ($posts as $post)

													@if ($post->category_name == $category_name)
														@if ($post->featured == 1)
														<div class="card product-card" style="margin-bottom:25px;">
															<div class="card-body">
																<a href="{!! route('post.details') !!}{{'/'.$post->id.'/'.$post->slug  }}" style="color:black;">
																	<div class="row">
																		<div class="col-md-4 product-img"> <img src="{!! asset('') !!}{{ $post->image1 }}" class="pull-left float-left img-thumbnail" alt=""></div>
																		<div class="col-md-8 content">
																			<h4 class="media-heading">{{ $post->title }}</h4>
																			<li class="tag-ctg" style="font-size:14px; margin-bottom:2px;"><i style="color: #39c339fc;font-size:bold;margin-right:5px;" class="fa fa-tag" aria-hidden="true"> </i> {{ $post->category_name }} , {{ $post->subcategory_name }}
																			</li>
																			<li class="place" style="font-size:14px; margin-bottom:2px;"><i style="color: #39c339fc;font-size:bold;margin-right:5px;" class="fa fa-map-marker" aria-hidden="true"> </i> {{ $post->division_name }} , {{ $post->city_name }}</li>

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

													@endif
														@endforeach



														@foreach ($posts as $post)
													{{-- @if($post->id) --}}
														@if ($post->category_name == $category_name)
															@if($post->featured == 0)

																<div class="card product-card2" style="margin-bottom:25px;">
																	<div class="card-body">
																		<a href="{!! route('post.details') !!}{{'/'.$post->id.'/'.$post->slug  }}" style="color:black;">
																			<div class="row">
																				<div class="col-md-4 product-img"> <img src="{!! asset('') !!}{{ $post->image1 }}" class="pull-left float-left img-thumbnail" alt=""></div>
																				<div class="col-md-8 content">
																					<h4 class="media-heading">{{ $post->title }}</h4>
																					<li class="tag-ctg" style="font-size:14px; margin-bottom:2px;"><i style="color: #39c339fc;font-size:bold;margin-right:5px;" class="fa fa-tag" aria-hidden="true"> </i> {{ $post->category_name }} , {{ $post->subcategory_name }}
																					</li>
																					<li class="place" style="font-size:14px; margin-bottom:2px;"><i style="color: #39c339fc;font-size:bold;margin-right:5px;" class="fa fa-map-marker" aria-hidden="true"> </i> {{ $post->division_name }} , {{ $post->city_name }}</li>

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
																{{-- @endif --}}
														@endif


														@endif
															@endforeach
															@endif
							</div>

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


@push('post-filter-js')
	<script>
	//filter accordine
	$.fn.extend({
			treed: function (o) {

				var openedClass = 'fa-minus-square';
				var closedClass = 'fa-plus-square';

				if (typeof o != 'undefined'){
					if (typeof o.openedClass != 'undefined'){
					openedClass = o.openedClass;
					}
					if (typeof o.closedClass != 'undefined'){
					closedClass = o.closedClass;
					}
				};

					//initialize each of the top levels
					var tree = $(this);
					tree.addClass("tree");
					tree.find('li').has("ul").each(function () {
							var branch = $(this); //li with children ul
							branch.prepend("<i class='fa  " + closedClass + "'> </i> ");
							branch.addClass('branch');
							branch.on('click', function (e) {
									if (this == e.target) {
											var icon = $(this).children('i:first');
											icon.toggleClass(openedClass + " " + closedClass);
											$(this).children().children().toggle();
									}
							})
							branch.children().children().toggle();
					});
					//fire event from the dynamically added icon
				tree.find('.branch .indicator').each(function(){
					$(this).on('click', function () {
							$(this).closest('li').click();
					});
				});
					//fire event to open branch if the li contains an anchor instead of text
					tree.find('.branch>a').each(function () {
							$(this).on('click', function (e) {
									$(this).closest('li').click();
									e.preventDefault();
							});
					});
					//fire event to open branch if the li contains a button instead of text
					tree.find('.branch>button').each(function () {
							$(this).on('click', function (e) {
									$(this).closest('li').click();
									e.preventDefault();
							});
					});
			}
	});

	//Initialization of treeviews

	$('#tree1').treed();

	</script>
@endpush
