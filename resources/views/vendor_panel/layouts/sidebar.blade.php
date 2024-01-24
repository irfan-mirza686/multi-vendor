<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                <img src="@if ($general->logo) {{ getFile('logo', $general->logo) }} @else {{asset('assets/uploads/no-image.png')}} @endif" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">{{@$general->sitename}}</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('user.dashboard') }}">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>


                <li>
                    <a href="javascript:void(0);" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">Manage Products</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('vendor.wholesaler.products') }}"><i class="bx bx-right-arrow-alt"></i>WholeSalers Products</a>
                        </li>
                        <li> <a href="{{ route('vendor.own.products') }}"><i class="bx bx-right-arrow-alt"></i>Own Products</a>
                        </li>

                    </ul>
                </li>

                <li class="menu-label">Elements</li>

                <!-- <li>
                    <a href="javascript:void(0);" class="has-arrow">
                        <div class="parent-icon"><i class="text-primary" data-feather="slack"></i>
                        </div>
                        <div class="menu-title">Settings</div>
                    </a>
                    <ul>
                        <li> <a href=""><i class="bx bx-right-arrow-alt"></i>General Settings</a>
                        </li>
                        <li> <a href=""><i class="bx bx-right-arrow-alt"></i>Site Settings</a>
                        </li>

                    </ul>
                </li> -->
                <li>
                    <a href="javascript:void(0);" class="has-arrow">
                        <div class="parent-icon"><i class="text-primary" data-feather="slack"></i>
                        </div>
                        <div class="menu-title">Quotations</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('vendor.q.wholesaler') }}"><i class="bx bx-right-arrow-alt"></i>To WholeSalers</a>
                        </li>
                        <li> <a href=""><i class="bx bx-right-arrow-alt"></i>From Users</a>
                        </li>

                    </ul>
                </li>

                <!-- <li>
                    <a href="">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">settings</div>
                    </a>
                </li> -->
                <li>
                    <a href="{{ route('vendor.inbox') }}">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">Messages</div>
                    </a>
                </li>



            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
