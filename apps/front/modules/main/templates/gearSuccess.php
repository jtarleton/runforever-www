
    
 <article class="post">
                <header>
                  <div class="title">
                     <h2><span>Gear</span></h2>
                </div>
</header>

	<?php foreach($gear as $gearItem): ?>
      <div class="row">
         <img src="http://www.runforever.co/images/custom-1.jpg" alt="" class="crop-height image scale"></img><br />
<p><?php echo $gearItem->getProduct(); ?><br /><br />
<?php echo $gearItem->getReviewText(); ?>
      </p></div>

	<?php endforeach; ?>
     

</article>
