<div class="container">
<h2><span>Login</span></h2>


<div class="row">
<form class="xform-horizontal xform-signin" action="<?php echo url_for('security/login') ?>"  method="POST">
  
<?php echo $form; ?>

<input type="submit" name="submit" value="login"></input>
</form>
<br />

Please <a href="http://www.runforever.co/register">Register for an account</a> | 
<a href="http://www.runforever.co/security/forgotpassword">Forget password?</a>


</div></div>
