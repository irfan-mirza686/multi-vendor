$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click','#addProductReview',function(e){
        let wholeSalerProductID = $("#wholeSalerProductID").val();
        let vendorProductID = $("#vendorProductID").val();

        let modal = $("#rateProductModal");

        modal.find('textarea[name=review]').val('');
        modal.find('input[name=wholeSalerProductID]').val(wholeSalerProductID);
        modal.find('input[name=vendorProductID]').val(vendorProductID);
        modal.modal('show');
    })

    $(document).on('click','.label-star',function(e){
        let rating = $(this).attr('data-star');
        let modal = $("#rateProductModal");
        modal.find('input[name=rating]').val(rating);

    })

    $(document).on('submit', '#productReviewForm', function (e) {
        e.preventDefault();

        let formData = new FormData($('#productReviewForm')[0]);
        let btn = $('.saveReviewBtn');
        let btnVal = $('.saveReviewBtn').text();
        let url = $("#productReviewForm").attr('action');
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
                $("#rateProductModal").modal('hide');
                removeContent(btn, btnVal);
                if (resp.status === 200) {
                    let msgType = 'success';
                    let msgClass = 'bx bx-check-circle';
                    let message = resp.message;
                    showMsg(msgType, msgClass, message);
                    showCityList();
                }  else if (resp.status === 422) {
                    let msgType = 'error';
                    let msgClass = 'bx bx-error';
                    let message = resp.message;
                    showMsg(msgType, msgClass, message);
                }
            }, error: function (resp) {
                removeContent(btn, btnVal);
                let msgType = 'error';
                let msgClass = 'bx bx-error';
                let message = resp.statusText;
                showMsg(msgType, msgClass, message);


            }
        });
    });


    ///############## Display Messages ################/////////

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
