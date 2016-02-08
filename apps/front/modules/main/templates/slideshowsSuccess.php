<script type="text/javascript">
jQuery(document).ready(function() {

    jQuery('#myCarousel').carousel();
	
});
</script>




<article class="post">
	
<header>
<div class="title">
<h2><span>Slideshows</span></h2>
</div>
</header>

    <div id="myCarousel" class="carousel slide">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <!-- Carousel items -->
      <div class="carousel-inner">
        <div class="active item"><img src="http://www.w3schools.com/bootstrap/img_chania.jpg" alt="Chania"></div>
        <div class="item"><img src="http://www.w3schools.com/bootstrap/img_chania2.jpg" alt="Chania"></div>
        <div class="item"><img src="http://www.w3schools.com/bootstrap/img_flower.jpg" alt="Chania"></div>
           <div class="item"><img src="http://www.w3schools.com/bootstrap/img_flower2.jpg" alt="Chania"></div>
      </div>
      <!-- Carousel nav -->
      <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>







<?php
//if(class_exists('Carousel')):
//Carousel::get($slides->getData())->render(); 





//else: ?>Missing Carousel<?php 
//endif; 
?>
</article>
