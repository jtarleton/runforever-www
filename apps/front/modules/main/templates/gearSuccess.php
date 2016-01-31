
      <h2><span>Gear</span></h2>
      <div class="c12 row">
<p>Gear reviews...</p>      
</div>

	<?php foreach($gear as $gearItem): ?>
      <div class="row">
        <div class="c3">
        	<p>
	<b><?php echo $gearItem->getProduct(); ?></b>
</p>  
	<p>
		<?php echo $gearItem->getReviewText(); ?>
	</p></div>
        <div class="c3">
<p>...</p>        
</div>
        <div class="c6">
          <img src="images/custom-1.jpg" alt="" style="width:100px;height:100px;"></img>
        </div>
      </div>
	<?php endforeach; ?>
     

