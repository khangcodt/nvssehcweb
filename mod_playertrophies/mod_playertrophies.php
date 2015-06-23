<?php
defined('_JEXEC') or die;
require_once dirname(__FILE__) . '/helper.php';
$trophies = mod_PlayertrophiesHelper::getData();
require JModuleHelper::getLayoutPath('mod_playertrophies', 'default');