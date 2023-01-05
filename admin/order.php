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
                            		<li class="active">Edit Order</li>
                            	</ol>
                        </div>
                    </div>
                    <!-- Page Title End -->
<?php if (isset($_GET['id'])) {
$edit_id = $_GET['id'];

$queryb = mysql_query("SELECT * FROM order_history WHERE id = '$edit_id'");
$datab = mysql_fetch_array($queryb);
$countb = mysql_num_rows($queryb);

$edit_service = $datab['service'];
$edit_status = $datab['status'];

if ($countb == 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Server Tidak Ditemukan. </div>
<? } else { ?>
                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <div class="white-box bg-warning">
                                <h4><i class="fa fa-gear"></i> Edit Order</h4>
                                <hr>
                                <!-- start content -->
		                  <form class="form-horizontal" method="POST" action="?admin=order">
		                    <div class="form-group">
		                      <label class="col-md-12">Server</label>
		                      <div class="col-md-12">
		                        <input type="hidden" value="<?php echo $edit_id; ?>" name="id">
		                        <input type="text" class="form-control" value="<?php echo $edit_service; ?>" readonly>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Status</label>
		                      <div class="col-md-12">
				                        <select class="form-control" name="status">
				                          <option value="<?php echo $edit_status; ?>"><?php echo $edit_status; ?> (Selected)</option>
				                          <option value="Processing">Processing</option>
				                          <option value="Pending">Pending</option>
				                          <option value="Error">Error</option>
				                          <option value="Success">Success</option>
				                        </select>
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

<?php if (isset($_POST['edit'])) {
// memulai proses edit order

$add_id = $_POST['id'];
$add_status = $_POST['status'];

// mencari data di database
$cekdata = mysql_query("SELECT * FROM order_history WHERE id = '$add_id'");
$sdata = mysql_fetch_array($cekdata);
$scount = mysql_num_rows($cekdata);

$show_service = $sdata['service'];
$show_orderid = $sdata['order_id'];

// memulai eksekusi
if ($scount == 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> User tidak ditemukan. </div>
<? } else {
	$send = mysql_query("UPDATE order_history SET status = '$add_status' WHERE id = '$add_id'");

if ($send) { ?>
<div class="alert alert-info">
<font color="black">
<strong>Success: </strong> Edit order berhasil!<br />
Service: <?php echo $show_service; ?><br />
Order ID: <?php echo $show_orderid; ?><br />
Status: <?php echo $add_status; ?><br />
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
                                <h4><i class="fa fa-gear"></i> Daftar Order</h4>
                                <hr>
                                <!-- start content -->
			              <table id="myTable" class="table table-striped" style="font-size: 12px;">
			                <thead>
			                  <tr>
			                    <th>NO</th>
			                    <th>ORDER ID</th>
			                    <th>BUYER</th>
			                    <th>SERVICE</th>
			                    <th>LINK</th>
			                    <th>QUANTITY</th>
			                    <th>PRICE</th>
			                    <th>STATUS</th>
			                    <th>DATE</th>
			                    <th>ACTION</th>
			                  </tr>
			                </thead>
			                <tbody>
<?php
 $queryu = "SELECT * FROM order_history ORDER BY id DESC";
 $exe = mysql_query($queryu);
 $cek = mysql_num_rows($exe);
 $no = 1;
 while($row = mysql_fetch_assoc($exe)){
  $id = $row['id'];
  $order_id = $row['order_id'];
  $service = $row['service'];
  $link = $row['link'];
  $quantity = $row['quantity'];
  $price = $row['price'];
  $date = $row['date'];
  $status = $row['status'];
  $buyer = $row['buyer'];
?>
			                  <tr>
			                    <td><?php echo $no; ?></td>
			                    <td><?php echo $order_id; ?></td>
			                    <td><?php echo $buyer; ?></td>
			                    <td><?php echo $service; ?></td>
			                    <td><?php echo $link; ?></td>
			                    <td><?php echo $quantity; ?></td>
			                    <td><?php echo $price; ?></td>
			                    <td>
<?php if ($status == "Success") { ?>
<span class="label label-success">
<? } else if ($status == "Processing") { ?>
<span class="label label-warning">
<? } else if ($status == "Pending") { ?>
<span class="label label-warning">
<? } else if ($status == "Errror") { ?>
<span class="label label-danger">
<? } ?>
<?php echo $status; ?>
</span>
</td>
			                    <td><?php echo $date; ?></td>
			                    <td><a class="btn btn-sm btn-block btn-success waves-effect waves-light" href="?admin=order&id=<?php echo $id; ?>"> Edit</a></td>
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