<?php
//Script by Sobri Waskito Aji Jr.

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>
<?php if($get['level'] !== Admin) { ?>
<div class="alert alert-danger">
Gagal : Tidak ada akses
</div>
<? } else { ?>
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Cek Users</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Nama</th>
                                                    <th>Level</th>
                                                    <th>Saldo</th>
                                                    <th>Uplink</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$i=0;

$tampil = mysql_query("SELECT * FROM user ORDER BY id DESC");

while($data = mysql_fetch_array($tampil))
 {
 $i++;
 
echo "
<tr>
 <td>".$data[username]."</td>
 <td>".$data[password]."</td>
 <td>".$data[nama]."</td>
 <td>".$data[level]."</td>
 <td>".$data[saldo]."</td>
 <td>".$data[uplink]."</td>
 <td>".$data[email]."</td>
</tr>";
}
?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
<? } ?>