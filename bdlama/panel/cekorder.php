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
                                        <h3 class="panel-title">Cek Transaksi</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.Order</th>
                                                    <th>Pembeli</th>
                                                    <th>Barang</th>
                                                    <th>Harga</th>
                                                    <th>Status</th>
                                                    <th>Data</th>
                                                    <th>Tgl. Transaksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$i=0;

$tampil = mysql_query("SELECT * FROM history ORDER BY id DESC");

while($data = mysql_fetch_array($tampil))
 {
 $i++;
 
echo "
<tr>
 <td>".$data[no]."</td>
 <td>".$data[pembeli]."</td>
 <td>".$data[barang]."</td>
 <td>".$data[harga]."</td>
 <td>".$data[status]."</td>
 <td>".$data[data]."</td>
 <td>".$data[tanggal]."</td>
</tr>";
}
?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
<? } ?>