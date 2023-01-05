<?php
// Script By Aditama GIlang Farel

session_start();
if(isset($_SESSION['username']))
 {
header('location:/');
 }
require_once("koneksi.php");
?>

<!DOCTYPE html>
<html>

<!-- Create By Sebastian Wirajaya -->
<head>
<link rel="icon" href="images/icon.png">
<title>JFM Panel | Price</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/thin-admin.css" rel="stylesheet" media="screen">
<link href="css/font-awesome.css" rel="stylesheet" media="screen">
<link href="font-awesome-4.0.3/css/font-awesome.min.css" rel="stylesheet" media="screen">
<link href="style/style.css" rel="stylesheet">
<link href="style/dashboard.css" rel="stylesheet">
<link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>

</head>
<body>
<div class="container">
  <div class="top-navbar header b-b"> <a data-original-title="Toggle navigation" class="toggle-side-nav pull-left" href="#"><i class="icon-reorder"></i> </a>
    <div class="brand pull-left"> <a href="/"><h2 style="margin: 5px;">Price</h2></a></div>
    <ul class="nav navbar-nav navbar-right  hidden-xs">
      <li class="dropdown user hiddex-xs"><a href="home.php"><i class="fa fa-home"></i><span class="username"> Home</span></a></li>
      <li class="dropdown user  hidden-xs"><a href="price.php"> <i class="icon-list"></i> <span class="username">Price</span></a></li>
      <li class="dropdown user  hidden-xs"><a href="login.php"> <i class="icon-unlock"></i> <span class="username">Login</span></a></li>
    </ul>
  </div>
