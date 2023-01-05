<?php
session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);

$user = mysql_query("SELECT * FROM user");
$transaksi = mysql_query("SELECT * FROM history");
$totaluser = mysql_num_rows($user);
$totaltransaksi = mysql_num_rows($transaksi);

$nama = $get['nama'];
$email = $get['email'];
$username = $get['username'];
$password = $get['password'];
$level = $get['level'];
$saldo = "Rp " . number_format($get['saldo'],2,',','.');
$uplink = $get['uplink'];
?>

<!DOCTYPE HTML>
<!--------------------------------------[ Script By Nicholas Romeo Rivaldo ]--------------------------------------->  
 <!---------------------[ Yang Ganti Copyright Gua Sumpahin Orang Tua Kalian Meninggal :) ]----------------------->  

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <title>Hunter Panel</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-74137680-1', 'auto');
    ga('send', 'pageview');
</script>


    </head>


    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="index.php" class="logo"><span>Hunter<span>Panel</span></span></a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li>
                                <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                     <input type="text" placeholder="Search..." class="form-control">
                                     <a href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                            <li>
                                <!-- Notification -->
                                <div class="notification-box">
                                    <ul class="list-inline m-b-0">
                                        <li>
                                            <a href="javascript:void(0);" class="right-bar-toggle">
                                                <i class="zmdi zmdi-notifications-none"></i>
                                            </a>
                                            <div class="noti-dot">
                                                <span class="dot"></span>
                                                <span class="pulse"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Notification bar -->
                            </li>

                            <li class="dropdown user-box">
                                <a href="#" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img">
                                    <div class="user-status away"><i class="zmdi zmdi-dot-circle"></i></div>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="login.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>

                </div>
            </div>

            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li class="active">
                                <a href="index.php" class="active"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                            </li>
                            <li class="has-submenu">
                                <li>
								<a href="javascript:;" onclick="show('content/all.php');">
								<i class="zmdi zmdi zmdi-shopping-cart"></i>
								<span>Start Order</span>
								</a>
							
                            </li>
                           
                            <?php if($level == 'Admin') { ?>
                            <li class="has-submenu">
                                <li>
								<a href="javascript:;" onclick="show('panel/tambahuser.php');">
								<i class="zmdi zmdi zmdi-laptop"></i>
								<span>Tambah Anggota</span>
								</a>
							</li>
							<li>
								<a href="javascript:;" onclick="show('panel/transfersaldo.php');">
								<i class="zmdi zmdi zmdi-money"></i>
								<span>Transfer Deposit Saldo</span>
								</a>
							</li>
							<li>
								<a href="javascript:;" onclick="show('panel/hapususer.php');">
								<i class="zmdi zmdi zmdi-laptop"></i>
								<span>Hapus Akun User</span>
								</a>
							</li>

                            <?php } else if($level == 'Reseller') { ?>
                            <li class="has-submenu">
                                <a href="#"><i class="zmdi zmdi-laptop"></i> <span> Reseller Panel </span> </a>
                                <ul class="submenu">
                                    <li>
								<a href="javascript:;" onclick="show('panel/tambahuser.php');">
								<i class="zmdi zmdi zmdi-laptop"></i>
								<span>Tambah Anggota</span>
								</a>
							</li>
							<li>
								<a href="javascript:;" onclick="show('panel/transfersaldo.php');">
								<i class="zmdi zmdi zmdi-money"></i>
								<span>Transfer Deposit Saldo</span>
								</a>							
							</li>

                            <?php } else if($level == 'Agen') { ?>
                            <li class="has-submenu">
                                <a href="#"><i class="zmdi zmdi-laptop"></i> <span> Agen Panel </span> </a>
                                <ul class="submenu">
                                    <li>
								<a href="javascript:;" onclick="show('panel/tambahuser.php');">
								<i class="zmdi zmdi zmdi-laptop"></i>
								<span>Tambah Anggota</span>
								</a>
							</li>
							<li>
								<a href="javascript:;" onclick="show('panel/transfersaldo.php');">
								<i class="zmdi zmdi zmdi-money"></i>
								<span>Transfer Deposit Saldo</span>
								</a>							
							</li>
                                </ul>
                            </li><?php } ?>

                        </ul>
                        <!-- End navigation menu  -->
                    </div>
                </div>
            </div>
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>


                 <div class="row">
                     <div class="col-lg-3 col-md-6">
                         <div class="card-box">
                             <div class="dropdown pull-right">
                                 <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                    aria-expanded="false">
                                     <i class="zmdi zmdi-more-vert"></i>
                                 </a>
                                 <ul class="dropdown-menu" role="menu">
                                     <li><a href="#">Action</a></li>
                                     <li><a href="#">Another action</a></li>
                                     <li><a href="#">Something else here</a></li>
                                     <li class="divider"></li>
                                     <li><a href="#">Separated link</a></li>
                                 </ul>
                             </div>

                             <h4 class="header-title m-t-0 m-b-30"></h4>

                             <div class="widget-chart-1">
                                 <div class="widget-chart-box-1">
                                     <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                                            data-bgColor="#F9B9B9" value="58"
                                            data-skin="tron" data-angleOffset="180" data-readOnly=true
                                            data-thickness=".15"/>
                                 </div>

                                 <div class="widget-detail-1">
                                     <?php echo $nama; ?>
                                     <p class="text-muted">Nama</p>
                                 </div>
                             </div>
                         </div>
                     </div><!-- end col -->

                     <div class="col-lg-3 col-md-6">
                         <div class="card-box">
                             <div class="dropdown pull-right">
                                 <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                    aria-expanded="false">
                                     <i class="zmdi zmdi-more-vert"></i>
                                 </a>
                                 <ul class="dropdown-menu" role="menu">
                                     <li><a href="#">Action</a></li>
                                     <li><a href="#">Another action</a></li>
                                     <li><a href="#">Something else here</a></li>
                                     <li class="divider"></li>
                                     <li><a href="#">Separated link</a></li>
                                 </ul>
                             </div>

                             <h4 class="header-title m-t-0 m-b-30"></h4>

                             <div class="widget-box-2">
                                 <div class="widget-detail-2">
                                     <span class="badge badge-success pull-left m-t-20">32% <i
                                             class="zmdi zmdi-trending-up"></i> </span>
                                     <?php echo $saldo; ?>
                                     <p class="text-muted m-b-25">Saldo</p>
                                 </div>
                                 <div class="progress progress-bar-success-alt progress-sm m-b-0">
                                     <div class="progress-bar progress-bar-success" role="progressbar"
                                          aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                          style="width: 77%;">
                                         <span class="sr-only">77% Complete</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div><!-- end col -->

                     <div class="col-lg-3 col-md-6">
                         <div class="card-box">
                             <div class="dropdown pull-right">
                                 <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                    aria-expanded="false">
                                     <i class="zmdi zmdi-more-vert"></i>
                                 </a>
                                 <ul class="dropdown-menu" role="menu">
                                     <li><a href="#">Action</a></li>
                                     <li><a href="#">Another action</a></li>
                                     <li><a href="#">Something else here</a></li>
                                     <li class="divider"></li>
                                     <li><a href="#">Separated link</a></li>
                                 </ul>
                             </div>

                             <h4 class="header-title m-t-0 m-b-30"></h4>

                             <div class="widget-chart-1">
                                 <div class="widget-chart-box-1">
                                     <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ffbd4a"
                                            data-bgColor="#FFE6BA" value="80"
                                            data-skin="tron" data-angleOffset="180" data-readOnly=true
                                            data-thickness=".15"/>
                                 </div>
                                 <div class="widget-detail-1">
                                     <?php echo $level; ?>
                                     <p class="text-muted">Level</p>
                                 </div>
                             </div>
                         </div>
                     </div><!-- end col -->

                     <div class="col-lg-3 col-md-6">
                         <div class="card-box">
                             <div class="dropdown pull-right">
                                 <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                    aria-expanded="false">
                                     <i class="zmdi zmdi-more-vert"></i>
                                 </a>
                                 <ul class="dropdown-menu" role="menu">
                                     <li><a href="#">Action</a></li>
                                     <li><a href="#">Another action</a></li>
                                     <li><a href="#">Something else here</a></li>
                                     <li class="divider"></li>
                                     <li><a href="#">Separated link</a></li>
                                 </ul>
                             </div>

                             <h4 class="header-title m-t-0 m-b-30"></h4>

                             <div class="widget-box-2">
                                 <div class="widget-detail-2">
                                     <span class="badge badge-pink pull-left m-t-20">32% <i
                                             class="zmdi zmdi-trending-up"></i> </span>
                                     <?php echo $uplink; ?>
                                     <p class="text-muted m-b-25">Uplink</p>
                                 </div>
                                 <div class="progress progress-bar-pink-alt progress-sm m-b-0">
                                     <div class="progress-bar progress-bar-pink" role="progressbar"
                                          aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                          style="width: 77%;">
                                         <span class="sr-only">77% Complete</span>
                                     </div>
                                 </div>
                             </div>
                         </div>                          
                    </div><!-- end col -->
