<?php 

class RfPasswordResetForm extends sfForm 
{


public function configure() {

	$this->disableCSRFProtection();

	$this->setWidgets(array(


		 'currentpass'    => new sfWidgetFormInputText(),

	    'newpass'    => new sfWidgetFormInputText(),
	        'confirmpass'   => new sfWidgetFormInputText(array('default' => '')),

	         
	  ));


	$this->setValidators(
		array(
	      		'currentpass' => new sfValidatorString(array('required' => true)),
			      'newpass'=>new sfValidatorPass,
			'confirmpass'=>new sfValidatorPass
	    	)
		);

	//$this->mergePostValidator();

	$this->mergePostValidator(new sfValidatorSchemaCompare('newpass',
sfValidatorSchemaCompare::EQUAL, 'confirmpass',
        array('throw_global_error' => true),
        array('invalid' => 'The passwords need be equal')
      )
	);



	 // $this->validatorSchema->setPostValidator(  new sfValidatorCallback(array(
	  //'callback'  => 'rf_validator_callback',
	  //'arguments' => array('blah' => 'foo'),
	//));


 




}


	public function rf_validator_callback($validator, $value, $arguments)
	{
	  if ($value != $arguments['blah'])
	  {
	    throw new sfValidatorError($validator, 'invalid');
	  }
	 
	  return $value;
	}





















}
