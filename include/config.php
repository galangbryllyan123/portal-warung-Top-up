<?php
// Script By Aditama Gilang Farel

$title = "INSTANT CUBES";

date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d");
$time = date("h:i:s");

$host = "localhost";
$user = "";
$pass = "";
$db = "";
$konek = mysql_connect($host, $user, $pass) or die ('Koneksi Gagal! ');
mysql_select_db($db);
?>