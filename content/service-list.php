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
                            		<li class="active">Daftar Harga</li>
                            	</ol>
                        </div>
                    </div>
                    <!-- Page Title End -->

                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                            <div class="white-box">
                                <h4><i class="fa fa-list"></i> Daftar Harga</h4>
                                <hr>
                                <!-- start content -->

			              <table id="myTable" class="table table-striped">
			                <thead>
			                  <tr>
			                    <th>NO</th>
			                    <th>ID</th>
			                    <th>SERVICE</th>
			                    <th>PRICE/1000</th>
			                    <th>MIN</th>
			                    <th>MAX</th>
			                  </tr>
			                </thead>
			                <tbody>
<?php
 $queryu = "SELECT * FROM service WHERE status = 'Tersedia' ORDER BY no ASC";
 $exe = mysql_query($queryu);
 $cek = mysql_num_rows($exe);
 $no = 1;
 while($row = mysql_fetch_assoc($exe)){
  $id = $row['no'];
  $service = $row['service'];
  $price = $row['rate']*1000;
  $min = $row['min'];
  $max = $row['max'];
?>
			                  <tr>
			                    <td><?php echo $no; ?></td>
			                    <td><?php echo $id; ?></td>
			                    <td><?php echo $service; ?></td>
			                    <td><?php echo "Rp " . number_format($price,0,",","."); ?></td>
			                    <td><?php echo $min; ?></td>
			                    <td><?php echo $max; ?></td>
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