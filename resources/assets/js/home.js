$(function() {
    var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: link,
        columns: [
            { data: 'id', name: 'id' },
            // { data: 'photo', name: 'photo' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action' },
        ]
    });
    $(document).on('click','btn-danger',function()){
        var user_id= $(this).attr('userId');
        $.ajax({
            type: 'delete',
            url: 'users/' + user_id,
            success:function(response){
                table.ajax.reload();
            }
        })
    }
});