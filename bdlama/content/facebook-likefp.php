<?php
//Script by Sobri Waskito Aji Jr.

session_start();

if(!isset($_SESSION['username'])) {
header('location:landing/index.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Facebook Like FansPage</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                    <div class="form-group">
                                        <label for="username" class="col-sm-3 control-label">Link</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="link" name="link" placeholder="Masukan Link">
                                        </div>
                                    </div>
<br />         
<br />
                                    <div class="form-group">
                                        <label for="username" class="col-sm-3 control-label">Jumlah</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="jumlah" min="50" name="jumlah" placeholder="Jumlah" onkeyup="getharga(this.value).value;">
                                        </div>
                                    </div>
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Layanan</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="service" name="service">
<option value="4">Facebook Fanpage Likes ( Max 1K )</option>
                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                    <div class="form-group">
                                        <label for="username" class="col-sm-3 control-label">Harga</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" id="harga" name="harga" class="form-control" placeholder="Harga" disabled="">
                                            </div>
                                        </div>
                                    </div>
<br />
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
Server 1 : 8.000 / 100 Like [ Min : 250 - Max : 1000 ]
Pastikan Fanspage Sudah Dalam Keadaan Publish
NB : Jika ada Kesalahan Bukan Salah Kami Karena Kami Telah Memberitahukan Informasi Ini
</pre></i>
                                </div>

<script>
function getharga(jumlah){
var namaaplikasi = $("#service").val();
if (namaaplikasi== "4"){
var hasil = eval(jumlah) * 80;  
  $('#harga').val(hasil);
}

} 

function kirim()
{
post();
	var link = $('#link').val();
	var service = $('#service').val();
	var jumlah = $('#jumlah').val();
	var harga = $('#harga').val();
	$.ajax({
		url	: 'content/facebook-likefp().php',
		data	: 'link='+link+'&service='+service+'&jumlah='+jumlah+'&harga='+harga,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>