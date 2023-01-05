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
                                        <h3 class="panel-title">Youtube View</h3> 
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
<option value="77">Youtube Worldwide Views Server 1 (REFILL)</option>
<option value="78">Youtube Worldwide Views Server 2 (HR, REFILL)</option>
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
Server 1 : 1.100 / 100 View [ Min : 1000 - Max : 5000 ]
Server 2 : 1.200 / 100 View [ Min : 1000 - Max : 5000 ]
Pastikan Link Benar dan Video Tidak dalam Keadaan Private</pre></i>
                                </div>

<script>
function getharga(jumlah){
var namaaplikasi = $("#service").val();
if (namaaplikasi== "77"){
var hasil = eval(jumlah) * 11;  
  $('#harga').val(hasil);
} else if (namaaplikasi== "78"){
var hasil = eval(jumlah) * 12;  
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
		url	: 'content/youtube-view().php',
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