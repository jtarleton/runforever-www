<script type="text/javascript">
jQuery(document).ready(function() {

    jQuery('#myCarousel').carousel({
            pause: true,
            interval: false
        });


});
</script>



<article class="post">
	
<header>
<div class="title">
<h2><span>Slideshows</span></h2>
</div>
</header>






<?php
if(class_exists('Carousel')):
//Carousel::get($slides->getData())->render(); 

foreach($slides as $slide):

echo $slide->getSlideBody();
echo $slide->getSlideTitle();
echo $slide->getSlideCaption();
endforeach;



else: ?>Missing Carousel<?php 
endif; 
?>
 </article>
