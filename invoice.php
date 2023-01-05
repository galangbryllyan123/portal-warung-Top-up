<?php 
$id = $_POST['id_order'];
$mysql = mysql_query("SELECT * FROM order_history where order_id = '$id'");
$get_data = mysql_fetch_array($mysql);
$hitung_invoice = mysql_num_rows($mysql);

if ($hitung_invoice <> 1) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Invoice Tidak Di Temukan </div>
<?php } else { ?>

                    <!-- Page-Title -->
                    <div class="row title_bg">
                        <div class="col-sm-12">
                            <h4 class="page-title">Service List</h4>
                            	<ol class="breadcrumb">
                            		<li><a href="#">Dashboard</a></li>
                            		<li class="active">Invoice</li>
                            	</ol>
                        </div>
                    </div>
                    <!-- Page Title End -->

                    <!-- Row--> <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3><b>INVOICE</b> <span class="pull-right">#<?php echo $get_data['id']; ?></span></h3>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <div class="pull-left">
                  <address>
                  <h3><i class="glyphicon glyphicon-fire text-info"></i>&nbsp;<b> Invoice</b></h3>
                  <p class="text-muted m-l-5"><?php echo $get_data['buyer']; ?></p>
                  </address>
                </div>
                <div  class="pull-right text-right">
                  <address>
             <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> <?php echo $get_data['date']; ?></p>
                  </address>
                </div>
              </div>
              <div class="col-md-12">
                <div class="table-responsive m-t-40">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th>Product</th>
                        <th class="text-right">Quantity</th>
                        <th class="text-right">Price</th>
                        <th class="text-right">Tax</th>
                        <th class="text-right">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">1</td>
                        <td><?php echo $get_data['service']; ?></td>
                        <td class="text-right"><?php echo $get_data['quantity']; ?></td>
                        <td class="text-right"> Rp.<?php echo $get_data['price']; ?></td>
                        <td class="text-right"> 0 </td>
                        <td class="text-right"> Rp.<?php echo $get_data['price']; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-12">
                <div class="pull-right m-t-30 text-right">
                  <hr>
                  <h3><b>Total :</b>  Rp.<?php echo $get_data['price']; ?></h3>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="text-right">
                  <button class="btn btn-primary" type="submit"> Proceed to payment </button>
                  <button onClick="javascript:window.print();" class="btn btn-default" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<? } ?>