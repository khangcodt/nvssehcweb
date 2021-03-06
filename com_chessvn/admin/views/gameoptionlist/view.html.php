<?php
/**
 * Chessvn View for Chessvn Component
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

jimport( 'joomla.application.component.view' );

/**
 * Chessvn View
 *
 * @package    Joomla.Components
 * @subpackage 	Chessvn
 */
class ChessvnViewGameoptionlist extends JViewLegacy
{
	/**
	 * Gameoptionlist view display method
	 * @return void
	 **/
	function display($tpl = null){
		$app = JFactory::getApplication();
		$this->user  = JFactory::getUser();

		// Get data from the model; method is getItems() in J2.5+
		$this->rows = $this->get( 'Items');
		$this->state = $this->get( 'State');
		$this->pagination = $this->get('Pagination');	
		$this->j3x = version_compare( JVERSION, '3.0', '>=' ); // is Joomla 3+

		
		// draw menu
		//'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.delete'
		JToolBarHelper::title( JText::_( 'COM_CHESSVN_MENU_GAMEOPTIONLIST' ), 'generic.png' );
		if($this->user->authorise('core.edit', 'com_chessvn')) JToolBarHelper::editList('gameoption.edit');
		if($this->user->authorise('core.create', 'com_chessvn')) JToolBarHelper::addNew('gameoption.add');
		if($this->user->authorise('core.delete', 'com_chessvn')) JToolBarHelper::deleteList('', 'gameoptionlist.delete');
		
		if( (isset($this->rows[0]->published)) && ($this->user->authorise('core.edit', 'com_chessvn')) ){
			JToolBarHelper::divider();
			JToolBarHelper::publish('gameoptionlist.publish');
			JToolBarHelper::unpublish('gameoptionlist.unpublish');
		}
		
		// configuration editor for config.xml
		if($this->user->authorise('core.admin', 'com_chessvn')){
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_chessvn');
		}
		

		// SORTING get the user state of order and direction
		//  ** J1.5 now in $this->state object
		//$default_order_field = 'gameoptionid';
		//$lists['order_Dir'] = $app->getUserStateFromRequest('com_chessvnfilter_order_Dir', 'filter_order_Dir', 'ASC');
		//$lists['order'] = $app->getUserStateFromRequest('com_chessvnfilter_order', 'filter_order', $default_order_field);
		//$lists['search'] = $app->getUserStateFromRequest('com_chessvnsearch', 'search', '');

		parent::display($tpl);
	}
	
	protected function auth($area){
		//echo '<pre>' . print_r(JAccess::getActions('com_chessvn','gameoption'),true).'</pre>';die();
		$aclLocal = array();
		foreach(JAccess::getActions('com_chessvn', 'gameoption') as $ar) $aclLocal[] = $ar->name;
		if(in_array($area, $aclLocal)){
			return $this->user->authorise($area, 'com_chessvn', 'gameoption');
		}else{
			$aclGlobal = array();
			foreach(JAccess::getActions('com_chessvn') as $ar) $aclGlobal[] = $ar->name;
			if(in_array($area, $aclGlobal)){
				if(!empty($aclLocal)) JFactory::getApplication()->enqueueMessage('Undefined authorization area: ' . $area . ' -- fall back on component acl', 'Warning');
				return $this->user->authorise($area, 'com_chessvn');
			}else{
				JFactory::getApplication()->enqueueMessage('Undefined authorization area: ' . $area . ' -- NO fall back found', 'Error');
				return true;
			}
		}
		
	}
	
}