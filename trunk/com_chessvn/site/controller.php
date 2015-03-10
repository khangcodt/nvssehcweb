<?php
/**
 * com_chessvn default controller
 * 
 * @package    Chessvn
 * @subpackage com_chessvn
 * @license  !license!
 *
 * Created with Marco's Component Creator for Joomla! 1.6
 * http://www.mmleoni.net/joomla-component-builder
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
