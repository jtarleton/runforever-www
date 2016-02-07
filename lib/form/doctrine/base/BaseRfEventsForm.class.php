<?php

/**
 * RfEvents form base class.
 *
 * @method RfEvents getObject() Returns the current form's model object
 *
 * @package    runforever
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRfEventsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                          => new sfWidgetFormInputHidden(),
      'name'                        => new sfWidgetFormInputText(),
      'race_type'                   => new sfWidgetFormInputText(),
      'event_type'                  => new sfWidgetFormInputText(),
      'date'                        => new sfWidgetFormDate(),
      'time'                        => new sfWidgetFormTime(),
      'year'                        => new sfWidgetFormInputText(),
      'hosted_by'                   => new sfWidgetFormInputText(),
      'city'                        => new sfWidgetFormInputText(),
      'state'                       => new sfWidgetFormInputText(),
      'last_year_participant_count' => new sfWidgetFormInputText(),
      'website_url'                 => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                        => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'race_type'                   => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'event_type'                  => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'date'                        => new sfValidatorDate(array('required' => false)),
      'time'                        => new sfValidatorTime(array('required' => false)),
      'year'                        => new sfValidatorInteger(array('required' => false)),
      'hosted_by'                   => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'city'                        => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'state'                       => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'last_year_participant_count' => new sfValidatorInteger(array('required' => false)),
      'website_url'                 => new sfValidatorString(array('max_length' => 250, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rf_events[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RfEvents';
  }

}
