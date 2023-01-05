<?PHP

//--------- Config DB

$host="localhost"; // Host name

$username="smediapanel_panel"; // Mysql username

$password="terserah009"; // Mysql password

$db_name="smediapanel_panel"; // Database name

$tbl_name="user"; // Table name

//---------- End Config

// Connect to server and select database.

mysql_connect("$host", "$username", "$password")or die("cannot connect server ");

mysql_select_db("$db_name") or die("cannot select DB");

if($_POST['insert']=="yes"){

$user = $_POST['user'];
$date=date('Y-m-d', time()+60*60*7);
$add_username = $_POST['username'];
$cekdata = mysql_query("SELECT * FROM user WHERE username = '$add_username'");
$hasil = mysql_fetch_array($cekdata);
$cekuser = mysql_query("SELECT * FROM user WHERE username = '$user'");
$cekjumlah = mysql_num_rows($cekuser);
$jumlah= $_POST['jumlah'];

if($hasil['balance'] < $jumlah) {
echo "Saldo tidak mencukupi";
}else if($cekjumlah == 0) {
echo 'Error : Username belum terdaftar.';
}else{
$sql = mysql_query("UPDATE user SET balance = balance+$jumlah WHERE username = '$add_username'");
$sql = mysql_query("UPDATE user SET balance = balance-$jumlah WHERE username = '$user'");

 //Inserted

 if($sql){

 echo "Transfer Saldo SMedia Panel Done
------------------------------------
Username = $username
Jumlah = $jumlah
Pengirim = $user";

 }else{

 echo "ERROR!";

 }
}
}else{

 $sql="SELECT * FROM $tbl_name";

 $result= "$sql";

 while($rows=mysql_fetch_array($sql)){

 ?>

 <?
 }
 }


mysql_close();

?>