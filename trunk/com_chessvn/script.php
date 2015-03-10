<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/6/15
 * Time: 2:35 PM
 */

class com_chessvnInstallerScript {

    /**
     * method to create views after installing component
     */
    function postflight($type, $parent)
    {
        jimport('joomla.log.log');
        JLog::addLogger(array());

        $sql = "CREATE OR REPLACE VIEW #__viewchallenges AS
    select
        p.userid AS userid,
        g.gameid AS gameid,
        g.status AS status,
        g.completionstatus AS completionstatus,
        o.gametitle AS gametitle,
        o.wplayerid AS wplayerid,
        o.bplayerid AS bplayerid,
        o.chesstype AS chesstype,
        o.initiator AS initiator,
        o.gamecoin AS gamecoin,
        o.elowhite AS elowhite,
        o.eloblack AS eloblack,
        o.elomin AS elomin,
        o.elomax AS elomax,
        o.israting AS israting,
        o.timemode AS timemode,
        o.maintime AS maintime,
        o.incrementtime AS incrementtime,
        o.createdtime AS createdtime,
        o.starttime AS starttime,
        o.endtime AS endtime
    from
        (((#__users u
        join #__player p ON ((p.userid = u.id)))
        left join #__gameoption o ON ((o.initiator = p.playerid)))
        join #__game g ON ((g.gameid = o.gameid)));";

        $db = JFactory::getDbo();
        $db->setQuery($sql);
        if(!$db->query()) {
            $msgInfo = '<p>' . JText::_('Loi run SQL: '.$db->getErrorMsg().'\n' . $type . '_TEXT') . '</p>';
            JLog::add(JText::_($msgInfo), JLog::INFO);
            echo $msgInfo;
        } else {
            $msgInfo = '<p>' . JText::_('Create view OK!!!\n' . $type . '_TEXT') . '</p>';
            JLog::add(JText::_($msgInfo), JLog::INFO);
            echo $msgInfo;
        }
    }
} 