$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showQuotationsList();

    $(document).on('click','.importProduct',function(e){
        // e.preventDefault();
        var VendorID = $(this).attr('data-VendorID');
        var QuotationID = $(this).attr('data-QuotationID');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: 'Import Product!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes do it!',
            cancelButtonText: 'No cancel it!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'POST',
                    url: '/vendor/import/quotation/product',
                    data:{VendorID:VendorID,QuotationID:QuotationID},
                    success: function (resp) {
                        console.log(resp)
                        if (resp.status == 200) {
                            swalWithBootstrapButtons.fire(
                                'Data',
                                resp.message,
                                'success'
                            )
                        }

                        if (resp.status==422) {
                            Lobibox.notify('error', {
                                pauseDelayOnHover: true,
                                icon: 'bx bx-x-circle',
                                size: 'mini',
                                continueDelayOnInactiveTab: false,
                                position: 'bottom left',
                                msg: resp.message
                            });
                        }
                    },
                    error: function (resp) {
                        Lobibox.notify('error', {
                            pauseDelayOnHover: true,
                            icon: 'bx bx-x-circle',
                            size: 'mini',
                            continueDelayOnInactiveTab: false,
                            position: 'bottom left',
                            msg: resp.statusText
                        });
                    }
                }); // End Ajax
            
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Product is not Imported',
                    'warning'
                )
            }
        })
    
    }); /// END Function here....

    function showQuotationsList() {
        
        var table = $('.vendorToWholeSaler-quotations-table').DataTable({

            "ajax": {
                "url": '/vendor/quotations/to_wholesaler/list',
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