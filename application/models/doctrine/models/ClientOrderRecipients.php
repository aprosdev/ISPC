<?php

/**
 * ClientOrderRecipients
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-12-19)
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ClientOrderRecipients extends BaseClientOrderRecipients
{
	/**
	 * define the FORMID and FORMNAME, if you want to piggyback some triggers
	 * @var unknown
	 */
	const TRIGGER_FORMID    = null;
	const TRIGGER_FORMNAME  = '';
	
	public static function get_client_recipients($clientid = false, $minimal = true)
	{
		if($clientid)
		{
			$sel = Doctrine_Query::create()
			->select('*')
			->from('ClientOrderRecipients')
			->andWhere('clientid = ? ' , $clientid );
			$sel_res = $sel->fetchArray();
	
			if($sel_res)
			{
				if($minimal)
				{
					foreach($sel_res as $k_sel => $v_sel)
					{
						$selected_users[] = $v_sel['userid'];
					}
	
					return $selected_users;
				}
				else
				{
					return User::getUsersDetails( array_column($sel_res, 'userid') );
				}
			}
			else
			{
				return false;
			}
			}
			else
			{
				return false;
			}
		}
	

}