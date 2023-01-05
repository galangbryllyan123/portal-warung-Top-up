<?php
// Script By Aditama Gilang Farel

if(!$username) {
	header('location:../login.php');
} ?>

                    <!-- Page-Title -->
                    <div class="row title_bg">
                        <div class="col-sm-12">
                            <h4 class="page-title">Add User</h4>
                            	<ol class="breadcrumb">
                            		<li><a href="#">Dashboard</a></li>
                            		<li class="active">Add User</li>
                            	</ol>
                        </div>
                    </div>
                    <!-- Page Title End -->
<?php if (isset($_POST['add'])) {
// memulai proses add user

$add_username = $_POST['username'];
$add_password = $_POST['password'];
$add_level = $_POST['level'];
$date = date("Y-m-d");
// mencari data di database
$cekdata = mysql_query("SELECT * FROM user WHERE username = '$add_username'");
$sdata = mysql_fetch_array($cekdata);
$scount = mysql_num_rows($cekdata);
$mybalance = $tampil['balance'];
$username = $tampil['username'];
if ( $add_level == "Member"){
$harga = '4000';
$bonus_saldo == '5000';
levelnya == 'Member';
} else  if ( $add_level == "Agen"){
$harga = '23000';
$bonus_saldo == '15000';
$levelnya == 'Agen';
} else if ( $add_level == "Reseller"){
$harga = '0';
$bonus_saldo == '25000';
$levelnya == 'Reseller';
} else  if ( $add_level == "Admin"){
$harga = '-100';
$levelnya == 'Kosong';
}
// memulai eksekusi
if ($scount > 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Username sudah digunakan. </div>
<? } else if (!$add_username || !$add_password) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Masih ada data yang kosong. </div>
<? } else if (strlen($add_password) < 5) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Password minimal 5 karakter. </div>
<? } else if (strlen($add_password) > 10) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Password maksimal 10 karakter. </div>
<? } else if ($add_level == "Admin") { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Terjadi Kesalahan </div>
<? } else if ($mybalance < $harga)  { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Saldo Tidak Cukup </div>
<? } else {
$send = mysql_query("INSERT INTO user(username, password, balance, level, register, balance_used) VALUES ('$add_username','$add_password','$bonus_saldo','$levelnya','$date','0')");
	$send = mysql_query("UPDATE user SET balance = balance-$harga WHERE username = '$username'");
if ($send) { ?>
<div class="alert alert-info">
<font color="black">
<strong>Success: </strong> Add user berhasil!<br />
Username: <?php echo $add_username; ?><br />
Password: <?php echo $add_password; ?><br />
Balance: <?php echo $bonus_saldo; ?><br />
Level: <?php echo $levelnya; ?><br />
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
                                <h4><i class="ti-shopping-cart"></i> New Order</h4>
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
		                      <label class="col-md-12">Password</label>
		                      <div class="col-md-12">

		                        <input type="text" class="form-control" placeholder="Username" name="password" id="password">
		                        
		                      </div>
		                    </div>
		                     <div class="form-group">
		                      <label class="col-md-12">Level</label>
		                      <div class="col-md-12">
		                       <select class="form-control" name="level" id="level">
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
		                        <button type="submit" class="btn btn-purple waves-effect waves-light" name="add">Submit</button>
		                      </div>
		                    </div>
		                  </form>
                                <!-- end content -->
                            </div>

                        </div>
                        <!-- col -->
                    </div>