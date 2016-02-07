<?php

/**
 * RfPics form base class.
 *
 * @method RfPics getObject() Returns the current form's model object
 *
 * @package    runforever
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRfPicsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputText(),
      'img_src' => new sfWidgetFormInputText(),
      'img'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorInteger(),
      'img_src' => new sfValidatorInteger(),
      'img'     => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('rf_pics[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RfPics';
  }

}
