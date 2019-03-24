@extends('admin.include.header')

@section('page-title')
Client Posts
@endsection



@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <h3>User Posts : </h3>


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
                    <th>Title</th>

                    <th>Category</th>

                    <th>Sub Category</th>
                    <th>Division</th>
                    <th>Featured</th>
                    <th>Actions</th>
                </tr>
            </thead>


            <tbody>


                @php
                $i = 0;
                @endphp
                @foreach ($posts as $post)

                @php
                $i++;
                @endphp
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category_name }}</td>
                    <td>{{ $post->subcategory_name }}</td>
                    <td>{{ $post->division_name }}</td>
                    <td>{{ $post->featured }} <br> <select name="toggle_featured" id="" class="change-featured">
                            <option>0</option>
                            <option>1</option>
                        </select></td>
                    <td>
                      <button class="btn btn-success"><i class="fa fa-eye"> </i> </button>
                        <form action="{!! route('admin.client.post.delete', $post->id) !!}" method="POST"> {{ csrf_field() }} <button class="btn btn-danger"><i class="fa fa-trash"> </i> </button>
                    </td>
                    </form>
                    </td>
                </tr>

                @endforeach



            </tbody>
        </table>


    </div>
</div>
<!-- /page content -->


@endsection


@push('userpost_script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('.').on('click', function() {

            var id = $(this).data('');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "",
                data: {
                    id: id
                },
                success: function(response) {

                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>

@endpush
