<!DOCTYPE HTML>
<!--
  Future Imperfect by Pixelarity
  pixelarity.com @pixelarity
  License: pixelarity.com/license
-->
<html>
  <head>
    <title>Run Forever</title
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="http://www.runforever.co/assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
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
   <!-- <link href="http://www.runforever.co/css/style.css" rel="stylesheet"> -->
<link href="http://www.runforever.co/css/datatables.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
  
    <script src="js/chart.js"></script>
    <script type="text/javascript" src="js/datatables.js"></script>


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

            <!-- Intro -->
              <section id="intro">
                <a href="#" class="logo"><img src="http://www.runforever.co/images/logo.jpg" alt="" /></a>
                <header>
                  <h2>Future Imperfect</h2>
                  <p>Aliquet elit adipiscing nunc faucibus ac Vestibulum</p>
                </header>
              </section>

            <!-- Mini Posts -->
              <section>
                <div class="mini-posts">

                  <!-- Mini Post -->
                    <article class="mini-post">
                      <header>
                        <h3><a href="#">Vitae sed condimentum</a></h3>
                        <time class="published" datetime="2015-10-20">October 20, 2015</time>
                        <a href="#" class="author"><img src="http://www.runforever.co/images/avatar.jpg" alt="" /></a>
                      </header>
                      <a href="#" class="image"><img src="http://www.runforever.co/images/pic04.jpg" alt="" /></a>
                    </article>

                  <!-- Mini Post -->
                    <article class="mini-post">
                      <header>
                        <h3><a href="#">Rutrum neque accumsan</a></h3>
                        <time class="published" datetime="2015-10-19">October 19, 2015</time>
                        <a href="#" class="author"><img src="http://www.runforever.co/images/avatar.jpg" alt="" /></a>
                      </header>
                      <a href="#" class="image"><img src="http://www.runforever.co/images/pic05.jpg" alt="" /></a>
                    </article>

                  <!-- Mini Post -->
                    <article class="mini-post">
                      <header>
                        <h3><a href="#">Odio congue mattis</a></h3>
                        <time class="published" datetime="2015-10-18">October 18, 2015</time>
                        <a href="#" class="author"><img src="http://www.runforever.co/images/avatar.jpg" alt="" /></a>
                      </header>
                      <a href="#" class="image"><img src="http://www.runforever.co/images/pic06.jpg" alt="" /></a>
                    </article>

                  <!-- Mini Post -->
                    <article class="mini-post">
                      <header>
                        <h3><a href="#">Enim nisl veroeros</a></h3>
                        <time class="published" datetime="2015-10-17">October 17, 2015</time>
                        <a href="#" class="author"><img src="http://www.runforever.co/images/avatar.jpg" alt="" /></a>
                      </header>
                      <a href="#" class="image"><img src="http://www.runforever.co/images/pic07.jpg" alt="" /></a>
                    </article>

                </div>
              </section>

            <!-- Posts List -->
              <section>
                <ul class="posts">
                  <li>
                    <article>
                      <header>
                        <h3><a href="#">Lorem ipsum fermentum ut nisl vitae</a></h3>
                        <time class="published" datetime="2015-10-20">October 20, 2015</time>
                      </header>
                      <a href="#" class="image"><img src="http://www.runforever.co/images/pic08.jpg" alt="" /></a>
                    </article>
                  </li>
                  <li>
                    <article>
                      <header>
                        <h3><a href="#">Convallis maximus nisl mattis nunc id lorem</a></h3>
                        <time class="published" datetime="2015-10-15">October 15, 2015</time>
                      </header>
                      <a href="#" class="image"><img src="http://www.runforever.co/images/pic09.jpg" alt="" /></a>
                    </article>
                  </li>
                  <li>
                    <article>
                      <header>
                        <h3><a href="#">Euismod amet placerat vivamus porttitor</a></h3>
                        <time class="published" datetime="2015-10-10">October 10, 2015</time>
                      </header>
                      <a href="#" class="image"><img src="http://www.runforever.co/images/pic10.jpg" alt="" /></a>
                    </article>
                  </li>
                  <li>
                    <article>
                      <header>
                        <h3><a href="#">Magna enim accumsan tortor cursus ultricies</a></h3>
                        <time class="published" datetime="2015-10-08">October 8, 2015</time>
                      </header>
                      <a href="#" class="image"><img src="http://www.runforever.co/images/pic11.jpg" alt="" /></a>
                    </article>
                  </li>
                  <li>
                    <article>
                      <header>
                        <h3><a href="#">Congue ullam corper lorem ipsum dolor</a></h3>
                        <time class="published" datetime="2015-10-06">October 7, 2015</time>
                      </header>
                      <a href="#" class="image"><img src="http://www.runforever.co/images/pic12.jpg" alt="" /></a>
                    </article>
                  </li>
                </ul>
              </section>

            <!-- About -->
              <section class="blurb">
                <h2>About</h2>
                <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
                <ul class="actions">
                  <li><a href="#" class="button">Learn More</a></li>
                </ul>
              </section>

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

    <!-- Scripts -->
      <script src="http://www.runforever.co/assets/js/jquery.min.js"></script>
      <script src="http://www.runforever.co/assets/js/skel.min.js"></script>
      <script src="http://www.runforever.co/assets/js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="http://www.runforever.co/assets/js/main.js"></script>

  </body>
</html>































