<?php use_helper('CustomForm'); ?>


<div class="container clearfix mt-100 mb-20">
      <h2><span>Login</span></h2>

<div class="row">





<form class="form-horizontal" action="<?php echo url_for('main/login') ?>" method="post">





				<?php foreach(array($form['username'], $form['password']) as $sfFormFieldObj): ?>
					<?php printAsBootstrapForm($form, $sfFormFieldObj); ?>
				<?php endforeach;   ?>


<p><input type="submit" value="Login" name="sbmt-login"></input>
</p>
</form>
Please <a href="http://www.runforever.co/register">Register for an account</a> | 
<a href="http://www.runforever.co/security/forgotpassword">Forget password?</a>

</div></div>
