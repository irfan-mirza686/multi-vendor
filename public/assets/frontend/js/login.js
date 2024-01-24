$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('change', '#loginType', function (e) {
        let loginType = $(this).val();
        if (loginType == 'wholesaler') {
            $("#cunsumerLoginModal").modal('hide');
            $("#vendorLoginModal").modal('hide');
            $("#loginTypeModal").modal('hide');

            let modal = $("#wholesallerLoginModal");
            modal.find('.title').text("Login As WholeSaler");
            $(modal).modal('show');
        } else if (loginType == 'vendor') {
            $("#cunsumerLoginModal").modal('hide');
            $("#wholesallerLoginModal").modal('hide');
            $("#loginTypeModal").modal('hide');

            let modal = $("#vendorLoginModal");
            modal.find('.title').text("Login As Vendor");
            $(modal).modal('show');
        } else if (loginType == 'consumer') {
            $("#wholesallerLoginModal").modal('hide');
            $("#vendorLoginModal").modal('hide');
            $("#loginTypeModal").modal('hide');

            let modal = $("#cunsumerLoginModal");
            modal.find('.title').text("Login As Consumer");
            $(modal).modal('show');
        }
    })

    // Login Member in Ajax...
    $(document).on('submit', '#addMemaSessionForm', function (e) {
        e.preventDefault();

        let formData = new FormData($('#addMemaSessionForm')[0]);
        let btn = $('.saveMemaSessionBtn');
        let btnVal = $('.saveMemaSessionBtn').text();
        let url = $("#addMemaSessionForm").attr('action');
        let creating = window.buttons.buttons.processing;

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {

                addContent(btn, creating);
            }, success: function (resp) {
                $("#brandModal").modal('hide');
                removeContent(btn, btnVal);
                if (resp.status === 200) {
                    $("#memaSessionModal").modal('hide');
                    swalWithBootstrapButtons.fire(
                        window.notifications.alert.done,
                        resp.message,
                        'success'
                    )
                    loadMemaSessions();
                } else if (resp.status === 400) {

                    $.each(resp.errors, function (key, value) {
                        $.notify(value, { globalPosition: 'top right', className: 'error' });
                    });
                } else if (resp.status === 422) {

                }
            }, error: function (resp) {
                removeContent(btn, btnVal);
            }
        });
    });


});
