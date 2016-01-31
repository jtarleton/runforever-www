

      <h2><span>Recipes</span></h2>
 
	<?php foreach($recipes as $recipe): ?>

	<p><?php echo link_to($recipe->getTitle(), '@recipedetail?rid=' . $recipe->getRid()); ?><br />
	<?php endforeach; ?>



