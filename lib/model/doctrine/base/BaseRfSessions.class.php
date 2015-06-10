<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('RfSessions', 'doctrine');

/**
 * BaseRfSessions
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $session_id
 * @property string $ip
 * @property timestamp $started_at
 * @property timestamp $expires_at
 * 
 * @method integer    getId()         Returns the current record's "id" value
 * @method string     getSessionId()  Returns the current record's "session_id" value
 * @method string     getIp()         Returns the current record's "ip" value
 * @method timestamp  getStartedAt()  Returns the current record's "started_at" value
 * @method timestamp  getExpiresAt()  Returns the current record's "expires_at" value
 * @method RfSessions setId()         Sets the current record's "id" value
 * @method RfSessions setSessionId()  Sets the current record's "session_id" value
 * @method RfSessions setIp()         Sets the current record's "ip" value
 * @method RfSessions setStartedAt()  Sets the current record's "started_at" value
 * @method RfSessions setExpiresAt()  Sets the current record's "expires_at" value
 * 
 * @package    runforever
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRfSessions extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('rf_sessions');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'autoincrement' => true,
             'primary' => true,
             'length' => 8,
             ));
        $this->hasColumn('session_id', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('ip', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('started_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('expires_at', 'timestamp', 25, array(
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