@extends('frontend.include.header')

@section('page-title')
Details
@endsection


@push('user_dashboard_style')
<link rel="stylesheet" href="{!! asset('frontend/css/details.css') !!}">
  <link rel="stylesheet" href="{!! asset('frontend/css/light-slider.css') !!}">
  <style>
      .checked {
color: orange;
}

  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;

  }
</style>
@endpush

@section('content')



        <!-- ==========================================end search========================================== -->
        <!-- add -->
        <div class="container addvertise-banner">
            <div class="row">
                <img src="images/verticalad2.png" class="img-responsive mx-auto d-block" alt="">
            </div>
        </div>
        <!-- ======================================= category ================================================-->
        <section class="post-details">
            <div class="container">
                <div class="row">
                    <!-- main sec -->
                    <div class="col-md-9 pdetails">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">{{$post->category_name}}</a></li>
                                <li class="breadcrumb-item"><a href="#">{{ $post->subcategory_name }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                            </ol>
                        </nav>
                        <div class="card text-center">
                            <div class="card-header">
                          {{$post->title}}
                            </div>
                            <div class="card-body">
                                <!--product slider -->



                                <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">

      <img src="{!! asset('')!!}{{ $post->image1 }}" class="img-responsive img-thumbnail	" />
    </div>
  @if ($post->image2)
    <div class="carousel-item">
      <img src="{!! asset('')!!}{{ $post->image2 }}" class="img-responsive img-thumbnail	" />
    </div>
  @endif
  @if ($post->image3)
    <div class="carousel-item">
      <img src="{!! asset('')!!}{{ $post->image3 }}" class="img-responsive img-thumbnail	" />
    </div>
  @endif
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
                                <!-- slider end -->
                                <div class="row">

                                    <div class="col-sm-7" style="text-align: left;"><br>
                                        <div class="price">
                                            @if ($post->price)
                                              <span>{{ $post->price }}</span>
                                            @endif
                                            @if ($post->negotiation)
                                              <p>Negotiable</p>
                                            @endif
                                        </div>
                                        <br>
                                        <div>
                                    {!! $post->body !!}
</div>
                                    </div>
                                    <div class="col-sm-5" style="text-align: left;"><br>
                                        <div class="rating-star">
                                          <span><b>Rating :</b> </span>
                                          @for ($i=0; $i < 5; $i++)

                                          @endfor

                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span>3/5 (32)</span>
                                        </div><br>

                                        <br>
                                        <span><b>Submit a Review : </b></span><br>
                                        <form class="form-inline rating-form" action="{!! route('post.review') !!}" method="POST">
                                          {{ csrf_field() }}
                                      <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <input type="hidden" name="slug" value="{{ $post->slug }}">
                                            <div class="form-group">

                                                <select class="form-control" id="exampleFormControlSelect1" name="review">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">submit</button>
                                        </form>
                                        <p style="color:red;">
                                          @if (session()->has('review_error'))
                                          {{   session('review_error') }}
                                          @endif
                                        </p>


                                        <p style="color:green;">
                                          @if (session()->has('review_success'))
                                          {{   session('review_success') }}
                                          @endif
                                        </p>
                                    </div>
                                </div>

                                      <br>


                              </div>
                        </div><!-- .card -->
                    </div>
                    <div class="col-md-3 post-profile">
                        <div class="card">
                            <div class="card-header">
                                <h3> পোস্টদাতা</h3>
                            </div>
                            <div class="card-body">
                                <div class="post-author">
                                    <a href="#"><img src="images/avater1.jpg" class="img-thumbnail rounded mx-auto d-block" alt=""></a>
                                    <h5><a style="color:black;" href="#">{{ $client->full_name }}</a></h5>
                                </div>
                                <div class="poster-loacation">
                                    <span class="loc"><i style="color:#3cca3c;" class="fa fa-map-marker"></i>
                                        <p>লোকেশন</p>
                                    </span>
                                    <address class="">{{ $client->address }}</address>
                                </div>
                                <div class="poster-contact">
                                    <span class="loc"><i style="color:#ec4848;" class="fa fa-phone"></i>
                                        <p>মোবাইল নাম্বার</p>
                                    </span>
                                    <p>{{ $client->mobile_no }}</p>
                                </div>
                                <div class="poster-email">
                                    <span class="loc"><i style="color:#10436f;" class="fa fa-at"></i>
                                        <p>ইমেইল অ্যড্রেস</p>
                                    </span>
                                    <p>{{ $client->email }}</p>
                                </div>
                                <br>
                                <p style="margin-bottom:-1px;"><b>Send a Message : </b></p>
                                 <p style="color:green;">
                                          @if (session()->has('message_success'))
                                          {{   session('message_success') }}
                                          @endif
                                        </p>
                                <form action="{!! route('post.message') !!}" method="POST">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="client_id" value="{{ $post->client_id }}">
                                  <input type="hidden" name="slug" value="{{ $post->slug }}">
                                  <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <div class="form-group">
                                        {{-- <label for="exampleInputEmail1">Name :</label> --}}
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
                                    </div>
                                    <div class="form-group">
                                        {{-- <label for="exampleInputEmail1">Email address :</label> --}}
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                                    </div>
                                    <div class="form-group">
                                        {{-- <label for="exampleFormControlTextarea1">Text :  </label> --}}
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter message" name="body"></textarea>
                                    </div><button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                <br>
                                <div class="profile-advertise">
                                    <img src="images/verticalad.png" class="img-responsive mx-auto d-block" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .row -->
            </div>

        </section>
        <!-- ==========================================end category========================================== -->
        <!-- ==============================related post===================================================== -->
        <section class="related-post">
          <div class="container">

              <div class="card">
                <div class="card-header">Related Post</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="card-content">
                        <div class="card-img">
                          <img src="images/ds2.jpg" alt="">
                          <span>
                            <h4>৫০০/-</h4>
                          </span>
                        </div>
                        <div class="card-desc">
                          <h3>১০১৯ স্কয়ার ফিট ফ্লাট, সাহেব বাজার (৩ বেড, অ্যাপার্টমেন্ট)</h3>
                          <p><b> <i style="color:red;" class="fa fa-battery-three-quarters"> </i> কন্ডিশন : </b> নতুন</p>
                          <!-- <p><b>Beds : </b> 3  <b>Baths : </b>3 <b>Size : </b> +/-1250sqft</p> -->
                          <p><b><i style="color:green;" class="fa fa-map-marker" style="color:#00C9A7;margin-right:4px;"> </i> লোকেশন : </b> রাজশাহী</p>
                          <p><b><i style="color:#217f96;" class="fa fa-tag"> </i> ক্যাটেগরি : </b> ফ্লাট
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
                    </div>
                  </div>
                </div>

            </div>
          </div>
        </section>

@endsection
@push('dashboard_script')
  <script type="text/javascript" src="{!! asset('frontend/js/light-slider.js') !!}"></script>
  <script src="{!! asset('frontend/js/main3.js') !!}"></script>
  <script>
  // $(document).ready(function() {
  //
  //   $('#imageGallery').lightSlider({
  //       gallery:true,
  //       item:1,
  //       loop:true,
  //       thumbItem:9,
  //       slideMargin:0,
  //       enableDrag: false,
  //       currentPagerPosition:'left',
  //       onSliderLoad: function(el) {
  //           el.lightGallery({
  //               selector: '#imageGallery .lslide'
  //           });
  //       }
  //   });
  //
  // });
  </script>

@endpush
