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
                            		<li class="active">Gemscool Cash</li>
                            	</ol>
                        </div>
                    </div>
                    <!-- Page Title End -->
<?php if (isset($_POST['order'])) {
$quantity = $_POST['quantity'];

$dataservice = mysql_query("SELECT * FROM gemscool WHERE jumlah='$quantity'");
$sdata = mysql_fetch_array($dataservice);
$scount = mysql_num_rows($dataservice);
$price = $sdata['harga'];
$code = $sdata['code'];
$namab = $sdata['nama'];

if ($scount == 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Stok tidak ditemukan. </div>
<? } else if (!$quantity || !$price) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Masih ada data yang kosong. </div>
<? } else if ($balance < $price) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Balance tidak mencukupi, silahkan topup. </div>
<? } else {
$order_id = rand(10000000000000,100000000000000);
	$del = mysql_query("DELETE FROM `gemscool` WHERE `code`='$code'");
	$send = mysql_query("UPDATE user SET balance = balance-$price WHERE username = '$username'");
	$send = mysql_query("UPDATE user SET balance_used = balance_used+$price WHERE username = '$username'");
	$send = mysql_query("INSERT INTO order_history(order_id, provider, buyer, service, link, quantity, price, status, date, time) VALUES ('$order_id','GEMSCOOL','$username','$namab','Gemscool Code : $code','$quantity','$price','Success','$date','$time')");
	$send = mysql_query("INSERT INTO balance_history(username, action, quantity, msg, date, time) VALUES ('$username','Cut Balance','$price','User buy service. Order ID : $order_id','$date','$time')");
if ($send) { ?>
<div class="alert alert-info">
<font color="black">
<strong>Success: </strong> Transaksi berhasil!<br />
Order ID: <?php echo $order_id; ?><br />
Service: <?php echo $namab; ?><br />
Code: <?php echo $code; ?><br />
Cut Balance: <?php echo "Rp. " . number_format($price,0,",","."); ?><br />
Date: <?php echo $date; ?>
</font>
</div>
<? } else { ?>
Database error!
<? } } } else { ?>
<div class="alert alert-info"> <strong>*INFO: </strong> Sebelum order mohon mebaca FAQ, agar tidak terjadi kesalahan saat melakukan order. Kami tidak akan merefund order yang error karena kesalahan user.</div>
<? } ?>
                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <div class="white-box">
                                <h4><i class="fa fa-cart-plus"></i> Gemscool Cash</h4>
                                <hr>
                                <!-- start content -->
		                  <form class="form-horizontal" method="POST">
		                    <div class="form-group">
		                      <label class="col-md-12">Barang</label>
		                      <div class="col-md-12">
                                                            <?php
                                                            $i = 1;
                                                            $g1 = mysql_query("SELECT * FROM gemscool");
 							if(mysql_num_rows($g1) <= 0){
 								echo "Maaf Stock Kosong";
 							}else{
 							?>
                                        <select class="form-control selectpicker" name="quantity" id="quantity">
 							<?php
 							}	
 								while ($row = mysql_fetch_array($g1)) {
									echo '<option value="'.$row['jumlah'].'">[v'.$i.']'.$row['nama'].' - Rp.'.$row['harga'].'</option>';
                                                            $i++;
								}
								echo "</select>"; ?>
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