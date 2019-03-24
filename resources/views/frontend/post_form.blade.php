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
                        <div class="tab-content">



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
                                          @foreach ($category as $cat)
                                            <option>{{ $cat->category_name }}</option>
                                          @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="subcategory"><b>Sub Category </b><span style="color:red;">*</span> </label>
                                        <select class="form-control" id="subcategory" name="subcategory_name">
                                            <option selected disabled>select Sub-Category</option>
                                            @foreach ($subcategory as $scat)
                                              <option>{{ $scat->subcategory_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="location"><b>Division </b><span style="color:red;">*</span> </label>
                                        <select class="form-control" id="location" name="location">
                                            <option selected disabled>Select Division</option>
                                            @foreach ($division as $div)
                                              <option>{{ $div->division_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="city"><b>City </b><span style="color:red;">*</span> </label>
                                        <select class="form-control" id="city" name="city_name">
                                            <option selected disabled>select city</option>
                                            @foreach ($city as $c)
                                              <option>{{ $c->city_name }}</option>
                                            @endforeach

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
