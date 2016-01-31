<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('RfQuotes', 'doctrine');

/**
 * BaseRfQuotes
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $order
 * @property string $quote_img_src
 * @property string $quote_author
 * @property string $quote_text
 * 
 * @method integer  get()              Returns the current record's "id" value
 * @method integer  get()              Returns the current record's "order" value
 * @method string   get()              Returns the current record's "quote_img_src" value
 * @method string   get()              Returns the current record's "quote_author" value
 * @method string   get()              Returns the current record's "quote_text" value
 * @method RfQuotes set()              Sets the current record's "id" value
 * @method RfQuotes set()              Sets the current record's "order" value
 * @method RfQuotes set()              Sets the current record's "quote_img_src" value
 * @method RfQuotes set()              Sets the current record's "quote_author" value
 * @method RfQuotes set()              Sets the current record's "quote_text" value
 * 
 * @package    runforever
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRfQuotes extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('rf_quotes');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('order', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('quote_img_src', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('quote_author', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('quote_text', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}