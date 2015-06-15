<?php
/**
 * @package		Joomla.Site
 * @subpackage	MOD_LISTFRIENDS
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
jimport('joomla.log.log');//test log bao error
JLog::addLogger(array());
$utilfile = JPATH_ROOT. '/media/media_chessvn/cvnphp/utils/cvnutils.php';
require_once($utilfile);

$document = JFactory::getDocument();
$mediaPath = JURI::base() . '/media/media_chessvn/';
$document->addScript($mediaPath . 'js/jquery/jquery-1.8.2.min.js');
$document->addScript($mediaPath . 'js/jquery/jquery.contextMenu.js');
$document->addScript($mediaPath.'js/sorttable.js');
$document->addScript($mediaPath . 'js/cvn/cvnutils.js');
$document->addStyleSheet($mediaPath.'css/chessvn.css');
$document->addStyleSheet($mediaPath.'css/jquery.contextMenu.css');

$imgScale = 13;
$coinImgThead = '<img width="'.$imgScale*1.488.'" height="'.$imgScale.'" alt="'.JText::_('MOD_LISTFRIENDS_THEAD_COIN').'" src="'.$mediaPath.'images/CoinIcon.png" style="margin: 0;">';
$onlineImgThead= '<img width="'.$imgScale*2.0.'" height="'.$imgScale.'" alt="'.JText::_('MOD_LISTFRIENDS_THEAD_ONLINE').'" src="'.$mediaPath.'images/online.gif" style="margin: 0;">';

$limitStr = "...";
$limitLength = 12;
$imgScale = 10;
$onlineImg = '<img width="'.$imgScale.'" height="'.$imgScale.'" alt="ON" src="'.$mediaPath.'images/OnlineDot.png" style="margin: 0;">';
$offlineImg = '<img width="'.$imgScale.'" height="'.$imgScale.'" alt="OFF" src="'.$mediaPath.'images/OfflineDot.png" style="margin: 0;">';
$currentUrl = JFactory::getURI();
?>
<div style="text-align: right">
    <a class="topplayer_soft" href="<?php $currentUrl->setVar('showlistfriends','all'); echo JRoute::_($currentUrl->toString()); ?>">all</a>
    <a class="topplayer_soft" href="<?php $currentUrl->setVar('showlistfriends','month'); echo JRoute::_($currentUrl->toString()); ?>">month</a>
    <a class="topplayer_soft" href="<?php $currentUrl->setVar('showlistfriends','week'); echo JRoute::_($currentUrl->toString()); ?>">week</a>
</div>

<table class="sortable" width="100%">
    <thead>
    <tr>
        <th class="sorttable_nosort"><?php echo JText::_('MOD_LISTFRIENDS_THEAD_PLAYER'); ?></th>
        <th class="sorttable_nosort"><?php echo JText::_('MOD_LISTFRIENDS_THEAD_RATING'); ?></th>
        <th class="sorttable_nosort" style="text-align: center; vertical-align: text-bottom"><?php echo $coinImgThead; ?></th>
        <th class="sorttable_nosort" style="text-align: center; vertical-align: text-bottom"><?php echo $onlineImgThead;?> </th>
    </tr>
    </thead>
    <tbody>


    <?php
    //$merged = array_merge(array($request),array($responded));
    //shuffle($merged);
    //JFactory::getApplication()->enqueueMessage('$request = '.$request);
    //JFactory::getApplication()->enqueueMessage('$responded = '.$responded);
    //JFactory::getApplication()->enqueueMessage('$merged = '.$merged);
    foreach($merged as $player) :
        $checkLive = is_null($player->onlineid)?$offlineImg:$onlineImg;
        $avatarImg = '<img width="15px" height="15px" alt="avatar" src="'.$mediaPath.$player->mediaplayer.$player->avatar.'" style="margin: 0;">';
        // print_r($player);
        ?>

        <tr>
            <td><a href="#" class="cvn-player-link cvn-contextmenu" title="<?php echo $player->username; ?>"><?php echo $avatarImg; ?> <?php    echo mb_strimwidth($player->username, 0, $limitLength, $limitStr); ?></a></td>
            <td><?php echo $player->ratingpoint; ?></td>
            <td><?php echo readableNumber($player->coin); ?></td>
            <td style="text-align: center;"><?php echo $checkLive; ?></td>
        </tr>
    <?php endforeach;  ?>
    </tbody>
</table>
