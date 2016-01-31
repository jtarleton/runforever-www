<?php 

class RfRegistrationForm extends sfForm 
{


public function configure() {

	$this->disableCSRFProtection();

	$this->setWidgets(array(
	    'username'    => new sfWidgetFormInputText(),
	    'email'   => new sfWidgetFormInputText(array('default' => 'me@example.com')),
	        'userpass'   => new sfWidgetFormInputText(array('default' => '')),

	         
	  ));


	$this->setValidators(
		array(
	      		'email' => new sfValidatorString(array('required' => true)), 
	      		'username' => new sfValidatorString(array('required' => true)),
			      'userpass'=>new sfValidatorPass,
			      'g-recaptcha-response'=>new GoogleCaptchaValidator,		       
	    	)
		);

	//$this->mergePostValidator();



	 //new sfValidatorCallback(array(
	  //'callback'  => 'constant_validator_callback',
	  //'arguments' => array('blah' => 'foo'),
	//));


 




}


	public function constant_validator_callback($validator, $value, $arguments)
	{
	  if ($value != $arguments['blah'])
	  {
	    throw new sfValidatorError($validator, 'invalid');
	  }
	 
	  return $value;
	}





















}
