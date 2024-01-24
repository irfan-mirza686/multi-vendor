$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showSlidersList();

    $(document).on('click', '.add', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        let basePath = $("#basePath").val();
        let makeImage = basePath + '/assets/uploads/no-image.png';
        const modal = $('#sliderModal');
        $('#sliderModal').modal({
            backdrop: 'static'
        });
        modal.find('.modal-title').text("Create Slider")
        modal.find('input[name=title]').val('')
        modal.find('input[name=sub_title]').val('')
        modal.find('select[name=status]').val('')
        modal.find('img').attr('src', makeImage);
        modal.find('form').attr('action', url)
        modal.find('.saveSliderBtn').text('Create Slider');

        $("#sliderModal").modal('show');
    });

    $(document).on('click', '.edit', function (e) {
        e.preventDefault();

        let url = $(this).attr("href");
        const modal = $('#sliderModal');
        $(modal).modal({
            backdrop: 'static'
        });

        let title = $(this).attr('data-Title');
        let subTitle = $(this).attr('data-SubTitle');
        let image = $(this).attr('data-Image');
        let imgPath = $(this).attr('data-ImgPath');
        let status = $(this).attr('data-Status');
        let makeImage = imgPath + '/assets/uploads/sliders/'+ image;


        // let url = "/admin/country/update/" + countryID;

        modal.find('.modal-title').text("Update Slider")
        modal.find('input[name=title]').val(title)
        modal.find('input[name=sub_title]').val(subTitle)
        modal.find('img').attr('src', makeImage);
        modal.find('select[name=status]').val(status)

        modal.find('form').attr('action', url);
        modal.find('.saveSliderBtn').text('Update Slider');
        modal.modal('show');
    })

    $(document).on('submit', '#addSliderForm', function (e) {
        e.preventDefault();

        let formData = new FormData($('#addSliderForm')[0]);
        let btn = $('.saveSliderBtn');
        let btnVal = $('.saveSliderBtn').text();
        let url = $("#addSliderForm").attr('action');
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
                $("#sliderModal").modal('hide');
                removeContent(btn, btnVal);
                if (resp.status === 200) {
                    let msgType = 'success';
                    let msgClass = 'bx bx-check-circle';
                    let message = resp.message;
                    showMsg(msgType, msgClass, message);
                    showSlidersList();
                } else if (resp.status === 400) {
                    let msgType = 'warning';
                    let msgClass = 'bx bx-error';
                    $.each(resp.errors, function (key, value) {
                        showMsg(msgType, msgClass, value);
                    });
                } else if (resp.status === 422) {
                    let msgType = 'error';
                    let msgClass = 'bx bx-error';
                    let message = resp.message;
                    showMsg(msgType, msgClass, message);
                }
            }, error: function (resp) {
                let msgType = 'error';
                let msgClass = 'bx bx-error';
                let message = resp.statusText;
                showMsg(msgType, msgClass, message);
                removeContent(btn, btnVal);

            }
        });
    });


    function showSlidersList() {

        var table = $('.sliders-table').DataTable({

            "ajax": {
                "url": '/admin/sliders/list',
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
                { data: 'image', name: 'image' },
                { data: 'title', name: 'title' },
                { data: 'sub_title', name: 'sub_title' },
                { data: 'added_by', name: 'added_by' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    }  /// END FUNCTION....


    /////////// Delete Country \\\\\\\\\\\\\\\\\\\\\\\
    $(document).on('click','.del',function(e){
        e.preventDefault();
        let url = $(this).attr('href');
        console.log(url)

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

                    success: function (response) {
                        if (response.status == 200) {
                            showSlidersList();
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
                    error: function () {

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
