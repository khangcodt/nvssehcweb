<?php
/**
 * Chessvn View for com_chessvn Component
 * 
 * @package    Chessvn
 * @subpackage com_chessvn
 * @license  GNU/GPL v2
 *
 * Created by khanglq, admin Chessvn
 *
 *
 */

jimport( 'joomla.application.component.view');
jimport('joomla.application.component.model');

/**
 * HTML View class for the Chessvn Component
 *
 * @package	Joomla.Components
 * @subpackage	Chessvn
 */
class ChessvnViewChessvn extends JViewLegacy{
	function display($tpl = null){
		/*
		// load component parameters
		$params = JComponentHelper::getParams( 'com_chessvn' );
		$params = $app->getParams( 'com_chessvn' );	
		$dummy = $params->get( 'dummy_param', 1 ); 

		// load another model
		JModelLegacy::addIncludePath(JPATH_SITE.'/components/com_chessvn/models');
		$otherModel = JModelLegacy::getInstance( 'Record', 'RecordModel' );
		*/
		$data = $this->get('Data');
		$this->assignRef('data', $data);
		
		// Check for errors.
		if (count($errors = $this->get('Errors'))){
			JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
			return false;
		}
		
		parent::display($tpl);
	}
}
?>
