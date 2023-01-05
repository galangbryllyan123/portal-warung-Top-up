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
                            		<li class="active">Edit Shell Garena</li>
                            	</ol>
                        </div>
                    </div>
                    <!-- Page Title End -->
<?php if (isset($_GET['id'])) {
$edit_id = $_GET['id'];

$queryb = mysql_query("SELECT * FROM garena WHERE code = '$edit_id'");
$datab = mysql_fetch_array($queryb);
$countb = mysql_num_rows($queryb);

$edit_nama = $datab['nama'];
$edit_code = $datab['code'];
$edit_jumlah = $datab['jumlah'];
$edit_harga = $datab['harga'];

if ($countb == 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Cash Tidak Ditemukan. </div>
<? } else { ?>
                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <div class="white-box bg-warning">
                                <h4><i class="fa fa-gear"></i> Edit Cash</h4>
                                <hr>
                                <!-- start content -->
		                  <form class="form-horizontal" method="POST" action="?admin=garena-cash">
		                    <div class="form-group">
		                      <label class="col-md-12">Nama</label>
		                      <div class="col-md-12">
		                        <input type="text" class="form-control" value="<?php echo $edit_nama; ?>" name="nama" required>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Code</label>
		                      <div class="col-md-12">
		                        <input type="text" class="form-control" name="code" value="<?php echo $edit_code; ?>" required>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Jumlah</label>
		                      <div class="col-md-12">
		                        <input type="number" class="form-control" name="jumlah" value="<?php echo $edit_jumlah; ?>" required>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Harga</label>
		                      <div class="col-md-12">
		                        <input type="number" class="form-control" name="harga" value="<?php echo $edit_harga; ?>" required>
		                      </div>
		                    </div>
		                    <div class="form-group m-b-0">
		                      <div class="col-md-12">
		                        <button type="submit" class="btn btn-info waves-effect waves-light" name="edit">SUBMITF</button>
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
// memulai proses add service

$add_nama = $_POST['nama'];
$add_code = $_POST['code'];
$add_jumlah = $_POST['jumlah'];
$add_harga = $_POST['harga'];

if (!$add_nama || !$add_code || !$add_jumlah || !$add_harga) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Masih ada data yang kosong.</div>
<? } else {
	$send = mysql_query("INSERT INTO garena(nama, code, jumlah, harga) VALUES ('$add_nama','$add_code','$add_jumlah','$add_harga')");

if ($send) { ?>
<div class="alert alert-info">
<font color="black">
<strong>Success : </strong> Tambah Cash Berhasil :)<br />
Nama: <?php echo $add_nama; ?><br />
Code: <?php echo $add_code; ?><br />
Jumlah: <?php echo $add_jumlah; ?><br />
Harga: <?php echo $add_harga; ?><br />
Date: <?php echo $date; ?>
</font>
</div>
<? } else { ?>
Database error!
<? } } ?>

<? } else if (isset($_POST['delete'])) {
// memulai proses delete user

$add_id = $_POST['idservice'];

// mencari data di database
$cekdata = mysql_query("SELECT * FROM garena WHERE code = '$add_id'");
$sdata = mysql_fetch_array($cekdata);
$scount = mysql_num_rows($cekdata);

$show_code = $sdata['code'];
$show_harga = $sdata['harga'];

// memulai eksekusi
if ($scount == 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Cash tidak ditemukan. </div>
<? } else {
$send = mysql_query("DELETE FROM garena WHERE code = '$add_id'");

if ($send) { ?>
<div class="alert alert-info">
<font color="black">
<strong>Success : </strong> Hapus Cash Berhasil :)<br />
Code: <?php echo $show_code; ?><br />
Harga: <?php echo $show_harga; ?><br />
Date: <?php echo $date; ?>
</font>
</div>
<? } else { ?>
Database error!
<? } } ?>

