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

require_once (dirname(__FILE__).DS.'helper.php');

$params->def('greeting', 1);
require_once (JPATH_ROOT.DS.'components'.DS.'com_fbconnct'.DS.'controller.php');
$type 		= modFBLoginHelper::getType();
$user 		=  JFactory::getUser();
require(JModuleHelper::getLayoutPath('mod_fbconnct'));