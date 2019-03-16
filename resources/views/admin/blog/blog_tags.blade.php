@extends('admin.include.header')

@section('page-title')
Blog Category
@endsection



@section('content')

<!-- page content -->
<div class="right_col" role="main">

    <!-- modal -->
    <!-- Button trigger modal -->
    <br><br><br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModeratorModal">
        Add Category
    </button>
    <br><br><br>
    <!-- Add moderator Modal -->
    <div class="modal fade bd-example-modal-lg" id="addModeratorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="editModalTitle"><b>Add Category</b></h4>


                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                      {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-form-label">Category Name :</label>
                            <input type="text" name="category" class="form-control" id="name">
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

                    <h4 class="modal-title" id="exampleModalCenterTitle"><b>Edit Category</b></h4>


                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Category Name :</label>
                            <input type="text" class="form-control" id="name">
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
                            <th>Category Name</th>
                          <th>Actions</th>
                        </tr>
                    </thead>


                    <tbody>
                      @php
                        $i = 0;
                      @endphp
                      {{-- @foreach () --}}
                        @php
                          $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td></td>

                            <td style="margin:0 auto;text-align:center;display:flex;">
                                <button data-toggle="modal" data-target="#viewModeratorModal" class="btn btn-warning"><i class="fa fa-eye"> </i> </button>
                                <button data-toggle="modal" data-target="#editModeratorModal" class="btn btn-success">
                                    <i class="fa fa-edit"> </i> </button>
                                {{-- <form action="{!! route('admin.category.delete', $category->id) !!}" method="POST">
                                  {{ csrf_field() }}
                                  <button class="btn btn-danger"><i class="fa fa-trash"> </i> </button>
                                </form> --}}

                              </td>
                        </tr>
                          {{-- @endforeach --}}
                    </tbody>
                </table>


        </div>


    </div>
</div>
<!-- /page content -->


@endsection
