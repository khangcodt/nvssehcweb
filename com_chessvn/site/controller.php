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

}
?>
