<?php
/**
 * @package    Chessvn
 * @subpackage com_chessvn
 * @license  !license!
 *
 * Created by khanglq, admin Chessvn
 *
 *
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

/** debug
ini_set( 'display_errors', true );
error_reporting( E_ALL );
*/

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_chessvn')){
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

$views = explode(',', 'autoplayerlist,autosettinglist,buddyblacklistlist,gamelist,gamechatlist,gameoptionlist,movehistorylist,playerlist,ratinglist,trophylist');
$view = $views[0];

/*
Please note there are known issues with JInput and Magic Quotes (Deprecated in PHP 5.3.0 and removed in PHP 5.4.0). 
Most servers have these turned off - however it is important to bear this in mind whilst developing a component. 
For this reason all core components in Joomla 2.5.x still use JRequest. 
As of Joomla 3.0+ magic quotes is required to be disabled and thus this is no longer an issue. 

http://docs.joomla.org/Retrieving_request_data_using_JInput

*/


$jinput = JFactory::getApplication()->input;
$view = $jinput->get('view', $view, 'CMD');
$jinput->set('view', $view);

$j3x = version_compare( JVERSION, '3.0', '>=' ); // is Joomla 3+

if (in_array($view, $views)) foreach($views as $v){
	$link = JRoute::_("index.php?option=com_chessvn&view={$v}");
	$selected = ($v == $view);
	if($j3x){
		JHtmlSidebar::addEntry(JText::_( strtoupper('COM_chessvn_MENU_' . $v) ), "index.php?option=com_chessvn&view={$v}", $selected);
	}else{
		JSubMenuHelper::addEntry(JText::_( strtoupper('COM_chessvn_MENU_' . $v) ), "index.php?option=com_chessvn&view={$v}", $selected);
	}
}

// Require the base controller
//require_once( JPATH_COMPONENT.DS.'controller.php' );

// import joomla controller library
jimport('joomla.application.component.controller');

// Create the controller
$controller = JControllerLegacy::getInstance('Chessvn');

// Perform the Request task
$controller->execute($jinput->get('task', '', 'CMD')); // or CMD ??


// Redirect if set by the controller
$controller->redirect();