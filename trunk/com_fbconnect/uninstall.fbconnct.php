<?php
/**
* @package 		Facebook Connect Extension (joomla 1.5.x & 1.6.x)
* @copyright	Copyright (C) Computer - http://www.saaraan.com. All rights reserved.
* @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* @author		Saran Chamling
* @download URL	http://www.saaraan.com
*/
defined('_JEXEC') or die('Restricted access');
jimport('joomla.installer.installer');
$db =  JFactory::getDBO();
$status = new JObject();
$status->modules = array();
$status->plugins = array();
$src = $this->parent->getPath('source');
$installer = new JInstaller;

if(version_compare(JVERSION,'1.6.0','ge')){
	$db->setQuery('SELECT `extension_id` FROM #__extensions WHERE `element` = "mod_fbconnct" AND `type` = "module"');
} else {
	$db->setQuery('SELECT `id` FROM #__modules WHERE `module` = "mod_fbconnct"');
}
$id = $db->loadResult();

if($id)
{	
	$result = @$installer->uninstall('module',$id,1);
	$status->modules[] = array('name'=>'mod_fbconnct','client'=>'site', 'result'=>$result);
}

if(version_compare(JVERSION,'1.6.0','ge')){
	$db->setQuery('SELECT `extension_id` FROM #__extensions WHERE `element` = "fbconnct" AND `type` = "plugin"');
} else {
	$db->setQuery('SELECT `id` FROM #__plugins WHERE `element` = "fbconnct"');
}
$plgid = $db->loadResult();


if($plgid)
{	
	$result = @$installer->uninstall('plugin',$plgid,1);
	$status->plugins[] = array('name'=>'fbconnct','group'=>'content', 'result'=>$result);
}

?>

<?php $rows = 0;?>



<table class="adminlist" border="0">
  <tr>
    <td colspan="2" valign="top"><h2>Facebook Connect Unstall Status</h2>
    <div style="font-size:12px;font:Verdana, Arial, Helvetica, sans-serif;color:#333333;">Note: "facebook_joomla_connect" database table was <strong>NOT</strong> removed,  it may contain some users connect records. Although, it is completely safe delete the table.</div></td>
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
			<td class="key" colspan="2">FacebookConnect Component</td>
			<td><strong><span style="color:green">Removed</span></strong></td>
		</tr>
		<?php if (count($status->modules)) : ?>
		<tr>
			<th><?php echo JText::_('Module'); ?></th>
			<th><?php echo JText::_('Client'); ?></th>
			<th></th>
		</tr>
		<?php foreach ($status->modules as $module) : ?>
		<tr class="row<?php echo (++ $rows % 2); ?>">
			<td class="key"><?php echo $module['name']; ?></td>
			<td class="key"><?php echo ucfirst($module['client']); ?></td>
			<td><strong><?php echo ($module['result'])?JText::_('<span style="color:green">Removed</span>'):JText::_('<span style="color:red">Not Removed</span>'); ?></strong></td>
		</tr>
		<?php endforeach;?>
		<?php endif;?>
        
		<?php if (count($status->plugins)) : ?>
		<tr>
			<th><?php echo JText::_('Plugin'); ?></th>
			<th><?php echo JText::_('Group'); ?></th>
			<th></th>
		</tr>
		<?php foreach ($status->plugins as $plugin) : ?>
		<tr class="row<?php echo (++ $rows % 2); ?>">
			<td class="key"><?php echo $plugin['name']; ?></td>
			<td class="key"><?php echo ucfirst($plugin['group']); ?></td>
			<td><strong><?php echo ($plugin['result'])?JText::_('<span style="color:green">Removed</span>'):JText::_('<span style="color:red">Not Removed</span>'); ?></strong></td>
		</tr>
		<?php endforeach;?>
		<?php endif;?>

	</tbody>
</table>

  </tr>
</table>