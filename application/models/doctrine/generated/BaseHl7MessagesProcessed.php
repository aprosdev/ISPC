<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Hl7MessagesProcessed', 'SYSDAT');

/**
 * BaseHl7MessagesProcessed
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $messages_processed_ID
 * @property integer $messages_received_ID
 * @property enum $process_performed
 * @property string $result
 * @property string $ipid
 * @property timestamp $create_date
 * @property timestamp $change_date
 * @property integer $create_user
 * @property integer $change_user
 * 
 * @package    ISPC
 * @subpackage Application (2018-07-02)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseHl7MessagesProcessed extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('hl7_messages_processed');

        $this->hasColumn('messages_processed_ID', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('messages_received_ID', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('process_performed', 'enum', 3, array(
             'type' => 'enum',
             'length' => 3,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'NO',
              1 => 'YES',
             ),
             'primary' => false,
             'default' => 'NO',
             'notnull' => true,
             'autoincrement' => false,
             ));
        //result is not yet used
        $this->hasColumn('result', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        //yafp from ISPC-2286
        $this->hasColumn('ipid', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('create_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('change_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('create_user', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('change_user', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        
        $this->index('messages_received_ID', array(
            'fields' =>
            array(
                0 => 'messages_received_ID',
            ),
        ));
        $this->index('process_performed', array(
            'fields' =>
            array(
                0 => 'process_performed',
            ),
        ));
    }

    public function setUp()
    {
        parent::setUp();
        
        $this->hasOne('Hl7MessagesReceived', array(
            'local' => 'messages_received_ID',
            'foreign' => 'messages_received_ID'
        ));
        
        $this->actAs(new Timestamp());
        
    }
}