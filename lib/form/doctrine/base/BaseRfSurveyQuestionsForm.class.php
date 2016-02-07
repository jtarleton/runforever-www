<?php

/**
 * RfSurveyQuestions form base class.
 *
 * @method RfSurveyQuestions getObject() Returns the current form's model object
 *
 * @package    runforever
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRfSurveyQuestionsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'survey_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RfSurvey'), 'add_empty' => false)),
      'question_text' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'survey_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RfSurvey'))),
      'question_text' => new sfValidatorString(array('max_length' => 250)),
    ));

    $this->widgetSchema->setNameFormat('rf_survey_questions[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RfSurveyQuestions';
  }

}
