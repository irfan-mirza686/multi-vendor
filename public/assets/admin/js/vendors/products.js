$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showProductsList();


    function showProductsList() {
        var baseURL = $("#baseURL").val();

        var table = $('.vendor-products-table').DataTable({

            "ajax": {
                "url": '/admin/vendor/products/list',
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
                { data: 'vendor', name: 'vendor'},
                { data: 'name', name: 'name' },
                { data: 'category_id', name: 'category' },
                { data: 'unit_id', name: 'unit' },
                { data: 'item_price', name: 'item_price' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    }  /// END FUNCTION....
});
