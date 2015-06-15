<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_topplayers
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
jimport('joomla.log.log');
JLog::addLogger(array());
class modTopListfriendsHelper
{
    static function getListfriends($playerid) {

        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true);

        $query->select('friendid, playerid, userid, onlineid, username, client_id, ratingpoint, coin, avatar, mediaplayer');
        $query->from('#__viewrequestedfriends');
        $query->where('playerid = '.$playerid);
        $db->setQuery($query);
        return (array)$request = $db->loadObjectList();

        $query->select('friendid, buddyid, userid, onlineid, username, client_id, ratingpoint, coin, avatar, mediaplayer');
        $query->from('#__viewrespondedfriends');
        $query->where('buddyid = '.$playerid);
        $db->setQuery($query);
        return (array)$responded = $db->loadObjectList();

        $merged = array_merge(array($request),array($responded));
        shuffle($merged);

    }
}

