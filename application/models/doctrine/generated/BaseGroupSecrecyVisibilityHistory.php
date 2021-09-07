<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('GroupSecrecyVisibilityHistory', 'SYSDAT');

/**
 * BaseGroupSecrecyVisibilityHistory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $clientid
 * @property integer $master_group_id
 * @property integer $groupid
 * @property integer $id_gsv
 * @property integer $bulkid
 * @property timestamp $create_date
 * @property timestamp $change_date
 * @property integer $create_user
 * @property integer $change_user
 * 
 * @package    ISPC-2482
 * @subpackage Application (2019-11-21)
 * @author     Lore <office@originalware.com>
 */
abstract class BaseGroupSecrecyVisibilityHistory extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('group_secrecy_visibility_history');

        $this->hasColumn('id', 'integer', 11, array('type' => 'integer', 'length' => 11, 'primary' => true, 'autoincrement' => true));
        $this->hasColumn('clientid', 'integer', 11, array('type' => 'integer', 'length' => 11));
        $this->hasColumn('master_group_id', 'integer', 5, array('type' => 'integer', 'length' => 5));
        $this->hasColumn('groupid', 'integer', 11, array('type' => 'integer', 'length' => 11));
        $this->hasColumn('id_gsv', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('bulkid', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('create_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('change_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('create_user', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('change_user', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
    }    
            

    public function setUp()
    {
        parent::setUp();
        /*
         *  auto-added by builder
         */
        $this->actAs(new Timestamp());
    }
}