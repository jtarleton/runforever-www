<div class="container clearfix mt-100 mb-20">
 <h2><span><?php echo link_to('Home','@homepage'); ?> | Slideshows
 </span></h2>



<?php
if(class_exists('Carousel')):
Carousel::get($slides->getData())->render(); else: ?>Missing Carousel<?php endif; 
?>
