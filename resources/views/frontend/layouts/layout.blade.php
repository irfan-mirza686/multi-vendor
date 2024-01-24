<?php
$general = \App\Models\GeneralSetting::first();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$pageTitle}}</title>
    <meta name="description"
        content="Market Price Book " />
    <meta name="keywords" content="Market Price Book" />
    <meta name="author" content="Market Price Book" />
    <link rel="shortcut icon" type="image/png" href="{{getFile('/','idea.png')}}" />
    <meta property="og:locale" content="en-US" />
    <meta property="og:site_name" content="Market Price Book" />
    <!-- <meta property="og:image" content="http://secretattire.in/uploads/logo/logo_64034221d49f1.jpg" /> -->

    <!-- <meta property="og:image:height" content="60" /> -->
    <meta property="og:title" content="@yield('meta-title')" />
    <meta property="og:description" content="@yield('meta-description')" />
    <meta property="og:image" content="@yield('meta-image')" />
    <meta property="og:image:width" content="160" />
    <meta property="og:type" content="website" />
    <!-- <meta property="og:title" content="Home - Women Shopping Store" /> -->
   <!--  <meta property="og:description"
        content="MarketPriceBook  Deals in wide variety of Women Wester & Ethnic wear. We have wide variety of Stitched sarees / 1MinSaree." /> -->
    <meta property="og:url" content="javascript:void(0);" />
    <meta property="fb:app_id" content="" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@MarketPriceBook" />
    <meta name="twitter:title" content="Home - Women Shopping Store" />
    <meta name="twitter:description"
        content="MarketPriceBook  Deals in wide variety of Women Wester & Ethnic wear. We have wide variety of Stitched sarees / 1MinSaree." />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/main.css')}}">
    <link rel="canonical" href="javascript:void(0);" />
    <link rel="alternate" href="javascript:void(0);" hreflang="en-US" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/mds-icons.min.css')}}" />
    <link href="{{asset('assets/frontend/css/fonts.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css"
        integrity="sha512-3PN6gfRNZEX4YFyz+sIyTF6pGlQiryJu9NlGhu9LrLMQ7eDjNgudQoFDK3WSNAayeIKc6B8WXXpo4a7HqxjKwg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style-1.8.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins-1.8.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/scrollbar.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/frontend/font-icons/css/mds-icons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/notifications/css/lobibox.min.css')}}" rel="stylesheet" />
    <script>
        var mds_config = {
            base_url: "http://secretattire.in/",
            lang_base_url: "http://secretattire.in/",
            sys_lang_id: "1",
            thousands_separator: ".",
            csfr_token_name: "csrf_mds_token",
            csfr_cookie_name: "csrf_mds_token",
            txt_all: "All",
            txt_no_results_found: "No Results Found",
            sweetalert_ok: "OK",
            sweetalert_cancel: "Cancel",
            msg_accept_terms: "You have to accept the terms!",
            cart_route: "cart",
            slider_fade_effect: "0",
            is_recaptcha_enabled: "false",
            rtl: false
        };
        if (mds_config.rtl == 1) {
            mds_config.rtl = true;
        }
    </script> <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    @include('frontend.layouts.header')

    <!-- Login Modal -->
    @include('frontend.layouts.includes.register_type_modal')
    @include('frontend.layouts.includes.login_type')
    @include('frontend.layouts.includes.login_consumer')
    @include('frontend.layouts.includes.login_vendor')
    @include('frontend.layouts.includes.login_wholesaler')
    @include('frontend.layouts.includes.login_modal')


    @include('frontend.layouts.includes.location_modal')

    <div id="menu-overlay"></div>
    @if(isset($page_name) && $page_name=='home_page')
    @include('frontend.layouts.home_slider')
    @endif
    <!-- Wrapper -->
    <div id="wrapper" class="index-wrapper">
        <div class="container">

            @yield('content')
        </div>
    </div>
    <!-- Wrapper End-->

    @include('frontend.layouts.footer')

    <!-- Scroll Up Link -->
    <a href="javascript:void(0)" class="scrollup"><i class="icon-arrow-up"></i></a>
    <script src="{{asset('assets/frontend/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/js/all.min.js"></script>

    <script src="{{asset('assets/frontend/js/plugins-1.8.js')}}"></script>
    <script src="{{asset('assets/frontend/js/script-1.8.min.js')}}"></script>
    <!-- <script src="{{asset('assets/frontend/js/script_1.8.js')}}"></script> -->
    <script src="{{asset('assets/frontend/js/login.js')}}"></script>
    <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    <script src="{{asset('assets/plugins/notifications/js/lobibox.min.js')}}"></script>
    <script src="{{asset('assets/js/global.js')}}"></script>
    @yield('custom-js')
    <script>
        $('<input>').attr({
            type: 'hidden',
            name: 'sys_lang_id',
            value: '1'
        }).appendTo('form[method="post"]');
    </script>

    <script>
    </script>
    <script>
        $("#registerBtn").on('click',function(){
            $("#loginModal").modal('hide');
            $("#registerTypeModal").modal('show');
        })
    </script>
    @if($general->twak_allow=='yes')

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/{{$general->twak_key}}/{{$general->twak_chatID}}';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    @endif
    <!--End of Tawk.to Script-->

</body>

</html>
