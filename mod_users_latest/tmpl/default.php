<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_users_latest
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die;

$document = JFactory::getDocument();
$mediaPath = JURI::base() . '/media/media_chessvn/';
$document->addScript($mediaPath . 'js/jquery/jquery-1.8.2.min.js');
$document->addScript($mediaPath . 'js/jquery/jquery.contextMenu.js');
$document->addStyleSheet($mediaPath.'css/jquery.contextMenu.css');

//$dateformat = JText::_('DATE_FORMAT_REG_NEW_USER');//'Y-m-d';
$dateformat = 'd/m/y';
?>
<?php if (!empty($names)) : ?>
    <ul class="latestusers<?php echo $moduleclass_sfx ?>" >
        <?php foreach($names as $name) :
            $avatarImg = '<img width="15px" height="15px" alt="avatar" src="'.$mediaPath.$name->mediaplayer.$name->avatar.'" style="margin: 0;">';
            ?>
            <li>
                <?php echo $avatarImg; ?><a href="#" class="cvn-player-link cvn-contextmenu"><?php echo $name->username; ?></a>&nbsp;&nbsp;&nbsp;&#40;<?php echo JHTML::_('date',$name->registerDate,$dateformat);?>&#41;
            </li>
        <?php endforeach;  ?>
    </ul>
<?php endif; ?>

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
    .context-menu-item.icon-challenge { background-image: url(<?php echo $mediaPath; ?>images/icon/edit.png); }
    .context-menu-item.icon-viewprofile { background-image: url(<?php echo $mediaPath; ?>images/icon/cut.png); }
    .context-menu-item.icon-sendmsg { background-image: url(<?php echo $mediaPath; ?>images/icon/copy.png); }
    .context-menu-item.icon-addfriend { background-image: url(<?php echo $mediaPath; ?>images/icon/paste.png); }
    .context-menu-item.icon-block { background-image: url(<?php echo $mediaPath; ?>images/icon/delete.png); }
    .context-menu-item.icon-add { background-image: url(<?php echo $mediaPath; ?>images/icon/add.png); }
    .context-menu-item.icon-quit { background-image: url(<?php echo $mediaPath; ?>images/icon/door.png); }
</style>