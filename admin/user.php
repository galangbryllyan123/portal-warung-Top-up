<?php
// Script By Aditama Gilang Farel

if($level !== "Admin") {
	header('location:/');
} ?>

                    <!-- Page-Title -->
                    <div class="row title_bg">
                        <div class="col-sm-12">
                            <h4 class="page-title">INSTANT CUBES</h4>
                            	<ol class="breadcrumb">
                            		<li><a href="#">Admin Panel</a></li>
                            		<li class="active">Edit User</li>
                            	</ol>
                        </div>
                    </div>
                    <!-- Page Title End -->
<?php if (isset($_GET['id'])) {
$edit_id = $_GET['id'];

$queryb = mysql_query("SELECT * FROM user WHERE id = '$edit_id'");
$datab = mysql_fetch_array($queryb);
$countb = mysql_num_rows($queryb);

$eusername = $datab['username'];
$epassword = $datab['password'];
$ebalance = $datab['balance'];
$elevel = $datab['level'];
if ($countb == 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> User Tidak Ditemukan. </div>
<? } else { ?>
                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <div class="white-box bg-warning">
                                <h4><i class="fa fa-gear"></i> Edit User</h4>
                                <hr>
                                <!-- start content -->
		                  <form class="form-horizontal" method="POST" action="?admin=user">
		                    <div class="form-group">
		                      <label class="col-md-12">Username</label>
		                      <div class="col-md-12">
		                        <input type="text" class="form-control" value="<?php echo $eusername; ?>" name="username" readonly>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Password</label>
		                      <div class="col-md-12">
		                        <input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo $epassword; ?>" required>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Saldo</label>
		                      <div class="col-md-12">
		                        <input type="number" class="form-control" name="balance" placeholder="Balance" value="<?php echo $ebalance; ?>" required>
		                      </div>
		                    </div>
		                    <div class="form-group m-b-0">
		                      <div class="col-md-12">
		                        <button type="submit" class="btn btn-info waves-effect waves-light" name="edit">SUBMIT</button>
		                      </div>
		                    </div>
		                  </form>
                                <!-- end content -->
                            </div>

                        </div>
                        <!-- col -->
                    </div>
                    <!-- Row-->
<? } } else { ?><? } ?>

<?php if (isset($_POST['add'])) {
// memulai proses add user

$add_username = $_POST['username'];
$add_password = $_POST['password'];
$add_balance = $_POST['balance'];
$add_level = $_POST['level'];

// mencari data di database
$cekdata = mysql_query("SELECT * FROM user WHERE username = '$add_username'");
$sdata = mysql_fetch_array($cekdata);
$scount = mysql_num_rows($cekdata);

// memulai eksekusi
if ($scount > 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Username Sudah Digunakan. </div>
<? } else if (!$add_username || !$add_password) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Masih Ada Data Yang Kosong. </div>
<? } else if (strlen($add_password) < 5) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Password Minimal 5 Karakter. </div>
<? } else if (strlen($add_password) > 10) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Password Maksimal 10 Karakter. </div>
<? } else if ($add_level !== "Member") { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Level Salah. </div>
<? } else {
	$send = mysql_query("INSERT INTO user(username, password, balance, level, register, balance_used, status) VALUES ('$add_username','$add_password','$add_balance','$add_level','$date','0','Aktif')");

if ($send) { ?>
<div class="alert alert-info">
<font color="black">
<strong>Success : </strong> Tambah User Berhasil :)<br />
Username : <?php echo $add_username; ?><br />
Password : <?php echo $add_password; ?><br />
Balance : <?php echo $add_balance; ?><br />
Level : <?php echo $add_level; ?><br />
Date : <?php echo $date; ?>
</font>
</div>
<? } else { ?>
Database error!
<? } } ?>

<? } else if (isset($_POST['delete'])) {
// memulai proses delete user

$add_id = $_POST['iduser'];

// mencari data di database
$cekdata = mysql_query("SELECT * FROM user WHERE id = '$add_id'");
$sdata = mysql_fetch_array($cekdata);
$scount = mysql_num_rows($cekdata);

$show_username = $sdata['username'];

// memulai eksekusi
if ($scount == 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> User Tidak Ditemukan. </div>
<? } else {
$send = mysql_query("DELETE FROM user WHERE id = '$add_id'");

if ($send) { ?>
<div class="alert alert-info">
<font color="black">
<strong>Success : </strong> Hapus User Berhasil :)<br />
Username : <?php echo $show_username; ?><br />
Date : <?php echo $date; ?>
</font>
</div>
<? } else { ?>
Database error!
<? } } ?>

