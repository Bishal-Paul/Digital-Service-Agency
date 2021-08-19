<!doctype html>
<html lang="en">

<!-- Mirrored from coderthemes.com/highdmin/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Apr 2019 06:51:24 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Vendor Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('backend') }}/assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ url('backend') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('backend') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('backend') }}/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('backend') }}/assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="{{ url('backend') }}/assets/js/modernizr.min.js"></script>

</head>


<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">

            <div class="slimscroll-menu" id="remove-scroll">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                        <span>
                            <img src="{{ url('backend') }}/assets/images/logo.png" alt="" height="22">
                        </span>
                        <i>
                            <img src="{{ url('backend') }}/assets/images/logo_sm.png" alt="" height="28">
                        </i>
                    </a>
                </div>

                <!-- User box -->
                <div class="user-box">
                    <div class="user-img">
                        <img src="{{ url('backend') }}/assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                    </div>
                    <h5><a href="">{{Auth::user()->name}}</a> </h5>
                    <p class="text-muted">{{Auth::user()->type}}</p>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <!--<li class="menu-title">Navigation</li>-->

                        <li>
                            <a href="{{ url('vendor-dashboard') }}">
                                <i class="fi-air-play"></i> <span> Dashboard </span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Service Categories </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ url('add-service-category') }}">Add</a></li>
                                <li><a href="{{ url('view-service-category') }}">View</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Service Inner </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ url('add-service-inner') }}">Add</a></li>
                                <li><a href="{{ url('view-service-inner') }}">View</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Pricing </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ url('add-pricing') }}">Add</a></li>
                                <li><a href="{{ url('view-pricing') }}">View</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="fi-mail"></i><span> Testimonial </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ url('add-testimonial') }}">Add</a></li>
                                <li><a href="{{ url('view-testimonial') }}">View</a></a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="fi-mail"></i><span> Recent Works </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ url('add-work') }}">Add</a></li>
                                <li><a href="{{ url('view-work') }}">View</a></a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="fi-bar-graph-2"></i><span> Brands </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ url('add-brand') }}">Add</a></li>
                                <li><a href="{{ url('view-brand') }}">View</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);"><i class="fi-box"></i><span> Blogs </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ url('add-blog') }}">Add</a></li>
                                <li><a href="{{ url('view-blog') }}">View</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="fi-paper"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="tables-basic.html">Basic Tables</a></li>
                                <li><a href="tables-datatable.html">Data Tables</a></li>
                                <li><a href="tables-responsive.html">Responsive Table</a></li>
                                <li><a href="tables-tablesaw.html">Tablesaw Tables</a></li>
                                <li><a href="tables-foo.html">Foo Tables</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="fi-location-2"></i> <span> Maps </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="maps-google.html">Google Maps</a></li>
                                <li><a href="maps-vector.html">Vector Maps</a></li>
                                <li><a href="maps-mapael.html">Mapael Maps</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="fi-paper-stack"></i><span> Pages </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="page-starter.html">Starter Page</a></li>
                                <li><a href="page-login.html">Login</a></li>
                                <li><a href="page-register.html">Register</a></li>
                                <li><a href="page-logout.html">Logout</a></li>
                                <li><a href="page-recoverpw.html">Recover Password</a></li>
                                <li><a href="page-lock-screen.html">Lock Screen</a></li>
                                <li><a href="page-confirm-mail.html">Confirm Mail</a></li>
                                <li><a href="page-404.html">Error 404</a></li>
                                <li><a href="page-404-alt.html">Error 404-alt</a></li>
                                <li><a href="page-500.html">Error 500</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <!-- Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>

        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <!-- Top Bar Start -->
            <div class="topbar">

                <nav class="navbar-custom">

                   
                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left disable-btn">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        <li>
                            <div class="page-title-box">
                                <h4 class="page-title">Vendor Dashboard </h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Welcome {{Auth::user()->name}} !</li>
                                </ol>
                            </div>
                        </li>

                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->
            @yield('content')

        </div>

        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{ url('backend') }}/assets/js/jquery.min.js"></script>
    <script src="{{ url('backend') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('backend') }}/assets/js/metisMenu.min.js"></script>
    <script src="{{ url('backend') }}/assets/js/waves.js"></script>
    <script src="{{ url('backend') }}/assets/js/jquery.slimscroll.js"></script>

    <!-- Flot chart -->
    <script src="../plugins/flot-chart/jquery.flot.min.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.time.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.resize.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.pie.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.crosshair.js"></script>
    <script src="../plugins/flot-chart/curvedLines.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.axislabels.js"></script>

    <!-- KNOB JS -->
    <!--[if IE]>
        <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
    <script src="../plugins/jquery-knob/jquery.knob.js"></script>

    <!-- Dashboard Init -->
    <script src="{{ url('backend') }}/assets/pages/jquery.dashboard.init.js"></script>

    <!-- App js -->
    <script src="{{ url('backend') }}/assets/js/jquery.core.js"></script>
    <script src="{{ url('backend') }}/assets/js/jquery.app.js"></script>

</body>

<!-- Mirrored from coderthemes.com/highdmin/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Apr 2019 06:51:50 GMT -->

</html>














