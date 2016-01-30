<script type="text/javascript">

jQuery(document).ready(function() {

jQuery('#eventsList').dataTable();


});
</script>


<div class="container clearfix mt-100 mb-20">
      <h2><span>Races & Events</span></h2>

<div class="row">










<div class="c12">
<table id="eventsList">
<thead><tr><th>Name</th></tr></thead><tbody>
<?php foreach($events as $event): ?>
<tr><td><?php echo $event->getName(); ?></td></tr>
<?php endforeach; ?></tbody>
</table>
</div>
</div>


      </div><!-- /.container -->


