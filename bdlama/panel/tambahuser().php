<?php
// Script by Nicholas Romeo Rivaldo

session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
?>

<?php
  require_once("../koneksi.php");
  $username1 = $_POST['username'];
  $password = $_POST['password'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $level = $_POST['level'];

if ($level == Member) {
$harga = 7500;
$bonus = 5000;
} else if ($level == Agen) {
$harga = 22000;
$bonus = 15000;
} else if ($level == Reseller) {
$harga = 46000;
$bonus = 25000;
} else {
$tiket = a;
}
  if ($hasil['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<? } else {
  $cekuser = mysql_query("SELECT * FROM user WHERE username = '$username1'");  
  if(mysql_num_rows($cekuser) <> 0) { ?>
<div class="alert alert-danger">
Gagal : Username sudah terdaftar.
</div>
<? } else if(!$username1 || !$password || !$nama || !$email) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
$tanggal = date("Y-m-d");

 $simpan = mysql_query("INSERT INTO user(username, password, nama, level, saldo, uplink, email) VALUES('$username1', '$password', '$nama', '$level', '$bonus','$username','$email')");
 $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
 if($simpan) { ?>
<div class="alert alert-success">
============================<br />
Pendaftaran anggota baru sukses.<br />
Nama : <?php echo $nama; ?> <br />
Username : <?php echo $username1; ?> <br />
Password : <?php echo $password; ?> <br />
Email : <?php echo $email; ?> <br/>
Level : <?php echo $level; ?> <br />
Bonus Saldo : <?php echo $bonus; ?> <br />
Didaftarkan Oleh : <?php echo $username; ?> <br />
============================ <br />
</div>
<? } else { ?>
ERROR
<? }
?>
<? }
}
?>