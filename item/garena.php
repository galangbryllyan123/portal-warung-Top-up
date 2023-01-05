<?php
// Script By Aditama Gilang Farel

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");
?>
				<div class="panel-heading">
					<span class="panel-title">Voucher Game Garena</span>
				</div>
				<div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Paket</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="paket" name="paket">
<?php
include_once "../koneksi.php";
$q1 = mysql_query("SELECT * FROM stockcash WHERE jenis = 'SHELL'");
if(mysql_num_rows($q1) <= 0){
echo "<option value='0'>Maaf, Stock kosong</option>";
}else{
?>
<?php
}
while ($row = mysql_fetch_array($q1)) {
echo "<option value='$row[id]'>$row[isi] $row[jenis]</option>";
}
?>
                                                </select>
                                            </div>
                                        </div>
                              
                                        <div data-toggle="modal" data-target="#zonk" class="form-group"><br /><br />
<button class="btn btn-primary btn-block" id="btnLogin" onclick="cash();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
GARENA
~ 16 SHELLS = Rp.8.000 
~ 33 SHELLS = Rp.12.000 
~ 66 SHELLS = Rp.24.000
~ 100 SHELLS = Rp. 30.000 
~ 200 SHELLS =  Rp. 58.000 
~ 500 SHELLS = Rp. 143.000 
~ 1000 SHELLS = Rp. 286.000 
</pre></i>
				</div>

<script>
function cash()
{
post();
	var paket = $('#paket').val();
	$.ajax({
		url	: 'item/cash().php',
		data	: 'paket='+paket, 
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>