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

$date=date('Y-m-d', time()+60*60*7);

$fee='1';
$durasi = '3';
$newdate = strtotime ( '+3 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-d' , $newdate );
$query = mysql_query("SELECT * FROM user WHERE username = 'indra swastika'");
$hasil = mysql_fetch_array($query);
 $nama = $_POST['nama'];

 $pangkat = $_POST['pangkat'];

 $uplink = $_POST['uplink'];

 $username = $_POST['username'];
 $password = $_POST['password'];


 $saldo = $_POST['saldo'];

if($hasil['balance'] < $fee) {
echo "Saldo tidak mencukupi";
}else{
 $sql= mysql_query("INSERT INTO user(username, password, balance, level, register, balance_used, Status) VALUES ('$username','$password','5000','Member','$uplink','0','aktif')");

 //Inserted

 if($sql){

 echo "Register Member SMedia Panel Done
------------------------------------
Username = $username
Password = $password
Bonus = Rp.5.000
Link Login = http://smediapanel.com/
------------------------------------";


 }else{

 echo "ERROR!";

 }
}
}else{

 $sql="SELECT * FROM $tbl_name";

 $result= "$sql";

 while($rows=mysql_fetch_array($sql)){

 ?>

 <title>Maslisman</title>

 <table width="600" border="1" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC"><tr><td valign="top">

 <table width="600" border="0" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF">

  <tr><td valign="top"> <a href="http://www.maslisman.blogspot.com/">maslisman.blogspot.com</a></td><td valign="top"></td><td align="right">

 <? echo htmlspecialchars($rows['datetime'], ENT_QUOTES); ?></td></tr>

 <tr><td width="117">Atas Nama</td><td valign="top">:</td><td valign="top">

 <? echo htmlspecialchars($rows['nama'], ENT_QUOTES); ?></td></tr>

 <tr><td width="117">Email</td><td valign="top">:</td><td valign="top">

 <? echo htmlspecialchars($rows['pendaftar'], ENT_QUOTES); ?></td></tr>

 <tr><td valign="top">Nomer HP</td><td valign="top">:</td><td valign="top">

 <? echo htmlspecialchars($rows['user'], ENT_QUOTES); ?></td></tr>

 <tr><td valign="top">Alamat</td><td valign="top">:</td><td valign="top">
 <?PHP
 }
 }


mysql_close();

?>