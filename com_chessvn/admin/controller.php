<?php
/**
 * Chessvn Controller for Chessvn Component
 * 
 * @package    Chessvn
 * @subpackage com_chessvn
 * @license  !license!
 *
 * Created by khanglq, admin Chessvn
 *
 *
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

/**
 * Chessvn Model
 *
 * @package    Joomla.Components
 * @subpackage 	Chessvn
 */
class ChessvnController extends JControllerLegacy
{
	/**
	 * Method to display the view
	 *
	 * @access	public
	 */
	public function display($cachable = false, $urlparams = false){
		parent::display($cachable, $urlparams);
	}
}