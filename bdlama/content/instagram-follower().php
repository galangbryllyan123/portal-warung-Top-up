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

if ($service == '1') {
$server = "Server 1";
} else if ($service == '2') {
$server = "Server 2";
} else if ($jumlah == '3') {
$server = "Server 3";
} else if ($jumlah == '4') {
$server = "Server 4";
} else if ($jumlah == '5') {
$server = "Server 5";
} else if ($jumlah == '6') {
$server = "Aktif WorldWide";
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
<? } else if ($jumlah < 50) { ?>
<div class="alert alert-danger">
Gagal : Minimal 50 Follower.
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
          $simpan = mysql_query("INSERT INTO history VALUES('','#$no','$username','$jumlah Follower Instagram $server','$harga','Sukses','Username/Link : $link','$tanggal')");
if($simpan) { 

?>
<div><center>
<?php
$apikey = 'ebaa1a12ce99190c4ffb8c0fc4ee6b7e';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://api-system.online/v1/socialmedia.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
          "apikey=$apikey&target=$link&id=1&jumlah=$jumlah&server=$service");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_HOST']);
$ret = curl_exec ($ch);
curl_close ($ch);
$result = json_decode($ret,true);
if($result['result'] == 'true'){
echo "==== Instagram Follower ====<br />
Order  ID : #$no<br />
Tanggal : $tanggal<br />
Pembeli : $nama<br />
Start : $result['start']<br />
Barang : $jumlah Instagram Follower $server<br />
Username/Link : $link<br />
Harga : $harga<br />
Status : Sukses<br />
==== Instagram Follower ===="; // Ubah jika berhasil akan menampilkan kode seperti apa
echo "<br />Server Reply : $msg"; // akan menampilkan balasan pesan dari server
?></div></center>
<? } else { ?>
ERROR
<? }
}
} 
?>