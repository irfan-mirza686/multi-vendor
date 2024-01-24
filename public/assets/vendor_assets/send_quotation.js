$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.openQuotationModal', function () {
        // e.preventDefault();
        $("#form_quotation_product")[0].reset();
        var wholeSalerID = $(this).attr('data-WholeSalerID');
        var ProductID = $(this).attr('data-ProductID');
        $("#wholesaler_id").val(wholeSalerID);
        $("#productID").val(ProductID);
        $('#ProductQuotationModal').modal({
            backdrop: 'static'
        });
        $("#ProductQuotationModal").modal('show');
    })

    // Send Quotation to WholeSaler...

    $(document).on('submit', '#form_quotation_product', function (e) {
        e.preventDefault();

        let formData = new FormData($('#form_quotation_product')[0]);

        let btn = $('.btn-custom');
        let btnVal = $('.btn-custom').text();
        let url = $("#form_quotation_product").attr('action');
        let creating = 'Processing...';

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {

                addContent(btn, creating);
            }, success: function (resp) {

                removeContent(btn, btnVal);
                if (resp.status === 200) {
                    $("#form_quotation_product")[0].reset();
                    $("#ProductQuotationModal").modal('hide');
                    Lobibox.notify('default', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'center top',
                        size: 'mini',
                        msg: resp.message
                    });
                } else if (resp.status === 400) {
                    let msgType = 'warning';
                    let msgClass = 'bx bx-error';
                    $.each(resp.errors, function (key, value) {
                        showMsg(msgType, msgClass, value);
                    });
                } else if (resp.status === 422) {
                    let msgType = 'warning';
                    let msgClass = 'bx bx-error';
                    let message = resp.message;
                    showMsg(msgType, msgClass, message);
                }
            }, error: function (resp) {

                removeContent(btn, btnVal);
                Lobibox.notify('error', {
                    pauseDelayOnHover: true,
                    icon: 'bx bx-x-circle',
                    size: 'mini',
                    continueDelayOnInactiveTab: false,
                    position: 'bottom left',
                    msg: resp.statusText
                });
            }
        });

    });


    function addContent(btn, creating) {

        $('#spinner').addClass('spinner-border spinner-border-sm');
        $(btn).text(creating);
    }
    function removeContent(btn, btnVal) {
        $("#spinner").removeClass("spinner-border spinner-border-sm");
        $(btn).text('');
        $(btn).text(btnVal);
    }

    function showMsg(msgType, msgClass, message) {
        Lobibox.notify(msgType, {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: msgClass,
            msg: message
        });
    }

});
