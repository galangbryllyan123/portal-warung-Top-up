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

if ($service == '110') {
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
Gagal : Minimal 100 Follower.
</div>
<? } else if ($jumlah > 4000) { ?>
<div class="alert alert-danger">
Gagal : Minimal 4000 Follower.
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
          $simpan = mysql_query("INSERT INTO history VALUES('','#$no','$username','$jumlah Twitter Follower $server','$harga','Sukses','Username : $link','$tanggal')");
if($simpan) { 

?>
<div><center>
<?php
$apikey = "API_KEY";
$command = "add";
$link = $_POST['link'];
$kode = $_POST['service'];
$jumlah = $_POST['jumlah'];
$url = "http://rival-panel.com/api/?apikey=$apikey&order=$command&link=$link&service=$kode&jumlah=$jumlah";
$jsonx = file_get_contents($url);
$jsony = json_decode($jsonx, true);
$msg = $jsony['ServerResponse'];
if($jsony['error'] == "1") {
echo "ERROR!!!"; // disini adalah pesan yan dikeluarkan jika gagal
echo "Server Error : $msg"; // akan menampilkan balasan pesan dari server
} else if($jsony['error'] == "0") {
echo "==== Twitter ====<br />
Order  ID : #$no<br />
Tanggal : $tanggal<br />
Pembeli : $nama<br />
Barang : $jumlah Twitter Follower $server<br />
Username : $link<br />
Harga : $harga<br />
Status : Sukses<br />
==== Twitter ===="; // Ubah jika berhasil akan menampilkan kode seperti apa
echo "<br />Server Reply : $msg"; // akan menampilkan balasan pesan dari server
}
?></div></center>
<? } else { ?>
ERROR
<? }
} 
?>