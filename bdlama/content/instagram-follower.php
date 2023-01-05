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
                                        <h3 class="panel-title">Instagram Follower</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                    <div class="form-group">
                                        <label for="username" class="col-sm-3 control-label">Username/Link</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="link" name="link" placeholder="Masukan Username/Link Instagram">
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
<option value="1">Server 1 [ Max 5K ]</option>
<option value="2">Server 2 [ Max 4K ]</option>
<option value="3">Server 3 [ Max 2,5K ]</option>                                                </select>
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
Server 1 : 1.900 / 100 Follower [ Min : 50 - Max : 3000 ] ( MT )
Server 2 : 1.500 / 100 Follower [ Min : 50 - Max : 3000 ] ( MT )
Server 3 : 2.100 / 100 Follower [ Min : 50 - Max : 5000 ]
Server 4 : 2.000 / 100 Follower [ Min : 50 - Max : 4000 ]
Server 5 : 1.900 / 100 Follower [ Min : 50 - Max : 2500 ]
Aktif WorldWide : 9.000 / 100 Follower [ Min : 100 - Max : 400 ]
NEW Server : 1.900 / 100 Follower [ Min : 50 - Max : 7000 ] ( MT )
</pre></i>
                                </div>

<script>
function getharga(jumlah){
var namaaplikasi = $("#service").val();
if (namaaplikasi== "1"){
var hasil = eval(jumlah) * 14;  
  $('#harga').val(hasil);
} else if (namaaplikasi== "2"){
var hasil = eval(jumlah) * 11;  
  $('#harga').val(hasil);
} else if (namaaplikasi== "3"){
var hasil = eval(jumlah) * 24;  
  $('#harga').val(hasil);
} else if (namaaplikasi== "4"){
var hasil = eval(jumlah) * 90;  
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
		url	: 'content/instagram-follower().php',
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