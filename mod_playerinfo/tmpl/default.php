<?php
$document = JFactory::getDocument();
$mediaPath = JURI::base() . '/media/media_chessvn/';
$document->addStyleSheet($mediaPath.'css/chessvn.css');
// Thêm file css
?>
    <div id="mod-playerinfo">
        <?php
            foreach($result as $key=>$value){
        ?>
                <img src="<?php echo $mediaPath.$value->mediaplayer.$value->avatar ?>" height="100px" width="100px">
                <div id="player_infor">
                    <p><?php echo JText::_('MOD_PLAYERINFO_INFOR_LABEL') ?></p>
                    <p><?php echo JText::_('MOD_PLAYERINFO_NAME_LABEL').$value->username?></p>
                    <p><?php echo JText::_('MOD_PLAYERINFO_RATING_LABEL').$value->ratingpoint ?></p>
                    <p><?php echo JText::_('MOD_PLAYERINFO_COIN_LABEL').$value->coin ?></p>
                </div>
                <div id="mod-playerinfo-game">
                    <p><?php echo JText::_('MOD_PLAYERINFO_GAMEINFOR_LABEL') ?></p>
                    <p><?php echo JText::_('MOD_PLAYERINFO_GAME_LABEL').($value->gamewin+$value->gamelost+$value->gamedraw) ?></p>
                    <p><?php if($value->gamewin==''){
                        echo JText::_('MOD_PLAYERINFO_WIN_LABEL').'0';
                    }else{ echo JText::_('MOD_PLAYERINFO_WIN_LABEL').$value->gamewin;} ?><p>
                    <p><?php if($value->gamelost==''){
                            echo JText::_('MOD_PLAYERINFO_LOST_LABEL').'0';
                    }else{echo JText::_('MOD_PLAYERINFO_LOST_LABEL').$value->gamelost;} ?></p>
                    <p><?php if($value->gamedraw==''){
                            echo JText::_('MOD_PLAYERINFO_DRAW_LABEL').'0';
                    }else{ echo JText::_('MOD_PLAYERINFO_DRAW_LABEL').$value->gamedraw;} ?></p>
                </div>
            <?php
        }
        ?>
    </div>
<?php
?>