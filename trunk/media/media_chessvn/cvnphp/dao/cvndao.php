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
    function getChallenges($playerid, $chesstype)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('a.gameid, a.status, a.completionstatus, p.gametitle, p.initiator, p.gamecoin, p.elowhite, p.eloblack, p.israting, p.timemode, p.maintime, p.incrementtime, p.createdtime');
        $query->from('#__game AS a');
        $query->leftJoin('#__gameoption AS p ON p.gameid = a.gameid');
        $query->where('p.chesstype = ' . $chesstype);
        $query->where('p.initiator = ' . $playerid);

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
            echo "</GAMES>\n";
        }
    }
}

?>