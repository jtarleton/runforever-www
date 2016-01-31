

 <article class="post">
                <header>
                  <div class="title">
                     <h2><span>Articles</span></h2>
                </div>
</header>


	<?php foreach($articles as $article): ?>
<div>

	<p><?php echo  $article->getTitle(); ?><br /></div>

	<?php endforeach; ?>

</article>

