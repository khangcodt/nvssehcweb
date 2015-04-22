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
class modTopplayersHelper
{
	// show online WEEK member names
	static function getTopWeekUserNames($params) {
		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);
        $query->select('se.userid AS userid,
                          se.playerid AS playerid,
                          se.userid AS onlineid,
                          se.client_id AS client_id,
                          se.username AS username,
                          se.coin AS coin,
                          se.avatar AS avatar,
                          se.chesstype AS chesstype,
                          se.ratingpoint AS ratingpoint,
                          se.ratingtype AS ratingtype');
        $query->from('#__viewtopplayerweek AS se');
        $query->where('se.client_id = 0');//test first with chess, chesstype will be input later
		$user = JFactory::getUser();
		if (!$user->authorise('core.admin') && $params->get('filter_groups', 0) == 1)
		{
			$groups = $user->getAuthorisedGroups();
			if (empty($groups))
			{
				return array();
			}
			$query->leftJoin('#__user_usergroup_map AS m ON m.user_id = a.userid');
			$query->leftJoin('#__usergroups AS ug ON ug.id = m.group_id');
			$query->where('ug.id in (' . implode(',', $groups) . ')');
			$query->where('ug.id <> 1');
		}

        $db->setQuery($query);
        JLog::add(JText::_('khanglq:--- sql = '.$db->getQuery()), JLog::INFO);
		return (array) $db->loadObjectList();
	}
	
	// show online member names
	static function getTopWeekPlayers($params) {
		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);
		$query->select('se.userid AS userid,
                          se.playerid AS playerid,
                          se.userid AS onlineid,
                          se.client_id AS client_id,
                          se.username AS username,
                          se.coin AS coin,
                          se.avatar AS avatar,
                          se.chesstype AS chesstype,
                          se.ratingpoint AS ratingpoint,
                          se.ratingtype AS ratingtype');
		$query->from('#__viewtopplayerweek AS se');
        $query->leftJoin('#__viewtopplayeridweek AS g ON (se.playerid = g.playerid)');
        $query->where('se.client_id is null' or 'se.client_id = 0');//test first with chess, chesstype will be input later
		$user = JFactory::getUser();
		if (!$user->authorise('core.admin') && $params->get('filter_groups', 0) == 1)
		{
			$groups = $user->getAuthorisedGroups();
			if (empty($groups))
			{
				return array();
			}
			$query->leftJoin('#__user_usergroup_map AS m ON m.user_id = a.userid');
			$query->leftJoin('#__usergroups AS ug ON ug.id = m.group_id');
			$query->where('ug.id in (' . implode(',', $groups) . ')');
			$query->where('ug.id <> 1');
		}

		$db->setQuery($query);
        JLog::add(JText::_('khanglq:--- sql = '.$db->getQuery()), JLog::INFO);
		return (array) $db->loadObjectList();
	}
    // show online MONTH member names
    static function getTopMonthUserNames($params) {
        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true);
        $query->select('se.userid AS userid,
                          se.playerid AS playerid,
                          se.userid AS onlineid,
                          se.client_id AS client_id,
                          se.username AS username,
                          se.coin AS coin,
                          se.avatar AS avatar,
                          se.chesstype AS chesstype,
                          se.ratingpoint AS ratingpoint,
                          se.ratingtype AS ratingtype');
        $query->from('#__viewtopplayermonth AS se');
        $query->where('se.client_id = 0');//test first with chess, chesstype will be input later
        $user = JFactory::getUser();
        if (!$user->authorise('core.admin') && $params->get('filter_groups', 0) == 1)
        {
            $groups = $user->getAuthorisedGroups();
            if (empty($groups))
            {
                return array();
            }
            $query->leftJoin('#__user_usergroup_map AS m ON m.user_id = a.userid');
            $query->leftJoin('#__usergroups AS ug ON ug.id = m.group_id');
            $query->where('ug.id in (' . implode(',', $groups) . ')');
            $query->where('ug.id <> 1');
        }

        $db->setQuery($query);
        JLog::add(JText::_('khanglq:--- sql = '.$db->getQuery()), JLog::INFO);
        return (array) $db->loadObjectList();
    }

