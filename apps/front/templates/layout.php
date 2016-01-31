<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>

    <link rel="shortcut icon" href="/favicon.ico" />

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
    <link href="http://www.runforever.co/css/style.css" rel="stylesheet">
<link href="http://www.runforever.co/css/datatables.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/chart.js"></script>
    <script type="text/javascript" src="js/datatables.js"></script>
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>
  <div class="sticky">
<?php require('top.html'); ?>


<?php if ($sf_user->hasFlash('error')): ?>
  <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif ?>

<br /><br />
    <!-- Contant -->
<?php echo $sf_content; ?>

<!--     
<img style="width:150px; height:150px;" src="http://www.hammernutrition.com/images/general/referral-discount.jpg"></img>
-->


<div class="push">	</div>
  </div>
    <!--FOOTER-->
    <div class="footer">
      <div class="container clearfix">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2015 RunForever</p>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/bootstrap.js"></script>
  </body>
</html>





