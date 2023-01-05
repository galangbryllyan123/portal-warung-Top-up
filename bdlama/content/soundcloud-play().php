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

<?php
  require_once("../koneksi.php");
  $link = $_POST['link'];
  $jumlah = $_POST['jumlah'];
  $service = $_POST['service'];
  $harga = $_POST['harga'];

if ($service == '24') {
$server = "Server 1";
} else {
$tiket = a;
}
  if ($get['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<? } else if (!$link) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else if ($jumlah < 100) { ?>
<div class="alert alert-danger">
Gagal : Minimal 100 Play.
</div>
<? } else if ($jumlah > 3000) { ?>
<div class="alert alert-danger">
Gagal : Maksimal 3000 Play.
</div>
<? } else if ($harga < '700') { 
$simpan = mysql_query("DELETE FROM user WHERE username = '$username'");?>
<div class="alert alert-danger">
<script language="JavaScript">alert(" Banned , Go Home ");</script>
<h1>Kick Out</h1>
</div>
<? } else {
$no = rand(1111,9999);
$tanggal = date("Y-m-d");

	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
          $simpan = mysql_query("INSERT INTO history VALUES('','#$no','$username','$jumlah SoundCloud Play $server','$harga','Sukses','Link : $link','$tanggal')");
if($simpan) { 

?>
<div><center>
<?php
GET /post/orders/add/2a2c2e3b-3d91-4a9c-943c-35395519795e HTTP/1.1
Host: http://api.2cartel.com
Content-Type: application/x-www-form-urlencoded

type=1&link=2cartel&quantity=20
{
   "orders":{
      "add":[
         {
            "order_key":"2a2c2e3b-3d91-4a9c-943c-35395519795e",
            "service":"instagram",
            "product":"followers",
            "server":"Server 9",
            "link":"2cartel",
            "total":20,
            "cost":500000,
            "status":0
         }
      ]
   },
   "authenticated":true,
   "error":false
}
?></div></center>
<? } else { ?>
ERROR
<? }
} 
?>