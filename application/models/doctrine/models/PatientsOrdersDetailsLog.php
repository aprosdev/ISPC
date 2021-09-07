<?php

/**
 * PatientsOrdersDetailsLog
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2019-01-15)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientsOrdersDetailsLog extends BasePatientsOrdersDetailsLog
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'patientsordersdetailslog_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_patientsordersdetailslog';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'PatientsOrdersDetailsLog';
    const PATIENT_FILE_TITLE    = 'PatientsOrdersDetailsLog PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'PatientsOrdersDetailsLog PDF was created';
    const PATIENT_COURSE_TABNAME    = 'patientsordersdetailslog';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    
    
    

}