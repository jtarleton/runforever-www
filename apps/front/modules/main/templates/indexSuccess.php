<div class="container clearfix mt-100 mb-20">
      <h2><span><?php echo $post->getTitle(); ?></span></h2>

<div class="row">

		<div class="c6">
          <p><?php echo nl2br($post->getBody()); ?></p>



<p>
Read latest blog posts <a href="http://www.runforever.co/news">here</a>.
</p>
</div>

		<div class="c6"><p>
		<img src="<?php echo $post->getImgSrc(); ?>" alt="" />
        	</p>

		</div>
	</div>
      </div>
      </div><!-- /.container -->


