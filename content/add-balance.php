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
                            		<li class="active">Top Up Saldo</li>
                            	</ol>
                        </div>
                    </div>
                    <!-- Page Title End -->
<?php if (isset($_POST['balance'])) {
$method = $_POST['method'];
$quantity = $_POST['quantity'];

if ($method == "BANK") {
$getbal = $quantity;
$payto = "NOREK: 123456789 A/N ADMIN";
} else if ($method == "PULSA") {
$getbal = $quantity;
$payto = "0812-1947-9446 (Telkomsel)";
}

if (!$quantity || !$method) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Masih ada data yang kosong. </div>
<? } else if ($quantity < 10000) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Minimal 10000. </div>
<? } else {
$kode = rand(0000,9999);
$kode2 = rand(0000,9999);
	$send = mysql_query("INSERT INTO request_balance(kode, username, quantity, method, status, date, time) VALUES ('$kode$kode2','$username','$getbal','$method','Pending','$date','$time')");
if ($send) { ?>
<div class="alert alert-info">
<font color="black">
<strong>Success : </strong> Top Up Saldo Berhasil :)<br />
Kode Request: <?php echo $kode; ?><?php echo $kode2; ?><br />
Method: <?php echo $method; ?><br />
Quantity: <?php echo $quantity; ?><br />
Get Balance: <?php echo $getbal; ?><br />
Status: Pending<br />
Date: <?php echo $date; ?>
<br /><br />
Kirim pembayaran ke : <?php echo $payto; ?>
</font>
</div>
<? } else { ?>
Database error!
<? } } } else { ?>
<div class="alert alert-info"> <strong>WAJIB BACA !!! </strong><br />
<b>Cara Melakukan Top Up Saldo Otomatis :</b></br >
1).  Pilih Metode Pembayaran Top Up With <span class="label label-inverse">Pulsa T-Sel</span><br />
2).  Kemudian Masukan Jumlah Biaya Yang Ingin Dijadikan Saldo<br />
3).  Setelah Memasukan Jumlah Biaya Di List <span class="label label-inverse">Jumlah Transfer</span> Maka Akan Muncul Total Saldo Yang Akan Kamu Dapatkan di List <span class="label label-inverse">Saldo Yang Di Dapat</span><br />
4).  Jika Sudah Melakukan Panduan No.1 - No. 3, Maka Klik Tombol <span class="label label-primary">SUBMIT</span><br />
5).  Sehabis Melakukan Panduan No.3 - No. 4, Akan Muncul <i>Result Box</i> Atau Pesan Yang Berisi Kode Top Up, Tujuan Pembayaran, Dll. <br />
6).  Kirim Pembayaran Ke Nomor Yang Sudah Disediakan Di <i>Result Box</i> Dan Tunggu Saldo Anda Dalam Waktu 1 - 5 Menit. Jika Saldo Tidak Masuk Dalam Kurun Waktu 1 - 5 Menit, Segera Hubungi <a href="https://www.facebook.com/agfaditamagilangfarel"><span class="label label-danger">ADMIN</span></a></div>
<? } ?>
                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <div class="white-box">
                                <h4><i class="fa fa-credit-card"></i> Top Up Saldo</h4>
                                <hr>
                                <!-- start content -->
		                  <form class="form-horizontal" method="POST">
		                    <div class="form-group">
		                      <label class="col-md-12">Method</label>
		                      <div class="col-md-12">
		                        <select class="form-control" name="method" id="method">
		                          <option value="0">Pilih Layanan</option>
		                          <option value="PULSA">Pulsa T-Sel</option>
		                        </select>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <div class="col-md-6">
			                      <label>Jumlah Transfer</label>
			                      <div>
			                        <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Jumlah Biaya Yang Ingin Dijadikan Saldo" onkeyup="getbal(this.value).value;" required>
			                      </div>
		                      </div>
		                      <div class="col-md-6">
			                      <label>Saldo Yang Didapat</label>
			                      <div class="input-group"><span class="input-group-addon">Rp.</span>
			                        <input type="number" class="form-control" id="getbalance" value="0" readonly>
			                      </div>
		                      </div>
		                    </div>
		                    <div class="form-group m-b-0">
		                      <div class="col-md-12">
		                        <button type="submit" class="btn btn-purple waves-effect waves-light" name="balance">SUBMIT</button>
		                      </div>
		                    </div>
		                  </form>
                                <!-- end content -->
                            </div>

                        </div>
                        <!-- col -->
                    </div>
                    <!-- Row-->