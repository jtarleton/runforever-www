<?php

/**
 * RfArticles form base class.
 *
 * @method RfArticles getObject() Returns the current form's model object
 *
 * @package    runforever
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRfArticlesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'title'      => new sfWidgetFormInputText(),
      'author'     => new sfWidgetFormInputText(),
      'url'        => new sfWidgetFormInputText(),
      'img_src'    => new sfWidgetFormInputText(),
      'source'     => new sfWidgetFormInputText(),
      'created_on' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'      => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'author'     => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'url'        => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'img_src'    => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'source'     => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'created_on' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rf_articles[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RfArticles';
  }

}
