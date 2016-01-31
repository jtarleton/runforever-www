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
		      'userpass'=>new sfValidatorPass
    	)
);







}























}
