<?php
// Script By Aditama Gilang Farel

<html >

<body bgcolor="#000">

<link href='images/favicon.png' rel='shortcut icon'/>      <script>

    function tb8_makeArray(n){

    this.length = n;

    return this.length;

    }

    tb8_messages = new

    tb8_makeArray(3);

    tb8_messages[0] = "Site Maintenance";

    tb8_messages[1] = "Come Back Soon";

    tb8_messages[2] = "Thank You";

    tb8_rptType = 'infinite'; tb8_rptNbr = 5; tb8_speed = 125; tb8_delay = 1000; var tb8_counter=1; var tb8_currMsg=0; var tb8_tekst =""; var tb8_i=0; var tb8_TID = null; function tb8_pisi(){ tb8_tekst = tb8_tekst + tb8_messages[tb8_currMsg].substring(tb8_i, tb8_i+1); document.title = tb8_tekst; tb8_sp=tb8_speed; tb8_i++; if (tb8_i==tb8_messages[tb8_currMsg].length){ tb8_currMsg++; tb8_i=0; tb8_tekst="";tb8_sp=tb8_delay; } if (tb8_currMsg == tb8_messages.length){ if ((tb8_rptType == 'finite') && (tb8_counter==tb8_rptNbr)){ clearTimeout(tb8_TID); return; } tb8_counter++; tb8_currMsg = 0; } tb8_TID = setTimeout("tb8_pisi()", tb8_sp); } tb8_pisi() </script><br />

<center><font color="white" size="7">Halo User..</font></center>
<br>
<center><font color="white" size="5">Website Sedang Dalam Pemeliharaan Sistem</font></center>
<br>
<center><font color="white" size="5">Harap Tunggu Beberapa Saat</font></center>
<br>
<center><font color="white" size="5">Terima Kasih...</font></center>
<p>
<p>
<br>
<center><font color="white" size="6">Anda Mengalami Masalah? <a href="kontakadmin.php" class="text-primary m-1-5"><b>Kontak Admin</b></a></font></center> <br />
</p>
</p>