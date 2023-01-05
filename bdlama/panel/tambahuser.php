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
<?php if($get['level'] == Member) { ?>
<div class="alert alert-danger">
Gagal : Tidak ada akses
</div>
<? } else { ?>
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Tambah User</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama"/>
                                            </div>
                                        </div>           
<br /><br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>
                                            </div>
                                        </div>           
<br /><br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="password" id="password" placeholder="Password"/>
                                            </div>
                                        </div>           
<br /><br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email User"/>
                                            </div>
                                        </div>           
<br /><br />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Level</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="level" name="level">
<?php if ($get['level'] == "Reseller") { ?>
<option value="Member">Member</option>
<option value="Agen">Agen</option>

<? } else if ($get['level'] == "Admin") { ?>
<option value="Reseller">Reseller</option>
<option value="Agen">Agen</option>
<option value="Member">Member</option>

<? } else if ($get['level'] == "Agen") { ?>
<option value="Member">Member</option>
<? }
?>
                                                </select>
                                            </div>
                                        </div>
<br />
<br />
                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="tambahuser();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Level</th>
                                                    <th>Harga Asli</th>
                                                    <th>Harga Jual</th>
                                                    <th>Bonus Saldo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Member</td>
                                                    <td>7.500 Saldo</td>
                                                    <td>10.000</td>
                                                    <td>5000 Saldo</td>
                                                </tr>
                                                <tr>
                                                    <td>Agen</td>
                                                    <td>22.000 Saldo</td>
                                                    <td>25.000</td>
                                                    <td>15.000 Saldo</td>
                                                </tr>
                                                <tr>
                                                    <td>Reseller</td>
                                                    <td>41.000 Saldo</td>
                                                    <td>45.000</td>
                                                    <td>25.000 Saldo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>	
                                </div>

<script>
function tambahuser()
{
post();
	var nama = $('#nama').val();
	var username = $('#username').val();
	var password = $('#password').val();
	var email = $('#email').val();
	var level = $('#level').val();
	$.ajax({
		url	: 'panel/tambahuser().php',
		data	: 'nama='+nama+'&username='+username+'&password='+password+'&email='+email+'&level='+level,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>

<? } ?>