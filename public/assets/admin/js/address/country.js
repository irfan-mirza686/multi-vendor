$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showCountriesList();

    $(document).on('click', '.add', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        const modal = $('#countryModal');
        $('#countryModal').modal({
            backdrop: 'static'
        });
        modal.find('.modal-title').text("Create Country")
        modal.find('input[name=name]').val('')
        modal.find('select[name=status]').val('')

        modal.find('form').attr('action', url)
        modal.find('.saveCountryBtn').text('Create Country');

        $("#countryModal").modal('show');
    });

    $(document).on('click', '.edit', function (e) {
        e.preventDefault();
        let url = $(this).attr("href");
        const modal = $('#countryModal');
        $('#countryModal').modal({
            backdrop: 'static'
        });

        let name = $(this).attr('data-name');
        let status = $(this).attr('data-status');


        // let url = "/admin/country/update/" + countryID;

        modal.find('.modal-title').text("Update Country")
        modal.find('input[name=name]').val(name)
        modal.find('select[name=status]').val(status)

        modal.find('form').attr('action', url);
        modal.find('.saveCountryBtn').text('Update Country');
        modal.modal('show');
    })

    $(document).on('submit', '#addCountryForm', function (e) {
        e.preventDefault();

        let formData = new FormData($('#addCountryForm')[0]);
        let btn = $('.saveCountryBtn');
        let btnVal = $('.saveCountryBtn').text();
        let url = $("#addCountryForm").attr('action');
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
                $("#countryModal").modal('hide');
                removeContent(btn, btnVal);
                if (resp.status === 200) {
                    var msgType = 'success';
                    var position = 'top right';
                    var msgClass = 'bx bx-check-circle';
                    var message = resp.message;
                    var sound = 'sound6';
                    showMsg(msgType, position,  msgClass, message, sound);
                    showCountriesList();
                } else if (resp.status === 400) {
                    let msgType = 'warning';
                    let msgClass = 'bx bx-error';
                    $.each(resp.errors, function (key, value) {
                        var msgType = 'warning';
                        var position = 'bottom right';
                        var msgClass = 'bx bx-check-circle';
                        var message = value;
                        var sound = 'sound5';
                        showMsg(msgType, position, msgClass, message, sound);
                    });
                } else if (resp.status === 422) {
                    var msgType = 'error';
                    var position = 'top right';
                    var msgClass = 'bx bx-check-circle';
                    let message = resp.message;
                    var sound = 'sound5';
                    showMsg(msgType, position, msgClass, message, sound);
                }
            }, error: function (resp) {

                var msgType = 'error';
                var position = 'bottom left';
                var msgClass = 'bx bx-error';
                var message = resp.statusText;
                var sound = 'sound2';
                showMsg(msgType, position, msgClass, message, sound);

            }
        });
    });


    function showCountriesList() {

        var table = $('.countries-table').DataTable({

            "ajax": {
                "url": '/admin/countries/list',
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
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    }  /// END FUNCTION....


    /////////// Delete Country \\\\\\\\\\\\\\\\\\\\\\\
    $(document).on('click', '.del', function (e) {
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
                            showCountriesList();
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




});
