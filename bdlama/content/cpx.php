<?php
//Script by Aqshal

session_start();

if(!isset($_SESSION['username'])) {
header('location:landing/index.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">cPanel</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                    <div class="form-group">
                                        <label for="domain" class="col-sm-3 control-label">Domain</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="domain" name="domain" placeholder="Masukan Domain...">
                                        </div>
                                    </div>
<br />         
<br />
                                    <div class="form-group">
                                        <label for="username" class="col-sm-3 control-label">Username</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                        </div>
                                    </div>
<br />         
<br />
                                    <div class="form-group">
                                        <label for="password" class="col-sm-3 control-label">Password</label>
                                        <div class="col-sm-9">
                                          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
<br />         
<br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Package</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="paket" name="paket">
<option value="idrish_Mini">Mini</option>
<option value="idrish_Medium">Medium</option>
<option value="idrish_Unlimited">Unlimited</option>
                                                </select>
                                            </div>
                                        </div>
<br />         
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="beli();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Beli</button> 
                                        </div>

<i><pre>
Info :
~ Mini = 4000 Saldo
~ Medium = 7000 Saldo
~ Unlimited = 10000 Saldo
</pre></i>
                                </div>

<script>
function beli()
{
post();
	var domain = $('#domain').val();
	var username = $('#username').val();
	var password = $('#password').val();
	var paket = $('#paket').val();
	$.ajax({
		url	: 'content/cpx().php',
		data	: 'domain='+domain+'&username='+username+'&password='+password+'&paket='+paket,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>