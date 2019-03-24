@extends('frontend.include.header')

@section('page-title')
Notifications
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
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Message</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          {{-- @if ($messages)
                        @foreach ($messages as $message)

                          <tr>
                             <td scope="row">{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->body }}</td>

                            <td><button class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                          </tr>




                        @endforeach
                        @else
                          <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                      @endif --}}
                      <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                        </tbody>
                      </table>
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



@endpush
