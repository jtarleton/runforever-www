
 <article class="post">
                <header>
                  <div class="title">
                     <h2><span>Register</span></h2>
                </div>
</header>
<div>



	<?php foreach($recipes as $recipe): ?>

	<p><?php echo link_to($recipe->getTitle(), '@recipedetail?rid=' . $recipe->getRid()); ?><br />
	<?php endforeach; ?>
</div>

</article>


