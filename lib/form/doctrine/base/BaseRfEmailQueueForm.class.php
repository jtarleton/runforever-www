<?php

/**
 * RfEmailQueue form base class.
 *
 * @method RfEmailQueue getObject() Returns the current form's model object
 *
 * @package    runforever
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRfEmailQueueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputText(),
      'subject'                 => new sfWidgetFormInputText(),
      'body'                    => new sfWidgetFormTextarea(),
      'recipient_email_address' => new sfWidgetFormInputText(),
      'sent_status'             => new sfWidgetFormInputText(),
      'date_sent'               => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorInteger(),
      'subject'                 => new sfValidatorString(array('max_length' => 200)),
      'body'                    => new sfValidatorString(),
      'recipient_email_address' => new sfValidatorString(array('max_length' => 200)),
      'sent_status'             => new sfValidatorInteger(),
      'date_sent'               => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('rf_email_queue[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RfEmailQueue';
  }

}
