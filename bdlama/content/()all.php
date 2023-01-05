<?php
//Script by Fah Mii (Jangan ganti klk lu bukan anjeng).

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
$server = "Instagram Followers S1 ";
$idnya = '1';
$svnya = '1';
} else if ($service == '2') {
$server = "Instagram Followers S2";
$idnya = '1';
$svnya = '2';
} else if ($service == '3') {
$server = "Instagram Followers S3";
$idnya = '1';
$svnya = '3';
} else if ($service == '4') {
$server = "Instagram Likes S1";
$idnya = '2';
$svnya = '1';
} else if ($jumlah == '5') {
$server = "Instagram Likes S2";
$idnya = '2';
$svnya = '2';
} else if ($jumlah == '6') {
$server = "Twitter Followers S1";
$idnya = '5';
$svnya = '1';
} else if ($jumlah == '7') {
$server = "Twitter Retweets S1";
$idnya = '6';
$svnya = '1';
} else if ($jumlah == '8') {
$server = "Twitter Favorites S1";
$idnya = '7';
$svnya = '1';
} else if ($jumlah == '9') {
$server = "Facebook Page Likes S1";
$idnya = '4';
$svnya = '1';
} else if ($jumlah == '10') {
$server = "Facebook Photo/Post Likes S1";
$idnya = '3';
$svnya = '1';
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
          $simpan = mysql_query("INSERT INTO history VALUES('','#$no','$username','$jumlah $server','$harga','Sukses','Username/Link : $link','$tanggal')");
if($simpan) { 

?>
<div><center>
<?php
$apikey = 'ebaa1a12ce99190c4ffb8c0fc4ee6b7e';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://api-system.online/v1/socialmedia.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
          "apikey=$apikey&target=$link&id=$idnya&jumlah=$jumlah&server=$svnya");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_HOST']);
$ret = curl_exec ($ch);
curl_close ($ch);
$result = json_decode($ret,true);
if($result['result'] == 'true'){
echo "==== Instagram Follower ====<br />
Order  ID : #$no<br />
Tanggal : $tanggal<br />
Start : $result['start']<br />
Barang : $jumlah Instagram Follower $server<br />
Username/Link : $link<br />
Harga : $harga<br />
Status : Sukses<br />
==== Instagram Follower ===="; // Ubah jika berhasil akan menampilkan kode seperti apa
?></div></center>
<? } else { ?>
ERROR
<? }
}
} 
?>