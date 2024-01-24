$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showProductsList();


    function showProductsList() {
        var baseURL = $("#baseURL").val();
        
        var table = $('.products-table').DataTable({

            "ajax": {
                "url": '/wholesaler/products/list',
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
                { data: 'category_id', name: 'category' },
                { data: 'unit_id', name: 'unit' },
                { data: 'item_price', name: 'price' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    }  /// END FUNCTION....

    /////////// Delete Own Product \\\\\\\\\\\\\\\\\\\\\\\
    $(document).on('click', '.deleteProduct', function (e) {
        e.preventDefault();
        let url = $(this).attr('data-URL');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: 'Delete Record!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes do it!',
            cancelButtonText: 'No cancel it!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'delete',
                    url: url,
                    beforeSend: function () {
                        $("body").addClass("loading");
                    },

                    success: function (response) {
                        $("body").removeClass("loading");
                        if (response.status == 200) {
                            showProductsList()
                            swalWithBootstrapButtons.fire(
                                'Data',
                                response.message,
                                'success'
                            )
                        } else if (response.status == 422) {
                            swalWithBootstrapButtons.fire(
                                'Data',
                                response.message,
                                'error'
                            )
                        }
                    },
                    error: function (response) {
                        $("body").removeClass("loading");
                        swalWithBootstrapButtons.fire(
                            'Data',
                            response.statusText,
                            'error'
                        )
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Data Safed',
                    'error'
                )
            }
        })

    });
});