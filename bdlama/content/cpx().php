<?php
//Script by Aqshal

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $usr = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$usr'");
$get = mysql_fetch_array($query);
?>

<?php
  require_once("../koneksi.php");
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $pkt = $_POST['paket'];
  $domen = $_POST['domain'];
  $email = 'idrishamid6@gmail.com';

if ($pkt == 'idrish_Mini') {
$harga = 4000;
} else if ($pkt == 'idrish_Medium') {
$harga = 7000;
} else if ($pkt == 'idrish_Unlimited') {
$harga = 10000;
}

  if ($get['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<? } else {
$no = rand(1111,9999);
$tanggal = date("Y-m-d H:i:s");

$whm_user   = "idrish";
$whm_pass   = "u~7B6TQ{]6og";
$whm_host   = '216.158.225.212';

  $script = "http://{$whm_user}:{$whm_pass}@{$whm_host}:2086/scripts/wwwacct";
  $params = "?plan={$pkt}&domain={$domen}&username={$user}&password={$pass}&contactemail={$email}";
  $result = file_get_contents($script.$params);

	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$usr'");
          $simpan = mysql_query("INSERT INTO history VALUES('','#$no','$usr','cPanel $pkt','$harga','Sukses','Username : $user | Pw : $pass | Package : $pkt | Domain : $domen','$tanggal')");
?>
<?php echo $result; ?>
<? } ?>