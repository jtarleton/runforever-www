
  <article class="post">
                <header>
                  <div class="title">
                     <h2><span>Slideshows</span></h2>
                </div>
</header>


<?php
if(class_exists('Carousel')):
Carousel::get($slides->getData())->render(); else: ?>Missing Carousel<?php endif; 
?>
</article>