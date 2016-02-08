<?php

/**
 * RfSlides form base class.
 *
 * @method RfSlides getObject() Returns the current form's model object
 *
 * @package    runforever
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRfSlidesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'position'      => new sfWidgetFormInputText(),
      'slideshow_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RfSlideshow'), 'add_empty' => false)),
      'slide_title'   => new sfWidgetFormInputText(),
      'slide_caption' => new sfWidgetFormInputText(),
      'slide_body'    => new sfWidgetFormTextarea(),
      'img_url'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'position'      => new sfValidatorInteger(),
      'slideshow_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RfSlideshow'))),
      'slide_title'   => new sfValidatorString(array('max_length' => 250)),
      'slide_caption' => new sfValidatorString(array('max_length' => 250)),
      'slide_body'    => new sfValidatorString(),
      'img_url'       => new sfValidatorString(array('max_length' => 250)),
    ));

    $this->widgetSchema->setNameFormat('rf_slides[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RfSlides';
  }

}
