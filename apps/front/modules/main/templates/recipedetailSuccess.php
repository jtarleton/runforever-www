
<div class="container clearfix mt-100 mb-20">
 <h2><span><?php echo link_to('Home','@homepage'); ?> | <?php echo link_to('Recipes','@recipes'); ?> | <?php echo $recipe->getTitle(); ?>
 </span></h2>


<div class="row">

<div class="c12">
<div>Description: <br />
<?php echo $recipe->getDescription(); ?>
</div>
<br />
<div>Ingredients: <br />
<?php echo $recipe->getIngredients(); ?>
</div>
<br />
<div>Directions: <br />
<?php echo $recipe->getDirections(); ?>
</div>
</div></div></div>
