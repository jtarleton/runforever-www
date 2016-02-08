<?php

/**
 * RfSurveyAnswers form base class.
 *
 * @method RfSurveyAnswers getObject() Returns the current form's model object
 *
 * @package    runforever
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRfSurveyAnswersForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputText(),
      'question_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RfSurveyQuestions'), 'add_empty' => false)),
      'ans_text'    => new sfWidgetFormTextarea(),
      'uid'         => new sfWidgetFormInputText(),
      'created_on'  => new sfWidgetFormDateTime(),
      'updated_on'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorInteger(),
      'question_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RfSurveyQuestions'))),
      'ans_text'    => new sfValidatorString(),
      'uid'         => new sfValidatorInteger(),
      'created_on'  => new sfValidatorDateTime(array('required' => false)),
      'updated_on'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rf_survey_answers[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RfSurveyAnswers';
  }

}
