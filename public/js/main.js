$(document).ready(function() {


    //data table initialize
    $('#data_table').DataTable();
    //call parsely
    $('#form1').parsley();
    $('#form2').parsley();

    /* =====================================Admin section js================================= */
    /* ------------admin stuff(admin/moderator)----------- */
    /* -----------category------------------- */


    /* -----------sub catgory--------------- */
    /* --------------location---------------- */

    /* =============================Blog section========================= */
    /* -----------category------------------- */
    /* -----------sub catgory--------------- */
    /* ---------------tags------------------ */
    /* ------------posts-------------------- */
});

/*


//edit clients
$(".editModal").on('click', function(e) {
    e.preventDefault();
    $('#clientEditModal').modal('show');
    var ids = $(this).data('id');
    console.log(ids);
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "{!! route('admin.client.edit.json') !!}",
        data: {
            id: ids
        },
        success: function(response) {
            //console.log(response);
            $('#baseid').val(response.id);
            $('#clienteditid').val(response.client_id);
            $('#editgroupname').text(response.group_name);
            $('#editclientName').val(response.name);

            $('#editpassword').val(response.password);
            $('.editimage').attr('src', '/' + response.image);

        },
        error: function(error) {
            console.log(error);
        }

    });
    //ajax edit get end


    //edit post
    $("#editClient").on('submit', function(e) {
        e.preventDefault();
        //ajax post
        $.ajax({
            url: "{!! route('admin.client.edit') !!}",
            type: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.log('error');
            }
        });
    });

});

});

*/
