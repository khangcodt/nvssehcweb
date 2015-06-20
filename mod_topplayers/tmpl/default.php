<?php
/**
 * @package		Joomla.Site
 * @subpackage	MOD_TOPPLAYERS
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
$document->addScript($mediaPath . 'js/cvn/cvnutils.js');
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
$viewmoreUrl = JURI::base() .'?option=com_cvnusers&view=topplayer&limit=15';

//check friendly URL enabled or not
//$isSEF = &JFactory::getConfig()->get('sef') == 1;
//$addReqParam = $isSEF?'?':'&';
?>
    <div style="text-align: right">
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
                <th class="sorttable_nosort" style="text-align: center; vertical-align: text-bottom"><?php echo $coinImgThead; ?></th>
                <th class="sorttable_nosort" style="text-align: center; vertical-align: text-bottom"><?php echo $onlineImgThead;?> </th>
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
                <td><a href="#" class="cvn-player-link cvn-contextmenu" title="<?php echo $player->username; ?>"><?php echo $avatarImg; ?> <?php echo mb_strimwidth($player->username, 0, $limitLength, $limitStr); ?></a></td>
                <td><?php echo $player->ratingpoint; ?></td>
                <td><?php echo readableNumber($player->coin); ?></td>
				<td style="text-align: center;"><?php echo $checkLive; ?></td>
            </tr>
	<?php endforeach;  ?>
            </tbody>
        </table>
<div style="text-align: right">
    <a class="topplayer_soft"  href="<?php echo $viewmoreUrl; ?>">View more...</a>
</div>

<!--script code-->
<script type="text/javascript">
    $(function(){
        $.contextMenu({
            selector: '.cvn-contextmenu',
            callback: function(key, options) {
                var m = "tesst by khanglq clicked: " + key;
                window.console && console.log(m) || alert(m);
            },
            items: {
                "challenge": {name: "Challenge", icon: "challenge"},
                "viewprofile": {name: "View profile", icon: "viewprofile"},
                "sendmsg": {name: "Send message", icon: "sendmsg"},
                "addfriend": {name: "Add friend", icon: "addfriend"},
                "block": {name: "Block", icon: "block"}
//                "sep1": "---------",
            }
        });
    });
</script>
<style>
    .context-menu-item.icon-edit { background-image: url(<?php echo $mediaPath; ?>images/icon/edit.png); }
    .context-menu-item.icon-cut { background-image: url(<?php echo $mediaPath; ?>images/icon/cut.png); }
    .context-menu-item.icon-copy { background-image: url(<?php echo $mediaPath; ?>images/icon/copy.png); }
    .context-menu-item.icon-paste { background-image: url(<?php echo $mediaPath; ?>images/icon/paste.png); }
    .context-menu-item.icon-delete { background-image: url(<?php echo $mediaPath; ?>images/icon/delete.png); }
    .context-menu-item.icon-add { background-image: url(<?php echo $mediaPath; ?>images/icon/add.png); }
    .context-menu-item.icon-quit { background-image: url(<?php echo $mediaPath; ?>images/icon/door.png); }
</style>