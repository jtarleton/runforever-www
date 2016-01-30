
<div class="container clearfix mt-100 mb-20">
      <h2><span>Recipes</span></h2>
      <div class="c12 row">
	<?php foreach($recipes as $recipe): ?>

	<p><?php echo link_to($recipe->getTitle(), '@recipedetail?rid=' . $recipe->getRid()); ?><br />
	<?php endforeach; ?>
      </div>
      </div><!-- /.container -->


