<?php

/**
 * PatientSavoir
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-01-08)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientSavoir extends BasePatientSavoir
{
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'savoir_lang';
    
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frmSavoir_ispc2144';
    
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'savoir_ispc2144';
    const PATIENT_FILE_TITLE    = 'Savoir_PDF 2018'; //this will be translated
    
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'Savoir_PDF 2018 was created';
    const PATIENT_COURSE_TABNAME    = 'Savoir';
    const PATIENT_COURSE_TYPE       = 'F';
    
   
    public static function getDefaults( $field = null) 
    {

        switch($field) {
            
            case 'consent_A': //Der Patient stimmt der Datenübermittlung zu
//             case 'consent_B': //Der Patient stimmt der Befragung zur Patientenzufriedenheit zu
                $defaults = array(
               
                    'no' =>  self::translate('no_radio'),
                    'yes' => self::translate('yes_radio'),
                );
                break;
                
            //this was a yes/no... changed into a select ISPC-2144 23.03.2018
            case 'consent_B': //Der Patient stimmt der Befragung zur Patientenzufriedenheit zu
                $defaults = array(
                    
                    '0' => self::translate('—'),
                    '1' => self::translate('Einwilligung liegt vor'),
                    '2' => self::translate('Einwilligung liegt nicht vor - Ablehnung'),
                    '3' => self::translate('Einwilligung liegt nicht vor - aus gesundheitlichen/ sprachlichen Gründen'),
                    '4' => self::translate('Einwilligung liegt nicht vor - aus organisatorischen Gründen'),
                    '5' => self::translate('Einwilligung liegt nicht vor - Einwilligung zurückgezogen'),
                    
                );
                break;
                
            case 'consent_C': //Zustimmung zur Datenübertragung durch, radio
                $defaults = array(
                    '1' => self::translate('Patient'),
                    '2' => self::translate('Vertreter'),
                );
                break;
            
            case 'school_education'://Schulbildung, dropdown
                $defaults = array(
                    '0' => self::translate('—'),
                    '1' => self::translate('kein Abschluss'),
                    '2' => self::translate('Hauptschulabschluss/8. Klasse POS'),
                    '3' => self::translate('Mittlere Reife/10. Klasse POS'),
                    '4' => self::translate('Fachhochschulreife/Abitur/EOS'),
                    '5' => self::translate('Fachhochschulabschluss'),
                    '6' => self::translate('Hochschulabschluss'),
                    '7' => self::translate('Sonstiges'),
                );
                break;
                
            case 'working_status'://Erwerbsstatus, dropdown
                $defaults = array(
                    '0' => self::translate('—'),
                    '1' => self::translate('Schüler/Student'), 
                    '2' => self::translate('Rentner/Pensionär'), 
                    '3' => self::translate('Arbeitslos'),
                    '4' => self::translate('Arbeitsunfähig'), 
                    '5' => self::translate('(Dauerhaft) erwerbsunfähig'), 
                    '6' => self::translate('Hausfrau/-mann'),
                    '8' => self::translate('berufstätig'),                    
                    '7' => self::translate('Sonstiges'),
                );
                break;
                
            case 'job'://Beruf, dropdown
                $defaults = array(
                    '0' => self::translate('—'),
                    '1' => self::translate('ungelernt'), 
                    '2' => self::translate('Selbständige'),
//                     '3' => self::translate('Selbständige Akademiker'), //removed
                    '4' => self::translate('Beamter'),
                    '5' => self::translate('Angestellter'), 
                    '6' => self::translate('Arbeiter'),
                );
                break;
            case 'first_assessment_carried_by': //Erst-Assessment durchgeführt durch (DROPDOWN) 
                $defaults = array(
                    '0' => self::translate('—'),
                    '1' => self::translate("by a professional group alone"),
            		'2' => self::translate("by at least 2 professional groups")
                );
                
                break;
                
            default : $defaults = null;
        }
        
        
        return $defaults;
    }
    
    
    public function findOrCreateOneByIdAndIpid($id = 0 , $ipid = '', array $data = array(), $hydrationMode = Doctrine_Core::HYDRATE_RECORD)
    {
        if ( empty($id) || ! $entity = $this->getTable()->findOneByIdAndIpid($id, $ipid)) {
    
            $entity = $this->getTable()->create(array( 'ipid' => $ipid));
        }
    
        unset($data[$this->getTable()->getIdentifier()]);
    
        $entity->fromArray($data); //update
    
        $entity->save(); //at least one field must be dirty in order to persist
    
        return $entity;
    }
    
    
    
    /**
     * @claudiu
     * @param string $ipid
     * @param unknown $hydrationMode
     * @return void|Ambigous <Doctrine_Collection, multitype:>
     */
    public function findByIpid( $ipid = '', $hydrationMode = Doctrine_Core::HYDRATE_ARRAY )
    {
        if (empty($ipid) || ! is_string($ipid)) {
    
            return;
    
        } else {
            return $this->getTable()->findBy('ipid', $ipid, $hydrationMode);
    
        }
    }
    
    
    /**
     * @claudiu
     * @param string $ipid
     * @param unknown $hydrationMode
     * @return void|Ambigous <Doctrine_Collection, multitype:>
     */
    public function findOneByIpid( $ipid = '', $hydrationMode = Doctrine_Core::HYDRATE_ARRAY )
    {
        if (empty($ipid) || ! is_string($ipid)) {
    
            return;
    
        } else {
            return $this->getTable()->createQuery('ps')
            ->leftJoin('ps.PatientSavoirSapv pss')
            ->where('ipid = ?')
            ->orderBy('id DESC') // just in case the delete is not ok
            ->limit(1)
            ->fetchOne(array($ipid), $hydrationMode);
        }
    }

    
    /**
     * @Ancuta
     * ISPC-2197 09.06.2018
     * @param unknown $ipids
     * @param unknown $hydrationMode
     * @return void|Ambigous <multitype:, Doctrine_Collection>
     */
    
    
    public function findByIpids( $ipids = array(), $hydrationMode = Doctrine_Core::HYDRATE_ARRAY )
    {
        if (empty($ipids)) {
    
            return;
    
        } else {
            return $this->getTable()->createQuery('ps')
            ->leftJoin('ps.PatientSavoirSapv pss')
            ->whereIn('ipid',$ipids)
            ->orderBy('id DESC') // just in case the delete is not ok
            ->fetchArray(array(), $hydrationMode);
        }
    }
    
    
    
    
    
}