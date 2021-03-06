<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('RfUsers', 'doctrine');

/**
 * BaseRfUsers
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $facebook_id
 * @property string $username
 * @property string $userpass
 * @property string $email
 * @property string $ip
 * @property string $verification_token
 * @property integer $verification_token_ts
 * @property string $is_verified
 * @property integer $created
 * @property timestamp $updated
 * 
 * @method integer   get()                      Returns the current record's "id" value
 * @method integer   get()                      Returns the current record's "facebook_id" value
 * @method string    get()                      Returns the current record's "username" value
 * @method string    get()                      Returns the current record's "userpass" value
 * @method string    get()                      Returns the current record's "email" value
 * @method string    get()                      Returns the current record's "ip" value
 * @method string    get()                      Returns the current record's "verification_token" value
 * @method integer   get()                      Returns the current record's "verification_token_ts" value
 * @method string    get()                      Returns the current record's "is_verified" value
 * @method integer   get()                      Returns the current record's "created" value
 * @method timestamp get()                      Returns the current record's "updated" value
 * @method RfUsers   set()                      Sets the current record's "id" value
 * @method RfUsers   set()                      Sets the current record's "facebook_id" value
 * @method RfUsers   set()                      Sets the current record's "username" value
 * @method RfUsers   set()                      Sets the current record's "userpass" value
 * @method RfUsers   set()                      Sets the current record's "email" value
 * @method RfUsers   set()                      Sets the current record's "ip" value
 * @method RfUsers   set()                      Sets the current record's "verification_token" value
 * @method RfUsers   set()                      Sets the current record's "verification_token_ts" value
 * @method RfUsers   set()                      Sets the current record's "is_verified" value
 * @method RfUsers   set()                      Sets the current record's "created" value
 * @method RfUsers   set()                      Sets the current record's "updated" value
 * 
 * @package    runforever
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRfUsers extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('rf_users');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('facebook_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('username', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('userpass', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('email', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('ip', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('verification_token', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('verification_token_ts', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('is_verified', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('created', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('updated', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0000-00-00 00:00:00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}