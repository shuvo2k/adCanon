@extends('frontend.include.header')

@section('page-title')
Dashboard
@endsection


@push('user_dashboard_style')
<link rel="stylesheet" href="{!! asset('frontend/css/details.css') !!}">
@endpush

@section('content')


<!-- ==========================================end navigation========================================== -->

<section id="dashboard">
    <div class="container user-dashboard">
        <div class="row user-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">হোম</a></li>
                    <li class="breadcrumb-item"><a href="#">ইউজার</a></li>
                    <li class="breadcrumb-item"><a href="#">ড্যাশবোর্ড</a></li>
                    <li class="breadcrumb-item active" aria-current="page">জন ডোহ</li>
                </ol>
            </nav>
        </div>
        <div class="row">


            <br><br>


            <div class="col-sm-3">
                <div class="card">
                    {{-- <div class="card-header"></div> --}}
                    <div class="card-body">
                      <a class="nav-link" href="{!! route('user.dashboard.posts') !!}">Post List</a>

                          <a class="nav-link" href="{!! route('user.dashboard.post.form') !!}">Post</a>

                          <a class="nav-link" href="{!! route('dashboard.notification') !!}">Notification</a>

                    </div>
                </div>
            </div>
            <div class="col-sm-9">

                <div class="card">

                    <div class="card-body">
                        <!-- error message  -->
                        @if ($errors->any())

                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                            {{ $error }}
                        </div>
                        @endforeach


                        @endif

                        <!-- session message -->
                        @if (session()->has('post_success'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('post_success') }}
                        </div>
                        @endif
                        <!-- post delete -->
                        <!-- session message -->
                        @if (session()->has('post_delete'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('post_delete') }}
                        </div>
                        @endif
                        <!-- end delete post -->
                        <div>

                                <!-- post list  -->
                                <div class="container">
                                    <div class="row">
                                        @if (!$posts)
                                          <div>
                                            <h2>No Posts Yet.</h2>
                                            <p>post to give advertise.</p>
                                          </div>
                                          @else
                                            @foreach ($posts as $post)
                                            <div class="col-md-4">
                                                <a href="details.html">
                                                    <div class="card-content" style="font-size:13px;">
                                                        <div class="card-img">
                                                            <img src="{!! asset('') !!}{{ $post->image1 }}" alt="" style="height:180px;">
                                                          @if ($post->price)
                                                            <span>
                                                                <h4>{{ $post->price }}/-</h4>
                                                            </span>

                                                          @endif
                                                        </div>
                                                        <div class="card-desc">
                                                            <h3 style="font-size:18px;">{{$post->title}}</h3>
                                                            <!-- <p><b>Beds : </b> 3  <b>Baths : </b>3 <b>Size : </b> +/-1250sqft</p> -->
                                                            <p><b><i style="color:green;" class="fa fa-map-marker" style="color:#00C9A7;margin-right:4px;"> </i> লোকেশন : </b> {{ $post->division_name }}</p>
                                                            <p><b><i style="color:#217f96;" class="fa fa-tag"> </i> ক্যাটেগরি : </b> {{$post->category_name}}
                                                            </p> <!-- <a href="#" class="btn-card">Read</a> -->
                                                        </div>
                                                        <div class="card-footer" style="font-size:12px;">
                                                            <div>
                                                                <li class="rating"> <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                    <span class="fa fa-star"></span>
                                                                    <span>3/5 (32)</span></li>

                                                                <li class="date"><i style="color:#057514;" class="fa fa-clock-o" aria-hidden="true"> </i> {{ $post->created_at->format('d/m/Y') }}
                                                                </li>

                                                            </div>


                                                        </div>
                                                        <div class="post-btn" style="display:flex;padding:8px 1px;justify-content:space-around;">
                                                          <a href="{!! route('post.edit',$post->client_id.'/'.$post->id.'/'.$post->slug) !!}">  <button class="btn btn-primary">Edit</button></a>
                                                            <form action="{!! route('post.delete') !!}" method="POST">
                                                              {{ csrf_field() }}
                                                              <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                              <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            @endforeach

                                        @endif
                                    </div>
                                </div>
                                <!-- end -->


                    </div>
                </div>
                <!-- .col-9 -->
            </div>

        </div>

    </div>
</section>
<!-- ====================================== footer ================================================-->
@endsection
@push('dashboard_script')
<script src="{!! asset('vendor/tinymce/js/tinymce/tinymce.min.js') !!}"></script>

<script type="text/javascript">
    tinymce.init({
        selector: "#mytextarea",
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        // content_css: [
        //   '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        //   '//www.tiny.cloud/css/codepen.min.css'
        // ]
    });
</script>


@endpush
