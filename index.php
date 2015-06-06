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
    <title>RUN FOREVER NYC</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/chart.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.fancybox').fancybox();
      });
    </script>

    <script src="js/jquery.fancybox.js"></script>
    <link rel="stylesheet" href="css/jquery.fancybox.css" media="screen" />

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
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="">
          <img src="images/slide_01.jpg" alt="" />
        </div>
        <div class="item">
          <img data-src="holder.js/900x500/auto/#111:#333333/text:Second slide" alt="">
          <img src="images/slide_02.jpg" alt="" />
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->



    <!-- Contant -->

    <div class="container clearfix mb-20">
      <div class="c12 row">
        <p class="welcome-text">Lorem tIpsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
      </div>
      <h2><span>What we do?</span></h2>
      <div class="c3 charts">
        <canvas id="canvas" height="210" width="210"></canvas>
        <p><span>96%</span><br />Photography</p>
        <script>
          var doughnutDataOne = [{value: 96,color:"#70c1ff"},{value: 4,color: "#daf2ff"},];
          var myDoughnut = new Chart(document.getElementById("canvas").getContext("2d")).Doughnut(doughnutDataOne);
        </script>
      </div>
      <div class="c3 charts">
        <canvas id="canvas2" height="210" width="210"></canvas>
        <p><span>61%</span><br />Web design</p>
        <script>
          var doughnutDataTwo = [{value: 61,color:"#70c1ff"},{value: 39,color: "#daf2ff"},];
          var myDoughnut = new Chart(document.getElementById("canvas2").getContext("2d")).Doughnut(doughnutDataTwo);
        </script>
      </div>
      <div class="c3 charts">
        <canvas id="canvas3" height="210" width="210"></canvas>
        <p><span>53%</span><br />Development</p>
        <script>
          var doughnutDataThree = [{value: 53,color:"#70c1ff"},{value: 47,color: "#daf2ff"},];
          var myDoughnut = new Chart(document.getElementById("canvas3").getContext("2d")).Doughnut(doughnutDataThree);
        </script>
      </div>
      <div class="c3 charts">
        <canvas id="canvas4" height="210" width="210"></canvas>
        <p><span>13%</span><br />Other</p>
        <script>
          var doughnutDataFour = [{value: 13,color:"#70c1ff"},{value: 77,color: "#daf2ff"},];
          var myDoughnut = new Chart(document.getElementById("canvas4").getContext("2d")).Doughnut(doughnutDataFour);
        </script>
      </div>
      <div class="clearfix"></div>
      <h2><span>Portfolio</span></h2>
      <div class="c4 portfolio-thumb">
        <a class="fancybox" data-fancybox-group="gallery" rel="group" href="images/portfolio-01.jpg" title="Venice sunset"><img src="images/portfolio-thumb-01.jpg" alt="" /></a>
      </div>
      <div class="c4 portfolio-thumb">
        <a class="fancybox" data-fancybox-group="gallery" rel="group" href="images/portfolio-02.jpg" title="Rio de Janeiro"><img src="images/portfolio-thumb-02.jpg" alt="" /></a>
      </div>
      <div class="c4 portfolio-thumb">
        <a class="fancybox" data-fancybox-group="gallery" rel="group" href="images/portfolio-03.jpg" title="Venetian Grand Canal at evening"><img src="images/portfolio-thumb-03.jpg" alt="" /></a>
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
    <script src="js/bootstrap.js"></script>
  </body>
</html>