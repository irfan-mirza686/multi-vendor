<div class="section-slider">

    <div class="index-main-slider container container-boxed-slider">
        <div class="row">
            <div class="slider-container">
                <div id="main-slider" class="main-slider">
                    @foreach($sliders as $slider)
                    <div class="item lazyload" data-bg="{{ getFile('sliders', $slider->img) }}">
                        <a href="">
                            <div class="container">
                                <div class="row row-slider-caption align-items-center">
                                    <div class="col-12">
                                        <div class="caption">
                                            <h2 class="title" data-animation="fadeInUpBig" data-delay="0.1s"
                                                style="color: #000000">{{$slider->title}}</h2>
                                            <p class="description" data-animation="slideInUp" data-delay="0.5s"
                                                style="color: #000000">{{$slider->sub_title}}</p>
                                            <button class="btn btn-slider" data-animation="rotateInUpLeft"
                                                data-delay="0.9s"
                                                style="background-color: #ff0000;border-color: #ff0000;color: #ffffff">Buy
                                                Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
                <div id="main-slider-nav" class="main-slider-nav">
                    <button class="prev"><i class="icon-arrow-left"></i></button>
                    <button class="next"><i class="icon-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid index-mobile-slider">
        <div class="row">
            <div class="slider-container">
                <div id="main-mobile-slider" class="main-slider">
                    @foreach($sliders as $slider)
                    <div class="item lazyload" data-bg="{{ getFile('sliders', $slider->img) }}">
                        <a href="">
                            <div class="container">
                                <div class="row row-slider-caption align-items-center">
                                    <div class="col-12">
                                        <div class="caption">
                                            <h2 class="title" data-animation="fadeInUpBig" data-delay="0.1s"
                                                style="color: #000000">{{$slider->title}}</h2>
                                            <p class="description" data-animation="slideInUp" data-delay="0.5s"
                                                style="color: #000000">{{$slider->sub_title}} </p>
                                            <button class="btn btn-slider" data-animation="rotateInUpLeft"
                                                data-delay="0.9s"
                                                style="background-color: #ff0000;border-color: #ff0000;color: #ffffff">Buy
                                                Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
                <div id="main-mobile-slider-nav" class="main-slider-nav">
                    <button class="prev"><i class="icon-arrow-left"></i></button>
                    <button class="next"><i class="icon-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="overlay_bg" class="overlay-bg"></div>
<!--include mobile menu-->
<div id="navMobile" class="nav-mobile">
    <div class="nav-mobile-sc">
        <div class="nav-mobile-inner">
            <div class="row">
                <div class="col-sm-12 mobile-nav-buttons">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 nav-mobile-links">
                    <div id="navbar_mobile_back_button"></div>
                    <ul id="navbar_mobile_categories" class="navbar-nav">
                        <!-- <li class="nav-item">
                            <a href="javascrtip:void(0);" class="nav-link">Gowns</a>
                        </li> -->
                        @foreach($categories as $category)
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link" data-id="{{$category->id}}" data-parent-id="{{$category->parent_category}}">{{$category->name}} <i
                                    class="icon-arrow-right"></i></a>
                        </li>
                        @endforeach

                    </ul>
                    <ul id="navbar_mobile_links" class="navbar-nav">
                        <li class="nav-item">
                            <a href="javascrtip:void(0);" class="nav-link">
                                Wishlist </a>
                        </li>

                        <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item"><a href="javascrtip:void(0);" class="nav-link">Blog</a></li>

                        <li class="nav-item"><a href="javascript:void(0)" data-toggle="modal" data-target="#loginTypeModal"
                                class="nav-link close-menu-click">Login</a></li>
                        <li class="nav-item"><a href="javascript:void(0);"  data-toggle="modal" data-target="#registerTypeModal" class="nav-link close-menu-click">Register</a>
                        </li>

                        <!-- <li class="nav-item nav-item-messages">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#locationModal"
                                class="nav-link btn-modal-location close-menu-click">
                                <i class="icon-map-marker float-left"></i>&nbsp;Location </a>
                        </li> -->

                        <!-- <li class="nav-item dropdown language-dropdown currency-dropdown currency-dropdown-mobile">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                INR&nbsp;(PKR)<i class="icon-arrow-down"></i>
                            </a>
                            <form action="http://secretattire.in/set-selected-currency-post" method="post"
                                accept-charset="utf-8">
                                <input type="hidden" name="csrf_mds_token" value="aec007681ad8cf0ea566cc91fc5fe7dc" />
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

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-mobile-footer">

        <ul>
            <li><a href="javascript:void(0);" class="rss"><i class="icon-rss"></i></a></li>
        </ul>
    </div>
</div><input type="hidden" class="search_type_input" name="search_type" value="product">
