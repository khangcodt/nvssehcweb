<?php
/**
 * Chessvn Model for Chessvn Component
 * 
 * @package    Chessvn
 * @subpackage com_chessvn
 * @license  GNU/GPL v2
 *
 * Created by khanglq, admin Chessvn
 *
 *
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
 * Chessvn Table
 *
 * @package    Joomla.Components
 * @subpackage 	Chessvn
 * libraries/joomla/database/table.php
 */
class ChessvnTableBuddyblacklist extends JTable{

	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function __construct(&$db){
		parent::__construct('#__buddyblacklist', 'bblid', $db);
	}
	
	function check(){
		// write here data validation code
		return parent::check();
	}

	function bind($src, $ignore = array()){
		// source value is an array or object.
		return parent::bind($src, $ignore);
	}

	function store($updateNulls = false) {
		// $updateNulls: True to update fields even if they are null.
		return parent::store($updateNulls);
	}
}