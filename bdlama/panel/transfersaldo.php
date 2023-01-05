<?php
//Script by Sobri Waskito Aji Jr.

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>
<?php if($get['level'] == Member) { ?>
<div class="alert alert-danger">
Gagal : Tidak ada akses
</div>
<? } else { ?>
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Transfer Saldo</h3> 
                                    </div> 
                                    <div class="panel-body">  
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username Penerima</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="penerima" id="penerima" placeholder="Username Penerima"/>
                                            </div>
                                        </div>           
<br />       
<br /> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pilihan Pembayaran</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="pembayaran" name="pembayaran">
<option value="1">BRI</option>
<option value="2">Tsel </option>
                                                </select>
                                            </div>
                                        </div>
<br />       
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jumlah Transfer</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="transfer" id="transfer" placeholder="Jumlah Transfer" onkeyup="getsaldo(this.value).value;"/>
                                            </div>
                                        </div>        
<br />
<br />
                                    <div class="form-group">
                                        <label for="username" class="col-sm-3 control-label">Saldo Didapat</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" id="saldod" name="saldod" class="form-control" placeholder="Saldo Didapat" disabled="">
                                            </div>
                                        </div>
                                    </div>
<br />
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
Tsel : Rate 0.80
BRI : No Rate
</i><</pre>
                                </div>

<script>
function getsaldo(transfer){
var namaaplikasi = $("#pembayaran").val();
if (namaaplikasi== "1"){
var hasil = eval(transfer) * 1;  
  $('#saldod').val(hasil);
} else if (namaaplikasi== "2"){
var hasil = eval(transfer) * 0.8;  
  $('#saldod').val(hasil);
}

} 

function kirim()
{
post();
	var penerima = $('#penerima').val();
	var pembayaran = $('#pembayaran').val();
	var transfer = $('#transfer').val();
	var saldod = $('#saldod').val();
	$.ajax({
		url	: 'panel/transfersaldo().php',
		data	: 'penerima='+penerima+'&pembayaran='+pembayaran+'&transfer='+transfer+'&saldod='+saldod,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>
<? } ?>