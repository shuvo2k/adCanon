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
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="true">Post List</a>

                            <a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Post</a>

                            <a class="nav-link " href="{!! asset('dashboard.notification') !!}">Notification</a>

                            {{-- <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">online</a>

  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">**</a> --}}
                        </div>
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
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">


                                <!-- end error -->
                                <form action="{!! route('user.post.submit') !!}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="clientemail" value="{{ session('user_email') }}">
                                    <div class="form-group">
                                        <label for=""><b>Title </b><span style="color:red;">*</span> </label>
                                        <input type="text" class="form-control" name="title" placeholder="enter title">
                                    </div>
                                    <div class="form-group">
                                        <label for="category"><b>Category </b><span style="color:red;">*</span> </label>
                                        <select class="form-control" id="category" name="category_name">
                                            <option selected disabled>select Category</option>
                                            <option>Electronics</option>
                                            <option>House</option>
                                            <option>Veichals</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="subcategory"><b>Sub Category </b><span style="color:red;">*</span> </label>
                                        <select class="form-control" id="subcategory" name="subcategory_name">
                                            <option selected disabled>select Sub-Category</option>
                                            <option>Laptop</option>
                                            <option>Mobile</option>
                                            <option>Mease</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="location"><b>Division </b><span style="color:red;">*</span> </label>
                                        <select class="form-control" id="location" name="location">
                                            <option selected disabled>Select Division</option>
                                            <option>Dhaka</option>
                                            <option>Rajshahi</option>
                                            <option>Khulna</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="city"><b>City </b><span style="color:red;">*</span> </label>
                                        <select class="form-control" id="city" name="city_name">
                                            <option selected disabled>select city</option>
                                            <option>mirpur</option>
                                            <option>saheb bazar</option>
                                            <option>bridge</option>

                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for=""><b>Price </b> </label>
                                        <input type="number" class="form-control" name="price" placeholder="enter price">
                                    </div>
                                    <div class="form-group">
                                        <label for="city"><b>Negotiation </b><span style="color:red;">*</span> </label>
                                        <select class="form-control" id="negotiation" name="negotiation">
                                            <option selected disabled>select negotiation</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col-md-4"><label for=""><b>Image 1 </b><span style="color:red;">*</span> </label>
                                                <input type="file" class="form-control" name="image1" placeholder="enter image"></div>
                                            <div class="col-md-4"><label for=""><b>Image 2 :</b></label>
                                                <input type="file" class="form-control" name="image2" placeholder="enter image"></div>
                                            <div class="col-md-4"><label for=""><b>Image 3 :</b></label>
                                                <input type="file" class="form-control" name="image3" placeholder="enter image"></div>
                                        </div>
                                        <span style="color:gray;font-size:13px;">Image Size must be less then 2mb.</span>
                                    </div>


                                    <div class="form-group">
                                        <label for=""><b>Body :</b> <span style="color:red;">*</span></label>
                                        <textarea name="body" id="mytextarea" class="form-control"></textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="city"><b>Status </b><span style="color:red;">*</span> </label>
                                        <select class="form-control" id="status" name="status">
                                            <option selected disabled>select Status</option>
                                            <option>Publish</option>
                                            <option>Hide</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div>
                            {{-- <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-home-tab">



                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                content comes soon
                            </div> --}}

                            <div class="tab-pane fade active show" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <!-- post list  -->
                                <div class="container">
                                    <div class="row">
                                        @foreach ($posts as $post)
                                        <div class="col-md-4">
                                            <a href="details.html">
                                                <div class="card-content" style="font-size:13px;">
                                                    <div class="card-img">
                                                        <img src="{!! asset('') !!}{{ $post->image1 }}" alt="" style="height:180px;">
                                                        <span>
                                                            <h4>৫০০/-</h4>
                                                        </span>
                                                    </div>
                                                    <div class="card-desc">
                                                        <h3 style="font-size:18px;">{{$post->title}}</h3>
                                                        <!-- <p><b>Beds : </b> 3  <b>Baths : </b>3 <b>Size : </b> +/-1250sqft</p> -->
                                                        <p><b><i style="color:green;" class="fa fa-map-marker" style="color:#00C9A7;margin-right:4px;"> </i> লোকেশন : </b> রাজশাহী</p>
                                                        <p><b><i style="color:#217f96;" class="fa fa-tag"> </i> ক্যাটেগরি : </b> ফ্লাট
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

                                                            <li class="date"><i style="color:#057514;" class="fa fa-clock-o" aria-hidden="true"> </i> ৩ সপ্তাহ আগে
                                                            </li>

                                                        </div>


                                                    </div>
                                                    <div class="post-btn" style="display:flex;padding:8px 1px;justify-content:space-around;">
                                                        <button class="btn btn-primary">Edit</button>
                                                        <button class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        @endforeach
                                    </div>
                                </div>
                                <!-- end -->
                            </div>
                        </div>
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
