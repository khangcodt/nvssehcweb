<?php
class mod_PlayertrophiesHelper{
    static function getData(){
        $user = JFactory::getUser();
        $id = $user->get('id');
        $defaultOption = 'default';
        $defaultPlayerid = '10';
        $jinput = JFactory::getApplication()->input;
        $option = $jinput->get('option',$defaultOption);
        $playerid = $jinput->getAlnum('playerid',$defaultPlayerid);
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        if($option!="com_cvnusers"){
            $query->select('t.name, t.imageurl');
            $query->from('#__playertrophy AS pt');
            $query->innerJoin('#__trophy AS t ON (pt.trophyid = t.trophyid)');
            $query->innerJoin('#__player AS p ON (pt.playerid = p.playerid) AND(p.userid ="'.$id.'") ');
            $query->order('pt.trophytime');
            $db->setQuery($query);
            $result = (array) $db->loadObjectList();
        }else{
            $query->select('t.name, t.imageurl');
            $query->from('#__playertrophy AS pt');
            $query->innerJoin('#__trophy AS t ON (pt.trophyid = t.trophyid)');
            $query->innerJoin('#__player AS p ON (pt.playerid = p.playerid) AND(p.playerid ="'.$playerid.'") ');
            $query->order('pt.trophytime');
            $db->setQuery($query);
            $result = (array) $db->loadObjectList();
        }
        return $result;
    }
}