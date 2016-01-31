<div class="container">

<div class="row">
<form class="xform-horizontal xform-signin" action="<?php echo url_for('security/login') ?>"  method="POST">
  
<?php echo $form; ?>

<input type="submit" name="submit" value="login"></input>
</form>
</div></div>
