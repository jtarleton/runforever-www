<?php

/**
 * RfRecipes form base class.
 *
 * @method RfRecipes getObject() Returns the current form's model object
 *
 * @package    runforever
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRfRecipesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'title'       => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'img_src'     => new sfWidgetFormInputText(),
      'ingredients' => new sfWidgetFormTextarea(),
      'directions'  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'description' => new sfValidatorString(array('required' => false)),
      'img_src'     => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'ingredients' => new sfValidatorString(array('required' => false)),
      'directions'  => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rf_recipes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RfRecipes';
  }

}
