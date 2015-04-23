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
$currentUrl = JFactory::getURI();
//check friendly URL enabled or not
//$isSEF = &JFactory::getConfig()->get('sef') == 1;
//$addReqParam = $isSEF?'?':'&';
?>
    <div>
        <a class="topplayer_soft" href="<?php $currentUrl->setVar('topplayertype','all'); echo JRoute::_($currentUrl->toString()); ?>">all</a>
        <a class="topplayer_soft" href="<?php $currentUrl->setVar('topplayertype','month'); echo JRoute::_($currentUrl->toString()); ?>">month</a>
        <a class="topplayer_soft" href="<?php $currentUrl->setVar('topplayertype','week'); echo JRoute::_($currentUrl->toString()); ?>">week</a>
    </div>

        <table class="sortable" width="100%">
            <thead>
            <tr>
                <th class="sorttable_nosort">&nbsp</th>
                <th class="sorttable_nosort"><?php echo JText::_('MOD_TOPPLAYERS_THEAD_PLAYER'); ?></th>
                <th class="sorttable_nosort"><?php echo JText::_('MOD_TOPPLAYERS_THEAD_RATING'); ?></th>
                <th class="sorttable_nosort"><?php echo JText::_('MOD_TOPPLAYERS_THEAD_COIN'); ?></th>
				<th class="sorttable_nosort">Online</th>
            </tr>
            </thead>
            <tbody>
	<?php
    $index = 0;
    foreach($topPlayer as $player) :
        $index++;
        $checkLive = is_null($player->onlineid)?$offlineImg:$onlineImg;
        $avatarImg = '<img width="15px" height="15px" alt="avatar" src="'.$mediaPath.$player->mediaplayer.$player->avatar.'" style="margin: 0;">';
    ?>
            <tr>
                <td style="text-align: center;"><?php echo $index; ?></td>
                <td class="string"> <?php echo $avatarImg; ?> <?php echo mb_substr($player->username,0,8,'UTF-8') ; ?></td>
                <td><?php echo $player->ratingpoint; ?></td>
                <td><?php echo $player->coin; ?></td>
				<td style="text-align: center;"><?php echo $checkLive; ?></td>
            </tr>
	<?php endforeach;  ?>
            </tbody>
        </table>
