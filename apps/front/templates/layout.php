<!DOCTYPE HTML>
<!--
  Future Imperfect by Pixelarity
  pixelarity.com @pixelarity
  License: pixelarity.com/license
-->
<html>
  <head>
    <title>Run Forever</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="http://www.runforever.co/assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
      <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>

    <link rel="shortcut icon" href="http://www.runforever.co/images/favicon.ico" />

    <?php include_stylesheets() ?>
    <?php //include_javascripts() ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700' rel='stylesheet' type='text/css'>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <title>Run Forever</title>
   <!-- <link href="http://www.runforever.co/css/style.css" rel="stylesheet"> -->

<style type="text/css">




	

.carousel {
  position: relative;
  margin-bottom: 20px;
  line-height: 1;
}

.carousel-inner {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.carousel-inner > .item {
  position: relative;
  display: none;
  -webkit-transition: 0.6s ease-in-out left;
     -moz-transition: 0.6s ease-in-out left;
       -o-transition: 0.6s ease-in-out left;
          transition: 0.6s ease-in-out left;
}

.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  display: block;
  line-height: 1;
}

.carousel-inner > .active,
.carousel-inner > .next,
.carousel-inner > .prev {
  display: block;
}

.carousel-inner > .active {
  left: 0;
}

.carousel-inner > .next,
.carousel-inner > .prev {
  position: absolute;
  top: 0;
  width: 100%;
}

.carousel-inner > .next {
  left: 100%;
}

.carousel-inner > .prev {
  left: -100%;
}

.carousel-inner > .next.left,
.carousel-inner > .prev.right {
  left: 0;
}

.carousel-inner > .active.left {
  left: -100%;
}

.carousel-inner > .active.right {
  left: 100%;
}

.carousel-control {
  position: absolute;
  top: 40%;
  left: 15px;
  width: 40px;
  height: 40px;
  margin-top: -20px;
  font-size: 60px;
  font-weight: 100;
  line-height: 30px;
  color: #ffffff;
  text-align: center;
  background: #222222;
  border: 3px solid #ffffff;
  -webkit-border-radius: 23px;
     -moz-border-radius: 23px;
          border-radius: 23px;
  opacity: 0.5;
  filter: alpha(opacity=50);
}

.carousel-control.right {
  right: 15px;
  left: auto;
}

.carousel-control:hover,
.carousel-control:focus {
  color: #ffffff;
  text-decoration: none;
  opacity: 0.9;
  filter: alpha(opacity=90);
}

.carousel-indicators {
  position: absolute;
  top: 15px;
  right: 15px;
  z-index: -1;
  margin: 0;
  list-style: none;
}

.carousel-indicators li {
  display: block;
  float: left;
  width: 10px;
  height: 10px;
  margin-left: 5px;
  text-indent: -999px;
  background-color: #ccc;
  background-color: rgba(255, 255, 255, 0.25);
  border-radius: 5px;
}

.carousel-indicators .active {
  background-color: #fff;
}

.carousel-caption {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 15px;
  background: #333333;
  background: rgba(0, 0, 0, 0.75);
}

.carousel-caption h4,
.carousel-caption p {
  line-height: 20px;
  color: #ffffff;
}

.carousel-caption h4 {
  margin: 0 0 5px;
}

.carousel-caption p {
  margin-bottom: 0;
}





</style>

<link href="http://www.runforever.co/css/datatables.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--   <script src='https://www.google.com/recaptcha/api.js'></script>
  
  <script src="js/chart.js"></script>
    <script type="text/javascript" src="http://www.runforever.co/js/datatables.js"></script> -->
 <script type="text/javascript" src="http://www.runforever.co/js/carousel.js"></script>


  </head>
  <body>

<?php require('top.html'); ?>










    <!-- Main -->
          <div id="main">





<?php if ($sf_user->hasFlash('notice')): ?>
  <div style="background-color:#CCC; padding:10px;" class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
<?php endif ?>
 
<?php if ($sf_user->hasFlash('error')): ?>
  <div style="background-color:salmon; padding:10px;"  class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif ?>


    <!-- Contant -->
<?php echo $sf_content; ?>
















        <!-- Sidebar -->
          <section id="sidebar">



            <!-- Footer -->
              <section id="footer">
                <ul class="icons">
                  <!-- <li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
                  <li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
                  <li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
                  <li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li> -->
                  <li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
                </ul>
                <p class="copyright">&copy; Run Forever.</p>
              </section>

          </section>

      </div>

    <!-- Scripts 
      <script src="http://www.runforever.co/assets/js/jquery.min.js"></script>
      

      <script src="http://www.runforever.co/assets/js/skel.min.js"></script>
      

      <script src="http://www.runforever.co/assets/js/util.js"></script> -->
      
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <!-- 

      <script src="http://www.runforever.co/assets/js/main.js"></script> -->

  </body>
</html>































