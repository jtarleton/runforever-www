
<div class="container clearfix mt-100 mb-20">
 <h2><span><?php echo link_to('Home','@homepage'); ?> | Films
 </span></h2>


<?php foreach($films as $film): ?>
<div class="row">
<div class="c12">
<b><?php echo $film->getFilmTitle(); ?></b><br/ >
</div></div>
<?php endforeach; ?>
</div>
