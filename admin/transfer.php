<?php
// Script By Aditama Gilang Farel

if(!$username) {
	header('location:../login.php');
} ?>

                    <!-- Page-Title -->
                    <div class="row title_bg">
                        <div class="col-sm-12">
                            <h4 class="page-title">INSTANT CUBES</h4>
                            	<ol class="breadcrumb">
                            		<li><a href="#">Admin Panel</a></li>
                            		<li class="active">Transfer Saldo</li>
                            	</ol>
                        </div>
                    </div>
                    <!-- Page Title End -->
<?php if (isset($_POST['send'])) {
// memulai proses add user

$add_username = $_POST['username'];
$jumlah = $_POST['jumlah'];
$date = date("Y-m-d");
// mencari data di database
$cekdata = mysql_query("SELECT * FROM user WHERE username = '$add_username'");
$sdata = mysql_fetch_array($cekdata);
$scount = mysql_num_rows($cekdata);
$mybalance = $tampil['balance'];
$myusername = $tampil['username'];
// memulai eksekusi
if ($scount <> 1) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Username Belum Terdaftar. </div>
<? } else if (!$add_username || !$jumlah) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Masih Ada Data Yang Kosong. </div>
<? } else if ($jumlah < '0') { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Format Tidak Sah </div>
<? } else if ($mybalance < $jumlah)  { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Saldo Tidak Cukup </div>
<? } else if ($add_username == $myusername)  { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Terjadi Kesalahan </div>
<? } else {
	$send = mysql_query("UPDATE user SET balance = balance+$jumlah WHERE username = '$add_username'");
	$send = mysql_query("UPDATE user SET balance_used = balance_used+$jumlah WHERE username = '$myusername'");
	$send = mysql_query("UPDATE user SET balance = balance-$jumlah WHERE username = '$myusername'");
if ($send) { ?>
<div class="alert alert-info">
<font color="black">
<strong>Success : </strong> Transfer Saldo Berhasil :)<br />
Username: <?php echo $add_username; ?><br />
Jumlah: <?php echo $jumlah; ?><br />
Date: <?php echo $date; ?>
</font>
</div>
<?php } else { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Terjadi Kesalahan </div>
<? } } } ?>
                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <div class="white-box">
                                <h4><i class="ti-location-arrow"></i> Transfer Saldo</h4>
                                <hr>
                                <!-- start content -->
		                  <form class="form-horizontal" method="POST">
		                    <div class="form-group">
		                      <label class="col-md-12">Username</label>
		                      <div class="col-md-12">
		                        <input type="text" class="form-control" placeholder="Username" name="username" id="username">
		                      </div>
		                    </div>
		                     <div class="form-group">
		                      <label class="col-md-12">Jumlah</label>
		                      <div class="col-md-12">
<?php if ($level =='Member'){ ?>
 <input type="text" class="form-control" placeholder="Jumlah" name="jumlah" id="jumlah" disabled>
<?php } else if ($level =='Agen'){ ?>
 <input type="text" class="form-control" placeholder="Jumlah" name="jumlah" id="jumlah" disabled>
<?php } else if ($level =='Reseller') { ?>
 <input type="text" class="form-control" placeholder="Jumlah" name="jumlah" id="jumlah">
<?php } else if ($level =='Admin') { ?>
 <input type="text" class="form-control" placeholder="Jumlah" name="jumlah" id="jumlah">
				                           <?php } ?>
		                      </div>
		                    </div>
		                    <div class="form-group m-b-0">
		                      <div class="col-md-12">
		                        <button type="submit" class="btn btn-purple waves-effect waves-light" name="send">SUBMIT</button>
		                      </div>
		                    </div>
		                  </form>
                                <!-- end content -->
                            </div>

                        </div>
                        <!-- col -->
                    </div>