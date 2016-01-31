
<h2><span>Login</span></h2>


<form class="xform-horizontal xform-signin" action="<?php echo url_for('security/login') ?>"  method="POST">
  
<?php echo $form; ?>

<input type="submit" name="submit" value="login"></input>
</form>

<div>
<p><a href="http://www.runforever.co/register">Register for an account</a> | 
<a href="http://www.runforever.co/security/forgotpassword">Forget password?</a></p>
</div>