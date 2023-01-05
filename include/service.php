<option value="0">Pilih salah satu</option>
<?php
require_once("../include/config.php");
 $category = $_POST['category'];
 $query = "SELECT * FROM service WHERE category = '$category' AND status = 'Tersedia' ORDER BY no";
 $exe = mysql_query($query);
 $cek = mysql_num_rows($exe);
 $no = 1;
 while($row = mysql_fetch_assoc($exe)){
  $id = $row['no'];
  $service = $row['service'];
?>
<option value="<?php echo $id; ?>"><?php echo $service; ?></option>
<?
$no++;
} ?>