    // show online MONTH member names
    static function getTopMonthPlayers($params) {
        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true);
        $query->select('se.userid AS userid,
                          se.playerid AS playerid,
                          se.userid AS onlineid,
                          se.client_id AS client_id,
                          se.username AS username,
                          se.coin AS coin,
                          se.avatar AS avatar,
                          se.chesstype AS chesstype,
                          se.ratingpoint AS ratingpoint,
                          se.ratingtype AS ratingtype');
        $query->from('#__viewtopplayermonth AS se');
        $query->leftJoin('#__viewtopplayeridmonth AS g ON (se.playerid = g.playerid)');
        $query->where('se.client_id is null' or 'se.client_id = 0');//test first with chess, chesstype will be input later
        $user = JFactory::getUser();
        if (!$user->authorise('core.admin') && $params->get('filter_groups', 0) == 1)
        {
            $groups = $user->getAuthorisedGroups();
            if (empty($groups))
            {
                return array();
            }
            $query->leftJoin('#__user_usergroup_map AS m ON m.user_id = a.userid');
            $query->leftJoin('#__usergroups AS ug ON ug.id = m.group_id');
            $query->where('ug.id in (' . implode(',', $groups) . ')');
            $query->where('ug.id <> 1');
        }

        $db->setQuery($query);
        JLog::add(JText::_('khanglq:--- sql = '.$db->getQuery()), JLog::INFO);
        return (array) $db->loadObjectList();
    }
    // show online ALL member names
    static function getTopAllUserNames($params) {
        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true);
        $query->select('se.userid AS userid,
                          se.playerid AS playerid,
                          se.userid AS onlineid,
                          se.client_id AS client_id,
                          se.username AS username,
                          se.coin AS coin,
                          se.avatar AS avatar,
                          se.chesstype AS chesstype,
                          se.ratingpoint AS ratingpoint,
                          se.ratingtype AS ratingtype');
        $query->from('#__viewtopplayerall AS se');
        $query->where('se.client_id = 0');//test first with chess, chesstype will be input later
        $user = JFactory::getUser();
        if (!$user->authorise('core.admin') && $params->get('filter_groups', 0) == 1)
        {
            $groups = $user->getAuthorisedGroups();
            if (empty($groups))
            {
                return array();
            }
            $query->leftJoin('#__user_usergroup_map AS m ON m.user_id = a.userid');
            $query->leftJoin('#__usergroups AS ug ON ug.id = m.group_id');
            $query->where('ug.id in (' . implode(',', $groups) . ')');
            $query->where('ug.id <> 1');
        }

        $db->setQuery($query);
        JLog::add(JText::_('khanglq:--- sql = '.$db->getQuery()), JLog::INFO);
        return (array) $db->loadObjectList();
    }

    // show online ALL member names
    static function getTopAllPlayers($params) {
        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true);
        $query->select('se.userid AS userid,
                          se.playerid AS playerid,
                          se.userid AS onlineid,
                          se.client_id AS client_id,
                          se.username AS username,
                          se.coin AS coin,
                          se.avatar AS avatar,
                          se.chesstype AS chesstype,
                          se.ratingpoint AS ratingpoint,
                          se.ratingtype AS ratingtype');
        $query->from('#__viewtopplayerall AS se');
        $query->where('se.client_id is null' or 'se.client_id = 0');//test first with chess, chesstype will be input later
        $user = JFactory::getUser();
        if (!$user->authorise('core.admin') && $params->get('filter_groups', 0) == 1)
        {
            $groups = $user->getAuthorisedGroups();
            if (empty($groups))
            {
                return array();
            }
            $query->leftJoin('#__user_usergroup_map AS m ON m.user_id = a.userid');
            $query->leftJoin('#__usergroups AS ug ON ug.id = m.group_id');
            $query->where('ug.id in (' . implode(',', $groups) . ')');
            $query->where('ug.id <> 1');
        }

        $db->setQuery($query);
        JLog::add(JText::_('khanglq:--- sql = '.$db->getQuery()), JLog::INFO);
        return (array) $db->loadObjectList();
    }




//    =============================================================================================

    static function getTopPlayers($topplayertype = 'all', $topnum = 10, $chesstype = 1, $ratingtype = 'standard') {

        $viewSelect = '#__viewtopplayerall';
        $eloculumn = 'ratingpoint';
        switch ($topplayertype) {
            case 'all':
                $viewSelect = '#__viewtopplayerall';
                $eloculumn = 'ratingpoint';
                break;
            case 'week':
                $viewSelect = '#__viewtopplayerweek';
                $eloculumn = 'elochange';
                break;
            case 'month':
                $viewSelect = '#__viewtopplayermonth';
                $eloculumn = 'elochange';
                break;
            default:
                break;
        }

        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true);
//        $query->select('userid, playerid, onlineid, client_id, username, ratingpoint, coin, avatar, mediaplayer, chesstype, ratingtype');
        $query->select('userid, playerid, onlineid, username, '.$eloculumn.', coin, avatar, mediaplayer');
        $query->from($viewSelect);
        $query->where('chesstype = '.$chesstype);//test first with chess, chesstype will be input later
        $query->where('ratingtype = '.$db->quote($ratingtype));
        $db->setQuery($query, 0, $topnum);//limit
        JLog::add(JText::_('khanglqkfhdafkhsdk:--- sql = '.$db->getQuery()), JLog::INFO);
        return (array) $db->loadObjectList();
    }
}
