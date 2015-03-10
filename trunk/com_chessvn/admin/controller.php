<?php
/**
 * Chessvn Controller for Chessvn Component
 * 
 * @package    Chessvn
 * @subpackage com_chessvn
 * @license  !license!
 *
 * Created with Marco's Component Creator for Joomla! 2.5 & 3.x
 * http://www.mmleoni.net/joomla-component-builder
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