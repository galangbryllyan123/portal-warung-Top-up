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
                            		<li><a href="#">Home</a></li>
                            		<li class="active">Ganti Password</li>
                            	</ol>
                        </div>
                    </div>
                    <!-- Page Title End -->
<?php if (isset($_POST['change-password'])) {
$npass = $_POST['npass'];
$npass2 = $_POST['npass2'];

if ($npass !== $npass2) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Data Yang Dimasukkan Tidak Sesuai. </div>
<? } else if (strlen($npass) < 5) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Password Minimal 5 Karakter. </div>
<? } else if (strlen($npass) > 10) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Password Maksimal 10 Karakter. </div>
<? } else {
	$send = mysql_query("UPDATE user SET password = '$npass' WHERE username = '$username'");
if ($send) { ?>
<div class="alert alert-info"> <strong>Success :) </strong> Password Berhasil Diganti Menjadi <font color="red"><?php echo $npass; ?></font>. </div>
<? } else { ?>
Database error!
<? } } } else { ?>
<div class="alert alert-info"> <strong>INFO : </strong> Password Minimal 5 Karakter Dan Maksimal 10 Karakter. </div>
<? } ?>
                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <div class="white-box">
                                <h4><i class="fa fa-gear"></i> Ganti Password</h4>
                                <hr>
                                <!-- start content -->
		                  <form class="form-horizontal" method="POST">
		                    <div class="form-group">
		                      <label class="col-md-12">Username</label>
		                      <div class="col-md-12">
		                        <input type="text" class="form-control" value="<?php echo $username; ?>" readonly>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Masukan Password Baru</label>
		                      <div class="col-md-12">
		                        <input type="password" class="form-control" name="npass" placeholder="Masukan Password Baru" required>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Masukan Ulang Password Baru</label>
		                      <div class="col-md-12">
		                        <input type="password" class="form-control" name="npass2" placeholder="Masukan Ulang Password Baru" required>
		                      </div>
		                    </div>
		                    <div class="form-group m-b-0">
		                      <div class="col-md-12">
		                        <button type="submit" class="btn btn-info waves-effect waves-light" name="change-password">SUBMIT</button>
		                      </div>
		                    </div>
		                  </form>
                                <!-- end content -->
                            </div>

                        </div>
                        <!-- col -->
                    </div>
                    <!-- Row-->