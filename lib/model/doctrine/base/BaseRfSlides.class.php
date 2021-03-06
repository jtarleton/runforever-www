<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('RfSlides', 'doctrine');

/**
 * BaseRfSlides
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $position
 * @property integer $slideshow_id
 * @property string $slide_title
 * @property string $slide_caption
 * @property string $slide_body
 * @property string $img_url
 * @property string $published_status
 * @property RfSlideshow $RfSlideshow
 * 
 * @method integer     get()                 Returns the current record's "id" value
 * @method integer     get()                 Returns the current record's "position" value
 * @method integer     get()                 Returns the current record's "slideshow_id" value
 * @method string      get()                 Returns the current record's "slide_title" value
 * @method string      get()                 Returns the current record's "slide_caption" value
 * @method string      get()                 Returns the current record's "slide_body" value
 * @method string      get()                 Returns the current record's "img_url" value
 * @method string      get()                 Returns the current record's "published_status" value
 * @method RfSlideshow get()                 Returns the current record's "RfSlideshow" value
 * @method RfSlides    set()                 Sets the current record's "id" value
 * @method RfSlides    set()                 Sets the current record's "position" value
 * @method RfSlides    set()                 Sets the current record's "slideshow_id" value
 * @method RfSlides    set()                 Sets the current record's "slide_title" value
 * @method RfSlides    set()                 Sets the current record's "slide_caption" value
 * @method RfSlides    set()                 Sets the current record's "slide_body" value
 * @method RfSlides    set()                 Sets the current record's "img_url" value
 * @method RfSlides    set()                 Sets the current record's "published_status" value
 * @method RfSlides    set()                 Sets the current record's "RfSlideshow" value
 * 
 * @package    runforever
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRfSlides extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('rf_slides');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('position', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('slideshow_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('slide_title', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('slide_caption', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('slide_body', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('img_url', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('published_status', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'draft',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 250,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('RfSlideshow', array(
             'local' => 'slideshow_id',
             'foreign' => 'id'));
    }
}