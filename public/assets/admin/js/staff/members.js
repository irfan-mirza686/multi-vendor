$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showAdminsList();


    function showAdminsList() {
        var baseURL = $("#baseURL").val();
        
        var table = $('.admins-table').DataTable({

            "ajax": {
                "url": '/admin/staff/members/list',
                "dataType": "json",

                "type": "POST"
                // "contentType": "application/json; charset=utf-8"
            },
            processing: true,
            serverSide: true,
            stateSave: true,
            "bDestroy": true,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'image', name: 'image'},
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'group_id', name: 'group' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    }  /// END FUNCTION....
});