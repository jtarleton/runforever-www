<?php 

class RfLoginForm extends sfForm 
{


public function configure() {


$this->setWidgets(array(
    'username'    => new sfWidgetFormInputText(),
    'password'   => new sfWidgetFormInputPassword(array('default' => 'password')),
    'rememberme' => new sfWidgetFormChoice(array('choices' => array('Remember Me')))
  ));


$this->setValidators(
	array(
      		'username' => new sfValidatorString(array('required' => true)), 
      		'password' => new sfValidatorString(array('required' => true))
    	)
);







}























}