<div class="row">
                <div class="col-md-7">
                    <div class="panel panel-default" id="fitur">
<div class="panel-heading panel-heading-gray">DashBoard</div>
                        <div class="panel-body">
                           <center><h3><strong>Welcome To Hunter Panel</strong></h3></center></br>                           
                    </div>
                    </div>
                    </div>

                <div class="col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Result Game</h3>
                            </div>
                            <div class="panel-body">
<center><textarea id="autoResizeTA" cols="50" rows="5" class="autosize form-control"  name="message"  style="color: white;  ;background : url('http://www.planwallpaper.com/static/images/colorful-triangles-background_yB0qTG6.jpg'); height: 400px; ">
</textarea>	
</center>
                <!-- end row -->


                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                                2016 © Adminto.
                            </div>
                            <div class="col-xs-6">
                                <ul class="pull-right list-inline m-b-0">
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Help</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div>
            <!-- end container -->



            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="zmdi zmdi-close-circle-o"></i>
                </a>
                <h4 class="">Notifications</h4>
                <div class="notification-list nicescroll">
                    <ul class="list-group list-no-border user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">Michael Zenaty</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-info">
                                    <i class="zmdi zmdi-account"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Signup</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">5 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-pink">
                                    <i class="zmdi zmdi-comment"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Message received</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">James Anderson</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-warning">
                                    <i class="zmdi zmdi-settings"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">Settings</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>



        <!-- jQuery  -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>

        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

        <!--Morris Chart-->
		<script src="assets/plugins/morris/morris.min.js"></script>
		<script src="assets/plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="assets/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

<script>
function show(nama) {
$("#fitur").html('<div class="panel-heading panel-heading-gray">DashBoard</div><div class="panel-body"><center><h3><strong>Loading...</strong></h3></center></div>');
    $.ajax({
        url    : nama,
        type    : 'GET',
        dataType: 'html',
        success    : function(isi){
            $("#fitur").html(isi);
        },
    });
}
</script></body>

<!-- Mirrored from coderthemes.com/adminto_1.2/menu_2/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 May 2016 12:03:55 GMT -->
</html>