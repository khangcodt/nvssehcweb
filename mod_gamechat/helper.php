<?php

    class modGameChatHelper{

        static  function CheckplayerID($gameid){
            // get playerid of user
            $user = JFactory::getUser();
            $userid = $user->get('id');
            $db		= JFactory::getDbo();
            $query	= $db->getQuery(true);
            $query->select('playerid');
            $query->from('#__player');
            $query->where('userid = ' . $userid);
            $db->setQuery($query);
            $playerid = $db->loadObject()->playerid;

            // check playerid

            $query	= $db->getQuery(true);
            $query->select('initiator, oponentid');
            $query->from('#__gameoption');
            $query->where('gameid = ' . $gameid);
            $db->setQuery($query);
            $result = $db->loadObject();
            if($playerid == $result->initiator || $playerid == $result->oponentid){
                return true;
            }
            return false;
        }

    }

