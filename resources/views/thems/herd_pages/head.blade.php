<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="{{route('admin')}}"><img src="http://www.urbanui.com/serein/template/images/logo.svg" alt="logo"/></a>
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="http://www.urbanui.com/serein/template/images/logo-mini.svg" alt="logo"/></a>
</div>
<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="http://www.urbanui.com/serein/template/images/logo.svg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item">
{{--                    <i class="mdi mdi-settings text-primary"></i>--}}
{{--                    Settings--}}
                    {{Auth::user()->email}}
                </a>
                <a class="dropdown-item">
                    {{--                    <i class="mdi mdi-settings text-primary"></i>--}}
                    {{--                    Settings--}}
                    @if(Auth::user()->status == 1)
                        Super Admin
                        @elseif(Auth::user()->status == 2)
                    Admin
                    @else
                    User
                    @endif
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" {{--onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"--}} class="dropdown-item">
                   <i class="mdi mdi-logout text-primary"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
    </button>
</div>
{{--@dd(Auth::user())--}}
