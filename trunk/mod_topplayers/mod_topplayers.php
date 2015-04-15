<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_topplayers
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the whosonline functions only once
require_once dirname(__FILE__).'/helper.php';

//$showmode = $params->get('showmode', 0);
$toptypeconfig = $params->get('topplayertype', "all"); //get default type from config of module
$jinput = JFactory::getApplication()->input;
$topplayertype = $jinput->get('topplayertype', $toptypeconfig);// get request param of topplayertype, default from config
//thêm tham số $topplayertype vào hàm getTopPlayers($params, $topplayertype = 'all'), tùy vào tham số này thì query ở các view tương ứng

	$count	= modTopplayersHelper::getTopCount();

	$namestop	= modTopplayersHelper::getTopPlayers($params);
	$checkLiveUsers	= modTopplayersHelper::getTopUserNames($params);

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_topplayers', $params->get('layout', 'default'));
