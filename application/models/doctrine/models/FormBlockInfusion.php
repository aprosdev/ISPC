<?php

/**
 * FormBlockInfusion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-12-21)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class FormBlockInfusion extends BaseFormBlockInfusion
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'formblockinfusion_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_formblockinfusion';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'FormBlockInfusion';
    const PATIENT_FILE_TITLE    = 'FormBlockInfusion PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TYPE       = 'I'; //  the iv medi shortcut
    
    const PATIENT_COURSE_TABNAME    = 'formblockinfusion';
    
    //this is just for demo, another one is used on contact_form save
    const PATIENT_COURSE_TITLE      = 'FormBlockInfusion was created';

    
    
    

}