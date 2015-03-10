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
defined( '_JEXEC' ) or die( 'Restricted access' );

// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * Chessvn Model
 *
 * @package    Joomla.Components
 * @subpackage 	Chessvn
 */
class ChessvnControllerAutoplayerlist extends JControllerAdmin{

	/**
	 * Parameters in config.xml.
	 *
	 * @var	object
	 * @access	protected
	 */
	protected $params = null;

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

	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function getModel($name = 'Autoplayer', $prefix = 'ChessvnModel', $cfg = array('ignore_request' => true)){
		$model = parent::getModel($name, $prefix, $cfg);
		return $model;
	}	
	
	/**MMLBE: Example of task working on list; you need also a doTaskList in model for single object (not for list!!)
	public function doTaskList() {
        JSession::checkToken() or die(JText::_('JINVALID_TOKEN'));// Check for request forgeries

        // Get items to do a task from the request.
		$cid = JFactory::getApplication()->input->get('cid', array(), 'array'); 

        if (empty($cid)){
            JError::raiseWarning(500, JText::_($this->text_prefix . '_NO_ITEM_SELECTED'));
        }else{
            // Get the model.
            $model = $this->getModel();

            // Make sure the item ids are integers
            JArrayHelper::toInteger($cid);

            // doTaskList the items.
            if (!$model->doTaskList($cid)){
                    JError::raiseWarning(500, $model->getError());
            }else{
                $ntext = $this->text_prefix . '_N_ITEMS_PUBLISHED';
                $this->setMessage(JText::plural($ntext, count($cid)));
            }
        }
        $extension = JRequest::getCmd('extension');
        $extensionURL = ($extension) ? '&extension=' . JRequest::getCmd('extension') : '';
        $this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list . $extensionURL, false));

    }	
	MMLBE*/
	
	
}