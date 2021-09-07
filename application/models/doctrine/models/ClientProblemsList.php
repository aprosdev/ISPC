<?php

/**
 * ClientProblemsList
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC [ISPC-2864]
 * @subpackage Application (2021-04-12)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ClientProblemsList extends BaseClientProblemsList
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'clientproblemslist_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_clientproblemslist';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'ClientProblemsList';
    const PATIENT_FILE_TITLE    = 'ClientProblemsList PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'ClientProblemsList PDF was created';
    const PATIENT_COURSE_TABNAME    = 'clientproblemslist';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    
    
    public function get_by_id_and_clientid($id = 0, $clientid = 0)
    {
        //ISPC-2612 Ancuta 27.06.2020
        $client_is_follower = ConnectionMasterTable::_check_client_connection_follower('ClientProblemsList',$clientid);
        
        $query = Doctrine_Query::create()
        ->select('*')
        ->from('ClientProblemsList')
        ->where('id =  ?', $id)
        ->andwhere('clientid =  ?', $clientid)
        ->andWhere('isdelete = 0');
        if($client_is_follower){//ISPC-2612 Ancuta 27.06.2020
            $query->andWhere('connection_id id NOT null');
            $query->andWhere('master_id id NOT null');
        }
        $q_res = $query->fetchOne(null, Doctrine_Core::HYDRATE_ARRAY);
        
        if($q_res )
        {
            return $q_res;
        }
        else
        {
            return false;
        }
    }
    
    

}