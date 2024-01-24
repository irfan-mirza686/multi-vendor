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
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li class="menu-label">Elements</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-users"></i>
                </div>
                <div class="menu-title">Staff Management</div>
            </a>
            <ul>

                <li> <a href="{{route('admin.staff.members')}}"><i class="bx bx-right-arrow-alt"></i>Staff Members</a>
                </li>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Roles</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-producthunt"></i>
                </div>
                <div class="menu-title">Products</div>
            </a>
            <ul>

                <li> <a href="{{route('admin.wholesaler.products')}}"><i class="bx bx-right-arrow-alt"></i>WholeSaler</a>
                </li>
                <li> <a href="{{route('admin.vendor.products')}}"><i class="bx bx-right-arrow-alt"></i>Vendor</a>
                </li>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Reviews</a>
                </li>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Comments</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fadeIn animated bx bx-trash"></i>
                </div>
                <div class="menu-title">Trashed Products</div>
            </a>
            <ul>

                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>WholeSaler</a>
                </li>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Vendor</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="{{ route('admin.products') }}">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Products</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">Master Data</div>
            </a>
            <ul>
                <!-- <li> <a href="{{ route('admin.product.types') }}"><i class="bx bx-right-arrow-alt"></i>Product Types</a>
                </li> -->
                <li> <a href="{{ route('admin.package.types') }}"><i class="bx bx-right-arrow-alt"></i>Package Types</a>
                </li>
                <li> <a href="{{ route('admin.product.categories') }}"><i class="bx bx-right-arrow-alt"></i>Product
                        Categories</a>
                </li>
                <li> <a href="{{ route('admin.countries') }}"><i class="bx bx-right-arrow-alt"></i>Country List</a>
                </li>
                <li> <a href="{{ route('admin.states') }}"><i class="bx bx-right-arrow-alt"></i>State List</a>
                </li>
                <li> <a href="{{ route('admin.cities') }}"><i class="bx bx-right-arrow-alt"></i>City List</a>
                </li>
                <li> <a href="{{ route('admin.products') }}"><i class="bx bx-right-arrow-alt"></i>Products List</a>
                </li>
                <li> <a href="{{ route('admin.units') }}"><i class="bx bx-right-arrow-alt"></i>Units List</a>
                </li>
                <li> <a href="{{ route('admin.sliders') }}"><i class="bx bx-right-arrow-alt"></i>Sliders List</a>
                </li>
                <!-- <ul> -->
                <!-- <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>GPC</a>
                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level Two</a>
                        <ul>
                            <li> <a href="#"><i
                                        class="bx bx-right-arrow-alt"></i>Segments</a>
                            </li>
                            <li> <a href="#"><i
                                        class="bx bx-right-arrow-alt"></i>Family</a>
                            </li>
                            <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Class</a>
                            </li>
                            <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Bricks</a>
                            </li>
                            <li> <a href="#"><i
                                        class="bx bx-right-arrow-alt"></i>Attributes</a>
                            </li>
                            <li> <a href="#"><i
                                        class="bx bx-right-arrow-alt"></i>Attributes Value</a>
                            </li>
                        </ul>
                        </li>
                    </ul>
                </li> -->
                <!-- </ul> -->

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Members</div>
            </a>
            <ul>

                <li> <a href="{{route('admin.wholesalers')}}"><i class="bx bx-right-arrow-alt"></i>WholeSaler</a>
                </li>
                <li> <a href="{{route('admin.vendors')}}"><i class="bx bx-right-arrow-alt"></i>Vendor</a>
                </li>
                <li> <a href="{{route('admin.consumers')}}"><i class="bx bx-right-arrow-alt"></i>Users</a>
                </li>

            </ul>
        </li>
        <!-- <li>
            <a href="{{ route('admin.subscribers') }}">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Subscribers</div>
            </a>
        </li> -->

        <!-- <li>
            <a href="{{ route('admin.trashed.products') }}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-trash"></i>
                </div>
                <div class="menu-title">Trashed Products</div>
            </a>
        </li> -->
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-cog"></i>
                </div>
                <div class="menu-title">Settings</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.general.settings') }}"><i class="bx bx-right-arrow-alt"></i>General
                        Settings</a>
                </li>
                <li> <a href="{{ route('admin.general.settings') }}"><i class="bx bx-right-arrow-alt"></i>                        Company Details</a>
                </li>
                <li> <a href="{{ route('admin.email.config') }}"><i class="bx bx-right-arrow-alt"></i>Email
                        Configuration</a>
                </li>
                <li> <a href="{{ route('admin.email.templates') }}"><i class="bx bx-right-arrow-alt"></i>Email
                        Templates</a>
                </li>
                <li> <a href="{{ route('admin.chat.setting') }}"><i class="bx bx-right-arrow-alt"></i>Live Chat Setting</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-quotation"></i>
                </div>
                <div class="menu-title">Quotations</div>
            </a>
            <ul>

                <li> <a href="{{route('admin.wholesaler.quotations')}}"><i class="bx bx-right-arrow-alt"></i>To WholeSaler</a>
                </li>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Vendor</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-cog"></i>
                </div>
                <div class="menu-title">Messages</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.inbox.wholesaler') }}"><i class="bx bx-right-arrow-alt"></i>Wholesaler</a>
                </li>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Vendors</a>
                </li>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Customers</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fadeIn animated bx bx-message-error"></i>
                </div>
                <div class="menu-title">Reports</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.inbox.wholesaler') }}"><i class="bx bx-right-arrow-alt"></i>Wholesaler</a>
                </li>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Vendors</a>
                </li>

                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Products</a>
                </li>

            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
