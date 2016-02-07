
<h1>Run Forever Administration </h1>



<?php foreach($data as $route=>$text): ?>
<li><?php echo link_to($text, $route); ?></li>
<?php endforeach; ?>
