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
        Add Cities
    </button>
    <br><br><br>
    <!-- Add moderator Modal -->
    <div class="modal fade bd-example-modal-lg" id="addModeratorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="editModalTitle"><b>Add Cities</b></h4>


                </div>
                <div class="modal-body">
                    <form action="{!! route('admin.city.add') !!}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="division">Division :</label>
                            <select class="form-control" id="division" name="division_name">

                                <option selected disabled>select Division</option>
                                @foreach ($divisions as $division)


                                <option>{{ $division->division_name }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-form-label">City Name :</label>
                            <input type="text" name="city_name" class="form-control" id="name">
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

    <!-- Edit moderator Modal -->
    <div class="modal fade bd-example-modal-lg" id="editModeratorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="exampleModalCenterTitle"><b>Edit Cities</b></h4>


                </div>
                <div class="modal-body">
                    <form action="{!! route('admin.city.edit') !!}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" id="eid" name="id" value="">
                        <div class="form-group">
                            <label for="edivision">Division :</label>
                            <select class="form-control" id="edivision" readonly>
                                <option selected id="ediv"></option>


                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ecity" class="col-form-label">City Name :</label>
                            <input type="text" name="city" class="form-control" id="ecity">
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
    <!-- end modal -->
    <div class="">
        <div class="row">

            <table id="datatable-keytable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>District</th>
                        <th>Cities</th>
                        <th>Actions</th>
                    </tr>
                </thead>


                <tbody>

                    @php
                    $i = 0;
                    @endphp
                    @foreach ($cities as $city)
                    @php
                    $i++;
                    @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $city->division_name }}</td>
                        <td>{{ $city->city_name }}</td>

                        <td style="margin:0 auto;text-align:center;display:flex;">

                            <button data-id="{{ $city->id }}" data-toggle="modal" data-target="#editModeratorModal" class="btn btn-success escmodal">
                                <i class="fa fa-edit"> </i> </button>
                            <form action="{!! route('admin.city.delete', $city->id) !!}" method="POST">
                                {{ csrf_field() }}
                                <button class="btn btn-danger"><i class="fa fa-trash"> </i> </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>


    </div>
</div>
<!-- /page content -->


@endsection



@push('city_script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('.escmodal').on('click', function() {

            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{!! route('admin.city.edit.json') !!}",
                data: {
                    id: id
                },
                success: function(response) {
                    $('#eid').val(response.id);
                    $('#ediv').text(response.division_name);
                    $('#ecity').val(response.city_name);

                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>

@endpush
