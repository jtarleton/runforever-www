<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('RfPics', 'doctrine');

/**
 * BaseRfPics
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $pic_id
 * @property integer $img
 * 
 * @method integer getId()      Returns the current record's "id" value
 * @method integer getPicId()   Returns the current record's "pic_id" value
 * @method integer getImgSrc()  Returns the current record's "img_src" value
 * @method integer getImg()     Returns the current record's "img" value
 * @method RfPics  setId()      Sets the current record's "id" value
 * @method RfPics  setPicId()   Sets the current record's "pic_id" value
 * @method RfPics  setImgSrc()  Sets the current record's "img_src" value
 * @method RfPics  setImg()     Sets the current record's "img" value_src
 * @property integer $img
 * 
 * @method integer getId()      Returns the current record's "id" value
 * @method integer getPicId()   Returns the current record's "pic_id" value
 * @method integer getImgSrc()  Returns the current record's "img_src" value
 * @method integer getImg()     Returns the current record's "img" value
 * @method RfPics  setId()      Sets the current record's "id" value
 * @method RfPics  setPicId()   Sets the current record's "pic_id" value
 * @method RfPics  setImgSrc()  Sets the current record's "img_src" value
 * @method RfPics  setImg()     Sets the current record's "img" value
 * 
 * @package    runforever
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRfPics extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('rf_pics');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'autoincrement' => true,
             'primary' => true,
             'length' => 8,
             ));
        $this->hasColumn('pic_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('img_src', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('img', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}