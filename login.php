<?php
// Script By Aditama Gilang Farel

ob_start();
session_start();

if(isset($_SESSION['username'])) {
	header('location:/');
}

require_once("include/config.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Instant Cubes - Login</title>
        <meta name="description" content="Buy Cheap Twitter Followers, Instagram Followers, Instagram Likes, Facebook Fans, Page Likes, Youtube Views, Twitter Retweets, SMM, Reseller, Panel, Cheapest, Indonesian, Japan, World, Best, Very, SMM Panel Services, Social Media.">
        <meta name="keywords" content="Hunter Panel, Panel SMM, SMM Murah, API Integration, Cheap SMM Panel, Panel SMM, Track Your Activity, Instagram Followers, Free Followers, Free Retweets, Costumer Service, Free Subcrive, Free Views, Beli Followers Instagram, Beli Followers, Social Media, Reseller, Smm, Panel, SMM, Fans, Instagram, Facebook, Youtube, Cheap, Reseller, Panel, Top, 10, Social, Rankings, Working, Fast, Cheap, Free, Safe, Automatic, Instant, Not, Manual, perfect.">
        <link rel="shortcut icon" href="images/favicon.png">
        <meta name="author" content="Arya">
        <meta property="fb:app_id" content="1524996877809621">
        <meta property="fb:admins" content="100012452522419">
        <meta property="og:image" content="http://hunterpanel.com/images/smediapanel.jpg">
        <meta name="google-site-verification" content="Vlbi9jONPdvGLGUW7ks-Nqkc1a5NhmS79A_V4WIbNNw">
    <title><?php echo $title; ?> - Login</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shiv and Respond.js IE8 support -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <link href="global/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <script src="global/sweetalert/sweetalert.min.js"></script>
</head>

<body>


    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal m-t-20" method="POST">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Login Akun <b>INSTANT CUBES</b> :)</h3>
                            <p class="text-muted">Mohon Masukan Data Dengan Benar!</p>
                        </div>
                    </div>

<?php if(isset($_POST['submit'])) {
$username = $_POST['username'];
$pass = $_POST['password'];
$scaptcha = $_SESSION['captcha'];
$captcha = $_POST['captcha'];

$cekuser = mysql_query("SELECT * FROM user WHERE username = '$username'");
$jumlah = mysql_num_rows($cekuser);
$get = mysql_fetch_array($cekuser);

if($jumlah == 0) { // user tdk terdaftar ?>
<div class="alert alert-danger"> <strong>Error!</strong> Username tidak terdaftar. </div>
<script>
swal("Error!", "Username tidak terdaftar.", "error");
</script>
<? } else if($scaptcha != $captcha) { // captcha salah ?>
<div class="alert alert-danger"> <strong>Error!</strong> Human Verification Invalid.</div>
<script>
swal("Error!", "Human Verification Invalid.", "error");
</script>
<? } else {
   if($pass <> $get['password']) { // pass salah ?>
<div class="alert alert-danger"> <strong>Error!</strong> Data yang dimasukkan tidak sesuai. </div>
<script>
swal("Error!", "Data yang dimasukkan tidak sesuai.", "error");
</script>
<? } else {
	$_SESSION['username'] = $get['username'];
	header('location:/');
} } } ?>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Username" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Ingat Saya </label><br />
                            </div>
                        </div>
                    </div><div id="showsession">
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <a href="#" onclick="getsession();"><i class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light">Kirim Permintaan</i></a>
                        </div>
                    </div></div>
                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Belum Punya Akun? <a href="register.php" class="text-primary m-l-5"><b>Daftar</b></a><br />
                               Ada Masalah? <a href="kontakadmin.php" class="text-primary m-1-5"><b>Kontak Admin</b></a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <footer class="footer text-center">
                <div class="social">
                    <a href="http://www.facebook.com/agfaditamagilangfarel" class="btn  btn-facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                </div>
                Copyright &copy; 2016. <a href="http://instant-cubes.com">Instant Cubes</a>. All Rights Reserved.</footer>
        </div>
    </section>
    <!-- jQuery-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- jQuery Customs -->
    <script src="js/custom.js"></script>
    <script src="js/custom-widget.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script>
function getsession() {
$("#showsession").html('<center><img src="http://www.volusia.org/resources/loading-gif.gif" height="50" weight="50"/></center>');
    $.ajax({
        url    : 'session.php',
        type    : 'GET',
        dataType: 'html',
        success    : function(isi){
            $("#showsession").html(isi);
        },
    });
}
</script>

</body>

</html>
<? ob_flush(); ?>