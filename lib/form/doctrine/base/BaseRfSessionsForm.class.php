<?php

/**
 * RfSessions form base class.
 *
 * @method RfSessions getObject() Returns the current form's model object
 *
 * @package    runforever
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRfSessionsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputText(),
      'ip'         => new sfWidgetFormInputText(),
      'uid'        => new sfWidgetFormInputText(),
      'started_at' => new sfWidgetFormDateTime(),
      'expires_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorString(array('max_length' => 250)),
      'ip'         => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'uid'        => new sfValidatorInteger(array('required' => false)),
      'started_at' => new sfValidatorDateTime(array('required' => false)),
      'expires_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rf_sessions[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RfSessions';
  }

}
