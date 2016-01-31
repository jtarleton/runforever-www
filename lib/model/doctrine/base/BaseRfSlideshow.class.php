<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('RfSlideshow', 'doctrine');

/**
 * BaseRfSlideshow
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $slideshow_title
 * @property string $intro_text
 * @property string $cover_img_url
 * @property Doctrine_Collection $RfSlides
 * 
 * @method integer             get()                Returns the current record's "id" value
 * @method string              get()                Returns the current record's "slideshow_title" value
 * @method string              get()                Returns the current record's "intro_text" value
 * @method string              get()                Returns the current record's "cover_img_url" value
 * @method Doctrine_Collection get()                Returns the current record's "RfSlides" collection
 * @method RfSlideshow         set()                Sets the current record's "id" value
 * @method RfSlideshow         set()                Sets the current record's "slideshow_title" value
 * @method RfSlideshow         set()                Sets the current record's "intro_text" value
 * @method RfSlideshow         set()                Sets the current record's "cover_img_url" value
 * @method RfSlideshow         set()                Sets the current record's "RfSlides" collection
 * 
 * @package    runforever
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRfSlideshow extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('rf_slideshow');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('slideshow_title', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('intro_text', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('cover_img_url', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 250,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('RfSlides', array(
             'local' => 'id',
             'foreign' => 'slideshow_id'));
    }
}