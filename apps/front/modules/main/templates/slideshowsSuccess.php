<article class="post">
	
<header>
<div class="title">
<h2><span>Slideshows</span></h2>
</div>
</header>






<?php

//foreach($slideshows as $slideshows): ?>

<?php 
//echo link_to($slideshow->getTitle(), '@slideshow?ss='.$slideshow->getId()); ?>

<?php //endforeach; ?>
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
