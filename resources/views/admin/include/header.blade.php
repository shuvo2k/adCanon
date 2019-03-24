<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title', 'Ad Site')</title>

    <!-- Bootstrap -->
    <link href="{!! asset('../vendor/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{!! asset('../vendor/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
<!-- data table -->
    <link href="{!! asset('../vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('../vendor/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('../vendor/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('../vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('../vendor/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') !!}" rel="stylesheet">
<!-- parsely -->
<link rel="stylesheet" href="{!! asset('../css/parsely.css') !!}">
    <!-- Custom Theme Style -->
    <link href="{!! asset('../css/custom.min.css') !!}" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">


                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{!! asset('../images/img.jpg') !!}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>John Doe</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">

                            <ul class="nav side-menu">
                                <li><a href="{!! route('admin.index') !!}"><i class="fa fa-home"></i> Home </a>

                                </li>
                                <li><a href="{!! route('admin.moderator.list') !!}"><i class="fa fa-medkit"></i> Moderators </a>
                                </li>

                                <li><a><i class="fa fa-map"></i> Location <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                      <li><a href="{!! route('admin.division') !!}"><i class=""></i>District </a>
                                      </li>
                                      <li><a href="{!! route('admin.city') !!}"><i class=""></i>Cities </a>
                                      </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-crosshairs"></i> Categories <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                      <li><a href="{!! route('admin.categories') !!}"><i class=""></i>Category </a>
                                      </li>
                                      <li><a href="{!! route('admin.subcategories') !!}"><i class=""></i>Sub Category </a>
                                      </li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-pencil-square"></i> Blog <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                      <li><a href="{!! route('admin.blog.categories') !!}"><i class=""></i>Category </a>
                                      </li>
                                      <li><a href="{!! route('admin.blog.subcategories') !!}"><i class=""></i>Sub Category </a>
                                      </li>
                                      <li><a href="{!! route('admin.blog.tags') !!}"><i class=""></i>Tags </a>
                                      </li>
                                      <li><a href="{!! route('admin.blog.posts') !!}"><i class=""></i>Posts </a>
                                      </li>
                                    </ul>
                                </li>
                                <li><a href="{!! route('admin.client.posts') !!}"><i class="fa fa-sticky-note-o"></i> User Posts </a>

                                </li>
                                <li><a href="{!! route('admin.clients') !!}"><i class="fa fa-users"></i> Users </a>

                                </li>


                            </ul>
                        </div>


                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{!! route('admin.logout') !!}">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{!! asset('../images/img.jpg') !!}" alt="">John Doe
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="javascript:;"> Profile</a></li>

                                    <li><a href="javascript:;">Help</a></li>
                                    <li><a href="{!! route('admin.logout') !!}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <li>
                                        <a>
                                            <span class="image"><img src="{!! asset('../images/img.jpg') !!}" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>data-parsley-validate
                                    </li>



                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->




            @yield('content')




            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="#">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>


    <!-- jQuery -->
    <script src="{!! asset('../js/jquery.min.js') !!}"></script>

    <!-- Bootstrap -->
    <script src="{!! asset('../vendor/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <!-- data tables -->
    <script src="{!! asset('../vendor/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
       <script src="{!! asset('../vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>
       <script src="{!! asset('../vendor/datatables.net-buttons/js/dataTables.buttons.min.js') !!}"></script>
       <script src="{!! asset('../vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') !!}"></script>
       <script src="{!! asset('../vendor/datatables.net-buttons/js/buttons.flash.min.js') !!}"></script>
       <script src="{!! asset('../vendor/datatables.net-buttons/js/buttons.html5.min.js') !!}"></script>
       <script src="{!! asset('../vendor/datatables.net-buttons/js/buttons.print.min.js') !!}"></script>
       <script src="{!! asset('../vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') !!}"></script>
       <script src="{!! asset('../vendor/datatables.net-keytable/js/dataTables.keyTable.min.js') !!}"></script>
       <script src="{!! asset('../vendor/datatables.net-responsive/js/dataTables.responsive.min.js') !!}"></script>
       <script src="{!! asset('../vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js') !!}"></script>
       <script src="{!! asset('../vendor/datatables.net-scroller/js/dataTables.scroller.min.js') !!}"></script>
<!-- parsely -->
<script src="{!! asset('../js/parsely.min.js') !!}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{!! asset('../js/custom.min.js') !!}"></script>
    <script src="{!! asset('../js/main.js') !!}"></script>

    @stack('category_script')

    @stack('subcategory_script')
    @stack('division_script')
    @stack('city_script')
    @stack('userpost_script')
</body>

</html>
