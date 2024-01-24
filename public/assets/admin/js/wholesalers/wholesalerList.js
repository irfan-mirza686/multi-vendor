$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showWholeSalersList();

    $(document).on('click', '.updateStatus', function (e) {
        e.preventDefault();
        var wholeSalerID = $(this).attr('data-WholeSalerID');
        var status = $(this).attr('data-Status');

        $.ajax({
            type: 'POST',
            url: '/admin/update/wholesaler/status',
            data: { wholeSalerID: wholeSalerID, status, status },
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
                    showWholeSalersList();
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


    function showWholeSalersList() {
        var baseURL = $("#baseURL").val();

        var table = $('.wholesalersList-table').DataTable({

            "ajax": {
                "url": '/admin/Member/WholeSalers/list',
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
                { data: 'name', name: 'name' },
                { data: 'business_name', name: 'business_name' },
                { data: 'email', name: 'email' },
                { data: 'cnic', name: 'cnic' },
                { data: 'subscription', name: 'subscription' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    }  /// END FUNCTION....
});