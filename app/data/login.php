<?php 
require_once("config.php");
$username=($_POST['username']);
$username= ($_GET[e]);
$date=date('Y-m-d', time()+60*60*7);
$tanggal = date_default_timezone_set('Asia/Jakarta');
$query = mysql_query("select * from user where username='" . $username. "'");
$pass = ($_GET[e]);
$jumlah = mysql_num_rows($query);
$hasil9 = mysql_fetch_array($query);
$namapendaftar = mysql_escape_string($hasil9['Status']);
if($jumlah==0) {
echo "Tidak Terdaftar";
} else if
($hasil9['Status'] == 'aktif') {
echo "$namapendaftar";
}
?>