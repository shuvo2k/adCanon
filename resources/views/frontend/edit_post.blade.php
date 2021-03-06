@extends('frontend.include.header')

@section('page-title')
Edit post
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


                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="">


                                <!-- end error -->
                                <form action="{!! route('post.edit.submit') !!}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="clientemail" value="{{ $post->client_email }}">
                                      <input type="hidden" name="id" value="{{ $post->id }}">
                                        <input type="hidden" name="client_id" value="{{ $post->client_id }}">
                                    <div class="form-group">
                                        <label for=""><b>Title </b><span style="color:red;">*</span> </label>
                                        <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="category"><b>Category </b><span style="color:red;">*</span> </label>
                                        <select class="form-control" id="category" name="category_name">
                                            <option selected>{{ $post->category_name }}</option>
                                            @foreach ($category as $c)
                                            @if ($post->category_name == $c->category_name)
                                            @continue
                                            @endif
                                            <option>{{ $c->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="subcategory"><b>Sub Category </b><span style="color:red;">*</span> </label>
                                        <select class="form-control" id="subcategory" name="subcategory_name">
                                            <option selected>{{ $post->subcategory_name }}</option>

                                            @foreach ($subcategory as $sc)
                                            @if ($post->subcategory_name == $sc->subcategory_name)
                                            @continue
                                            @endif
                                            <option>{{ $sc->subcategory_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="location"><b>Division </b><span style="color:red;">*</span> </label>
                                        <select class="form-control" id="location" name="location">
                                            <option selected>{{ $post->division_name }}</option>

                                            @foreach ($division as $d)
                                            @if ($post->division_name == $d->division_name)
                                            @continue
                                            @endif
                                            <option>{{ $d->division_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="city"><b>City </b><span style="color:red;">*</span> </label>
                                        <select class="form-control" id="city" name="city_name">
                                            <option selected>{{ $post->citie_name }}</option>

                                            @foreach ($city as $c)
                                            @if ($post->citie_name == $c->city_name)
                                            @continue
                                            @endif
                                            <option>{{ $c->city_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for=""><b>Price </b> </label>
                                        <input type="number" class="form-control" name="price" value="{{ $post->price }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="city"><b>Negotiation </b><span style="color:red;">*</span> </label>
                                        <select class="form-control" id="negotiation" name="negotiation">
                                            @if ($post->negotiation == 0)
                                            <option selected>No</option>
                                            <option>Yes</option>
                                            @else
                                            <option selected>Yes</option>
                                            <option>No</option>
                                            @endif

                                        </select>
                                    </div>
                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col-md-4"><label for=""><b>Image 1 </b><span style="color:red;">*</span> </label>
                                                <input type="file" class="form-control" name="image1" value="{{ $post->image1 }}">
                                                <img src="{!! asset('') !!}{{ $post->image1 }}" width="100px" height="80px" alt="" style="padding:5px 2px;">
                                            </div>
                                            <div class="col-md-4"><label for=""><b>Image 2 :</b></label>
                                                <input type="file" class="form-control" name="image2">
                                                <img src="{!! asset('') !!}{{ $post->image2 }}" alt="" width="100px" height="80px" style="padding:5px 2px;">
                                            </div>
                                            <div class="col-md-4"><label for=""><b>Image 3 :</b></label>
                                                <input type="file" class="form-control" name="image3" placeholder="enter image">
                                                <img src="{!! asset('') !!}{{ $post->image3 }}" alt="" width="100px" height="80px" style="padding:5px 2px;">
                                            </div>
                                        </div>
                                        <span style="color:gray;font-size:13px;">Image Size must be less then 2mb.</span>
                                    </div>


                                    <div class="form-group">
                                        <label for=""><b>Body :</b> <span style="color:red;">*</span></label>
                                        <textarea name="body" id="mytextarea" class="form-control">{{ $post->body }}</textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="city"><b>Status </b><span style="color:red;">*</span> </label>
                                        <select class="form-control" id="status" name="status">
                                            @if ($post->status == 'Publish')
                                            <option selected>Publish</option>

                                            <option>Hide</option>
                                            @else
                                            <option selected>Hide</option>
                                            <option>Publish</option>
                                            @endif
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
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
