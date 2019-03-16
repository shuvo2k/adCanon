@extends('admin.include.header')

@section('page-title')
Moderator Index
@endsection



@section('content')

<!-- page content -->
<div class="right_col" role="main">

    <!-- modal -->
    <!-- Button trigger modal -->
    <br><br><br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModeratorModal">
        Add Moderator
    </button>
    <br><br><br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- Add moderator Modal -->
    <div class="modal fade bd-example-modal-lg" id="addModeratorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="editModalTitle"><b>Add Moderator</b></h4>


                </div>
                <div class="modal-body">
                    <form action="{!! route('admin.moderator.add') !!}" id="form1" method="POST" data-parsley-validate enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label for="full-name" class="col-form-label">Full Name :</label>
                            <input type="text" name="fullName" class="form-control" id="full-name" required="">
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-form-label">Username :</label>
                            <input type="text" name="userName" class="form-control" id="username" required="">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email :</label>
                            <input type="text" name="email" class="form-control" id="email" required="">
                        </div>
                        <div class="form-group">
                            <label for="selectrole">Role :</label>
                            <select class="form-control" name="role" id="selectrole" required="">
                                <option selected disabled>select role</option>
                                <option>Admin</option>
                                <option>Moderator</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">Password :</label>
                            <input type="password" name="password" class="form-control" id="password" required="">
                        </div>
                        <div class="form-group">
                            <label for="mobile" class="col-form-label">Mobile No :</label>
                            <input type="number" name="mobile" class="form-control" id="mobile" required="">
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-form-label">Profile Image :</label>
                            <input type="file" name="image" class="form-control" id="image" required="">
                            <span>Image size must be less then 1mb.</span>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- view Modal -->
    <div class="modal fade bd-example-modal-lg" id="viewModeratorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="editModalTitle"><b>View</b></h4>


                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- end modal -->
    <!-- Edit moderator Modal -->
    <div class="modal fade bd-example-modal-lg" id="editModeratorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="exampleModalCenterTitle"><b>Edit Moderator</b></h4>


                </div>
                <div class="modal-body">
                    <form id="form2" data-parsley-validate enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="efull-name" class="col-form-label">Full Name :</label>
                            <input type="text" class="form-control" id="efull-name">
                        </div>
                        <div class="form-group">
                            <label for="eusername" class="col-form-label">Username :</label>
                            <input type="text" class="form-control" id="eusername">
                        </div>
                        <div class="form-group">
                            <label for="eemail" class="col-form-label">Email :</label>
                            <input type="text" class="form-control" id="eemail">
                        </div>
                        <div class="form-group">
                            <label for="eselectrole">Role :</label>
                            <select class="form-control" id="eselectrole">
                                <option selected disabled>select role</option>
                                <option>Admin</option>
                                <option>Moderator</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="epassword" class="col-form-label">Password :</label>
                            <input type="password" class="form-control" id="epassword">
                        </div>
                        <div class="form-group">
                            <label for="emobile" class="col-form-label">Mobile No :</label>
                            <input type="number" class="form-control" id="emobile">
                        </div>
                        <div class="form-group">
                            <label for="eimage" class="col-form-label">Profile Image :</label>
                            <input type="file" name="image" class="form-control" id="eimage">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <div class="">
        <table id="datatable-keytable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Mobile</th>
                    <th>Actions</th>
                </tr>
            </thead>


            <tbody>
                @php
                $i = 0;
                @endphp
                @foreach ($admins as $admin)

                @php
                $i++;
                @endphp
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $admin->full_name }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->role }}</td>
                      <td>{{ $admin->mobile_no }}</td>
                    <td style="margin:0 auto;text-align:center; display:flex;">
                        <button data-toggle="modal" data-target="#viewModeratorModal" class="btn btn-warning"><i class="fa fa-eye"> </i> </button>
                        <button data-toggle="modal" data-target="#editModeratorModal" class="btn btn-success">
                            <i class="fa fa-edit"> </i> </button>
                        <form action="{!! route('admin.moderator.delete', $admin->id) !!}" method="POST"> {{ csrf_field() }} <button class="btn btn-danger"><i class="fa fa-trash"> </i> </button></td></form>
                </tr>
                @endforeach



            </tbody>
        </table>


    </div>
</div>
<!-- /page content -->


@endsection
