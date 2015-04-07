<?php
/**
 * @package		Joomla.Site
 * @subpackage	MOD_TOPPLAYERS
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
    <div>
        <a class="topplayer_soft" href="#">all</a>
        <a class="topplayer_soft" href="#">month</a>
        <a class="topplayer_soft" href="#">week</a>
    </div>


	<?php if ($params->get('filter_groups')):?>
		<p><?php echo JText::_('MOD_TOPPLAYERS_SAME_GROUP_MESSAGE'); ?></p>
	<?php endif;?>
        <table class="sortable" width="100%">
            <thead>
            <tr>
                <th><a><?php echo JText::_('MOD_TOPPLAYERS_THEAD_PLAYER'); ?></a></th>
                <th><a><?php echo JText::_('MOD_TOPPLAYERS_THEAD_RATING'); ?></a></th>
                <th><a><?php echo JText::_('MOD_TOPPLAYERS_THEAD_COIN'); ?></a></th>
				<th><a>Online</a></th>
            </tr>
            </thead>
            <tbody>
	<?php
    foreach($namestop as $name) :
        $checkLive = (in_array($name, $checkLiveUsers))?$onlineImg:$offlineImg;
        $avatarImg = '<img width="15px" height="15px" alt="avatar" src="'.$mediaPath.''.$name->avatar.'" style="margin: 0;">';
    ?>
            <tr>
                <td class="string"> <?php echo $avatarImg; ?> <?php echo mb_substr($name->username,0,8,'UTF-8') ; ?></td>
                <td><?php echo $name->ratingpoint; ?></td>
                <td><?php echo $name->coin; ?></td>
				<td style="text-align: center;"><?php echo $checkLive; ?></td>
            </tr>
	<?php endforeach;  ?>
            </tbody>
        </table>

