<?php 
require_once("config.php");
$balance=$_POST['saldo'];
$balance= $_GET[e];
$query = mysql_query("select * from user where username='" . $balance. "'");
$hasil9 = mysql_fetch_array($query);
$namapendaftar = $hasil9['balance'];

echo "$namapendaftar";
?>