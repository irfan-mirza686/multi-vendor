<header id="header">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-6 col-left">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item"><a href="{{route('shop')}}" class="nav-link">Shop</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-right">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#locationModal"
                                class="nav-link btn-modal-location">
                                <i class="icon-map-marker"></i>Location</a>
                        </li>
                        <!-- <li class="nav-item dropdown language-dropdown currency-dropdown">
                                <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    INR&nbsp;(PKR)<i class="icon-arrow-down"></i>
                                </a>
                                <form action="http://secretattire.in/set-selected-currency-post" method="post"
                                    accept-charset="utf-8">
                                    <input type="hidden" name="csrf_mds_token"
                                        value="aec007681ad8cf0ea566cc91fc5fe7dc" />
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button type="submit" name="currency" value="USD">USD&nbsp;($)</button>
                                        </li>
                                        <li>
                                            <button type="submit" name="currency" value="CAD">CAD&nbsp;($)</button>
                                        </li>
                                        <li>
                                            <button type="submit" name="currency" value="AED">AED&nbsp;(د.إ)</button>
                                        </li>
                                        <li>
                                            <button type="submit" name="currency" value="INR">INR&nbsp;(PKR)</button>
                                        </li>
                                        <li>
                                            <button type="submit" name="currency" value="MYR">MYR&nbsp;(RM)</button>
                                        </li>
                                    </ul>
                                </form>
                            </li> -->
                        @if(Auth::user())

                        <li class="nav-item dropdown profile-dropdown p-r-0">
                            <a class="nav-link dropdown-toggle a-profile" data-toggle="dropdown"
                                href="javascript:void(0)" aria-expanded="false">
                                <img src="https://secretattire.in/uploads/profile/avatar_64dd09a9275a45-94884843-18861049.jpg"
                                    alt="adminss">
                                {{Auth::user()->name}}<i class="icon-arrow-down"></i>
                            </a>
                            <ul class="dropdown-menu" style="">
                                <li>
                                    <a href="{{route('user.profile')}}">
                                        <i class="icon-user"></i>
                                        Profile</a>
                                </li>
                                <!-- <li>
                                    <a href="https://secretattire.in/orders">
                                        <i class="icon-shopping-basket"></i>
                                        Orders</a>
                                </li> -->
                                <li>
                                    <a href="{{route('user.quotations')}}">
                                        <i class="icon-price-tag-o"></i>
                                        Quotations Requests</a>
                                </li>
                                <!-- <li>
                                    <a href="https://secretattire.in/downloads">
                                        <i class="icon-download"></i>
                                        Downloads</a>
                                </li> -->
                                <li>
                                    <a href="#">
                                        <i class="icon-mail"></i>
                                        Messages&nbsp;</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-settings"></i>
                                        Settings</a>
                                </li>
                                <li>
                                    <a href="#" class="logout">
                                        <i class="icon-logout"></i>
                                        Logout</a>
                                </li>
                            </ul>
                        </li>
                        @else

                        <li class="nav-item">

                            <a href="javascript:void(0)" data-toggle="modal" data-target="#loginTypeModal"
                                class="nav-link">Login</a>
                            <span class="auth-sep">/</span>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#registerTypeModal"
                                class="nav-link" id="registrType">Register</a>

                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main-menu">
        <div class="container-fluid">
            <div class="row">
                <div class="nav-top">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-8 nav-top-left">
                                <div class="row-align-items-center">
                                    <div class="logo">
                                        <a href="{{route('home')}}"><img
                                                src="@if ($general->logo) {{ getFile('logo', $general->logo) }} @else {{asset('assets/uploads/no-image.png')}} @endif"
                                                alt="logo"></a>
                                    </div>
                                    <div class="top-search-bar top-search-bar-single-vendor">
                                        <form action="#" id="form_validate_search"
                                            class="form_search_main" method="get" accept-charset="utf-8">
                                            <input type="text" name="search" maxlength="300" pattern=".*\S+.*"
                                                id="input_search" class="form-control input-search" value=""
                                                placeholder="Search Products" required autocomplete="off">
                                            <input type="hidden" class="search_type_input" name="search_type"
                                                value="product">
                                            <button class="btn btn-default btn-search"><i
                                                    class="icon-search"></i></button>
                                            <div id="response_search_results" class="search-results-ajax"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 nav-top-right">
                                <ul class="nav align-items-center">
                                    <li class="nav-item nav-item-cart li-main-nav-right">
                                        <a href="#">
                                            <i class="icon-cart"></i><span>Cart</span>
                                        </a>
                                    </li>
                                    <li class="nav-item li-main-nav-right">
                                        <a href="{{route('wishlist')}}">
                                            <i class="icon-heart-o"></i>Wishlist </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @include('frontend.layouts.navbar')
            </div>
        </div>
    </div>
    <div class="mobile-nav-container">
        <div class="nav-mobile-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="nav-mobile-header-container">
                        <div class="menu-icon">
                            <a href="javascript:void(0)" class="btn-open-mobile-nav"><i class="icon-menu"></i></a>
                        </div>
                        <div class="mobile-logo">
                            <a href="#"><img
                                    src="@if ($general->logo) {{ getFile('logo', $general->logo) }} @else {{asset('assets/uploads/no-image.png')}} @endif"
                                    alt="logo" class="logo"></a>
                        </div>
                        <div class="mobile-search">
                            <a class="search-icon"><i class="icon-search"></i></a>
                        </div>
                        <div class="mobile-cart">
                            <a href="#"><i class="icon-cart"></i>
                                <span class="notification">0</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="top-search-bar mobile-search-form  top-search-bar-single-vendor">
                        <form action="#" id="form_validate_search_mobile" method="get"
                            accept-charset="utf-8">
                            <input type="hidden" id="search_type_input_mobile" class="search_type_input"
                                name="search_type" value="product">
                            <input type="text" id="input_search_mobile" name="search" maxlength="300" pattern=".*\S+.*"
                                id="input_search" class="form-control input-search" value=""
                                placeholder="Search Products" required autocomplete="off">
                            <button class="btn btn-default btn-search btn-search-single-vendor-mobile"><i
                                    class="icon-search"></i></button>
                            <div id="response_search_results_mobile" class="search-results-ajax"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
