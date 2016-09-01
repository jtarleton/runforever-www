

    
 <article class="post">
                <header>
                  <div class="title">
                     <h2><span>Quotes</span></h2>
                </div>
</header>
<?php foreach($quotes as $quote): ?>





<div style="float:left; margin-right:10px;">
<img class="image crop-height scale" src="<?php echo $quote->getQuoteImgSrc(); ?>"></img>
</div>
<br /><br />
<p style="font-family:Garamond; serif; font-weight:800;">&#8220;<?php echo $quote->getQuoteText(); ?>&#8221;
</p>
<div style="margin-left:85px; font-size:90%;">
<?php echo $quote->getQuoteAuthor(); ?></small>
</div><hr/>




<?php endforeach; ?>
</article>

