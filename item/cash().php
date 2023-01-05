<?php
// Script By Aditama Gilang Farel

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>

<?php
  require_once("../koneksi.php");
  $paket = $_POST['paket'];

 $caridata = mysql_query("SELECT * FROM stockcash WHERE id = '$paket'");
 $data = mysql_num_rows($caridata);
 $dapat = mysql_fetch_array($caridata);
 
if ($data == 0) { ?>
<div class="alert alert-danger">
<b>Gagal :</b> Stock kosong.
</div>
<? } else if ($get['saldo'] < $dapat['harga']) { ?>
<div class="alert alert-danger">
<b>Gagal :</b> Saldo tidak mencukupi.
</div>
<? } else {
$noorder = rand(1111,9999);
$tanggal = date("Y-m-d H:i:s");
$harga = $dapat['harga'];
$isi = $dapat['isi'];
$jenis = $dapat['jenis'];
$kode = $dapat['kodecash'];
	  $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
          $simpan = mysql_query("INSERT INTO historyall VALUES('','$noorder','$username','$isi $jenis','$harga','Sukses','-','$tanggal')");
if($simpan) { 

?>
                                    <table class="table table-boxed">
                                        <tbody>
                                                <div class="alert alert-success">Pembelian Voucher Game <?php echo $jenis; ?> Suckses !!!</div>
                                            <tr>
                                                <th><i class="fa fa-male"></i></th>
                                                <td><?php echo $get['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <th><i class="fa fa-key"></i></th>
                                                <td><?php echo $kode; ?></td>
                                            </tr>
                                            <tr>
                                                <th><i class="fa fa-user"></i></th>
                                                <td><?php echo $isi; ?> <?php echo $jenis; ?></td>
                                            </tr>
                                            <tr>
                                                <th><i class="fa fa-money"></i></th>
                                                <td><?php echo $harga; ?></td>
                                            </tr>
                                            <tr>
                                                <th><i class="fa fa-shopping-cart"></i></th>
                                                <td>G-Cash</td>
                                            </tr>
                                            <tr>
                                                <th><i class="fa fa-info"></i></th>
                                                <td>Succses !</td>
                                            </tr>
                                        </tbody>
                                    </table><!--//table-->
</center></div>
<? 
mysql_query("DELETE FROM stockcash WHERE id='$paket'");
} else { ?>
ERROR
<? }
} 
?>