<?php use_helper('Date'); ?>  <article class="post">

<header>
<div class="title"><h2><span><?php echo $post->getTitle(); ?></span></h2>
</div>
</header>

<div style="float:left; margin-right:5px; margin-bottom:5px;">
<img class="crop-height scale" src="<?php echo $post->getImgSrc(); ?>"></img>
</div>
<p>
<?php echo format_date($post->getCreatedOn(),'f'); ?>
</p>
<p>
<?php echo $post->getBody(); 
?></p>
</article>
