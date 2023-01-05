<?php 
require_once("config.php");
$username=$_POST['username'];
$username= $_GET[e];
$query = mysql_query("select * from user where username='" . $username. "'");
$hasil9 = mysql_fetch_array($query);
$namapendaftar = $hasil9['username'];

echo "$namapendaftar";
?>