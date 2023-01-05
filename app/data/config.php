<?php
// Script By Aditama Gilang Farel

$title = "SMEDIA Web Panel";

date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d");
$time = date("h:i:s");

$host = "localhost";
$user = "smediapanel_panel";
$pass = "terserah009";
$db = "smediapanel_panel";
$konek = mysql_connect($host, $user, $pass) or die ('Koneksi Gagal! ');
mysql_select_db($db);
?>