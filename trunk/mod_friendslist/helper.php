<?php
/**
 * Created by PhpStorm.
 * User: PY
 * Date: 6/23/15
 * Time: 4:03 PM
 */
jimport('joomla.log.log');
JLog::addLogger(array());

class mod_FriendsListHelper
{
    static function getdata_viewrequest()
    {
        $userid = JFactory::getUser()->get('id');
        $jinput = JFactory::getApplication()->input;
        $option = $jinput->get('option', 'default');
        $playerid = $jinput->get('playerid', '0');
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        if ($option != "com_cvnusers") {
            $query->select('r.userid AS userid,
                            r.friendid AS friendid,
                            r.onlineid AS onlineid,
                            r.username AS username,
                            r.ratingpoint AS ratingpoint,
            r.coin AS coin,
                            r.avatar AS avatar,
                            r.mediaplayer AS mediaplayer,
                            r.chesstype AS chesstype,
                            r.ratingtype AS ratingtype');
            $query->from('#__viewrequestedfriends AS r');
            $query->innerJoin('#__player AS p ON (r.playerid = p.playerid) AND(p.userid ="'.$userid.'") ');
            $db->setQuery($query);
            $viewrequest = (array) $db->loadObjectList();

        } else {
            $query->select('r.userid AS userid,
                            r.friendid AS friendid,
                            r.onlineid AS onlineid,
                            r.username AS username,
                            r.ratingpoint AS ratingpoint,
                            r.coin AS coin,
                            r.avatar AS avatar,
                            r.mediaplayer AS mediaplayer,
                            r.chesstype AS chesstype,
                            r.ratingtype AS ratingtype');
            $query->from('#__viewrequestedfriends AS r');
            $query->innerJoin('#__player AS p ON (r.playerid = p.playerid) AND(p.playerid ="'.$playerid.'") ');
            $db->setQuery($query);
            $viewrequest = (array) $db->loadObjectList();
        }
        return $viewrequest;

    }
    static function getdata_viewresponse()
    {
        $userid = JFactory::getUser()->get('id');
        $jinput = JFactory::getApplication()->input;
        $option = $jinput->get('option', 'default');
        $playerid = $jinput->get('playerid', '0');
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        if ($option != "com_cvnusers") {
            $query->select('r.userid AS userid,
                            r.friendid AS friendid,
                            r.onlineid AS onlineid,
                            r.username AS username,
                            r.ratingpoint AS ratingpoint,
                            r.coin AS coin,
                            r.avatar AS avatar,
                            r.mediaplayer AS mediaplayer,
                            r.chesstype AS chesstype,
                            r.ratingtype AS ratingtype');
            $query->from('#__viewrespondedfriends AS r');
            $query->innerJoin('#__player AS p ON (r.buddyid = p.playerid) AND(p.userid ="'.$userid.'") ');
            $db->setQuery($query);
            $viewresponse = (array) $db->loadObjectList();
        } else {
            $query->select('r.userid AS userid,
                            r.friendid AS friendid,
                            r.onlineid AS onlineid,
                            r.username AS username,
                            r.ratingpoint AS ratingpoint,
                            r.coin AS coin,
                            r.avatar AS avatar,
                            r.mediaplayer AS mediaplayer,
                            r.chesstype AS chesstype,
                            r.ratingtype AS ratingtype');
            $query->from('#__viewrespondedfriends AS r');
            $query->innerJoin('#__player AS p ON (r.buddyid = p.playerid) AND(p.playerid ="'.$playerid.'") ');
            $db->setQuery($query);
            $viewresponse =(array) $db->loadObjectList();
        }
        return $viewresponse;

    }
}