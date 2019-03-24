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
                    <form action="{!! route('admin.category.add') !!}" method="POST">
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


    <!-- Edit moderator Modal -->
    <div class="modal fade bd-example-modal-lg editCat" id="editModeratorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="exampleModalCenterTitle"><b>Edit Category</b></h4>


                </div>
                <div class="modal-body">
                    <form action="{!! route('admin.category.edit') !!}" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" id="eid" value="">
                        <div class="form-group">
                            <label for="editCategory" class="col-form-label">Category Name :</label>
                            <input type="text" name="ecategory" class="form-control" id="editCategory" value="">
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
                      @foreach ($categories as $category)
                        @php
                          $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $category->category_name }}</td>

                            <td style="margin:0 auto;text-align:center;display:flex;">

                                <button data-toggle="modal" data-target="#editModeratorModal" class="btn btn-success editCatModal" data-id="{{ $category->id }}">
                                    <i class="fa fa-edit"> </i> </button>
                                <form action="{!! route('admin.category.delete', $category->id) !!}" method="POST">
                                  {{ csrf_field() }}
                                  <button class="btn btn-danger"><i class="fa fa-trash"> </i> </button>
                                </form></td>
                        </tr>
                          @endforeach
                    </tbody>
                </table>


        </div>


    </div>
</div>
<!-- /page content -->


@endsection

@push('category_script')
  <script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $(document).ready(function() {
  $('.editCatModal').on('click', function() {

      var id = $(this).data('id');
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "{!! route('admin.category.edit.json') !!}",
      data: {
          id: id
      },
      success: function(response) {
        $('#eid').val(response.id);
          $('#editCategory').val(response.category_name);
      },
      error: function(error) {
          console.log(error);
      }
    });
  });
   });
  </script>

@endpush
