<?php
/**
 * @package		Joomla.Site
 * @subpackage	MOD_ONLINEPLAYERS
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$document = JFactory::getDocument();
$mediaPath = JURI::base() . '/media/media_chessvn/';
$document->addScript($mediaPath.'js/sorttable.js');
$document->addStyleSheet($mediaPath.'css/chessvn.css');
$imgScale = 10;
$onlineImg = '<img width="'.$imgScale.'" height="'.$imgScale.'" alt="ON" src="'.$mediaPath.'images/OnlineDot.png" style="margin: 0;">';
$offlineImg = '<img width="'.$imgScale.'" height="'.$imgScale.'" alt="OFF" src="'.$mediaPath.'images/OfflineDot.png" style="margin: 0;">';
?>

<?php if ($showmode == 0 || $showmode == 2) : ?>
	<?php $guest = JText::plural('MOD_ONLINEPLAYERS_GUESTS', $count['guest']); ?>
	<?php $member = JText::plural('MOD_ONLINEPLAYERS_MEMBERS', $count['user']); ?>
	<p><?php echo JText::sprintf('MOD_ONLINEPLAYERS_WE_HAVE', $guest, $member); ?></p>
<?php endif; ?>

<?php if (($showmode > 0) && count($names)) : ?>

	<?php if ($params->get('filter_groups')):?>
		<p><?php echo JText::_('MOD_ONLINEPLAYERS_SAME_GROUP_MESSAGE'); ?></p>
	<?php endif;?>
        <table class="sortable" width="100%">
            <thead>
            <tr>
                <th><a><?php echo JText::_('MOD_ONLINEPLAYERS_THEAD_PLAYER'); ?></a></th>
                <th><a><?php echo JText::_('MOD_ONLINEPLAYERS_THEAD_RATING'); ?></a></th>
                <th><a><?php echo JText::_('MOD_ONLINEPLAYERS_THEAD_COIN'); ?></a></th>
				<th><a>Live</a></th>
            </tr>
            </thead>
            <tbody>
	<?php
    foreach($names as $name) :
        $live = (in_array($name, $liveUsers))?$onlineImg:$offlineImg;
    ?>
            <tr>
                <td><?php echo $name->username; ?></td>
                <td><?php echo $name->ratingpoint; ?></td>
                <td><?php echo $name->coin; ?></td>
				<td style="text-align: center;"><?php echo $live; ?></td>
            </tr>
	<?php endforeach;  ?>
            </tbody>
        </table>
<?php endif;  ?>

