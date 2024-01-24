$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showQuotationsList();


    function showQuotationsList() {

        var table = $('.ToWholesaler-quotations-table').DataTable({

            "ajax": {
                "url": '/admin/wholesaler/quotations/list',
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
                { data: 'thumbnail', name: 'thumbnail' },
                { data: 'to_wholesaler', name: 'to_wholesaler' },
                { data: 'description', name: 'description'},
                { data: 'start_date', name: 'date' },
                { data: 'from_vendor', name: 'from_vendor' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    }  /// END FUNCTION....
});
