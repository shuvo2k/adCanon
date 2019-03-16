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
        Add Division
    </button>
    <br><br><br>
    <!-- Add moderator Modal -->
    <div class="modal fade bd-example-modal-lg" id="addModeratorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="editModalTitle"><b>Add Division</b></h4>


                </div>
                <div class="modal-body">
                    <form action="{!! route('admin.division.add') !!}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="divisionname" class="col-form-label">Division Name :</label>
                            <input type="text" name="division" class="form-control" id="divisionname">
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

                    <h4 class="modal-title" id="exampleModalCenterTitle"><b>Edit Division</b></h4>


                </div>
                <div class="modal-body">
                    <form action="{!! route('admin.division.edit') !!}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" id="eid" name="id" value="">
                        <div class="form-group">
                            <label for="division" class="col-form-label">Name :</label>
                            <input type="text" name="division" class="form-control" id="division" value="">
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
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>


                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach ($divisions as $division)
                    @php
                    $i++;
                    @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $division->division_name }}</td>

                        <td style="margin:0 auto;text-align:center;display:flex;">

                            <button data-id="{{ $division->id }}" data-toggle="modal" data-target="#editModeratorModal" class="btn btn-success editDivModal">
                                <i class="fa fa-edit"> </i> </button>
                            <form action="{!! route('admin.division.delete', $division->id) !!}" method="POST">
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

@push('division_script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('.editDivModal').on('click', function() {

            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{!! route('admin.division.edit.json') !!}",
                data: {
                    id: id
                },
                success: function(response) {
                    console.log(response);
                    $('#eid').val(response.id);
                    $('#division').val(response.division_name);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>

@endpush
