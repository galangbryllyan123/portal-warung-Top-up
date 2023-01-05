<?php
// Script Dibuat Oleh Sobri Waskito Aji Jr.

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>

<?php
  require_once("../koneksi.php");
  $pwlama = $_POST['pwlama'];
  $pwbaru = $_POST['pwbaru'];

 $caridata = mysql_query("SELECT * FROM user WHERE password = '$pwlama'");
 $data = mysql_num_rows($caridata);
 $dapat = mysql_fetch_array($caridata);
 
if ($data == 0) { ?>
<div class="alert alert-danger">
<b>Gagal :</b> Password Lama Salah.
</div>
<? } else 
 $simpan = mysql_query("UPDATE user SET password = '$pwbaru' WHERE password = '$pwlama'");
 if($simpan) { ?>
<div class="alert alert-success">
Password Berhasil diganti!<br />
Sebelum : <?php echo $pwlama; ?><br />
Sesudah : <?php echo $pwbaru; ?><br />
</div>
<? } 
?>