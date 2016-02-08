<?php

/**
 * RfBlogPosts form base class.
 *
 * @method RfBlogPosts getObject() Returns the current form's model object
 *
 * @package    runforever
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRfBlogPostsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'position'   => new sfWidgetFormInputText(),
      'title'      => new sfWidgetFormInputText(),
      'body'       => new sfWidgetFormTextarea(),
      'img_src'    => new sfWidgetFormInputText(),
      'created_on' => new sfWidgetFormDateTime(),
      'updated_on' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'position'   => new sfValidatorInteger(),
      'title'      => new sfValidatorString(array('max_length' => 250)),
      'body'       => new sfValidatorString(array('required' => false)),
      'img_src'    => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'created_on' => new sfValidatorDateTime(array('required' => false)),
      'updated_on' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rf_blog_posts[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RfBlogPosts';
  }

}
