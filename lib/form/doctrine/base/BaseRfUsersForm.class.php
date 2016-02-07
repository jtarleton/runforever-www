<?php

/**
 * RfUsers form base class.
 *
 * @method RfUsers getObject() Returns the current form's model object
 *
 * @package    runforever
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRfUsersForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'facebook_id'           => new sfWidgetFormInputText(),
      'username'              => new sfWidgetFormInputText(),
      'userpass'              => new sfWidgetFormInputText(),
      'email'                 => new sfWidgetFormInputText(),
      'ip'                    => new sfWidgetFormInputText(),
      'verification_token'    => new sfWidgetFormInputText(),
      'verification_token_ts' => new sfWidgetFormInputText(),
      'is_verified'           => new sfWidgetFormInputText(),
      'created'               => new sfWidgetFormInputText(),
      'updated'               => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'facebook_id'           => new sfValidatorInteger(array('required' => false)),
      'username'              => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'userpass'              => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'email'                 => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'ip'                    => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'verification_token'    => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'verification_token_ts' => new sfValidatorInteger(array('required' => false)),
      'is_verified'           => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'created'               => new sfValidatorInteger(array('required' => false)),
      'updated'               => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rf_users[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RfUsers';
  }

}
