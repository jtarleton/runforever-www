<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('RfGearReviews', 'doctrine');

/**
 * BaseRfGearReviews
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $rid
 * @property string $product
 * @property string $product_description
 * @property string $review_text
 * @property float $star_rating
 * 
 * @method integer       getId()                  Returns the current record's "id" value
 * @method integer       getRid()                 Returns the current record's "rid" value
 * @method string        getProduct()             Returns the current record's "product" value
 * @method string        getProductDescription()  Returns the current record's "product_description" value
 * @method string        getReviewText()          Returns the current record's "review_text" value
 * @method float         getStarRating()          Returns the current record's "star_rating" value
 * @method RfGearReviews setId()                  Sets the current record's "id" value
 * @method RfGearReviews setRid()                 Sets the current record's "rid" value
 * @method RfGearReviews setProduct()             Sets the current record's "product" value
 * @method RfGearReviews setProductDescription()  Sets the current record's "product_description" value
 * @method RfGearReviews setReviewText()          Sets the current record's "review_text" value
 * @method RfGearReviews setStarRating()          Sets the current record's "star_rating" value
 * 
 * @package    runforever
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRfGearReviews extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('rf_gear_reviews');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'autoincrement' => true,
             'primary' => true,
             'length' => 8,
             ));
        $this->hasColumn('rid', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('product', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('product_description', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('review_text', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('star_rating', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
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