<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Wallnews', 'MDAT');

/**
 * BaseWallnews
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $ipid
 * @property string $news_content
 * @property timestamp $news_date
 * @property integer $userid
 * @property integer $clientid
 * @property integer $create_user
 * @property timestamp $create_date
 * @property integer $change_user
 * @property timestamp $change_date
 * @property integer $isdelete
 * 
 * @package    ISPC
 * @subpackage Application (2018-11-14)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseWallnews extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('wallnews');

        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('ipid', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'ipid is null if this is a general news',
             ));
        $this->hasColumn('news_content', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('news_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('userid', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'comment' => 'user that created the news',
             ));
        $this->hasColumn('clientid', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'general news can be identified easier by client, this can be null if you have ipid',
             ));
        $this->hasColumn('create_user', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
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
        $this->hasColumn('change_user', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
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
        $this->hasColumn('isdelete', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        

        $this->index('clientid', array(
            'fields' =>
            array(
                0 => 'clientid',
            ),
        ));
        $this->index('news_date', array(
            'fields' =>
            array(
                0 => 'news_date',
            ),
        ));
        $this->index('isdelete', array(
            'fields' =>
            array(
                0 => 'isdelete',
            ),
        ));
    }

	
	/**
	 * change format of the date
	 * 
	 * (non-PHPdoc)
	 * @see Doctrine_Record::preHydrate()
	 */
	public function preHydrate( Doctrine_Event $event )
	{			
		if ( ! empty($event->data['news_date']) && Zend_Date::isDate($event->data['news_date'], 'Y-M-d') ) {
		    
		    $data = $event->data;
		    
    		$date = new Zend_Date($event->data['news_date']);
    		
    		$data['news_date'] = $date->toString('d.M.Y');
    		
    		$event->data = $data;
    		
		}
	}
	
    public function setUp()
    {
        parent::setUp();
        
        $this->actAs(new Timestamp());
        
        $this->actAs(new Softdelete());
        
        $this->actAs(new SoftEncrypt(array(
            'news_content',
        )));
        
        $this->actAs(new SoftDecrypt(array(
            'news_content',
        )));
        
        
    }
}