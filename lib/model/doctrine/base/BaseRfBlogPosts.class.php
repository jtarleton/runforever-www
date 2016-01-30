<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('RfBlogPosts', 'doctrine');

/**
 * BaseRfBlogPosts
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property string $body
 * @property string $img_src
 * @property timestamp $created_on
 * @property timestamp $updated_on
 * 
 * @method integer     getId()         Returns the current record's "id" value
 * @method string      getTitle()      Returns the current record's "title" value
 * @method string      getBody()       Returns the current record's "body" value
 * @method string      getImgSrc()     Returns the current record's "img_src" value
 * @method timestamp   getCreatedOn()  Returns the current record's "created_on" value
 * @method timestamp   getUpdatedOn()  Returns the current record's "updated_on" value
 * @method RfBlogPosts setId()         Sets the current record's "id" value
 * @method RfBlogPosts setTitle()      Sets the current record's "title" value
 * @method RfBlogPosts setBody()       Sets the current record's "body" value
 * @method RfBlogPosts setImgSrc()     Sets the current record's "img_src" value
 * @method RfBlogPosts setCreatedOn()  Sets the current record's "created_on" value
 * @method RfBlogPosts setUpdatedOn()  Sets the current record's "updated_on" value
 * 
 * @package    runforever
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRfBlogPosts extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('rf_blog_posts');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('title', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('body', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('img_src', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('created_on', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_on', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}