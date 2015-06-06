<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700' rel='stylesheet' type='text/css'>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <title>Contact us</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/chart.js"></script>

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



    <!-- Carousel ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item map active">
        </div>
      </div>
    </div><!-- /.carousel -->

    <!-- Contant -->

    <div class="container clearfix">
      <div class="row">     
        <div class="c4">
          <p>Street Name XX<br />
          Floor YY<br />
          City Name, Country<br /><br />

          Telephone: +00 000 000 000<br />
          Mobile: +00 000 000 000<br />
          E-mail: mail@mail.com</p>
        </div>
        <div class="c8">
          <h2><span>Send us a message</span></h2>
          <form class="contactform">
            <p class="c6"><label for="name">Name:</label><input type="text" name="name" id="name" /></p>
            <p class="c6"><label for="email">E-mail:</label><input type="text" name="email" id="email" /></p>
            <p class="c12"><label for="message">Message:</label><textarea rows="5" name="message" id="message"></textarea></p>
            <p class="c12"><input class="btn clearfix" type="button" value="Submit" /></p>
          </form>
        </div>
      </div>
    </div><!-- /.container -->
    <div class="push"></div>
  </div>
    <!--FOOTER-->
    <div class="footer">
      <div class="container clearfix">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2013 Your Name | Template design by Veselka for <a href="http://www.andreasviklund.com">andreasviklund.com</a> | Best hosted at <a href="http://www.svenskadomaner.se">www.svenskadomaner.se</a></p>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>