<?php

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
  $kode = $_POST['kode'];
  $cekuser = mysql_query("SELECT * FROM vouchersaldo WHERE kode = '$kode'");  
 $data = mysql_num_rows($cekuser);
 $dapat = mysql_fetch_array($cekuser);

  if(!$kode) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else if ($data == 0) { ?>
<div class="alert alert-danger">
Gagal : Voucher tidak tersedia.
</div>
<? } else {
$isisaldo = $dapat['isi'];
 $simpan = mysql_query("UPDATE user SET saldo=saldo+$isisaldo WHERE username = '$username'");
 if($simpan) { ?>
<div class="alert alert-success"><center>
=== TopUp Saldo ===<br />
TopUp saldo sukses.<br />
Pembeli : <?php echo $username; ?> <br />
Isi Saldo : <?php echo $isisaldo; ?> <br />
Kode : <?php echo $kode; ?> <br />
=== TopUp Saldo === <br />
</center></div>
<?
mysql_query("DELETE FROM vouchersaldo WHERE kode='$kode'");
 } else { ?>
ERROR
<? }
?>
<? }
?>