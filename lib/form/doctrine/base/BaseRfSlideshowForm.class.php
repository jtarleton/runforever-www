<?php

/**
 * RfSlideshow form base class.
 *
 * @method RfSlideshow getObject() Returns the current form's model object
 *
 * @package    runforever
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRfSlideshowForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'slideshow_title' => new sfWidgetFormInputText(),
      'intro_text'      => new sfWidgetFormTextarea(),
      'cover_img_url'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'slideshow_title' => new sfValidatorString(array('max_length' => 250)),
      'intro_text'      => new sfValidatorString(),
      'cover_img_url'   => new sfValidatorString(array('max_length' => 250)),
    ));

    $this->widgetSchema->setNameFormat('rf_slideshow[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RfSlideshow';
  }

}
