<?php
/**
* @package 		Facebook Connect Extension (joomla 1.5.x & 1.6.x)
* @copyright	Copyright (C) Computer - http://www.saaraan.com. All rights reserved.
* @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* @author		Saran Chamling
* @download URL	http://www.saaraan.com
*/
// no direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.installer.installer');
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');
jimport( 'joomla.version' );
$status = new JObject();
$status->modules = array();
$status->plugins = array();

global $fbconnct_installation_run;
if($fbconnct_installation_run) return;

// -- General settings

$db = JFactory::getDBO();
if( version_compare( JVERSION, '1.5.0', 'ge' ) ) {
		$src = $this->parent->getPath('source');
		//fix menu names in joomla 1.5
		@$db->setQuery("UPDATE #__components SET name='Facebook Test' WHERE `name`='FACEBOOK-TEST' AND `option`='com_fbconnct'");
		@$db->query();
		@$db->setQuery("UPDATE #__components SET name='Connected Users' WHERE `name`='CONNECTED-USERS' AND `option`='com_fbconnct'");
		@$db->query();
		@$db->setQuery("UPDATE #__components SET name='Facebook Connect' WHERE `name`='FBCONNCT' AND `option`='com_fbconnct'");
		@$db->query();
		@$db->setQuery("UPDATE #__components SET name='Facebook Connect' WHERE `name`='FACEBOOK-CONNECT' AND `option`='com_fbconnct'");
		@$db->query();
} else {
		$src = dirname(__FILE__);
}


if(is_dir($src.'/modules/mod_fbconnct')) {
	$installer = new JInstaller;
	$result = @$installer->install($src.'/modules/mod_fbconnct');
	$status->modules[] = array('name'=>'mod_fbconnct','client'=>'site', 'result'=>$result);
}
?>

<?php $rows = 0;?>
<table class="adminlist" border="0">
  <tr>
    <td colspan="2" valign="top"><h2>Facebook Connect</h2>
    <div class="next"><a href="index.php?option=com_fbconnct">Start using Facebook Graph Connect</a></div>
    </td>
  </tr>
  <tr>
    <td valign="top"><table class="adminlist" width="100%">
	<thead>
		<tr>
			<th class="title" colspan="2">Extension</th>
			<th width="30%">Status</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="3"></td>
		</tr>
	</tfoot>
	<tbody>
		<tr class="row0">
			<td class="key" colspan="2">Facebook Component</td>
			<td><strong><span style="color:green">Installed</span></strong></td>
		</tr>
		<?php if (count($status->modules)) : ?>
		<tr>
			<th>Module</th>
			<th>Client</th>
			<th>Status</th>
		</tr>

		<?php foreach ($status->modules as $module) : ?>
		<tr class="row<?php echo (++ $rows % 2); ?>">
			<td class="key"><?php echo $module['name']; ?></td>
			<td class="key"><?php echo ucfirst($module['client']); ?></td>
			<td><strong><?php echo ($module['result'])?JText::_('<span style="color:green">Installed</span>'):JText::_('<span style="color:red">Not installed</span>'); ?></strong></td>
		</tr>
		<?php endforeach;?>
		<?php endif;?>
        

	</tbody>
</table></td>
    <td valign="top"><a href="http://www.saaraan.com" target="_blank"><img src="components/com_fbconnct/assets/facebook.jpg"  alt="Facebook Graph Connect" align="right" /></a></td>
  </tr>
</table>

<?php
global $fbconnct_installation_run;
$fbconnct_installation_run = 1;
?>