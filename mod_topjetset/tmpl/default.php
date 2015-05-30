<?php
/**
 * @package		Joomla.Site
 * @subpackage	MOD_TOPJETSET
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$utilfile = JPATH_ROOT. '/media/media_chessvn/cvnphp/utils/cvnutils.php';
require_once($utilfile);
$document = JFactory::getDocument();
$mediaPath = JURI::base() . '/media/media_chessvn/';
$document->addScript($mediaPath . 'js/jquery/jquery-1.8.2.min.js');
$document->addScript($mediaPath . 'js/jquery/jquery.contextMenu.js');
$document->addScript($mediaPath.'js/sorttable.js');
$document->addStyleSheet($mediaPath.'css/chessvn.css');
$document->addStyleSheet($mediaPath.'css/jquery.contextMenu.css');

$imgScale = 13;
$coinImgThead = '<img width="'.$imgScale*1.488.'" height="'.$imgScale.'" alt="'.JText::_('MOD_TOPPLAYERS_THEAD_COIN').'" src="'.$mediaPath.'images/CoinIcon.png" style="margin: 0;">';
$onlineImgThead= '<img width="'.$imgScale*2.0.'" height="'.$imgScale.'" alt="'.JText::_('MOD_TOPPLAYERS_THEAD_ONLINE').'" src="'.$mediaPath.'images/online.gif" style="margin: 0;">';

$limitStr = "...";
$limitLength = 12;
$imgScale = 10;
$onlineImg = '<img width="'.$imgScale.'" height="'.$imgScale.'" alt="ON" src="'.$mediaPath.'images/OnlineDot.png" style="margin: 0;">';
$offlineImg = '<img width="'.$imgScale.'" height="'.$imgScale.'" alt="OFF" src="'.$mediaPath.'images/OfflineDot.png" style="margin: 0;">';
$currentUrl = JFactory::getURI();

$coincolumn = 'coin';
switch ($showmode) {
    case 'all':
        $coincolumn = 'coin';
        break;
    case 'week':
        $coincolumn = 'coinchange';
        break;
    case 'month':
        $coincolumn = 'coinchange';
        break;
    default:
        break;
}
?>
<div style="text-align: right">
    <a class="topplayer_soft" href="<?php $currentUrl->setVar('topjetsettype','all'); echo JRoute::_($currentUrl->toString()); ?>">all</a>
    <a class="topplayer_soft" href="<?php $currentUrl->setVar('topjetsettype','month'); echo JRoute::_($currentUrl->toString()); ?>">month</a>
    <a class="topplayer_soft" href="<?php $currentUrl->setVar('topjetsettype','week'); echo JRoute::_($currentUrl->toString()); ?>">week</a>
</div>

<table class="sortable" width="100%">
    <thead>
    <tr>
        <th class="sorttable_nosort">&nbsp</th>
        <th class="sorttable_nosort"><?php echo JText::_('MOD_TOPJETSET_THEAD_PLAYER'); ?></th>
        <th class="sorttable_nosort"><?php echo JText::_('MOD_TOPJETSET_THEAD_RATING'); ?></th>
        <th class="sorttable_nosort" style="text-align: center; vertical-align: text-bottom"><?php echo $coinImgThead; ?></th>
        <th class="sorttable_nosort" style="text-align: center; vertical-align: text-bottom"><?php echo $onlineImgThead;?> </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $index = 0;
    foreach($topjetset as $top) :
        $index++;
        $checkLive = is_null($top->onlineid)?$offlineImg:$onlineImg;
        $avatarImg = '<img width="15px" height="15px" alt="avatar" src="'.$mediaPath.$top->mediaplayer.$top->avatar.'" style="margin: 0;">';
        ?>
        <tr>
            <td style="text-align: center;"><?php echo $index; ?></td>
            <td><a href="#" class="cvn-player-link cvn-contextmenu" title="<?php echo $top->username; ?>"><?php echo $avatarImg; ?> <?php echo mb_strimwidth($top->username, 0, $limitLength, $limitStr); ?></a></td>
            <td><?php echo $top->ratingpoint; ?></td>
            <td><?php if($showmode == 'week' || $showmode == 'month') echo readableNumber($top->coinchange); else echo readableNumber($top->coin);?></td>
            <td style="text-align: center;"><?php echo $checkLive; ?></td>
        </tr>
    <?php endforeach;  ?>
    </tbody>
</table>