<? } else if (isset($_POST['edit'])) {
// memulai proses edit user

$add_username = $_POST['username'];
$add_password = $_POST['password'];
$add_balance = $_POST['balance'];

// mencari data di database
$cekdata = mysql_query("SELECT * FROM user WHERE username = '$add_username'");
$sdata = mysql_fetch_array($cekdata);
$scount = mysql_num_rows($cekdata);

$show_username = $sdata['username'];
$add_id = $sdata['id'];

// memulai eksekusi
if ($scount == 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> User Tidak Ditemukan. </div>
<? } else if (!$add_password) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Masih Ada Data Yang Kosong. </div>
<? } else if (strlen($add_password) < 5) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Password Minimal 5 Karakter. </div>
<? } else if (strlen($add_password) > 10) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Password Maksimal 10 Karakter. </div>
<? } else {
	$send = mysql_query("UPDATE user SET password = '$add_password' WHERE id = '$add_id'");
	$send = mysql_query("UPDATE user SET balance = '$add_balance' WHERE id = '$add_id'");

if ($send) { ?>
<div class="alert alert-info">
<font color="black">
<strong>Success : </strong> Edit user berhasil :)<br />
Username : <?php echo $show_username; ?><br />
Password : <?php echo $add_password; ?><br />
Balance : <?php echo $add_balance; ?><br />
Date : <?php echo $date; ?>
</font>
</div>
<? } else { ?>
Database error!
<? } } } ?>

                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <div class="white-box">
                                <h4><i class="ti-user"></i> Edit User</h4>
                                <hr>
                                <!-- start content -->
                                <div class="row">
                                	<div class="col-md-6">
                                		<a class="btn btn-block btn-success waves-effect waves-light" data-toggle="modal" data-target="#add-user"> Tambah User</a>
                                	</div>
                                	<div class="col-md-6">
                                		<a class="btn btn-block btn-danger waves-effect waves-light" data-toggle="modal" data-target="#delete-user"> Hapus User</a>
                                	</div>
                                </div>
			              <div id="delete-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			                <div class="modal-dialog">
			                  <div class="modal-content">
			                    <div class="modal-header">
			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                      <h4 class="modal-title">Hapus User</h4>
			                    </div>
			                    <form method="POST">
			                    <div class="modal-body">
			                        <div class="form-group">
			                          <label for="recipient-name" class="control-label">Username :</label>
		                                          <select class="form-control select2" name="iduser">
<?php
$querya = "SELECT * FROM user ORDER BY id ASC";
$exea = mysql_query($querya);
$noa = 1;
while($rowa = mysql_fetch_assoc($exea)){
$ida = $rowa['id'];
$usernamea = $rowa['username']; ?>
		                                            <option value="<?php echo $ida; ?>"><?php echo $usernamea; ?></option>
<? $noa++; } ?>
		                                          </select>
			                        </div>
			                    </div>
			                    <div class="modal-footer">
			                      <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Keluar</button>
			                      <button type="submit" class="btn btn-inverse waves-effect waves-light" name="delete">Hapus</button>
			                    </div>
			                    </form>
			                  </div>
			                </div>
			              </div>

			              <div id="add-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			                <div class="modal-dialog">
			                  <div class="modal-content">
			                    <div class="modal-header">
			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                      <h4 class="modal-title">Tambah User</h4>
			                    </div>
			                    <form method="POST">
			                    <div class="modal-body">
				                    <div class="form-group">
				                      <label>Username:</label>
				                      <div>
				                        <input type="text" class="form-control" placeholder="Username" name="username">
				                      </div>
				                    </div>
				                    <div class="form-group">
				                      <label>Password :</label>
				                      <div>
				                        <input type="text" class="form-control" placeholder="Password" name="password">
				                      </div>
				                    </div>
				                    <div class="form-group">
				                      <label>Saldo :</label>
				                      <div>
				                        <input type="number" class="form-control" placeholder="Saldo" name="balance" value="0">
				                      </div>
				                    </div>
				                    <div class="form-group">
				                      <label>Level :</label>
				                      <div>
				                        <select class="form-control" name="level">
				                          <option value="Member">Member</option>
				                        </select>
				                      </div>
				                    </div>
			                    </div>
			                    <div class="modal-footer">
			                      <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Keluar</button>
			                      <button type="submit" class="btn btn-inverse waves-effect waves-light" name="add">Tambah</button>
			                    </div>
			                    </form>
			                  </div>
			                </div>
			              </div>
			              
                                <!-- end content -->
                            </div>
                            

                            <div class="white-box">
                                <h4><i class="ti-list"></i> Daftar User</h4>
                                <hr>
                                <!-- start content -->
			              <table id="myTable" class="table table-striped">
			                <thead>
			                  <tr>
			                    <th>NO</th>
			                    <th>USERNAME</th>
			                    <th>PASSWORD</th>
			                    <th>LEVEL</th>
			                    <th>REGISTER DATE</th>
			                    <th>BALANCE REMAIN</th>
			                    <th>BALANCE USED</th>
			                    <th>ACTION</th>
			                  </tr>
			                </thead>
			                <tbody>
<?php
 $queryu = "SELECT * FROM user ORDER BY id ASC";
 $exe = mysql_query($queryu);
 $cek = mysql_num_rows($exe);
 $no = 1;
 while($row = mysql_fetch_assoc($exe)){
  $id = $row['id'];
  $usernameu = $row['username'];
  $passwordu = $row['password'];
  $levelu = $row['level'];
  $register = $row['register'];
  $balanceu = "Rp " . number_format($row['balance'],0,",",".");
  $balanceuu = "Rp " . number_format($row['balance_used'],0,",",".");
?>
			                  <tr>
			                    <td><?php echo $no; ?></td>
			                    <td><?php echo $usernameu; ?></td>
			                    <td><?php echo $passwordu; ?></td>
			                    <td><?php echo $levelu; ?></td>
			                    <td><?php echo $register; ?></td>
			                    <td><?php echo $balanceu; ?></td>
			                    <td><?php echo $balanceuu; ?></td>
			                    <td><a class="btn btn-block btn-success waves-effect waves-light" href="?admin=user&id=<?php echo $id; ?>"> Edit</a></td>
			                  </tr>
<?
$no++;
} ?>
			                </tbody>
			              </table>
                                <!-- end content -->
                            </div>

                        </div>
                        <!-- col -->
                    </div>
                    <!-- Row-->

<script>
jQuery(document).ready(function() {
	$(".select2").select2();
});
</script>