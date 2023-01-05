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
                            		<li class="active">Tambah User</li>
                            	</ol>
                        </div>
                    </div>
                    <!-- Page Title End -->
<?php if (isset($_POST['add'])) {
// memulai proses add user

$add_username = $_POST['username'];
$password = $_POST['password'];
$level_nya = $_POST['level'];
$date = date("Y-m-d");
if ($level_nya == "Member"){
$harga = "2000";
$bonus_saldo = '0';
$level_nya2 = 'Member';
} else  if ($level_nya == "Agen"){
$harga = '20000';
$bonus_saldo = '15000';
$level_nya2 = 'Agen';
} else if ($level_nya == "Reseller"){
$harga = '35000';
$bonus_saldo = '30000';
$level_nya2 = 'Reseller';
} else  if ($level_nya == "Admin"){
$harga = '-100';
$level_nya2 = 'Kosong';
}
// mencari data di database
$cekdata = mysql_query("SELECT * FROM user WHERE username = '$add_username'");
$sdata = mysql_fetch_array($cekdata);
$scount = mysql_num_rows($cekdata);
$mybalance = $tampil['balance'];
$username = $tampil['username'];
// memulai eksekusi
if ($scount > 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Username Sudah Digunakan. </div>
<? } else if (!$add_username || !$password) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Masih Ada Data Yang Kosong. </div>
<? } else if (strlen($password) < 5) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Password Minimal 5 Karakter. </div>
<? } else if (strlen($password) > 10) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Password Maksimal 10 Karakter. </div>
<? } else if ($add_level == "Admin") { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Terjadi Kesalahan </div>
<? } else if ($mybalance < $harga)  { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Saldo Tidak Cukup </div>
<? } else {
$send = mysql_query("INSERT INTO user(username, password, balance, level, register, balance_used, status) VALUES ('$add_username','$password','$bonus_saldo','$level_nya2','$username','0','Aktif')");
	$send = mysql_query("UPDATE user SET balance = balance-$harga WHERE username = '$username'");
if ($send) { ?>
<div class="alert alert-info">
<font color="black">
<strong>Success : </strong> Tambah User Berhasil :)<br />
Username: <?php echo $add_username; ?><br />
Password: <?php echo $password; ?><br />
Balance: <?php echo $bonus_saldo; ?><br />
Level: <?php echo $level_nya2; ?><br />
Date: <?php echo $date; ?>
</font>
</div>
<?php } else { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Terjadi KESALAHAN </div>
<? } } } ?>
                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <div class="white-box">
                                <h4><i class="fa fa-user m-r-5"></i> Tambah User</h4>
                                <hr>
                                <!-- start content -->
		                  <form class="form-horizontal" method="POST">
		                    <div class="form-group">
		                      <label class="col-md-12">Username</label>
		                      <div class="col-md-12">
		                        <input type="text" class="form-control" placeholder="Username" name="username">
		                      </div>
		                    </div>
		                   <div class="form-group">
		                      <label class="col-md-12">Password</label>
		                      <div class="col-md-12">
		                        <input type="text" class="form-control" placeholder="password" name="password">
		                      </div>
		                    </div>
 <div class="form-group">
		                      <label class="col-md-12">Level</label>
		                      <div class="col-md-12">
				                        <select class="form-control" name="level">
<?php if ($level =='Member'){ ?>
<?php } else if ($level =='Agen'){ ?>
				                          <option value="Member">Member</option>
<?php } else if ($level =='Reseller') { ?>
<option value="Member">Member</option>
				                          <option value="Agen">Agen</option>
<?php } else if ($level =='Admin') { ?>
<option value="Member">Member</option>
				                          <option value="Agen">Agen</option>
				                          <option value="Reseller">Reseller</option>
				                           <?php } ?>
				                        </select>
		                      </div>
		                    </div>
		                    <div class="form-group m-b-0">
		                      <div class="col-md-12">
		                        <button type="submit" class="btn btn-purple waves-effect waves-light" name="add">SUBMIT</button>
		                      </div>
		                    </div>
		                  </form>
                                <!-- end content -->
                            </div>

                        </div>
                        <!-- col -->
                    </div>