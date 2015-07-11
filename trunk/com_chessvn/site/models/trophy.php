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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

/**
 * Chessvn Model
 *
 * @package    Joomla.Components
 * @subpackage 	Chessvn
 */
class ChessvnModelTrophy extends JModelItem{

	/**
	 * Trophy data array for tmp store
	 *
	 * @var array
	 */
	public $_data;
	
	/**
	 * Gets the data
	 * @return mixed The data to be displayed to the user
	 */
	public function getData(){
		if (empty( $this->_data )){
			$id = JRequest::getInt('id',  0);
			$db = JFactory::getDBO();
			$query = "SELECT * FROM `#__trophy` where `trophyid` = {$id}";
			$db->setQuery( $query );
			$this->_data = $db->loadObject();
		}
		return $this->_data;
	}
}
