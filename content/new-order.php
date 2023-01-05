<?php
// SCRIPT BY ADITAMA GILANG FAREL
// RECODED KHUSUS OPER KE SPEADYMASTER-PANEL.WEB.ID
// Recode? You're Idiot

if(!$username) {
	header('location:../login.php');
} ?>
                    <!-- Page-Title -->
                    <div class="row title_bg">
                        <div class="col-sm-12">
                            <h4 class="page-title">INSTANT CUBES</h4>
                            	<ol class="breadcrumb">
                            		<li><a href="#">Home</a></li>
                            		<li class="active">Mulai Order</li>
                            	</ol>
                        </div>
                    </div>
                    <!-- Page Title End -->
<?php if (isset($_POST['order'])) {
$link = $_POST['link'];
$no = $_POST['service'];
$quantity = $_POST['quantity'];

$dataservice = mysql_query("SELECT * FROM service WHERE no = '$no' AND status = 'Tersedia'");
$sdata = mysql_fetch_array($dataservice);
$scount = mysql_num_rows($dataservice);

$dataprovider = mysql_query("SELECT * FROM provider WHERE code = 'SPEADY'");
$data_provider = mysql_fetch_array($dataprovider);

$min = $sdata['min'];
$max = $sdata['max'];
$service = $sdata['service'];
$rate = $sdata['rate'];
$provider = $sdata['provider'];
$providerid = $sdata['provider_id'];

$price = $quantity*$rate;

if ($scount == 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Service tidak ditemukan. </div>
<? } else if (!$quantity || !$link) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Masih ada data yang kosong. </div>
<? } else if ($quantity < $min) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Quantity tidak sesuai. </div>
<? } else if ($quantity > $max) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Quantity tidak sesuai. </div>
<? } else if ($balance < $price) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Balance tidak mencukupi, silahkan topup. </div>
<? } else {
			
if ($provider == "SPEADY") {
$service = "$providerid"; // service id
$link = "$link"; // link target
$quantity = "$quantity"; // order qantity
$api_link = $data_provider['link'];
$api_key = $data_provider['api_key'];
$postdata = "key=$api_key&action=order&service=$service&link=$link&quantity=$quantity";
$service = $sdata['service'];
    $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$api_link");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$chresult = curl_exec($ch);
curl_close($ch);
$json_result = json_decode($chresult, true);
}
if ($provider == "SPEADY"){
    $order_id = $json_result['order_id'];
} else {
$order_id = rand(0000,9999);
}
if ($provider == "SPEADY" AND $json_result['error'] == TRUE) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Terjadi Kesalahan. </div>
<? } else {
	$send = mysql_query("UPDATE user SET balance = balance-$price WHERE username = '$username'");
	$send = mysql_query("UPDATE user SET balance_used = balance_used+$price WHERE username = '$username'");
	$send = mysql_query("INSERT INTO order_history(order_id, provider, buyer, service, link, quantity, price, status, date, time) VALUES ('$order_id','$provider','$username','$service','$link','$quantity','$price','Processing','$date','$time')");
	$send = mysql_query("INSERT INTO balance_history(username, action, quantity, msg, date, time) VALUES ('$username','Cut Balance','$price','User buy service. Order ID : $order_id','$date','$time')");
if ($send) { ?>
<div class="alert alert-info">
<font color="black">
<strong>Success :) </strong><br />
Order ID: <?php echo $order_id; ?><br />
Service: <?php echo $service; ?><br />
Quantity: <?php echo $quantity; ?><br />
Cut Balance: <?php echo "Rp. " . number_format($price,0,",","."); ?><br />
Date: <?php echo $date; ?>
</font>
</div>
<? } else { ?>
Database error!
<? } } } } else { ?>
<? } ?>
                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <div class="white-box">
                                <h4><i class="fa fa-cart-plus"></i> Mulai Order</h4>
                                <hr>
                                <!-- start content -->
		                  <form class="form-horizontal" method="POST">
		                    <div class="form-group">
		                      <label class="col-md-12">Kategori</label>
		                      <div class="col-md-12">
		                        <select class="form-control" name="category" id="category">
		                          <option value="0">Pilih Kategori</option>
		                          <option value="IG">Instagram</option>
		                          <option value="TW">Twitter</option>
		                          <option value="FB">Facebook</option>
		                          <option value="YT">Youtube</option>
		                          <option value="GP">Google Plus</option>
		                          <option value="VINE">Vine</option>
		                          <option value="SC">Soundcloud</option>
		                          
				   				  		                       </select>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Server</label>
		                      <div class="col-md-12">
		                        <select class="form-control" name="service" id="service">
		                          <option value="0">Pilih Server</option>
		                        </select>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <div class="col-md-4">
			                      <label>Harga/1000</label>
			                      <div class="input-group"><span class="input-group-addon">Rp.</span>
			                        <input type="text" class="form-control" id="price" value="0" readonly>
			                      </div>
		                      </div>
		                      <div class="col-md-4">
			                      <label>Min</label>
			                      <div>
			                        <input type="text" class="form-control" id="min" value="0" readonly>
			                      </div>
		                      </div>
		                      <div class="col-md-4">
			                      <label>Max</label>
			                      <div>
			                        <input type="text" class="form-control" id="max" value="0" readonly>
			                      </div>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <div class="col-md-12">
		                      <label>Username/Link</label>
		                        <input type="text" class="form-control" name="link" placeholder="Username/Link" required>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <div class="col-md-6">
			                      <label>Jumlah Order</label>
			                      <div>
			                        <input type="hidden" class="form-control" id="rate">
			                        <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Jumlah Order" onkeyup="getcut(this.value).value;" required>
			                      </div>
		                      </div>
		                      <div class="col-md-6">
			                      <label>Total Harga</label>
			                      <div class="input-group"><span class="input-group-addon">Rp.</span>
			                        <input type="text" class="form-control" id="cutbalance" value="0" readonly>
			                      </div>
		                      </div>
		                    </div>
		                    <div class="form-group m-b-0">
		                      <div class="col-md-12">
		                        <button type="submit" class="btn btn-purple waves-effect waves-light" name="order">SUBMIT</button>
		                      </div>
		                    </div>
		                  </form>
                                <!-- end content -->
                            </div>

                        </div>
                        <!-- col -->
                    </div>
                    <!-- Row-->