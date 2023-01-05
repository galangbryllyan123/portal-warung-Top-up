<?php 
require_once("config.php");
$level=$_POST['level'];
$level= $_GET[e];
$query = mysql_query("select * from user where username='" . $level. "'");
$hasil9 = mysql_fetch_array($query);
$namapendaftar = $hasil9['level'];

echo "$namapendaftar";
?>