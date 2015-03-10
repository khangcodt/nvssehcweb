<?php
/**
* @package 		Facebook Connect Extension (joomla 1.5.x & 1.6.x)
* @copyright	Copyright (C) Computer - http://www.saaraan.com. All rights reserved.
* @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* @author		Saran Chamling
* @download URL	http://www.saaraan.com
*/

defined('_JEXEC') or die('Restricted access');

//set maximum time 100 seconds to execute script
ini_set('max_execution_time', 100);

// Require the base controller
require_once( JPATH_COMPONENT.DS.'controller.php' );

// check curl before we move in
if(!fbconnctController::iscurlinstalled())
{
	if(fbconnctController::isJ16()) //check jVersion
	{
		$mainframe =& JFactory::getApplication();
	}else{
		global $mainframe;
	}
	$mainframe->enqueueMessage(JText::_('Facebook Connect requires Curl PHP Extension!'), 'error');
	$mainframe->redirect(JURI::base());	
}

if (!class_exists('FacebookApiException')) {
	require_once( JPATH_COMPONENT.DS.'inc'.DS.'facebook.php' );
}
// Create the controller
$classname    = 'fbconnctController';
$controller   = new $classname( );

// Perform the Request task
$controller->execute( JRequest::getWord( 'task' ) );
$controller->redirect();
?>