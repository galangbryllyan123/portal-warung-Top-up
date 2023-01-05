<?php 
require_once("config.php");
$password=$_POST['password'];
$password= $_GET[e];
$query = mysql_query("select * from user where username='" . $password. "'");
$hasil9 = mysql_fetch_array($query);
$namapendaftar = $hasil9['password'];

echo "$namapendaftar";
?>