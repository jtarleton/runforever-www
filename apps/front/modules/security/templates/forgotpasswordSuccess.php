<div class="container">

	<div class="row">
		<form class="xform-horizontal xform-signin" action="<?php echo url_for('security/forgotpassword') ?>"  method="POST">
		  
		<?php echo $form; ?>

		<input type="submit" name="submit" value="Reset password"></input>
		<div class="g-recaptcha" data-sitekey="6LdH8BYTAAAAAEEuu8ITEm48lAbDXvBdvazB90X_"></div></form>

	</div>

</div>
