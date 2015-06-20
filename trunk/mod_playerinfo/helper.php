<?php

class modPlayerinfoHelper{
    static function getUser(){
        $user = JFactory::getUser();
        $id = $user->get('id');
        $defaultOption = 'default';
        $defaultPlayerid = 10;
        $jinput = JFactory::getApplication()->input;
        $option = $jinput->get('option',$defaultOption);
        $playerid = $jinput->get('playerid',$defaultPlayerid);
        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true);
        if($option!="com_cvnusers"){
            $query->select('username,coin,gamewin,gamelost,gamedraw,avatar,mediaplayer,ratingpoint');
            $query->from('#__rating AS r');
            $query->join('INNER','#__player AS p ON (p.playerid=r.playerid) AND (p.userid="'.$id.'")');
            $query->join('INNER','#__users AS u ON (u.id=p.userid)');
            $db->setQuery($query);
            $result = (array) $db->loadObjectList();
        }else{
            $query->select('username,coin,gamewin,gamelost,gamedraw,avatar,mediaplayer,ratingpoint');
            $query->from('#__rating AS r');
            $query->join('INNER','#__player AS p ON (p.playerid=r.playerid) AND (p.playerid="'.$playerid.'")');
            $query->join('INNER','#__users AS u ON (u.id=p.userid)');
            $db->setQuery($query);
            $result = (array) $db->loadObjectList();
        }
        return $result;

    }
}

?>