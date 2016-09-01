                <article class="post"><header>
                  <div class="title">
                     <h2><span>Run Forever</span></h2>
                </div>
</header>



<?php foreach($posts as $post): ?>		
<p>
<div style="float:left; margin-right:20px;">
<img class="crop-height scale" src="<?php echo $post->getImgSrc(); ?>">
</div>
<?php echo link_to($post->getTitle(),'@rfpostdetail?pid='.$post->getId() ) .'</b> <br /><span style="font-style:italic;color: #696969; font-size:70%;font-weight:650;">Posted: '. date('m/d/Y g:i:s a', strtotime($post->getCreatedOn()) ).'</span>'; 
?>
<?php if($post->getCreatedOn() !== $post->getUpdatedOn()) {
echo '<span style="font-size:75%; font-style:normal;"> |</span><span style="font-size:70%; font-style:italic;color:#696969;font-weight:650;"> Updated: '. date('m/d/Y g:i:s a', strtotime($post->getCreatedOn())).'</span></i>';

} ?>

<br />
          



<?php echo ($post->getIntro()); //nl2br  ?><br />
<br />



  <footer>
                  <ul class="actions">
                    <li><?php
 echo link_to('Read&#10148;','@rfpostdetail?pid='.$post->getId() , array('class'=>'button small')) ?>

</li>
                  </ul>
                  <ul class="stats">
                    <!-- <li>In: <a href="#">Running</a></li>
		    <li>Tagged: <a href="">running</a>,<a href="">nutrition</a>, <a href="">road races</a>,<a href="">health</a> </li>
                    <li><a href="#" class="icon fa-heart">28</a></li>
                    <li><a href="#" class="icon fa-comment">128</a></li> -->
                  </ul>
                </footer>




<hr />
	<?php endforeach; ?>

</article>
