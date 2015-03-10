<?php
/**
* @package 		Facebook Connect Extension (joomla 1.5.x & 1.6.x)
* @copyright	Copyright (C) Computer - http://www.saaraan.com. All rights reserved.
* @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* @author		Saran Chamling
* @download URL	http://www.saaraan.com
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );

class AdminfbconnctController extends JController
{
	function display($cachable = false, $urlparams = false) {
	
			require_once JPATH_COMPONENT.'/helpers/fbconnct.php';
			fbconnctHelper::addSubmenu(JRequest::getCmd('view', 'fbconnct'));

			switch (JRequest::getVar( 'view' )){
				case "test":
							JRequest::setVar('view', 'test' );
							break;
				case "editor":
							JRequest::setVar('view', 'editor' );
							break;
				case "users":
							JRequest::setVar('view', 'users' );
							break;
				default:
							JRequest::setVar('view', 'fbconnct' );
			}

			parent::display();
	}

}
?>
