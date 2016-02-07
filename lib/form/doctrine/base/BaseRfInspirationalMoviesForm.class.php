<?php

/**
 * RfInspirationalMovies form base class.
 *
 * @method RfInspirationalMovies getObject() Returns the current form's model object
 *
 * @package    runforever
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRfInspirationalMoviesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mid'          => new sfWidgetFormInputHidden(),
      'film_title'   => new sfWidgetFormInputText(),
      'film_genre'   => new sfWidgetFormInputText(),
      'imdb_link'    => new sfWidgetFormInputText(),
      'directed_by'  => new sfWidgetFormInputText(),
      'cast'         => new sfWidgetFormTextarea(),
      'release_date' => new sfWidgetFormDateTime(),
      'star_rating'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'mid'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('mid')), 'empty_value' => $this->getObject()->get('mid'), 'required' => false)),
      'film_title'   => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'film_genre'   => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'imdb_link'    => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'directed_by'  => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'cast'         => new sfValidatorString(array('required' => false)),
      'release_date' => new sfValidatorDateTime(array('required' => false)),
      'star_rating'  => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rf_inspirational_movies[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RfInspirationalMovies';
  }

}
