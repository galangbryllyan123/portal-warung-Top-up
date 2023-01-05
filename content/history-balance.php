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
                            		<li class="active">Riwayat Deposit Saldo</li>
                            	</ol>
                        </div>
                    </div>
                    <!-- Page Title End -->

                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <div class="white-box">
                                <h4><i class="glyphicon glyphicon-time"></i> Riwayat Deposit Saldo</h4>
                                <hr>
                                <!-- start content -->

			              <table id="myTable" class="table table-striped">
			                <thead>
			                  <tr>
			                    <th>NO</th>
			                    <th>ACTION</th>
			                    <th>QUANTITY</th>
			                    <th>MESSAGE</th>
			                    <th>DATE</th>
			                  </tr>
			                </thead>
			                <tbody>
<?php
 $queryu = "SELECT * FROM balance_history WHERE username = '$username' ORDER BY id ASC";
 $exe = mysql_query($queryu);
 $cek = mysql_num_rows($exe);
 $no = 1;
 while($row = mysql_fetch_assoc($exe)){
  $action = $row['action'];
  $quantity = $row['quantity'];
  $msg = $row['msg'];
  $date = $row['date'];
?>
			                  <tr>
			                    <td><?php echo $no; ?></td>
			                    <td>
<?php if ($action == "Cut Balance") { ?>
<span class="label label-danger">
<? } else if ($action == "Add Balance") { ?>
<span class="label label-success">
<? } ?>
<?php echo $action; ?>
</span>
</td>
			                    <td>
<?php if ($action == "Cut Balance") { ?>
<span class="label label-danger">- 
<? } else if ($action == "Add Balance") { ?>
<span class="label label-success">+ 
<? } ?>
<?php echo $quantity; ?>
</span>
</td>
			                    <td><?php echo $msg; ?></td>
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