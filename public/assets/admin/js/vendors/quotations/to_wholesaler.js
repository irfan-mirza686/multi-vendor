$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showProductsList();


    function showProductsList() {
        
        var table = $('.wholesaler-quotations-table').DataTable({

            "ajax": {
                "url": '/wholesaler/quotations/list',
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
                { data: 'product_id', name: 'product' },
                { data: 'description', name: 'description'},
                { data: 'start_date', name: 'date' },
                { data: 'vendor_id', name: 'vendor' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    }  /// END FUNCTION....
});