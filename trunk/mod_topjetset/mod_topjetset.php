<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_onlineplayers
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the whosonline functions only once
require_once dirname(__FILE__).'/helper.php';

//$showmode = $params->get('showmode', 0);
$toptypeconfig = $params->get('topjetsettype', 'all'); //get default type from config of module
$jinput = JFactory::getApplication()->input;
$showmode = $jinput->get('topjetsettype', $toptypeconfig);// get request param of topplayertype, default from config
//thêm tham số $topplayertype vào hàm getTopPlayers($params, $topplayertype = 'all'), tùy vào tham số này thì query ở các view tương ứng
$topjetset = modTopJetSetHelper::getTopJetset($showmode);

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_topjetset', $params->get('layout', 'default'));

