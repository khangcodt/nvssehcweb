<?php
/**
 * Chessvn Controller for Chessvn Component
 * 
 * @package    Chessvn
 * @subpackage com_chessvn
 * @license  GNU/GPL v2
 *
 * Created by khanglq, admin Chessvn
 *
 *
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

// import Joomla controllerform library
jimport('joomla.application.component.controllerform');
/**
 * Chessvn Controller
 *
 * @package    Joomla.Components
 * @subpackage 	Chessvn
 */
class ChessvnControllerGame extends JControllerForm{
	/**
	 * Parameters in config.xml.
	 *
	 * @var	object
	 * @access	protected
	 */
	protected $params = null;
	
	/**
	 * The URL view item variable.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $view_item = 'game';

	/**
	 * The URL view list variable.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $view_list = 'gamelist';	

	/**
	 * constructor (registers additional tasks to methods)
	 * @return void
	 */
	function __construct(){
		parent::__construct();
		
		// Set reference to parameters
		$this->params = JComponentHelper::getParams( 'com_chessvn' );
		//$dummy = $this->params->get('parm_text');

	}
	
	/**MMLBE: Example of override of common task
	function edit($key = null, $urlVar = null) {
		$ret=parent::edit($key, $urlVar);
		return $ret;
	}
	MMLBE*/
	
	/**MMLBE: Example of override of common task
	function save($key = null, $urlVar = null) {
		$ret = parent::save($key, $urlVar);
		return $ret;
	}
	MMLBE*/
	
	/**MMLBE: Example of override of common task
	function cancel($key = null) {
		$ret = parent::cancel($key);
		return $ret;
	}
    MMLBE*/
	

}