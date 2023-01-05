<?php
//Script by Fah Mii (Jangan Diubah klk lu bukan anjeng).

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
                                        <h3 class="panel-title">Panel All In One</h3> 
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
<option value="1">Instagram Followers (SERVER 1 : NO REFILL, unlimited, 1-10k/day)</option>
<option value="2">Instagram Followers (SERVER 2 : INSTANT, REFILL, max 10k)</option>
<option value="3">Instagram Followers (SERVER 3 : INSTANT, STABLE, REFILL, HQ, max 150k)</option>
<option value="4">Instagram Likes (SERVER 1 : HQ, REFILL, FAST)</option>
<option value="5">Instagram Likes (SERVER 2 : INSTANT, REFILL, HQ)</option>
<option value="6">Twitter Followers (SERVER 1 : REFILL, speed 1k-10k/day)</option>
<option value="7">Twitter Retweets (SERVER 1 : HQ, Unlimited, REFILL, FAST)</option>
<option value="8">Twitter Favorites (SERVER 1 : SERVER 2, HQ, Unlimited, REFILL, FAST)</option>
<option value="9">Facebook Page Likes (SERVER 1 : No Musical Page)</option>
<option value="10">Facebook Photo/Post Likes (SERVER 1 : REAL, INSTANT, max 350 likes/order, max 5000/post)</option>
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
Account Jangan Di Private
</pre></i>
                                </div>

<script>
function getharga(jumlah){
var namaaplikasi = $("#service").val();
if (namaaplikasi== "1"){
var hasil = eval(jumlah) * 14;  
} else if (namaaplikasi== "2"){
var hasil = eval(jumlah) * 21; 
} else if (namaaplikasi== "3"){
var hasil = eval(jumlah) * 24;  
} else if (namaaplikasi== "4"){
var hasil = eval(jumlah) * 12;  
} else if (namaaplikasi== "5"){
var hasil = eval(jumlah) * 12;
} else if (namaaplikasi== "6"){
var hasil = eval(jumlah) * 18;  
} else if (namaaplikasi== "7"){
var hasil = eval(jumlah) * 18; 
} else if (namaaplikasi== "8"){
var hasil = eval(jumlah) * 16; 
} else if (namaaplikasi== "9"){
var hasil = eval(jumlah) * 122;  
} else if (namaaplikasi== "10"){
var hasil = eval(jumlah) * 13;  
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
		url	: 'content/()all.php',
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