<? } else if (isset($_POST['edit'])) {
// memulai proses edit user

$add_nama = $_POST['nama'];
$add_code = $_POST['code'];
$add_jumlah = $_POST['jumlah'];
$add_harga = $_POST['harga'];

// mencari data di database
$cekdata = mysql_query("SELECT * FROM garena WHERE code = '$add_code'");
$sdata = mysql_fetch_array($cekdata);
$scount = mysql_num_rows($cekdata);

// memulai eksekusi
if ($scount == 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Cash tidak ditemukan. </div>
<? } else if (!$add_nama || !$add_code || !$add_jumlah || !$add_harga) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Masih ada data yang kosong. </div>
<? } else {
	$send = mysql_query("UPDATE garena SET nama = '$add_nama' WHERE code = '$add_code'");
	$send = mysql_query("UPDATE garena SET code = '$add_code' WHERE code = '$add_code'");
	$send = mysql_query("UPDATE garena SET jumlah = '$add_jumlah' WHERE code = '$add_code'");
	$send = mysql_query("UPDATE garena SET harga = '$add_harga' WHERE code = '$add_code'");

if ($send) { ?>
<div class="alert alert-info">
<font color="black">
<strong>Success : </strong> Edit Cash Berhasil :)<br />
Nama: <?php echo $add_nama; ?><br />
Code: <?php echo $add_code; ?><br />
Jumlah: <?php echo $add_jumlah; ?><br />
Harga: <?php echo $add_harga; ?><br />
DATE: <?php echo $date; ?>
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
                                <h4><i class="fa fa-gear"></i> Edit Shell Garena</h4>
                                <hr>
                                <!-- start content -->
                                <div class="row">
                                	<div class="col-md-6">
                                		<a class="btn btn-block btn-success waves-effect waves-light" data-toggle="modal" data-target="#add-cash"> Tambah Cash</a>
                                	</div>
                                	<div class="col-md-6">
                                		<a class="btn btn-block btn-danger waves-effect waves-light" data-toggle="modal" data-target="#delete-cash"> Hapus Cash</a>
                                	</div>
                                </div>
			              <div id="delete-cash" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			                <div class="modal-dialog">
			                  <div class="modal-content">
			                    <div class="modal-header">
			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                      <h4 class="modal-title">Hapus Cash</h4>
			                    </div>
			                    <form method="POST">
			                    <div class="modal-body">
			                        <div class="form-group">
			                          <label for="recipient-name" class="control-label">ID:</label>
		                                          <select class="form-control select2" name="idservice">
<?php
$querya = "SELECT * FROM garena ORDER BY code ASC";
$exea = mysql_query($querya);
$noa = 1;
while($rowa = mysql_fetch_assoc($exea)){
$ida = $rowa['code'];
$servicea = $rowa['jumlah'];
?>
		                                            <option value="<?php echo $ida; ?>"><?php echo $ida; ?> (<?php echo $servicea; ?> GCASH)</option>
<? $noa++; } ?>
		                                          </select>
			                        </div>
			                    </div>
			                    <div class="modal-footer">
			                      <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
			                      <button type="submit" class="btn btn-inverse waves-effect waves-light" name="delete">Delete</button>
			                    </div>
			                    </form>
			                  </div>
			                </div>
			              </div>

			              <div id="add-cash" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			                <div class="modal-dialog">
			                  <div class="modal-content">
			                    <div class="modal-header">
			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                      <h4 class="modal-title">Tambah Cash</h4>
			                    </div>
			                    <form method="POST">
			                    <div class="modal-body">
				                    <div class="form-group">
				                      <label>Nama:</label>
				                      <div>
				                        <input type="text" class="form-control" placeholder="1000 GCASH" name="nama">
				                      </div>
				                    </div>
				                    <div class="form-group">
				                      <label>Code:</label>
				                      <div>
				                        <input type="text" class="form-control" placeholder="1234-5678-9101-1121" name="code">
				                      </div>
				                    </div>
				                    <div class="form-group">
				                      <label>Jumlah:</label>
				                      <div>
				                        <input type="number" class="form-control" placeholder="1000" name="jumlah">
				                      </div>
				                    </div>
				                    <div class="form-group">
				                      <label>Harga:</label>
				                      <div>
				                        <input type="number" class="form-control" placeholder="12000" name="harga">
				                      </div>
			                    </div>
			                    <div class="modal-footer">
			                      <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
			                      <button type="submit" class="btn btn-inverse waves-effect waves-light" name="add">Add</button>
			                    </div>
			                    </form>
			                  </div>
			                </div>
			              </div>
			              
                                <!-- end content -->
                            </div>
                            

                            <div class="white-box">
                                <h4><i class="fa fa-list"></i> Daftar Cash</h4>
                                <hr>
                                <!-- start content -->
			              <table id="myTable" class="table table-striped" style="font-size: 10px;">
			                <thead>
			                  <tr>
			                    <th>Nama</th>
			                    <th>Code</th>
			                    <th>Jumlah</th>
			                    <th>Harga</th>
			                  </tr>
			                </thead>
			                <tbody>
<?php
 $queryu = "SELECT * FROM garena ORDER BY code ASC";
 $exe = mysql_query($queryu);
 $cek = mysql_num_rows($exe);
 $no = 1;
 while($row = mysql_fetch_assoc($exe)){
  $nama = $row['nama'];
  $code = $row['code'];
  $jumlah = $row['jumlah'];
  $harga = $row['harga'];
?>
			                  <tr>
			                    <td><?php echo $nama; ?></td>
			                    <td><?php echo $code; ?></td>
			                    <td><?php echo $jumlah; ?></td>
			                    <td><?php echo $harga; ?></td>
			                    <td><a class="btn btn-sm btn-block btn-success waves-effect waves-light" href="?admin=garena-cash&id=<?php echo $code; ?>"> Edit</a></td>
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