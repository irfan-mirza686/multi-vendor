$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showQuotationsList();

    $(document).on('click', '.updateStatus', function (e) {
        e.preventDefault();
        var QuotationID = $(this).attr('data-QuotationID');
        var status = $(this).attr('data-Status');

        $.ajax({
            type: 'POST',
            url: '/wholesaler/approved/quotation',
            data: { QuotationID: QuotationID, status, status },
            success: function (resp) {
                if (resp.status == 200) {
                    Lobibox.notify('success', {
                        pauseDelayOnHover: true,
                        size: 'mini',
                        icon: 'bx bx-check-circle',
                        continueDelayOnInactiveTab: false,
                        position: 'bottom right',
                        msg: resp.message
                    });
                    showQuotationsList();
                }
            }, error: function () {
                Lobibox.notify('error', {
                    pauseDelayOnHover: true,
                    icon: 'bx bx-x-circle',
                    size: 'mini',
                    continueDelayOnInactiveTab: false,
                    position: 'bottom left',
                    msg: resp.statusText
                });
            }
        })
    })


    function showQuotationsList() {
        
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