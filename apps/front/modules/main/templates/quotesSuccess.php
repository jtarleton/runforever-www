

      <h2><span>Quotes</span></h2>
 <article class="post">
                <header>
                  <div class="title">
                    <h2><a href="#"><span>Welcome</span></a></h2>
                </div>
</header>
<?php foreach($quotes as $quote): ?>



<div>



<img src="<?php echo $quote->getQuoteImgSrc(); ?>" style="width:100px; height:100px;"></img>


<p><i>&#8220;<?php echo $quote->getQuoteText(); ?>&#8221;</i>
<br /><br />
<small>
<?php echo $quote->getQuoteAuthor(); ?></small>
</p>
</div>










<?php endforeach; ?>
</article>

