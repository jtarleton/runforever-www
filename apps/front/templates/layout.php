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
    <?php include_javascripts() ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700' rel='stylesheet' type='text/css'>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <title>Run Forever</title>
   <!-- <link href="http://www.runforever.co/css/style.css" rel="stylesheet"> -->
<link href="http://www.runforever.co/css/datatables.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
      

      <script src="http://www.runforever.co/assets/js/util.js"></script>
      
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <!-- 

      <script src="http://www.runforever.co/assets/js/main.js"></script> -->

  </body>
</html>































