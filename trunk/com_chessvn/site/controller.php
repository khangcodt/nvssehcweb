<?php
/**
 * com_chessvn default controller
 * 
 * @package    Chessvn
 * @subpackage com_chessvn
 * @license  !license!
 *
 * Created by khanglq, admin Chessvn
 *
 *
 */

jimport('joomla.application.component.controller');

/**
 * chessvn Component Controller
 *
 * @package	Chessvn
 */
class ChessvnController extends JControllerLegacy
{
	/**
	 * Method to display the view
	 *
	 * @access	public
	 */
	function display($cachable = false, $urlparams = false)
	{
//        JRequest::setVar('format', 'xml' );
		parent::display($cachable, $urlparams);
	}

    public function send(){
        $gameid = $_POST['gameid'];
        $userid = $_POST['userid'];
        $message = $_POST['message'];
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        // Lấy playerid từ userid
        $query->select('playerid');
        $query->from('#__player');
        $query->where('userid = '.$userid);
        $db->setQuery($query);
        $playerid = $db->loadObject()->playerid;


        $today = date("Y-m-d, H:i s");
        $query = $db->getQuery(true);
        $columns = array('gameid', 'playerid', 'chatmsg', 'createddate');
        $values = array($db->quote($gameid), $playerid, $db->quote($message), 'now()');

        $query->insert($db->quoteName('#__gamechat'))
            ->columns($db->quoteName($columns))
            ->values(implode(',', $values));

        $db->setQuery($query);
        $db->query();
    }

}
?>
