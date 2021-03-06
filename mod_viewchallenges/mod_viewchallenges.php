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
require_once dirname(__FILE__) . '/helper.php';

$showmode = $params->get('showmode', 0);

if ($showmode == 0 || $showmode == 2) {
	$count	= modViewChallengesHelper::getOnlineCount();
}

if ($showmode > 0) {
	$names	= modViewChallengesHelper::getSomeUserNames($params);
	$liveUsers	= modViewChallengesHelper::getOnlineUserNames($params);
}

$linknames = $params->get('linknames', 0);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_viewchallenges', $params->get('layout', 'default'));
