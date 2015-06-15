<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_topplayers
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$toptypeconfig = $params->get('showlistfriends', 'all'); //get default type from config of module
$jinput = JFactory::getApplication()->input;
$showmode = $jinput->get('showlistfriends', $toptypeconfig);// get request param of showlistfriend, default from config

//$playerid  = JFactory::getUser()->get('playerid');
//$user = JFactory::getUser();
//$playerid = $user->playerid;

$playerid = 'playerid';
$merged = modTopListfriendsHelper::getListfriends($playerid);

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
require JModuleHelper::getLayoutPath('mod_listfriends', $params->get('layout', 'default'));
?>
