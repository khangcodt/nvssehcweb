<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_onlineplayers
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

class modViewChallengesHelper
{
	// show online count
	static function getOnlineCount() {
		$db		= JFactory::getDbo();
		// calculate number of guests and users
		$result	= array();
		$user_array  = 0;
		$guest_array = 0;
		$query	= $db->getQuery(true);
		$query->select('guest, usertype, client_id');
		$query->from('#__session');
		$query->where('client_id = 0');
		$db->setQuery($query);
		$sessions = (array) $db->loadObjectList();

		if (count($sessions)) {
			foreach ($sessions as $session) {
				// if guest increase guest count by 1
				if ($session->guest == 1 && !$session->usertype) {
					$guest_array ++;
				}
				// if member increase member count by 1
				if ($session->guest == 0) {
					$user_array ++;
				}
			}
		}

		$result['user']  = $user_array;
		$result['guest'] = $guest_array;

		return $result;
	}

	// show online member names
	static function getOnlineUserNames($params) {
		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);
		$query->select('a.username, a.userid, p.coin, r.ratingpoint');
		$query->from('#__session AS a');
		$query->where('a.userid != 0');
		$query->where('a.client_id = 0');
		$query->group('a.userid');
        $query->leftJoin('#__player AS p ON p.userid = a.userid');
        $query->leftJoin('#__rating AS r ON r.playerid = p.playerid');
        $query->where('r.chesstype = 1');//test first with chess, chesstype will be input later
        $query->where('r.ratingtype = "standard"');
		// $query->select('a.username, p.userid, p.coin, r.ratingpoint');
		// $query->from('#__users AS a');
		// $query->group('a.id');
        // $query->leftJoin('#__player AS p ON p.userid = a.id');
        // $query->leftJoin('#__rating AS r ON r.playerid = p.playerid');
        // $query->where('r.chesstype = 1');//test first with chess, chesstype will be input later
        // $query->where('r.ratingtype = "standard"');
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
	
	// show online member names
	static function getSomeUserNames($params) {
		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);
		// $query->select('a.username, a.time, a.userid, a.usertype, a.client_id, p.coin, r.ratingpoint');
		// $query->from('#__session AS a');
		// $query->where('a.userid != 0');
		// $query->where('a.client_id = 0');
		// $query->group('a.userid');
        // $query->leftJoin('#__player AS p ON p.userid = a.userid');
        // $query->leftJoin('#__rating AS r ON r.playerid = p.playerid');
        // $query->where('r.chesstype = 1');//test first with chess, chesstype will be input later
        // $query->where('r.ratingtype = "standard"');
		$query->select('a.username, p.userid, p.coin, r.ratingpoint');
		$query->from('#__users AS a');
		$query->group('a.id');
        $query->leftJoin('#__player AS p ON p.userid = a.id');
        $query->leftJoin('#__rating AS r ON r.playerid = p.playerid');
        $query->where('r.chesstype = 1');//test first with chess, chesstype will be input later
        $query->where('r.ratingtype = "standard"');
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
    // get all challenges of player
    static function getChallenges($playerid, $chesstype) {
        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true);
        $query->select('a.gameid, a.status, a.completionstatus, p.gametitle, p.initiator, p.gamecoin, p.elowhite, p.eloblack, p.israting, p.timemode, p.maintime, p.incrementtime, p.createdtime');
        $query->from('#__game AS a');
        $query->leftJoin('#__gameoption AS p ON p.gameid = a.gameid');
        $query->where('r.chesstype = ' . $chesstype);
        $query->where('r.ratingtype = "standard"');
        $user = JFactory::getUser();
        if (!$user->authorise('core.admin') && $playerid->get('filter_groups', 0) == 1)
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
}
