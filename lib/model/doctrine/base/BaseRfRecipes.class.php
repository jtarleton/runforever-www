<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('RfRecipes', 'doctrine');

/**
 * BaseRfRecipes
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $img_src
 * @property string $ingredients
 * @property string $directions
 * 
 * @method integer   get()            Returns the current record's "id" value
 * @method string    get()            Returns the current record's "title" value
 * @method string    get()            Returns the current record's "description" value
 * @method string    get()            Returns the current record's "img_src" value
 * @method string    get()            Returns the current record's "ingredients" value
 * @method string    get()            Returns the current record's "directions" value
 * @method RfRecipes set()            Sets the current record's "id" value
 * @method RfRecipes set()            Sets the current record's "title" value
 * @method RfRecipes set()            Sets the current record's "description" value
 * @method RfRecipes set()            Sets the current record's "img_src" value
 * @method RfRecipes set()            Sets the current record's "ingredients" value
 * @method RfRecipes set()            Sets the current record's "directions" value
 * 
 * @package    runforever
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRfRecipes extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('rf_recipes');
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
             'notnull' => false,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('description', 'string', null, array(
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
        $this->hasColumn('ingredients', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('directions', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}