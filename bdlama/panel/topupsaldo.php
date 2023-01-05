<?php

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Redeem Voucher Saldo</h3> 
                                    </div> 
                                    <div class="panel-body">  
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kode</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="kode" id="kode" placeholder="123-321-432"/>
                                            </div>
                                        </div>           
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="buat();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<div class="alert alert-warning">
Berhati-hatilah memasukkan data.
</div>
                                </div>

<script>
function buat()
{
post();
	var kode = $('#kode').val();
	$.ajax({
		url	: 'panel/topupsaldo().php',
		data	: 'kode='+kode,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>
