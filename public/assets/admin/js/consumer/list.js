$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showConsumersList();

    $(document).on('click', '.updateStatus', function (e) {
        e.preventDefault();
        var UserID = $(this).attr('data-UserID');
        var status = $(this).attr('data-Status');

        $.ajax({
            type: 'POST',
            url: '/admin/update/consumer/status',
            data: { UserID: UserID, status, status },
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
                    showConsumersList();
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


    function showConsumersList() {

        var table = $('.consumersList-table').DataTable({

            "ajax": {
                "url": '/admin/Member/consumer/list',
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
                { data: 'email', name: 'email' },
                { data: 'mobile', name: 'mobile' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    }  /// END FUNCTION....
});