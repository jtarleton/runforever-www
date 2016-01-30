<?php 

class RfRegistrationForm extends sfForm 
{


public function configure() {

$this->disableCSRFProtection();

$this->setWidgets(array(
    'field1'    => new sfWidgetFormInputText(),
    'field2'   => new sfWidgetFormInputText(array('default' => 'me@example.com')),
    'subject' => new sfWidgetFormChoice(array('choices' => array('Subject A', 'Subject B', 'Subject C'))),
    'message' => new sfWidgetFormTextarea(),
  ));


$this->setValidators(
	array(
      		'field1' => new sfValidatorString(array('required' => true)), 
      		'field2' => new sfValidatorString(array('required' => true)),
		'subject'=>new sfValidatorPass,
		'message'=>new sfValidatorPass
    	)
);







}























}
