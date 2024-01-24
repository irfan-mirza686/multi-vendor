<div class="switcher-wrapper">
    <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
    </div>
<?php
// echo "<pre>"; print_r($adminSettings); exit;
?>
    <div class="switcher-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
            <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
        </div>
        <hr />
        <h6 class="mb-0">Theme Styles</h6>
        <hr />
        <div class="d-flex align-items-center justify-content-between">
            <div class="form-check">
                <input class="form-check-input themeMode" data-URL="{{route('wholesaler.change.themesettings')}}" value="light-theme" type="radio" name="flexRadioDefault" id="lightmode" {{($themeMode=='light-theme')?'checked':''}}>
                <label class="form-check-label" for="lightmode">Light</label>
            </div>
            <div class="form-check">
                <input class="form-check-input themeMode" data-URL="{{route('wholesaler.change.themesettings')}}" value="dark-theme" type="radio" name="flexRadioDefault" id="darkmode" {{($themeMode=='dark-theme')?'checked':''}}>
                <label class="form-check-label" for="darkmode">Dark</label>
            </div>
            <div class="form-check">
                <input class="form-check-input themeMode" data-URL="{{route('wholesaler.change.themesettings')}}" value="semi-dark" type="radio" name="flexRadioDefault" id="semidark" {{($themeMode=='semi-dark')?'checked':''}}>
                <label class="form-check-label" for="semidark">Semi Dark</label>
            </div>
        </div>
        <hr />
        <div class="form-check">
            <input class="form-check-input themeMode" data-URL="{{route('wholesaler.change.themesettings')}}" value="minimal-theme" type="radio" id="minimaltheme" name="flexRadioDefault">
            <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
        </div>
        <hr />
        <h6 class="mb-0">Header Colors</h6>
        <hr />
        <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <div class="indigator headercolor1" data-color="color-header headercolor1" id="headercolor1" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor2" data-color="color-header headercolor2" id="headercolor2" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor3" data-color="color-header headercolor3" id="headercolor3" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor4" data-color="color-header headercolor4" id="headercolor4" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor5" data-color="color-header headercolor5" id="headercolor5" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor6" data-color="color-header headercolor6" id="headercolor6" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor7" data-color="color-header headercolor7" id="headercolor7" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor8" data-color="color-header headercolor8" id="headercolor8" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
            </div>
        </div>
        <hr />
        <h6 class="mb-0">Sidebar Colors</h6>
        <hr />
        <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <div class="indigator sidebarcolor1" data-sidebarcolor="color-sidebar sidebarcolor1" id="sidebarcolor1" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor2" data-sidebarcolor="color-sidebar sidebarcolor2" id="sidebarcolor2" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor3" data-sidebarcolor="color-sidebar sidebarcolor3" id="sidebarcolor3" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor4" data-sidebarcolor="color-sidebar sidebarcolor4" id="sidebarcolor4" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor5" data-sidebarcolor="color-sidebar sidebarcolor5" id="sidebarcolor5" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor6" data-sidebarcolor="color-sidebar sidebarcolor6" id="sidebarcolor6" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor7" data-sidebarcolor="color-sidebar sidebarcolor7" id="sidebarcolor7" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor8" data-sidebarcolor="color-sidebar sidebarcolor8" id="sidebarcolor8" data-URL="{{route('wholesaler.change.themesettings')}}"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom-script')
<script src="{{asset('assets/js/switcher/sidebar-switcher.js')}}"></script>
@endpush
