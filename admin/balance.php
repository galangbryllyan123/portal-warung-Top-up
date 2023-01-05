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
                            		<li class="active">Top Up Saldo Request</li>
                            	</ol>
                        </div>
                    </div>
                    <!-- Page Title End -->
<?php if (isset($_GET['id'])) {
$edit_id = $_GET['id'];

$queryb = mysql_query("SELECT * FROM service WHERE no = '$edit_id'");
$datab = mysql_fetch_array($queryb);
$countb = mysql_num_rows($queryb);

$edit_service = $datab['service'];
$edit_category = $datab['category'];
$edit_rate = $datab['rate'];
$edit_min = $datab['min'];
$edit_max = $datab['max'];
$edit_provider = $datab['provider'];
$edit_providerid = $datab['provider_id'];
$edit_status = $datab['status'];

if ($countb == 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Service tidak ditemukan. </div>
<? } else { ?>
                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <div class="white-box bg-warning">
                                <h4><i class="ti-settings"></i> Edit Service</h4>
                                <hr>
                                <!-- start content -->
		                  <form class="form-horizontal" method="POST" action="?admin=service">
		                    <div class="form-group">
		                      <label class="col-md-12">Service</label>
		                      <div class="col-md-12">
		                        <input type="hidden" class="form-control" value="<?php echo $edit_id; ?>" name="id">
		                        <input type="text" class="form-control" value="<?php echo $edit_service; ?>" name="service" required>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Rate</label>
		                      <div class="col-md-12">
		                        <input type="text" class="form-control" name="rate" value="<?php echo $edit_rate; ?>" required>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Min</label>
		                      <div class="col-md-12">
		                        <input type="number" class="form-control" name="min" value="<?php echo $edit_min; ?>" required>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Max</label>
		                      <div class="col-md-12">
		                        <input type="number" class="form-control" name="max" value="<?php echo $edit_max; ?>" required>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Provider</label>
		                      <div class="col-md-12">
				                        <select class="form-control" name="provider">
				                          <option value="<?php echo $edit_provider; ?>"><?php echo $edit_provider; ?> (Selected)</option>
				                          <option value="BULK">BULK</option>
				                          <option value="PEAKERR">PEAKERR</option>
				                        </select>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Provider ID</label>
		                      <div class="col-md-12">
		                        <input type="number" class="form-control" name="providerid" value="<?php echo $edit_providerid; ?>" required>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Status</label>
		                      <div class="col-md-12">
				                        <select class="form-control" name="status">
				                          <option value="<?php echo $edit_status; ?>"><?php echo $edit_status; ?> (Selected)</option>
				                          <option value="Tersedia">Tersedia</option>
				                          <option value="Tidak tersedia">Tidak tersedia</option>
				                        </select>
		                      </div>
		                    </div>
		                    <div class="form-group m-b-0">
		                      <div class="col-md-12">
		                        <button type="submit" class="btn btn-info waves-effect waves-light" name="edit">Submit</button>
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

<?php if (isset($_GET['kode'])) {
// memulai proses add service

$add_kode = $_GET['kode'];

$queryb = mysql_query("SELECT * FROM request_balance WHERE kode = '$add_kode'");
$datab = mysql_fetch_array($queryb);
$countb = mysql_num_rows($queryb);

$apenerima = $datab['username'];
$agetbal = $datab['quantity'];
$astatus = $datab['status'];

if ($countb == 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Kode request tidak ditemukan. </div>
<? } else if ($astatus == "Success") { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Balance sudah terkirim. </div>
<? } else {
	$send = mysql_query("UPDATE user SET balance = balance+$agetbal WHERE username = '$apenerima'");
	$send = mysql_query("UPDATE request_balance SET status = 'Success' WHERE kode = '$add_kode'");
	$send = mysql_query("INSERT INTO balance_history(username, action, quantity, msg, date, time) VALUES ('$apenerima','Add Balance','$agetbal','User Add Balance. Kode : $add_kode','$date','$time')");

if ($send) { ?>
<div class="alert alert-info">
<font color="black">
<strong>Success: </strong> Add balance berhasil!<br />
To: <?php echo $apenerima; ?><br />
Quantity: <?php echo $agetbal; ?><br />
Kode Request: <?php echo $add_kode; ?><br />
Date: <?php echo $date; ?>
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
                                <h4><i class="fa fa-list"></i> Top Up Saldo Request</h4>
                                <hr>
                                <!-- start content -->
			              <table id="myTable" class="table table-striped">
			                <thead>
			                  <tr>
			                    <th>NO</th>
			                    <th>KODE</th>
			                    <th>USERNAME</th>
			                    <th>METHOD</th>
			                    <th>QUANTITY</th>
			                    <th>STATUS</th>
			                    <th>DATE</th>
			                    <th>ACTION</th>
			                  </tr>
			                </thead>
			                <tbody>
<?php
 $queryu = "SELECT * FROM request_balance ORDER BY id DESC";
 $exe = mysql_query($queryu);
 $cek = mysql_num_rows($exe);
 $no = 1;
 while($row = mysql_fetch_assoc($exe)){
  $kodeb = $row['kode'];
  $usernameb = $row['username'];
  $methodb = $row['method'];
  $quantityb = $row['quantity'];
  $statusb = $row['status'];
  $dateb = $row['date'];
?>
			                  <tr>
			                    <td><?php echo $no; ?></td>
			                    <td><?php echo $kodeb; ?></td>
			                    <td><?php echo $usernameb; ?></td>
			                    <td><?php echo $methodb; ?></td>
			                    <td><?php echo $quantityb; ?></td>
			                    <td>
<?php if ($statusb == "Success") { ?>
<span class="label label-success">
<? } else if ($statusb == "Pending") { ?>
<span class="label label-warning">
<? } ?>
<?php echo $statusb; ?>
</span>
</td>
			                    <td><?php echo $dateb; ?></td>
			                    <td><?php if ($statusb == "Success") { ?><a class="btn btn-sm btn-block btn-danger waves-effect waves-light"> SENT</a><? } else if ($statusb == "Pending") { ?><a class="btn btn-sm btn-block btn-success waves-effect waves-light" href="?admin=balance&kode=<?php echo $kodeb; ?>"> SEND</a><? } ?></td>
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