<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="{{asset('template/image/png" sizes="16x16" href="images/favicon.png')}}">
    <!-- Pignose Calender -->
    <link href="{{asset('template/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{asset('template/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <link href="{{asset('template/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/sweetalert2.min.css')}}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">

    <!-- jquery.Thailand.js -->
    <link rel="stylesheet" href="{{url('https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css')}}">

    <!-- Custom Stylesheet -->
    <link href="{{asset('template/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    @yield('head')
</head>

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <div class="brand-logo">
            <a href="{{url('admin/home')}}">
                <b class="logo-abbr"><img src="{{asset('template/images/logo.png')}}" alt=""> </b>
                <span class="logo-compact"><img src="{{asset('template/images/logo-compact.png')}}" alt=""></span>
                <span class="brand-title">
                        <img src="{{asset('template/images/logo-text.png')}}" alt="">
                    </span>
            </a>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content clearfix">

            <div class="nav-control">
                <div class="hamburger">
                    <span class="toggle-icon"><i class="icon-menu"></i></span>
                </div>
            </div>
            {{--            <div class="header-left">--}}
            {{--                <div class="input-group icons">--}}
            {{--                    <div class="input-group-prepend">--}}
            {{--                        <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>--}}
            {{--                    </div>--}}
            {{--                    <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">--}}
            {{--                    <div class="drop-down animated flipInX d-md-none">--}}
            {{--                        <form action="#">--}}
            {{--                            <input type="text" class="form-control" placeholder="Search">--}}
            {{--                        </form>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="header-right">
                <ul class="clearfix">
                    {{--                    <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">--}}
                    {{--                            <i class="mdi mdi-email-outline"></i>--}}
                    {{--                            <span class="badge badge-pill gradient-1">3</span>--}}
                    {{--                        </a>--}}
                    {{--                        <div class="drop-down animated fadeIn dropdown-menu">--}}
                    {{--                            <div class="dropdown-content-heading d-flex justify-content-between">--}}
                    {{--                                <span class="">3 New Messages</span>--}}
                    {{--                                <a href="javascript:void()" class="d-inline-block">--}}
                    {{--                                    <span class="badge badge-pill gradient-1">3</span>--}}
                    {{--                                </a>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="dropdown-content-body">--}}
                    {{--                                <ul>--}}
                    {{--                                    <li class="notification-unread">--}}
                    {{--                                        <a href="javascript:void()">--}}
                    {{--                                            <img class="float-left mr-3 avatar-img" src="{{asset('template/images/avatar/1.jpg')}}" alt="">--}}
                    {{--                                            <div class="notification-content">--}}
                    {{--                                                <div class="notification-heading">Saiful Islam</div>--}}
                    {{--                                                <div class="notification-timestamp">08 Hours ago</div>--}}
                    {{--                                                <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </a>--}}
                    {{--                                    </li>--}}
                    {{--                                    <li class="notification-unread">--}}
                    {{--                                        <a href="javascript:void()">--}}
                    {{--                                            <img class="float-left mr-3 avatar-img" src="{{asset('template/images/avatar/2.jpg')}}" alt="">--}}
                    {{--                                            <div class="notification-content">--}}
                    {{--                                                <div class="notification-heading">Adam Smith</div>--}}
                    {{--                                                <div class="notification-timestamp">08 Hours ago</div>--}}
                    {{--                                                <div class="notification-text">Can you do me a favour?</div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </a>--}}
                    {{--                                    </li>--}}
                    {{--                                    <li>--}}
                    {{--                                        <a href="javascript:void()">--}}
                    {{--                                            <img class="float-left mr-3 avatar-img" src="{{asset('images/avatar/3.jpg')}}" alt="">--}}
                    {{--                                            <div class="notification-content">--}}
                    {{--                                                <div class="notification-heading">Barak Obama</div>--}}
                    {{--                                                <div class="notification-timestamp">08 Hours ago</div>--}}
                    {{--                                                <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </a>--}}
                    {{--                                    </li>--}}
                    {{--                                    <li>--}}
                    {{--                                        <a href="javascript:void()">--}}
                    {{--                                            <img class="float-left mr-3 avatar-img" src="{{asset('images/avatar/4.jpg')}}" alt="">--}}
                    {{--                                            <div class="notification-content">--}}
                    {{--                                                <div class="notification-heading">Hilari Clinton</div>--}}
                    {{--                                                <div class="notification-timestamp">08 Hours ago</div>--}}
                    {{--                                                <div class="notification-text">Hello</div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </a>--}}
                    {{--                                    </li>--}}
                    {{--                                </ul>--}}

                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">--}}
                    {{--                            <i class="mdi mdi-bell-outline"></i>--}}
                    {{--                            <span class="badge badge-pill gradient-2">3</span>--}}
                    {{--                        </a>--}}
                    {{--                        <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">--}}
                    {{--                            <div class="dropdown-content-heading d-flex justify-content-between">--}}
                    {{--                                <span class="">2 New Notifications</span>--}}
                    {{--                                <a href="javascript:void()" class="d-inline-block">--}}
                    {{--                                    <span class="badge badge-pill gradient-2">5</span>--}}
                    {{--                                </a>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="dropdown-content-body">--}}
                    {{--                                <ul>--}}
                    {{--                                    <li>--}}
                    {{--                                        <a href="javascript:void()">--}}
                    {{--                                            <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>--}}
                    {{--                                            <div class="notification-content">--}}
                    {{--                                                <h6 class="notification-heading">Events near you</h6>--}}
                    {{--                                                <span class="notification-text">Within next 5 days</span>--}}
                    {{--                                            </div>--}}
                    {{--                                        </a>--}}
                    {{--                                    </li>--}}
                    {{--                                    <li>--}}
                    {{--                                        <a href="javascript:void()">--}}
                    {{--                                            <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>--}}
                    {{--                                            <div class="notification-content">--}}
                    {{--                                                <h6 class="notification-heading">Event Started</h6>--}}
                    {{--                                                <span class="notification-text">One hour ago</span>--}}
                    {{--                                            </div>--}}
                    {{--                                        </a>--}}
                    {{--                                    </li>--}}
                    {{--                                    <li>--}}
                    {{--                                        <a href="javascript:void()">--}}
                    {{--                                            <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>--}}
                    {{--                                            <div class="notification-content">--}}
                    {{--                                                <h6 class="notification-heading">Event Ended Successfully</h6>--}}
                    {{--                                                <span class="notification-text">One hour ago</span>--}}
                    {{--                                            </div>--}}
                    {{--                                        </a>--}}
                    {{--                                    </li>--}}
                    {{--                                    <li>--}}
                    {{--                                        <a href="javascript:void()">--}}
                    {{--                                            <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>--}}
                    {{--                                            <div class="notification-content">--}}
                    {{--                                                <h6 class="notification-heading">Events to Join</h6>--}}
                    {{--                                                <span class="notification-text">After two days</span>--}}
                    {{--                                            </div>--}}
                    {{--                                        </a>--}}
                    {{--                                    </li>--}}
                    {{--                                </ul>--}}

                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="icons dropdown d-none d-md-flex">--}}
                    {{--                        <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">--}}
                    {{--                            <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>--}}
                    {{--                        </a>--}}
                    {{--                        <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">--}}
                    {{--                            <div class="dropdown-content-body">--}}
                    {{--                                <ul>--}}
                    {{--                                    <li><a href="javascript:void()">English</a></li>--}}
                    {{--                                    <li><a href="javascript:void()">Dutch</a></li>--}}
                    {{--                                </ul>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </li>--}}
                    <li class="icons dropdown">
                        <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                            <span class="activity active"></span>
                            <img src="{{asset('template/images/user/1.png')}}" height="40" width="40" alt="">
                        </div>
                        <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a href="{{url('profile')}}"><i class="icon-user"></i> <span>Profile</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-user"></i> <span>Change Password</span></a>
                                    </li>
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="javascript:void()">--}}
                                    {{--                                            <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    <hr class="my-2">
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>--}}
                                    {{--                                    </li>--}}
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-key"></i> <span>{{ __('Logout') }}</span></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="nk-sidebar">
        <div class="nk-nav-scroll">
            <ul class="metismenu" id="menu">
                @if(Auth::user()->isAdmin())
                    <li class="nav-label">Admin</li>
                    {{--                <li>--}}
                    {{--                    <a href="{{ url('admin/home') }}" aria-expanded="false">--}}
                    {{--                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>--}}
                    {{--                    </a>--}}
                    {{--                </li>--}}
                    <li>
                        <a href="{{ url('dashboard') }}" aria-expanded="false">
                            <i class="icon-home menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    {{--                <li>--}}
                    {{--                    <a href="{{ url('admin/product') }}" aria-expanded="false">--}}
                    {{--                        <i class="icon-grid menu-icon"></i><span class="nav-text">รายการสินค้า</span>--}}
                    {{--                    </a>--}}
                    {{--                </li>--}}
                    <li>
                        <a href="{{ url('product-category') }}" aria-expanded="false">
                            <i class="icon-rocket menu-icon"></i><span class="nav-text">หมวดหมู่อุปกรณ์</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('products') }}" aria-expanded="false">
                            <i class="icon-rocket menu-icon"></i><span class="nav-text">รายการอุปกรณ์</span>
                        </a>
                    </li>
                    {{--                <li>--}}
                    {{--                    <a href="{{ url('admin/post') }}" aria-expanded="false">--}}
                    {{--                        <i class="icon-list menu-icon"></i><span class="nav-text">เลขไปรษณีย์นอกเขต</span>--}}
                    {{--                    </a>--}}
                    {{--                </li>--}}
                    <li>
                        <a href="{{ url('employee') }}" aria-expanded="false">
                            <i class="icon-people menu-icon"></i><span class="nav-text">รายชื่อพนักงาน</span>
                        </a>
                    </li>
                @endif
                <li class="nav-label">พนักงาน</li>
                <li>
                    <a href="{{ url('/user/form') }}" aria-expanded="false">
                        <i class="icon-book-open menu-icon"></i><span class="nav-text">แบบฟอร์ม</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        @yield('content')
    </div>
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<script src="{{asset('template/plugins/common/common.min.js')}}"></script>
<script src="{{asset('template/js/custom.min.js')}}"></script>
<script src="{{asset('template/js/settings.js')}}"></script>
<script src="{{asset('template/js/gleek.js')}}"></script>
<script src="{{asset('template/js/styleSwitcher.js')}}"></script>

<!-- Chartjs -->
<script src="{{asset('template/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Circle progress -->
<script src="{{asset('template/plugins/circle-progress/circle-progress.min.js')}}"></script>
<!-- Datamap -->
<script src="{{asset('template/plugins/d3v3/index.js')}}"></script>
<script src="{{asset('template/plugins/topojson/topojson.min.js')}}"></script>
<script src="{{asset('template/plugins/datamaps/datamaps.world.min.js')}}"></script>
<!-- Morrisjs -->
<script src="{{asset('template/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('template/plugins/morris/morris.min.js')}}"></script>
<!-- Pignose Calender -->
<script src="{{asset('template/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('template/plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
<!-- ChartistJS -->
<script src="{{asset('template/plugins/chartist/js/chartist.min.js')}}"></script>
<script src="{{asset('template/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>
<!-- dataTables -->
<script src="{{asset('template/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>

<link href="{{asset('template/plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}" rel="stylesheet">

<script src="{{asset('template/js/dashboard/dashboard-1.js')}}"></script>

<script src="{{asset('template/js/sweetalert2.min.js')}}"></script>

<!-- jquery.Thailand.js -->
{{--<script type="text/javascript" src="{{url('https://code.jquery.com/jquery-3.2.1.min.js')}}"></script>--}}
<script type="text/javascript" src="{{url('https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js')}}"></script>
<script type="text/javascript" src="{{url('https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js')}}"></script>
<script type="text/javascript" src="{{url('https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js')}}"></script>

<!-- datetimepicker -->
<script src="{{asset('template/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{asset('template/js/plugins-init/form-pickers-init.js')}}"></script>
<script src="{{asset('template/js/jquery.autocomplete.min.js')}}"></script>
@yield('script')

</body>

</html>
