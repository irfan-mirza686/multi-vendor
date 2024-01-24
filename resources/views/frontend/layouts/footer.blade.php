<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-12 col-md-3 footer-widget">
                            <div class="row-custom">
                                <div class="footer-logo">
                                    <a href="{{route('home')}}"><img
                                            src="@if ($general->logo) {{ getFile('logo', $general->logo) }} @else {{asset('assets/uploads/no-image.png')}} @endif"
                                            alt="logo"></a>
                                </div>
                            </div>
                            <div class="row-custom">
                                <div class="footer-about">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 footer-widget">
                            <div class="nav-footer">
                                <div class="row-custom">
                                    <h4 class="footer-title">Quick Links</h4>
                                </div>
                                <div class="row-custom">
                                    <ul>
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        <li><a href="{{route('home')}}">Blog</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 footer-widget">
                            <div class="nav-footer">
                                <div class="row-custom">
                                    <h4 class="footer-title">Information</h4>
                                </div>
                                <div class="row-custom">
                                    <ul>
                                        <li><a href="{{route('home')}}">Terms &amp;
                                                Conditions</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 footer-widget">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="footer-title">Follow Us</h4>
                                    <div class="footer-social-links">
                                        <!--include social links-->

                                        <ul>
                                            <li><a href="{{route('home')}}" class="rss"><i class="icon-rss"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="newsletter">
                                        <h4 class="footer-title">Newsletter</h4>
                                        <form action="{{route('home')}}" id="form_validate_newsletter" method="post"
                                            accept-charset="utf-8">
                                            <input type="hidden" name="csrf_mds_token"
                                                value="aec007681ad8cf0ea566cc91fc5fe7dc" />
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="newsletter-inner">
                                                        <div class="d-table-cell">
                                                            <input type="email" class="form-control" name="email"
                                                                placeholder="Enter your email" maxlength="250" required>
                                                        </div>
                                                        <div class="d-table-cell align-middle">
                                                            <button class="btn btn-default">Subscribe</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-12">
                                                <div id="newsletter" class="m-t-5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="footer-bottom">
                <div class="container">
                    <div class="copyright">
                        Copyright 2030 <a href="{{route('home')}}" style="text-decoration:none;">MarketPriceBook</a> - All Rights Reserved. </div>
                    <!-- <div class="footer-payment-icons">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            data-src="http://secretattire.in/assets/img/payment/visa.svg" alt="visa" class="lazyload">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            data-src="http://secretattire.in/assets/img/payment/mastercard.svg" alt="mastercard"
                            class="lazyload">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            data-src="http://secretattire.in/assets/img/payment/maestro.svg" alt="maestro"
                            class="lazyload">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            data-src="http://secretattire.in/assets/img/payment/amex.svg" alt="amex" class="lazyload">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            data-src="http://secretattire.in/assets/img/payment/discover.svg" alt="discover"
                            class="lazyload">
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</footer>
