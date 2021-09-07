<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('InvoiceSystemItems', 'SYSDAT');

/**
 * BaseInvoiceSystemItems
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $invoice
 * @property enum $invoice_type
 * @property integer $client
 * @property string $shortcut
 * @property string $description
 * @property integer $qty
 * @property decimal $price
 * @property decimal $total
 * @property integer $isdelete
 * @property timestamp $create_date
 * @property integer $create_user
 * @property timestamp $change_date
 * @property integer $change_user
 * 
 * @package    ISPC
 * @subpackage Application (2018-06-19)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseInvoiceSystemItems extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('invoice_system_items');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('invoice', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('invoice_type', 'enum', 20, array(
             'type' => 'enum',
             'length' => 20,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'bw_sapv_invoice_new',
              1 => 'bw_medipumps_invoice',
              2 => 'bayern_sapv_invoice',
              3 => 'sh_invoice',
              4 => 'hospiz_invoice',
              5 => 'rlp_invoice',
              6 => 'bre_kinder_invoice',
              7 => 'nr_invoice',//ISPC-2286
              8 => 'demstepcare_invoice',//ISPC-2461              
              9 => 'demstepcare_internal_invoice',//ISPC-2585 Ancuta 15.06.2020
             ),
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('client', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('shortcut', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'length' => null,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('location_type', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('qty', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('price', 'decimal', 11, array(
             'type' => 'decimal',
             'length' => 11,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'scale' => '2',
             ));
        $this->hasColumn('total', 'decimal', 10, array(
             'type' => 'decimal',
             'length' => 10,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'scale' => '2',
             ));
        $this->hasColumn('custom', 'integer', 1, array(
             'type' => 'integer',
             'length' => 1,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'default' => NULL,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('isdelete', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();

        $this->actAs(new Timestamp());
        
        $this->actAs(new Softdelete());
        
    }
}