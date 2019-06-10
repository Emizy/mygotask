<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta content="{{ Session::get('description') }}" name="description">
    <meta content="NevoGold Nig" name="author">

    <!-- Title -->
@yield('title')

<!-- Favicon -->
    <link href="{{ asset('assets/img/brand/favicon.png') }}" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Ansta CSS -->
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" type="text/css">

    <!-- Tabs CSS -->
    <link href="{{ asset('assets/plugins/tabs/style.css') }}" rel="stylesheet" type="text/css">

    <!-- jvectormap CSS -->
    <link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>

    <!-- Custom scroll bar css-->
    <link href="{{ asset('assets/plugins/customscroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet"/>

    <!-- Sidemenu Css -->
    <link href="{{ asset('assets/plugins/toggle-sidebar/css/sidemenu.css') }}" rel="stylesheet">
    <!-- Data table css -->
    <link href="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
</head>
<body class="app sidebar-mini rtl">
<div id="global-loader"></div>
<div class="page">
    <div class="page-main">
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar ">
            <div class="sidebar-img">
                <a class="navbar-brand" href="{{ route('biz.index') }}"><img alt="..."
                                                                             class="navbar-brand-img main-logo"
                                                                             src="{{ asset('img/logo4.png') }}">
                    <img alt="..."
                         class="navbar-brand-img logo"
                         src="{{ asset('img/logo4.png') }}"></a>
                <ul class="side-menu">
                    <li class="slide">
                        <a class="side-menu__item active" href="{{ route('biz.account') }}"><i
                                    class="side-menu__icon fe fe-home"></i><span
                                    class="side-menu__label">Dashboard</span></a>

                    </li>
                    <li class="slide">
                        <a class="side-menu__item" href="{{ route('biz.profile') }}"><i
                                    class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Profile</span></a>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                    class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">Customers Manager</span><i
                                    class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li>
                                <a href="{{ route('biz.manage') }}" class="slide-item"> <span
                                            class="fe fe-user side-menu__icon"> </span> Manage Customer</a>
                            </li>
                            <li>
                                <a href="{{ route('biz.manage.customer') }}" class="slide-item"> <span
                                            class="fe fe-plus-circle side-menu__icon"> </span> Add Customers</a>
                            </li>
                            <li>
                                <a href="{{ route('biz.manage.dailyentries') }}" class="slide-item"> <i class="fas fa-american-sign-language-interpreting side-menu__icon"></i>Daily Entries</a>
                            </li>
                            <li>
                                <a href="" class="slide-item"> <i class="fe fe-bar-chart side-menu__icon"></i>Customers Analysis</a>
                            </li>
                            <li>
                                <a href="{{ route('biz.manage.occupation') }}" class="slide-item"><span class="side-menu__icon fas fa-user-tie"></span> Add Occupation</a>
                            </li>

                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                    class="side-menu__icon fe fe-mail"></i><span class="side-menu__label">GoMails</span><i
                                    class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li>
                                <a href="maps.html" class="slide-item"><i
                                            class="side-menu__icon fe fe-message-square"></i> Send Bulk Mail</a>
                            </li>
                            <li>
                                <a href="vector-map.html" class="slide-item"><i
                                            class="side-menu__icon fe fe-flag"></i> Create Campaign</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                    class="side-menu__icon fe fe-shopping-bag"></i><span class="side-menu__label">Go-market</span><i
                                    class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li>
                                <a href="maps.html" class="slide-item"> <i
                                            class="side-menu__icon fe fe-plus-circle"></i> Add Products </a>
                            </li>
                            <li>
                                <a href="vector-map.html" class="slide-item"><i
                                            class="side-menu__icon fe fe-book-open"></i> View Orders</a>
                            </li>
                            <li>
                                <a href="vector-map.html" class="slide-item"><i
                                            class="side-menu__icon fe fe-book-open"></i> Add Product Category</a>
                            </li>
                            <li>
                                <a href="vector-map.html" class="slide-item"><i
                                            class="side-menu__icon fe fe-book-open"></i> Newsletter Subscriber</a>
                            </li>
                            <li>
                                <a href="vector-map.html" class="slide-item"><i
                                            class="side-menu__icon ti ti-stats-up"></i> Product Statistics</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Sidebar menu-->
        <!-- app-content-->
        <div class="app-content ">
            <div class="side-app">
                <div class="main-content">
                    <div class="p-2 d-block d-sm-none navbar-sm-search">
                        <!-- Form -->

                        <div class="well" role="alert" style="background-color: white">

                        </div>
                    </div>
                    <!-- Top navbar -->
                    <nav class="navbar navbar-top  navbar-expand-md navbar-dark" id="navbar-main">
                        <div class="container-fluid">
                            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>

                            <!-- Horizontal Navbar -->


                            <!-- Brand -->
                            <a class="navbar-brand pt-0 d-md-none" href="{{ route('biz.index') }}">
                                <img src="{{ asset('img/logo4.png') }}" class="navbar-brand-img"
                                     alt="...">
                            </a>
                            <!-- Form -->
                            <!-- User -->
                            <ul class="navbar-nav align-items-center ">
                                <li class="nav-item d-none d-md-flex">
                                    <div class="dropdown d-none d-md-flex mt-2 ">
                                        <a class="nav-link full-screen-link pl-0 pr-0"><i
                                                    class="fe fe-maximize-2 floating " id="fullscreen-button"></i></a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0"
                                       data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <span class="avatar avatar-sm rounded-circle"><img alt="Image placeholder"
                                                                                               src="/uploads/{{ Auth::user()->image }}"></span>
                                            <div class="media-body ml-2 d-none d-lg-block">
                                                <span class="mb-0 ">{{ Auth::user()->business }}</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                        <div class=" dropdown-header noti-title">
                                            <h6 class="text-overflow m-0">Welcome!</h6>
                                        </div>
                                        <a class="dropdown-item" href="{{ route('biz.profile') }}"><i
                                                    class="ni ni-single-02"></i> <span>My profile</span></a>
                                        <a class="dropdown-item" href="#"><i class="ni ni-settings-gear-65"></i> <span>Settings</span></a>
                                        <a class="dropdown-item" href="#"><i class="ni ni-calendar-grid-58"></i> <span>Activity</span></a>
                                        <a class="dropdown-item" href="#"><i class="ni ni-support-16"></i>
                                            <span>Support</span></a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('biz.logout') }}"><i
                                                    class="ni ni-user-run"></i> <span>Logout</span></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Top navbar-->

                    <!-- Page content -->
                    <div class="container-fluid pt-8">
                        <div class="page-header shadow p-3">
                            <br>

                            @if(Auth::user()->account_status == 'UNCOMPLETED')
                                <div class="alert alert-success" role="alert">
                                    <strong>Warning!</strong> Kindly Update your profile in order for the system to
                                    verify your account <a
                                            href="{{ route('biz.profile') }}">Profile</a>
                                </div>
                            @endif
                        </div>
                    @yield('content')
                    <!-- Footer -->
                        <footer class="footer">
                            <div class="row align-items-center justify-content-xl-between">
                                <div class="col-xl-6">
                                    <div class="copyright text-center text-xl-left text-muted">
                                        <p class="text-sm font-weight-500">Copyright {{ date('Y') }} © All Rights Reserved.
                                            MyGoTask</p>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <p class="float-right text-sm font-weight-500">Designed by <a
                                                href="#">NevoGold Nig</a></p>
                                </div>
                            </div>
                        </footer>
                        <!-- Footer -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<script src="{{ asset('assets/plugins/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.js')  }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/plugins/chart-echarts/echarts.js') }}"></script>

<script src="{{ asset('assets/plugins/toggle-sidebar/js/sidemenu.js') }}"></script>

<script src="{{ asset('assets/plugins/customscroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- Data tables -->
<script src="{{ asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
<script src="{{ asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>

<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap/gdp-data.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-uk-mill-en.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-au-mill.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-ca-lcc.js') }}"></script>
<script src="{{ asset('assets/js/dashboard2map.js') }}"></script>

<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/dashboard-sales.js') }}"></script>
<script>
    $(function (e) {
        $('#example').DataTable();

        var table = $('#example1').DataTable();
        $('button').click(function () {
            var data = table.$('input, select').serialize();
            alert(
                "The following data would have been submitted to the server: \n\n" +
                data.substr(0, 120) + '...'
            );
            return false;
        });
        $('#example2').DataTable({
            "scrollY": "200px",
            "scrollCollapse": true,
            "paging": false
        });
    });

</script>
</body>
</html>

