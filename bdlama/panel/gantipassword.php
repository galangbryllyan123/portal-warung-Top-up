<?php
//Script by Sobri Waskito Aji Jr.

session_start();

if(!isset($_SESSION['username'])) {
header('location:../home.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Change Password</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password Lama</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="pwlama" id="pwlama" placeholder="Password Lama"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password Baru</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="pwbaru" id="pwbaru" placeholder="Password Baru"/>
                                            </div>
                                        </div>           
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<i><pre>
Hati-Hati Saat Memasukkan Data
</pre></i>
                                </div>

<script>
function kirim()
{
pos();
	var pwlama = $('#pwlama').val();
	var pwbaru = $('#pwbaru').val();
	$.ajax({
		url	: 'panel/gantipassword().php',
		data	: 'pwlama='+pwlama+'&pwbaru='+pwbaru,
		type	: 'POST',
		dataType: 'html',
		success	: function(staff){
hasil();
	$("#staff").html(staff);
mati();
	$("#konten").html(konten);
	}
	});
}
</script>