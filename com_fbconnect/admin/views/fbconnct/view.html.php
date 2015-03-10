<?php
/**
* @package 		Facebook Connect Extension (joomla 1.5.x & 1.6.x)
* @copyright	Copyright (C) Computer - http://www.saaraan.com. All rights reserved.
* @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* @author		Saran Chamling
* @download URL	http://www.saaraan.com
*/
 
// no direct access
 
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view');
 
/**
 * HTML View class for the HelloWorld Component
 *
 * @package    HelloWorld
 */
 
class AdminfbconnctViewfbconnct extends JView
{
    function display($tpl = null)
    { 
		JToolBarHelper::preferences( 'com_fbconnct',400,570 );
		JToolBarHelper::title( JText::_( 'Facebook Connect' ),'facebook_c' );
		parent::display($tpl);
    }
}
