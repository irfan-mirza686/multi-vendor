<?php
$adminSettings = \App\Models\Admin::select('id','settings')->where('id',auth()->guard('admin')->user()->id)->first();

$themeMode = $adminSettings->settings['themeMode'];
$headerColor = $adminSettings->settings['headerColor'];
$sidebarColor = $adminSettings->settings['sidebarColor'];

$general = \App\Models\GeneralSetting::first();
?>
<!doctype html>
<html lang="en" class="{{$themeMode}} {{$headerColor}} {{$sidebarColor}}">
<!-- Here I'll add theme classes ----->

<head>
    <!-- Required meta tags -->
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--favicon-->
    <link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png" />
    <!--plugins-->
    @yield("style")
    <link href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/scrollbar.css')}}" rel="stylesheet">

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/header-colors.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/plugins/notifications/css/lobibox.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />

    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" />

    <title>{{@$pageTitle}}</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--start header -->
        @include("admin.layouts.header")
        <!--end header -->
        <!--navigation-->
        @include("admin.layouts.sidebar")
        <!--end navigation-->
        <!--start page wrapper -->
        @yield("content")
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        @include("admin.layouts.footer")
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    @include("admin.layouts.switcher")
    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->

    <script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/plugins/notifications/js/lobibox.min.js')}}"></script>
    <script src="{{asset('assets/plugins/notifications/js/notifications.min.js')}}"></script>
    <script src="{{asset('assets/plugins/notifications/js/notification-custom-script.js')}}"></script>
    <!--app JS-->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/admin_scripts.js')}}"></script>
    <script src="{{asset('assets/js/send_email_notification.js')}}"></script>
    <script src="{{asset('assets/js/send_notice.js')}}"></script>

    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    <script src="{{asset('assets/js/global.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                // buttons: [ 'copy', 'excel', 'pdf', 'print']
            });
            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").alert('close');
        }, 10000);
    </script>
    <script type="text/javascript">
        $(document).on('click', '.deleteRecord', function(e) {
            var id = $(this).attr('rel');
            // console.log(id);
            var deleteFunction = $(this).attr('rel1');
            swal({
                    title: "Are you sure?",
                    text: "You'll not be able to recover this record again!",
                    type: "warning",
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonColor: 'red',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Yes, Delete it!"
                },
                function() {
                    window.location.href = deleteFunction + "/" + id;
                });
        });
    </script>
    <script>
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>

    @stack('custom-script')
</body>

</html>
