<?php
//Connect DB for manipulate data and return formated result
defined('_JEXEC') or die('Cam hack, supper hacker here');

class CvnDao
{
    //////////////////////////////////////////////////////////////////////////////
    //Define properties
    //////////////////////////////////////////////////////////////////////////////

    //////////////////////////////////////////////////////////////////////////////
    //Define methods
    //////////////////////////////////////////////////////////////////////////////

    /**********************************************************************
     * getChallenges
     * Returns all challenges of player (open, related and created challenges of player) for chess type
     */
    public static function getChallenges($userid = 630, $chesstype = 1)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('a.gameid, a.status, a.completionstatus, p.gametitle, p.initiator, p.gamecoin, p.elowhite, p.eloblack, p.israting, p.timemode, p.maintime, p.incrementtime, p.createdtime');
        $query->from('#__users AS u');
        $query->innerJoin('#__player AS g ON g.userid = u.id');
        $query->leftJoin('#__gameoption AS p ON p.initiator = g.playerid');
        $query->innerJoin('#__game a ON a.gameid = p.gameid');
        $query->where('p.chesstype = ' . $chesstype);
        $query->where('u.id = ' . $userid);

        $db->setQuery($query);
        $result = $db->loadObjectList();
        $resultCount = count($result);
        for ($i = 0; $i < $resultCount; $i++) {
            $gameid = $result[$i]->gameid;
            $status = $result[$i]->status;
            $completion_status = $result[$i]->completionstatus;
            $gametitle = $result[$i]->gametitle;
            $initiator = $result[$i]->initiator;
            $gamecoin = $result[$i]->gamecoin;
            $elowhite = $result[$i]->elowhite;
            $eloblack = $result[$i]->eloblack;
            $createdtime = $result[$i]->createdtime;

            echo "<GAMES>\n";
            echo "<STATUS>$status</STATUS>\n";
            echo "<COMPLETIONSTATUS>$completion_status</COMPLETIONSTATUS>\n";
            echo "<TITLE>$gametitle</TITLE>\n";
            echo "<TIMECREATED>$createdtime</TIMECREATED>\n";
            echo "<GAMECOIN>$gamecoin</GAMECOIN>\n";
            echo "</GAMES>\n";
        }
    }

    public static function getViewChallenges($userid = 1, $chesstype = 1) {

        jimport('joomla.log.log');
        JLog::addLogger(array());
//        JLog::add(JText::_('test logging by jag..fsdf'), JLog::INFO);
//        JLog::add(JText::_('$dao: userid = '.$userid), JLog::INFO);

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('gameid, status, completionstatus, gametitle, initiator, gamecoin, elowhite, eloblack, israting, timemode, maintime, incrementtime, createdtime');
        $query->from('#__viewchallenges');
        $query->where('chesstype = ' . $chesstype);
        $query->where('userid = ' . $userid);
        $db->setQuery($query);
        $result = $db->loadObjectList();

//        JLog::add(JText::_('khanglq:--- sql = '.$db->getQuery()), JLog::INFO);

        $resultCount = count($result);

        for ($i = 0; $i < $resultCount; $i++) {
            $gameid = $result[$i]->gameid;
            $status = $result[$i]->status;
            $completion_status = $result[$i]->completionstatus;
            $gametitle = $result[$i]->gametitle;
            $initiator = $result[$i]->initiator;
            $gamecoin = $result[$i]->gamecoin;
            $elowhite = $result[$i]->elowhite;
            $eloblack = $result[$i]->eloblack;
            $createdtime = $result[$i]->createdtime;

            echo "<GAMES>\n";
            echo "<STATUS>$status</STATUS>\n";
            echo "<COMPLETIONSTATUS>$completion_status</COMPLETIONSTATUS>\n";
            echo "<TITLE>$gametitle</TITLE>\n";
            echo "<TIMECREATED>$createdtime</TIMECREATED>\n";
            echo "<GAMECOIN>$gamecoin</GAMECOIN>\n";
            echo "</GAMES>\n";
        }
    }
}

?>