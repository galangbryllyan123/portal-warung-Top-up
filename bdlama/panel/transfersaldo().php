<?php
// Script by Sobri Waskito Aji Jr.

session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>

<?php
  require_once("../koneksi.php");
  $username1 = $_POST['penerima'];
  $pembayaran = $_POST['pembayaran'];
  $transfer = $_POST['transfer'];
  $saldod = $_POST['saldod'];
  $tanggal = date("Y-m-d");

if ($pembayaran == 1) {
$ai = BRI;
} else if ($pembayaran == 2) {
$ai = Tsel;
} else {
$tiket = a;
}

  $cekuser = mysql_query("SELECT * FROM user WHERE username = '$username1'");  
  $dapat = mysql_num_rows($cekuser);
  $data = mysql_fetch_array($cekuser);

  if ($get['saldo'] < $saldod) { ?>
Gagal : Saldo tidak mencukupi.
<? } else if($dapat == 0) { ?>
<div class="alert alert-danger">
Gagal : Username tidak terdaftar.
</div>
<? } else if(!$username || !$transfer) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
 $simpan = mysql_query("UPDATE user SET saldo=saldo+$saldod WHERE username = '$username1'");
 $simpan = mysql_query("UPDATE user SET saldo=saldo-$saldod WHERE username = '$username'");
 if($simpan) { ?>
<div class="alert alert-success"><center>
=== Transfer Saldo ===<br />
Transfer Saldo sukses.<br />
Pengirim : <?php echo $username; ?> <br />
Penerima : <?php echo $username1; ?> <br />
Metode Pembayaran : <?php echo $ai; ?><br />
Jumlah Transfer : <?php echo $transfer; ?> <br />
Saldo Didapat : <?php echo $saldod; ?> <br />
=== Transfer Saldo === <br />
</center></div>
<? } else { ?>
ERROR
<? }
?>
<? }
?>