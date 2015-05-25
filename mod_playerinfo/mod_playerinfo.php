<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_onlineplayers
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
require_once dirname(__FILE__).'/helper.php';

// Include the whosonline functions only once

$result = modPlayerinfoHelper::getUser();
require_once dirname(__FILE__).'/helper.php';require JModuleHelper::getLayoutPath('mod_playerinfo', 'default');