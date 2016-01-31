

 <article class="post">
                <header>
                  <div class="title">
                     <h2><span>What's New</span></h2>
                </div>
</header>
<?php foreach($posts as $post): ?>


<div>
		
<p><b><?php echo $post->getTitle().'</b> <span style="color: #CCC; padding-left:10px;"> '. date('m/d/Y g:i:s a', strtotime($post->getCreatedOn()) ).'</span>'; 




?>
</b>

<?php if($post->getCreatedOn() != $post->getUpdatedOn()) {

echo '<i>Updated on: '. date('m/d/Y g:i:s a', strtotime($post->getCreatedOn())).'</i>';

} ?>

</p>
          

<p><?php echo nl2br($post->getBody()); ?></p>


        	</div>


	<?php endforeach; ?>
</article>
