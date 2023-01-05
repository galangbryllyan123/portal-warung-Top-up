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

$queryb = mysql_query("SELECT * FROM provider WHERE id = '$edit_id'");
$datab = mysql_fetch_array($queryb);
$countb = mysql_num_rows($queryb);

$edit_service = $datab['api_key'];

if ($countb == 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> API Tidak Ditemukan. </div>
<? } else { ?>
                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <div class="white-box bg-warning">
                                <h4><i class="fa fa-gear"></i> Edit API</h4>
                                <hr>
                                <!-- start content -->
		                  <form class="form-horizontal" method="POST" action="?admin=api">
		                    <div class="form-group">
		                      <label class="col-md-12">API 1</label>
		                      <div class="col-md-12">
		                        <input type="hidden" value="<?php echo $edit_id; ?>" name="id">
		                        <input type="text" class="form-control" name="apikey" value="<?php echo $edit_service; ?>">
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
$add_status = $_POST['apikey'];

// mencari data di database
$cekdata = mysql_query("SELECT * FROM provider WHERE id = '$add_id'");
$sdata = mysql_fetch_array($cekdata);
$scount = mysql_num_rows($cekdata);

$show_service = $sdata['api_key'];

// memulai eksekusi
if ($scount == 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> User tidak ditemukan. </div>
<? } else {
	$send = mysql_query("UPDATE provider SET api_key = '$add_status' WHERE id = '$add_id'");

if ($send) { ?>
<div class="alert alert-info">
<font color="black">
<strong>Success: </strong> Edit api berhasil!
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
                                <h4><i class="fa fa-gear"></i> Daftar API</h4>
                                <hr>
                                <!-- start content -->
			              <table id="myTable" class="table table-striped" style="font-size: 12px;">
			                <thead>
			                  <tr>
			                    <th>APIKEY</th>
			                    <th>ACTION</th>
			                  </tr>
			                </thead>
			                <tbody>
<?php
 $queryu = "SELECT * FROM provider ORDER BY id DESC";
 $exe = mysql_query($queryu);
 $cek = mysql_num_rows($exe);
 $no = 1;
 while($row = mysql_fetch_assoc($exe)){
  $apikey = $row['api_key'];
  $id = $row['id'];
?>
			                  <tr>
			                    <td><?php echo $apikey; ?></td>
			                    <td><a class="btn btn-sm btn-block btn-success waves-effect waves-light" href="?admin=api&id=<?php echo $id; ?>"> Edit</a></td>
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