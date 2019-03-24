@extends('admin.include.header')

@section('page-title')
Clients
@endsection



@section('content')

<!-- page content -->
<div class="right_col" role="main">
<h3>Site Users : </h3>


<!-- session message -->
@if (session()->has('user_delete'))
<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session('user_delete') }}
</div>
@endif
<!-- end delete post -->
    <div class="" style="margin-top:20px;">

        <table id="datatable-keytable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Name</th>

                    <th>Email</th>

                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>


            <tbody>
                {{-- @php
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
 --}}

  @php
  $i = 0;
  @endphp
@foreach ($clients as $client)

  @php
  $i++;
  @endphp
  <tr>
      <td>{{ $i }}</td>
    <td>{{ $client->full_name }}</td>
    <td>{{ $client->email }}</td>
    <td>{{ $client->mobile_no }}</td>
    <td>{{ $client->address }}</td>
    <td><form action="{!! route('admin.clients.delete', $client->id) !!}" method="POST"> {{ csrf_field() }} <button class="btn btn-danger"><i class="fa fa-trash"> </i> </button></td></form></td>
  </tr>

@endforeach



            </tbody>
        </table>


    </div>
</div>
<!-- /page content -->


@endsection
