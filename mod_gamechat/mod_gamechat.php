<?php

// no direct access
defined('_JEXEC') or die;
require_once dirname(__FILE__).'/helper.php';
$gameid = JRequest::getVar('gameid');
$result = modGameChatHelper::CheckplayerID($gameid);

require_once dirname(__FILE__).'/helper.php';require JModuleHelper::getLayoutPath('mod_gamechat', 'default');
