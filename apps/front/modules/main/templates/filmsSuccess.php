
 <article class="post">
                <header>
                  <div class="title">
                     <h2><span>Films</span></h2>
                </div>
</header>


<?php foreach($films as $film): ?>
<div>

<b><?php echo $film->getFilmTitle(); ?></b><br/ >
</div>
<?php endforeach; ?> </article>
