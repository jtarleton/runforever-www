<script type="text/javascript">

jQuery(document).ready(function() {

jQuery('#eventsList').dataTable();


});
</script>


       
 <article class="post">
                <header>
                  <div class="title">
                     <h2><span>Events</span></h2>
                </div>
</header>


<div>










<table id="eventsList">
<thead><tr><th>Name</th></tr></thead><tbody>
<?php foreach($events as $event): ?>
<tr><td><?php echo $event->getName(); ?></td></tr>
<?php endforeach; ?></tbody>
</table>
</div></article>
