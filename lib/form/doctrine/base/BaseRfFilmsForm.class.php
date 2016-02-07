<?php

/**
 * RfFilms form base class.
 *
 * @method RfFilms getObject() Returns the current form's model object
 *
 * @package    runforever
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRfFilmsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'film_title'   => new sfWidgetFormInputText(),
      'film_genre'   => new sfWidgetFormInputText(),
      'imdb_link'    => new sfWidgetFormInputText(),
      'directed_by'  => new sfWidgetFormInputText(),
      'cast'         => new sfWidgetFormTextarea(),
      'release_date' => new sfWidgetFormDateTime(),
      'star_rating'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'film_title'   => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'film_genre'   => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'imdb_link'    => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'directed_by'  => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'cast'         => new sfValidatorString(array('required' => false)),
      'release_date' => new sfValidatorDateTime(array('required' => false)),
      'star_rating'  => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rf_films[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RfFilms';
  }

}
