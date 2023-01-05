<?php
$order_id=$_GET['id'];
ob_start();
session_start();

if(!isset($_SESSION['username'])) {
	header('location:login.php');
} else {
	$username = $_SESSION['username'];
}

require_once("../include/config.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$tampil = mysql_fetch_array($query);

$queryto = mysql_query("SELECT * FROM order_history WHERE order_id = '$order_id'");
$get_datas = mysql_num_rows($queryto);
$get_data = mysql_fetch_array($queryto);
$level = $tampil['level'];
$balance = $tampil['balance'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
    <title><?php echo $title; ?> - Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!--My admin Custom CSS -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="../global/morris/morris.css" type="text/css" />
    <!-- HTML5 Shiv and Respond.js IE8 support -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


    <!-- jQuery-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link href="../global/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <script src="../global/sweetalert/sweetalert.min.js"></script>
    <link href="../global/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../global/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
    <link href="../global/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
</head>

<body class="nav-fixed">

    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <!-- End Preloader -->

    <section id="wrapper">
        <!-- Top Section -->
 
        <!-- Top Section End -->
        <!-- Left Navigation -->
        

                     <!-- Page-Title -->
                    <!-- Page Title End -->

                    <!-- Row--> <div class="row">
       <div class="col-md-12">
          <div class="white-box">
            <h3><b>INVOICE</b> <span class="pull-right">#<?php echo $get_data['id']; ?></span></h3>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <div class="pull-left">
                  <address>
                  <h3><i class="glyphicon glyphicon-fire text-info"></i>&nbsp;<b>From</b></h3>
                  <p class="text-muted m-l-5">Pembeli : <?php echo $get_data['buyer']; ?> <br/>
                  </address>
                </div>
                
 <div  class="pull-right text-right">
                  <address>
                  <h3>To,</h3>
                  <h4 class="font-bold">Instant Cubes</h4>
                  <p class="text-muted m-l-30">Phone : (+62) 812 1947 944x <br/>
                    Email : InstantCubes@gmail.com <br/>
                  <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> <?php echo $get_data['date']; ?></p>
                  <p><b>Due Date :</b> <i class="fa fa-calendar"></i> <?php echo $get_data['date']; ?></p>
                  </address>
                </div>
              </div>
              <div class="col-md-12">
                <div class="table-responsive m-t-40">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th>Product</th>
                        <th class="text-right">Quantity</th>
                        <th class="text-right">Price</th>
                        <th class="text-right">Tax</th>
                        <th class="text-right">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">1</td>
                        <td><?php echo $get_data['service']; ?></td>
                        <td class="text-right"><?php echo $get_data['quantity']; ?></td>
                        <td class="text-right"> Rp.<?php echo $get_data['price']; ?></td>
                        <td class="text-right"> 0 </td>
                        <td class="text-right"> Rp.<?php echo $get_data['price']; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-12">
                <div class="pull-right m-t-30 text-right">
                  <hr>
                  <h3><b>Total :</b>  Rp.<?php echo $get_data['price']; ?></h3>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="text-right">
                  <a class="btn btn-success" type="submit" href="../index.php?content=order-history"> Back To Home </a>
                  <button onClick="javascript:window.print();" class="btn btn-default" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

                </div><!-- end main -->

                </div>
                <!-- End container -->
            </div>
            <!-- End main content -->
           
        </div>
    </section>

    <script src="../js/mobile.js"></script>
    <script src="../js/waves.js"></script>
    <script src="../js/jquery.nicescroll.js"></script>
    <!-- jQuery Notification Peity chart -->
    <script src="../global/peity/jquery.peity.min.js"></script>
    <!-- jQuery Customs -->
    <script src="../js/custom.js"></script>
    <script src="../js/custom-widget.js"></script>
    
    <script src="../global/datatables/jquery.dataTables.min.js"></script>
    <script src="../global/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="../global/custom-select/custom-select.min.js" type="text/javascript"></script>

</body>

</html>