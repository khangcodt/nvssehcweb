<?php
/**
 * Created by PhpStorm.
 * User: PY
 * Date: 6/23/15
 * Time: 4:02 PM
 */
defined('_JEXEC') or die;
require_once dirname(__FILE__) . '/helper.php';
$dataRequest =  mod_FriendsListHelper::getdata_viewrequest();
$dataResponse = mod_FriendsListHelper::getdata_viewresponse();
$data = array_merge($dataRequest,$dataResponse);
shuffle($data);
require JModuleHelper::getLayoutPath('mod_friendslist', 'default');