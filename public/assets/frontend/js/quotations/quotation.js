$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.openQuotationModal', function () {
        // e.preventDefault();
        var modal = $("#userQuotationModal");

        var vendorID = $(this).attr('data-vendorID');
        var productID = $(this).attr('data-productID');

        var url = $(this).attr('data-url');

        modal.find('.modal-title').text("Send Quotation")
        modal.find('input[name=vendor_id]').val(vendorID)
        modal.find('input[name=product_id]').val(productID)
        modal.find('input[name=message]').val('')

        modal.find('form').attr('action', url);
        $(modal).modal({
            backdrop: 'static'
        });
        $(modal).modal('show');
    })

        /// SUbmit Quotation....
        $(document).on('submit', '#userQuotationForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#userQuotationForm')[0]);
            let btn = $('.btn-quotation');
            let btnVal = $('.btn-quotation').text();
            let url = $("#userQuotationForm").attr('action');
            let creating = 'Processing...';

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
                    $("#userQuotationForm")[0].reset();
                    if (resp.status === 200) {
                        $("#userQuotationModal").modal('hide');
                        swalWithBootstrapButtons.fire(
                            'Done!',
                            resp.message,
                            'success'
                        )

                    }
                }, error: function (xhr, textStatus, errorThrown) {
                    // console.log(xhr.responseText)
                    let msgType = 'error';
                    let msgClass = 'bx bx-error';
                    let position = 'top right';
                    let message = xhr.responseText;
                    let sound = 'sound5';
                    showMsg(msgType, position, msgClass, message, sound);
                    removeContent(btn, btnVal);
                }
            });
        });

});
