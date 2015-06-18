
<div class="container clearfix mt-100 mb-20">
      <h2><span>Quotes</span></h2>
<!--       <div class="c12 row">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
      </div>
     --> 
<?php foreach($quotes as $quote): ?>
<div class="row">
        <div class="c12">
<p><i>&#8220;<?php echo $quote->getQuoteText(); ?>&#8221;</i>
<br /><br /><small>
<?php echo $quote->getQuoteAuthor(); ?></small>
</p><br /><br />
</div>
<!--         <div class="c3">
</div> -->
<!-- 
        <div class="c6">
          <img src="images/custom-1.jpg" alt="" / >
        </div> -->
      </div>
<?php endforeach; ?>
      </div><!-- /.container -->


