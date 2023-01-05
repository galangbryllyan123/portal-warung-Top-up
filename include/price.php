<?php
require_once("../include/config.php");
$id = $_POST['service'];
$query = mysql_query("SELECT * FROM service WHERE no = '$id' AND status = 'Tersedia'");
$count = mysql_num_rows($query);
$data = mysql_fetch_array($query);
$show = $data['rate']*1000;
if ($count == 0) { ?>
0
<? } else { ?>
<?php echo number_format($show,0,",","."); ?>
<? } ?>