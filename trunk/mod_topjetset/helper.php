<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_onlineplayers
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
jimport('joomla.log.log');
JLog::addLogger(array());
class modTopJetSetHelper
{
    static function getTopJetsetWeekUserNames($param){
        $db = JFactory::getDbo();
        $query =$db->getQuery(true);
        $query->select('se.userid AS userid,
                        se.playerid AS playerid,
                        se.userid AS onlineid,
                        se.client_id AS client_id,
                        se.username AS username,
                        se.coinchange AS coinchange,
                        se.ratingpoint AS ratingpoint,
                        se.avatar AS avatar,
                        se.mediaplayer AS mediaplayer,
                        se.chesstype AS chesstype,
                        se.ratingtype AS ratingtype');
        $query->from('#__viewtopjetsetweek AS se');
        $query->where('se.client_id = 0');
        $user = JFactory::getUser();
        if(!$user->authorise('core.admin') && $param->get('filter_groups', 0) == 1){
            $groups = $user->getAuthorisedGroups();
            if(empty($groups))
            {
                return array();
            }
            $query->leftJoin('#__user_usergroup_map AS m ON m.user_id = a.userid');
            $query->leftJoin('#__usergroups AS ug ON ug.id = m.group_id');
            $query->where('ug.id in (' . implode(',', $groups) . ')');
            $query->where('ug.id <> 1');
        }

        $db->setQuery($query);
        JLog::add(JText::_('py_week--- sql = '.$db->getQuery()), JLog::INFO);
        return (array) $db->loadObjectList();
    }

    static function getTopJetsetWeekPlayers($params) {
        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true);
        $query->select('se.userid AS userid,
                          se.playerid AS playerid,
                          se.userid AS onlineid,
                          se.client_id AS client_id,
                          se.username AS username,
                          se.coinchange AS coinchange,
                          se.avatar AS avatar,
                          se.chesstype AS chesstype,
                          se.ratingpoint AS ratingpoint,
                          se.ratingtype AS ratingtype');
        $query->from('#__viewtopjetsetweek AS se');
        $query->leftJoin('#__viewtopjetsetidweek AS g ON (se.playerid = g.playerid)');
        $query->where('se.client_id is null' or 'se.client_id = 0');
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
        return (array) $db->loadObjectList();
    }

    static function getTopJetsetMonthUserNames($param){
        $db = JFactory::getDbo();
        $query =$db->getQuery(true);
        $query->select('se.userid AS userid,
                        se.playerid AS playerid,
                        se.userid AS onlineid,
                        se.client_id AS client_id,
                        se.username AS username,
                        se.coinchange AS coinchange,
                        se.ratingpoint AS ratingpoint,
                        se.avatar AS avatar,
                        se.mediaplayer AS mediaplayer,
                        se.chesstype AS chesstype,
                        se.ratingtype AS ratingtype');
        $query->from('#__viewtopjetsetmonth AS se');
        $query->where('se.client_id = 0');
        $user = JFactory::getUser();
        if(!$user->authorise('core.admin') && $param->get('filter_groups', 0) == 1){
            $groups = $user->getAuthorisedGroups();
            if(empty($groups))
            {
                return array();
            }
            $query->leftJoin('#__user_usergroup_map AS m ON m.user_id = a.userid');
            $query->leftJoin('#__usergroups AS ug ON ug.id = m.group_id');
            $query->where('ug.id in (' . implode(',', $groups) . ')');
            $query->where('ug.id <> 1');
        }

        $db->setQuery($query);
        JLog::add(JText::_('py_week--- sql = '.$db->getQuery()), JLog::INFO);
        return (array) $db->loadObjectList();
    }

    static function getTopJetsetMonthPlayers($params) {
        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true);
        $query->select('se.userid AS userid,
                          se.playerid AS playerid,
                          se.userid AS onlineid,
                          se.client_id AS client_id,
                          se.username AS username,
                          se.coinchange AS coinchange,
                          se.avatar AS avatar,
                          se.chesstype AS chesstype,
                          se.ratingpoint AS ratingpoint,
                          se.ratingtype AS ratingtype');
        $query->from('#__viewtopjetsetmonth AS se');
        $query->leftJoin('#__viewtopjetsetidmonth AS g ON (se.playerid = g.playerid)');
        $query->where('se.client_id is null' or 'se.client_id = 0');
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
        return (array) $db->loadObjectList();
    }

    static function getTopJetsetAllUserNames($param){
        $db = JFactory::getDbo();
        $query =$db->getQuery(true);
        $query->select('se.userid AS userid,
                        se.playerid AS playerid,
                        se.userid AS onlineid,
                        se.client_id AS client_id,
                        se.username AS username,
                        se.coinchange AS coinchange,
                        se.ratingpoint AS ratingpoint,
                        se.avatar AS avatar,
                        se.mediaplayer AS mediaplayer,
                        se.chesstype AS chesstype,
                        se.ratingtype AS ratingtype');
        $query->from('#__viewtopjetsetall AS se');
        $query->where('se.client_id = 0');
        $user = JFactory::getUser();
        if(!$user->authorise('core.admin') && $param->get('filter_groups', 0) == 1){
            $groups = $user->getAuthorisedGroups();
            if(empty($groups))
            {
                return array();
            }
            $query->leftJoin('#__user_usergroup_map AS m ON m.user_id = a.userid');
            $query->leftJoin('#__usergroups AS ug ON ug.id = m.group_id');
            $query->where('ug.id in (' . implode(',', $groups) . ')');
            $query->where('ug.id <> 1');
        }

        $db->setQuery($query);
        JLog::add(JText::_('py_week--- sql = '.$db->getQuery()), JLog::INFO);
        return (array) $db->loadObjectList();
    }

    static function getTopJetsetAllPlayers($params) {
        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true);
        $query->select('se.userid AS userid,
                          se.playerid AS playerid,
                          se.userid AS onlineid,
                          se.client_id AS client_id,
                          se.username AS username,
                          se.coinchange AS coinchange,
                          se.avatar AS avatar,
                          se.chesstype AS chesstype,
                          se.ratingpoint AS ratingpoint,
                          se.ratingtype AS ratingtype');
        $query->from('#__viewtopjetsetall AS se');
        $query->where('se.client_id is null' or 'se.client_id = 0');
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
        return (array) $db->loadObjectList();
    }

    static function getTopJetset($topjetsettype = 'all', $topnum = 10, $chesstype = 1, $ratingtype = 'standard') {

        $viewSelect = '#__viewtopjetsetall';
        $coincolumn = 'coin';
        switch ($topjetsettype) {
            case 'all':
                $viewSelect = '#__viewtopjetsetall';
                $coincolumn = 'coin';
                break;
            case 'week':
                $viewSelect = '#__viewtopjetsetweek';
                $coincolumn = 'coinchange';
                break;
            case 'month':
                $viewSelect = '#__viewtopjetsetmonth';
                $coincolumn = 'coinchange';
                break;
            default:
                break;
        }

        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true);
        $query->select('userid, playerid, onlineid, username, '.$coincolumn.', ratingpoint, avatar, mediaplayer');
        $query->from($viewSelect);
        $query->where('chesstype = '.$chesstype);//test first with chess, chesstype will be input later
        $query->where('ratingtype = '.$db->quote($ratingtype));
        $db->setQuery($query, 0, $topnum);
        return (array) $db->loadObjectList();
    }
}
