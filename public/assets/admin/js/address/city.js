$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showCityList();

    $(document).on('click', '.add', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        $(".appendStates").html('');
        let state = null;
        loadCountries(state);

        const modal = $('#cityModal');
        $('#cityModal').modal({
            backdrop: 'static'
        });
        modal.find('.modal-title').text("Create City")
        modal.find('input[name=name]').val('')
        modal.find('input[name=state_id]').val('')
        modal.find('select[name=status]').val('')
        
        modal.find('form').attr('action', url)
        modal.find('.saveCityBtn').text('Create City');
        
        $("#cityModal").modal('show');
    });

    function loadCountries(state) {
        console.log(state)
        $.ajax({
    
            type: 'GET',
            url: '/admin/load/states',
            beforeSend: function () {

                
            }, success: function (resp) {
                

                $(".appendStates").append('<option value="">-select-</option>');
                $.each(resp.states, function(key, value){
                    let selected = '';
                    if (value.id==state) {
                        selected = 'selected';
                    }
                    $(".appendStates").append('<option value="'+value.id+'" '+selected+'>'+value.name+'</option>'); 
                });
            }

        })
    }

    $(document).on('click', '.edit', function (e) {
        e.preventDefault();
        let url = $(this).attr("href");
        let state = $(this).attr('data-stateID');
        let name = $(this).attr('data-name');
        let status = $(this).attr('data-status');


        $(".appendStates").html('');
        loadCountries(state);

        const modal = $('#cityModal');
        $('#cityModal').modal({
            backdrop: 'static'
        });

        
      

        // let url = "/admin/country/update/" + countryID;
       
        modal.find('.modal-title').text("Update City")
        modal.find('input[name=name]').val(name)
        modal.find('select[name=status]').val(status)

        modal.find('form').attr('action', url);
        modal.find('.saveCityBtn').text('Update City');
        modal.modal('show');
    })

    $(document).on('submit', '#addCityForm', function (e) {
        e.preventDefault();

        let formData = new FormData($('#addCityForm')[0]);
        let btn = $('.saveCityBtn');
        let btnVal = $('.saveCityBtn').text();
        let url = $("#addCityForm").attr('action');
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
                $("#cityModal").modal('hide');
                removeContent(btn, btnVal);
                if (resp.status === 200) {
                    let msgType = 'success';
                    let msgClass = 'bx bx-check-circle';
                    let message = resp.message;
                    showMsg(msgType, msgClass, message);
                    showCityList();
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


    function showCityList() {

        var table = $('.cities-table').DataTable({

            "ajax": {
                "url": '/admin/cities/list',
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
                { data: 'state.name', name: 'state' },
                { data: 'name', name: 'name' },
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
                            showCityList();
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