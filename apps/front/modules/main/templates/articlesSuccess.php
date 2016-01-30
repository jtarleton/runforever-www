
<div class="container clearfix mt-100 mb-20">
      <h2><span>Articles</span></h2>
      <div class="c12 row">
	<?php foreach($articles as $article): ?>

	<p><?php echo  $article->getTitle(); ?><br />
	<?php endforeach; ?>
      </div>
      </div><!-- /.container -->


