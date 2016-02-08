<?php

/**
 * RfQuotes form base class.
 *
 * @method RfQuotes getObject() Returns the current form's model object
 *
 * @package    runforever
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRfQuotesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'order'         => new sfWidgetFormInputText(),
      'quote_img_src' => new sfWidgetFormInputText(),
      'quote_author'  => new sfWidgetFormInputText(),
      'quote_text'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'order'         => new sfValidatorInteger(),
      'quote_img_src' => new sfValidatorString(array('max_length' => 200)),
      'quote_author'  => new sfValidatorString(array('max_length' => 200)),
      'quote_text'    => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('rf_quotes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RfQuotes';
  }

}
