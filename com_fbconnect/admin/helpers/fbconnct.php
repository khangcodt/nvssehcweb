<?php
/**
* @package 		Facebook Connect Extension (joomla 1.5.x & 1.6.x)
* @copyright	Copyright (C) Computer - http://www.saaraan.com. All rights reserved.
* @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* @author		Saran Chamling
* @download URL	http://www.saaraan.com
*/

// No direct access
defined('_JEXEC') or die;
class fbconnctHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param	string	$vName	The name of the active view.
	 *
	 * @return	void
	 * @since	1.6
	 */
	public static function addSubmenu($vName)
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_FBCONNCT_FACEBOOK_CONNECT'),
			'index.php?option=com_fbconnct&view=fbconnct',
			$vName == 'facebookconnect'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_FBCONNCT_CONNECTED_USERS'),
			'index.php?option=com_fbconnct&view=users',
			$vName == 'connectedusers'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_FBCONNCT_FACEBOOK_TEST'),
			'index.php?option=com_fbconnct&view=test',
			$vName == 'facebooktest'
		);

	}
}
