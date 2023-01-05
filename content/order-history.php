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
                            		<li class="active">Riwayat Order</li>
                            	</ol>
                        </div>
                    </div>
                    <!-- Page Title End -->

                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <div class="white-box">
                                <h4><i class="glyphicon glyphicon-time"></i> Riwayat Order</h4>
                                <hr>
                                <!-- start content -->

			              <table id="myTable" class="table table-striped" style="font-size: 12px;">
			                <thead>
			                  <tr>
			                    <th>NO</th>
			                    <th>ORDER ID</th>
			                    <th>SERVICE</th>
			                    <th>LINK</th>
			                    <th>QUANTITY</th>
			                    <th>PRICE</th>
			                    <th>STATUS</th>
			                    <th>DATE</th>
			                  </tr>
			                </thead>
			                <tbody>
<?php
 $queryu = "SELECT * FROM order_history WHERE buyer = '$username' ORDER BY id DESC";
 $exe = mysql_query($queryu);
 $cek = mysql_num_rows($exe);
 $no = 1;
 while($row = mysql_fetch_assoc($exe)){
  $order_id = $row['order_id'];
  $service = $row['service'];
  $link = $row['link'];
  $quantity = $row['quantity'];
  $price = $row['price'];
  $status = $row['status'];
  $date = $row['date'];
?>
			                  <tr>
			                    <td><?php echo $no; ?></td>
			                    <td><a href="invoice/?id=<?php echo $order_id; ?>"</a>#<?php echo $order_id; ?></td>
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
<? } else if ($status == "Error") { ?>
<span class="label label-danger">
<? } ?>
<?php echo $status; ?>
</span>
</td>
			                    <td><?php echo $date; ?></td>
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