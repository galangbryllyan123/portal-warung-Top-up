<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Hunter PAnel</title>
        <meta name="description" content="Hunter Panel SMM Seller">
        <meta name="keywords" content="Hunter Panel">
        <meta name="author" content="Idris Hamid">
        <link href="assets/images/icon.png" rel="shortcut icon" type="image/x-icon" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="index.php" class="logo"><span>Hunter<span>Panel</span></span></a>
                <h5 class="text-muted m-t-0 font-600">SMM Panel</h5>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Sign In</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal m-t-20" action="loginact.php" method="post">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" id="username" type="text" name="username" required="" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" id="password" type="password" name="password" required="" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Log In</button><br><br>
                                <a class="btn btn-custom btn-bordred btn-block waves-effect waves-light" data-toggle="modal" data-target="#liststaff">List Staff Resmi</a><br><br>
                                <a class="btn btn-custom btn-bordred btn-block waves-effect waves-light" data-toggle="modal" href="price.php">List Harga</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="text-muted">Don't have an account? <a href="/login.php" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                </div>
            </div>
        </div>



                            <div id="liststaff" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content p-0">
                                        <div class="panel-group panel-group-joined" id="liststaffs">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#liststaffs" href="#listadmin">
                                                            Daftar Admin Resmi
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="listadmin" class="panel-collapse collapse">
                                                    <div class="panel-body">
<table width="100%" class="table table-striped">
<thead>
<tr>
<th>Username</th>
<th>Nama</th>
</tr>
</thead>
<tbody>
<tr>
<td>Idris</td>
<td>Idris Hamid</td>
</tr></tbody>
</table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#liststaffs" href="#listreseller">
                                                            Daftar Reseller Resmi
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="listreseller" class="panel-collapse collapse in">
                                                    <div class="panel-body">
<table width="100%" class="table table-striped">
<thead>
<tr>
<th>Username</th>
<th>Nama</th>
</tr>
</thead>
<tbody>
<tr>
<td>Kosong</td>
<td>Kosong</td>
</tr><tr>
<td>Kosong</td>
<td>Kosong</td>
</tr><tr>
<td>Kosong</td>
<td>Kosong</td>
</tr><tr>
<td>Kosong</td>
<td>Kosong</td>
</tr><tr>
<td>Kosong</td>
<td>Kosong</td>
</tr><tr>
<td>Kosong</td>
<td>Kosong</td>
</tr><tr>
<td>Kosong</td>
<td>Kosong</td>
</tr><tr>
<td>Kosong</td>
<td>Kosong</td>
</tr><tr>
<td>Kosong</td>
<td>Kosong</td>
</tr><tr>
<td>Kosong</td>
<td>Kosong</td>
</tr><tr>
<td>Kosong</td>
<td>Kosong</td>
</tr><tr>
<td>Kosong</td>
<td>Kosong</td>
</tr><tr>
<td>Kosong</td>
<td>Kosong</td>
</tr><tr>
<td>Kosong</td>
<td>Kosong</td>
</tr><tr>
<td>Kosong</td>
<td>Kosong</td>
</tr><tr>
<td>Kosong</td>
<td>Kosong</td>
</tr></tbody>
</table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

    	<script>
            var resizefunc = [];
        </script>
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
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
    </body>
</html>