<?php
//Main service file that serve all request (from web, mobile client, ...)
defined('_JEXEC') or die('Cam hack, supper hacker here');
header("Content-Type: text/xml");
header('Cache-Control: no-cache');
header('Pragma: no-cache');

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<SERVER>\n";

// Get variables
$mediaPath = JPATH_ROOT . '/media/media_chessvn/';
$action = JRequest::getVar('action');
$playerid = JRequest::getVar('action');
$chesstype = JRequest::getVar('action');

// Include the requried classes
require($mediaPath . "cvnphp/dao/cnvdao.php");

// Main Application
switch ($action) {

    // get all challenges of player, open and related challenges
    case "listchallenges":
        $cvnDao = new CvnDao();
        echo "<RESPONSE>\n";
        echo $cvnDao->getChallenges($playerid, $chesstype);
        echo "</RESPONSE>\n";
        break;
}
echo "</SERVER>\n";
?>