</div>
<div class="wrapper">
  <div class="page-content">
    <div class="content container">

      <div class="row">

        <div class="col-lg-12">
        <div id="main">
          <div class="widget">
            <div class="widget-content">

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th><b>Layanan</b></th>
                    <th><b>Price/1000</b></th>
                    <th><b>Min Order</b></th>
                    <th><b>Max Order</b></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Followers Twitter SERVER 1 => Max 100K, Cepat, Kualitas Bagus, No Garansi</td>
                    <td>21000</td>
                    <td>100</td>
                    <td>100.000</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Twitter Followers SERVER 2 => Max 100K, Cepat, Kualitas Bagus</td>
                    <td>28000</td>
                    <td>100</td>
                    <td>100.000</td>
                  </tr>
                  <tr>
                    <td>10</td>
                    <td>Twitter Likes (High Quality) => Kualitas bagus, Unlimited</td>
                    <td>16000</td>
                    <td>100</td>
                    <td>1.000.000</td>
                  </tr>
                  <tr>
                    <td>11</td>
                    <td>Twitter Retweets => Kualitas bagus, Unlimited, Cepat</td>
                    <td>16000</td>
                    <td>100</td>
                    <td>1.000.000</td>
                  </tr>
                  <tr>
                    <td>14</td>
                    <td>Trending Topik Indonesia Max 2Jam => Kualitas bagus, sistem pesan.</td>
                    <td>350000</td>
                    <td>1</td>
                    <td>2</td>
                  </tr>
                  <tr>
                    <td>15</td>
                    <td>Auto Tweet => Tema : Galau, Romantis, DLL,</td>
                    <td>15000</td>
                    <td>1</td>
                    <td>1.000.000</td>
                  </tr>
                  <tr>
                    <td>16</td>
                    <td>Auto Follow & Auto Mention FollowBack Twitter</td>
                    <td>13000</td>
                    <td>1</td>
                    <td>1.600</td>
                  </tr>
                  <tr>
                    <td>19</td>
                    <td>Instagram Followers Indonesia => Max 15K, diproses 1x24Jam, Tidak garansi</td>
                    <td>83000</td>
                    <td>100</td>
                    <td>15.000</td>
                  </tr>
                  <tr>
                    <td>20</td>
                    <td>Instagram Followers HQ SERVER 1 => Max 15K, Instant</td>
                    <td>19000</td>
                    <td>100</td>
                    <td>15.000</td>
                  </tr>
                  <tr>
                    <td>21</td>
                    <td>Instagram Followers HQ SERVER 2 => Max 350K, Instant</td>
                    <td>13000</td>
                    <td>100</td>
                    <td>350.000</td>
                  </tr>
                  <tr>
                    <td>22</td>
                    <td>Instagram Followers HQ SERVER 3 => Max 10K, Instant</td>
                    <td>21000</td>
                    <td>100</td>
                    <td>10.000</td>
                  </tr>
                  <tr>
                    <td>23</td>
                    <td>Instagram Followers HQ SERVER 2 => Max 350K, Instant</td>
                    <td>20000</td>
                    <td>100</td>
                    <td>10.000</td>
                  </tr>
                  <tr>
                    <td>25</td>
                    <td>Instagram Followers HQ PED Server => Max 7K, Instant</td>
                    <td>18000</td>
                    <td>100</td>
                    <td>7.000</td>
                  </tr>
                  <tr>
                    <td>26</td>
                    <td>Instagram Video Views NEW SERVER => Max 50K, Instant</td>
                    <td>28000</td>
                    <td>100</td>
                    <td>50.000</td>
                  </tr>
                  <tr>
                    <td>27</td>
                    <td>Instagram Views SERVER 1 => Max 500K, Instant</td>
                    <td>48000</td>
                    <td>100</td>
                    <td>500.000</td>
                  </tr>
                  <tr>
                    <td>28</td>
                    <td>Instagram Likes HQ SERVER 1 => Max 10K, Instant</td>
                    <td>15000</td>
                    <td>100</td>
                    <td>10.000</td>
                  </tr>
                  <tr>
                    <td>29</td>
                    <td>Instagram Likes HQ SERVER 2 => Max 50K, Instant</td>
                    <td>16000</td>
                    <td>100</td>
                    <td>50.000</td>
                  </tr>
                  <tr>
                    <td>30</td>
                    <td>Instagram Likes HQ SERVER 3 => Max 40K, Instant</td>
                    <td>17000</td>
                    <td>100</td>
                    <td>40.000</td>
                  </tr>
                  <tr>
                    <td>31</td>
                    <td>Instagram Likes INDONESIA => Max 1,5K, Instant</td>
                    <td>58000</td>
                    <td>100</td>
                    <td>1.500</td>
                  </tr>
                  <tr>
                    <td>36</td>
                    <td>Facebook Fanpage Likes SERVER 2 => diproses 1x24 Jam, Tidak untuk FansPage Musik</td>
                    <td>88000</td>
                    <td>100</td>
                    <td>1.000.000</td>
                  </tr>
                  <tr>
                    <td>37</td>
                    <td>Facebook REAL photo/post likes SERVER 1 => Max 350 Likes, REAL, Cepat</td>
                    <td>18000</td>
                    <td>100</td>
                    <td>350</td>
                  </tr>
                  <tr>
                    <td>38</td>
                    <td>Facebook HQ photo/post likes SERVER 2 => Max 9400, Kualitas Bagus, Instant</td>
                    <td>23000</td>
                    <td>100</td>
                    <td>9.400</td>
                  </tr>
                  <tr>
                    <td>39</td>
                    <td>Facebook video views => Max 1M, Kecepatan 100K per hari</td>
                    <td>16000</td>
                    <td>100</td>
                    <td>1.000.000</td>
                  </tr>
                  <tr>
                    <td>40</td>
                    <td>Youtube Worldwide Views SERVER 1 => Max 100K, Kecepatan 15K/hari, tidak garansi</td>
                    <td>18000</td>
                    <td>100</td>
                    <td>100.000</td>
                  </tr>
                  <tr>
                    <td>41</td>
                    <td>Youtube Worldwide Views SERVER 2 => Max 1M, Cepat Kecepatan 15K/hari, Bergaransi</td>
                    <td>22000</td>
                    <td>100</td>
                    <td>1.000.000</td>
                  </tr>
                  <tr>
                    <td>42</td>
                    <td>Youtube Worldwide Views SERVER 3 => Retensi tinggi, Kecepatan 15K/day, Bergaransi</td>
                    <td>23000</td>
                    <td>100</td>
                    <td>1.000.000</td>
                  </tr>
                  <tr>
                    <td>43</td>
                    <td>Youtube Indonesia Views => Max 1M, Cepat Kecepatan 20K-30/hari, Bergaransi</td>
                    <td>33000</td>
                    <td>100</td>
                    <td>1.000.000</td>
                  </tr>
                  <tr>
                    <td>44</td>
                    <td>REAL Youtube Subscribers => REAL Youtube Subscribers, NO DROP</td>
                    <td>550000</td>
                    <td>100</td>
                    <td>5.000</td>
                  </tr>
                  <tr>
                    <td>45</td>
                    <td>Vine Followers => Max 200K, Instant, Kualitas Bagus</td>
                    <td>23000</td>
                    <td>100</td>
                    <td>200.000</td>
                  <tr>
                    <td>46</td>
                    <td>Vine Revines => Max 200K, Instant, Kualitas Bagus</td>
                    <td>23000</td>
                    <td>100</td>
                    <td>200.000</td>
                  </tr>
                  <tr>
                    <td>47</td>
                    <td>Vine Loops => Max 1M, Instant, Kualitas Bagus</td>
                    <td>23000</td>
                    <td>100</td>
                    <td>1.000.000</td>
                  </tr>
                  <tr>
                    <td>48</td>
                    <td>Vine Likes => Max 200K, Instant, Kualitas Bagus</td>
                    <td>23000</td>
                    <td>100</td>
                    <td>200.000</td>
                  </tr>
                  <tr>
                    <td>51</td>
                    <td>Soundcloud Plays => Max 1M, Instant, Kualitas Bagus</td>
                    <td>13000</td>
                    <td>100</td>
                    <td>1.000.000</td>
                  </tr>
                  <tr>
                    <td>52</td>
                    <td>Soundcloud Downloads => Max 50K, Instant, Kualitas Bagus</td>
                    <td>12000</td>
                    <td>100</td>
                    <td>50.000</td>
                  </tr>
                  <tr>
                    <td>53</td>
                    <td>SoundCloud Followers => Max 1M, Instant, Kualitas Bagus</td>
                    <td>83000</td>
                    <td>100</td>
                    <td>1.000.000</td>
                  <tr>
                    <td>56</td>
                    <td>Google Plus Followers => Max 1K, Proses dimulai 1x12Jam</td>
                    <td>300000</td>
                    <td>100</td>
                    <td>1.000</td>
                  </tr>
                  <tr>
                    <td>57</td>
                    <td>Google Plus Likes => Max 5K, Kualitas bagus, diproses 1x24jam</td>
                    <td>170000</td>
                    <td>100</td>
                    <td>5.000</td>
                  </tr>
                  <tr>
                    <td>58</td>
                    <td>Google Plus reshare => Max 5K, Kualitas bagus, diproses 1x24jam</td>
                    <td>180000</td>
                    <td>100</td>
                    <td>5.000</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </div>

      </div>


      <div class="row">

        <div class="col-lg-4">
          <div class="widget">
            <div class="widget-header"> <i class="icon-star"></i>
              <h3>List Reseller Resmi</h3>
            </div>
            <div class="widget-content">
- Masih Kosong <br>
- Masih Kosong <br>
- Masih Kosong <br>
</div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="widget">
            <div class="widget-header"> <i class="icon-money"></i>
              <h3>PAYMENT</h3>
            </div>
            <div class="widget-content">
- Pulsa Telkomsel <br>

            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="widget">
            <div class="widget-header"> <i class="icon-phone-sign"></i>
              <h3>CONTACT US</h3>
            </div>
            <div class="widget-content">
Line : @alfandiyusuf ( Pakai @ )
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery.js"></script> 
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<script src="assets/js/html5.js"></script>
<script src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/smooth-sliding-menu.js"></script> 
<script class="include" type="text/javascript" src="javascript/jquery191.min.js"></script> 
<script class="include" type="text/javascript" src="javascript/jquery.jqplot.min.js"></script> 
<script src="assets/sparkline/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/sparkline/jquery.customSelect.min.js" ></script>
<script src="js/select-checkbox.js"></script> 
<script src="js/to-do-admin.js"></script>

</body>
</html>