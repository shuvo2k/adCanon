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
        Add Sub Categories
    </button>
    <br><br><br>
    <!-- Add moderator Modal -->
    <div class="modal fade bd-example-modal-lg" id="addModeratorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="editModalTitle"><b>Add Sub Category</b></h4>


                </div>
                <div class="modal-body">
                    <form action="{!! route('admin.blog.subcategory.add') !!}" method="POST">
                      {{ csrf_field() }}

                        <div class="form-group">
                    <label for="division">Category :</label>
                    <select class="form-control" id="division" name="category">
                        <option selected disabled></option>
                      @foreach ($cats as $category)
                        <option>{{ $category->category_name }}</option>

                      @endforeach


                    </select>
                  </div>
                        <div class="form-group">
                            <label for="name" class="col-form-label">Sub Category Name :</label>
                            <input type="text" name="subcategory" class="form-control" id="name">
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

                    <h4 class="modal-title" id="exampleModalCenterTitle"><b>Edit Sub Category</b></h4>


                </div>
                <div class="modal-body">
                    <form action="{!! route('admin.blog.subcategory.edit') !!}" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" id="eid" value="">

                        <div class="form-group">
                    <label for="edivision">Category :</label>
                    <select class="form-control" id="edivision" readonly>
                        <option id="catname" selected></option>


                    </select>
                  </div>
                        <div class="form-group">
                            <label for="escname" class="col-form-label">Sub Category Name :</label>
                            <input type="text" name="subcategory" class="form-control" id="escname">
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
                            <th>Sub Category Name</th>
                          <th>Actions</th>
                        </tr>
                    </thead>


                    <tbody>
                      @php
                        $i = 0;
                      @endphp
                      @foreach ($subcat as $scategory)
                        @php
                          $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                              <td>{{ $scategory->category_name }}</td>
                            <td>{{ $scategory->subcategory_name }}</td>

                            <td style="margin:0 auto;text-align:center;display:flex;">

                                <button data-toggle="modal" data-id="{{ $scategory->id }}" data-target="#editModeratorModal" class="btn btn-success escmodal">
                                    <i class="fa fa-edit"> </i> </button>
                                <form action="{!! route('admin.blog.subcategory.delete', $scategory->id) !!}" method="POST">
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

@push('subcategory_script')
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
      url: "{!! route('admin.blog.subcategory.edit.json') !!}",
      data: {
          id: id
      },
      success: function(response) {
        $('#eid').val(response.id);
          $('#catname').text(response.category_name);
          $('#escname').val(response.subcategory_name);
          console.log(response);
      },
      error: function(error) {
          console.log(error);
      }
    });
  });
   });
  </script>

@endpush
