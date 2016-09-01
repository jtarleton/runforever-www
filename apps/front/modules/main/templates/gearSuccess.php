 <article class="post">
                <header>
                  <div class="title">
                     <h2><span>Product Reviews</span></h2>
                </div>
</header>

<br />

	<?php foreach($gear as $gearItem): ?>
<div class="row">         
<img style="float:left;" src="<?php echo $gearItem->getImgSrc(); ?>" alt="" class="crop-height image scale"></img>


<h4><?php echo $gearItem->getProduct(); ?>
</h4>

<br /><br /><?php echo $gearItem->getReviewText(); ?>


<br />
<div class="row">
<p>Rating (1-5): <?php echo $gearItem->getStarRating(); ?></p>
</div>
<div style="clear:both;"></div>
</div>
	<?php endforeach; ?>
     

</article>
