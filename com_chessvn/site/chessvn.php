<?php
/**
 * Chessvn entry point file for chessvn Component
 * 
 * @package    Chessvn
 * @subpackage com_chessvn
 * @license  !license!
 *
 * Created by khanglq, admin Chessvn
 *
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
require_once(JPATH_COMPONENT.'/helpers/cvndao.php');


// import joomla controller library
jimport('joomla.application.component.controller');


$ctrl='Chessvn';
$input = JFactory::getApplication()->input;
// Require specific controller if requested
/*if($controller = JRequest::getWord('controller')) {
	$ctrl = $controller;
}else{
	// define default view if you need routing...
	//JRequest::setVar( 'view', '***' ); // insert here!! 
}*/
 
// Get an instance of the required controller
//$controller = JControllerLegacy::getInstance($ctrl);
 
// Perform the Request task
$controller = JController::getInstance('Chessvn');
$controller->execute(JRequest::getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();

?>
