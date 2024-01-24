$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showProductsList();


    function showProductsList() {
        var baseURL = $("#baseURL").val();

        var table = $('.wholesaler-products-table').DataTable({

            "ajax": {
                "url": '/admin/wholesaler/products/list',
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
                { data: 'wholesaler', name: 'wholesaler'},
                { data: 'name', name: 'name' },
                { data: 'category_id', name: 'category' },
                { data: 'unit_id', name: 'unit' },
                { data: 'item_price', name: 'price' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    }  /// END FUNCTION....


    $(document).on('click','.viewWholeSalerProduct',function(e){
        e.preventDefault();
        var productID = $(this).attr('data-ProductID');
        var url = $(this).attr('data-URL');
        let modal = $("#wholeSalerProductModal");

        $(modal).modal({
            backdrop: 'static'
        });

        modal.modal('show')
    })
});
