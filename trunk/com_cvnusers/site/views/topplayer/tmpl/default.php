<?php // no direct access
defined('_JEXEC') or die('Restricted access');
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
$onlineImg = '<img width="'.$imgScale.'" height="'.$imgScale.'" alt="ON" src="'.$mediaPath.'images/OnlineDot.png" style="margin: 0;">';
$offlineImg = '<img width="'.$imgScale.'" height="'.$imgScale.'" alt="OFF" src="'.$mediaPath.'images/OfflineDot.png" style="margin: 0;">';
$index=0;
?>
<div style="text-align: right">
    <form name="form" method="post" action="tmp.php">
    <input type="text" name="txtSearch" />&nbsp
    <input type="submit" name="btnSearch" value="<?php echo JText::_('COM_USERS_SEARCH_LABEL');  ?>" />
    </form>
</div>
<table>
    <thead>
    <tr>
        <th>
            &nbsp
        </th>
        <!-- Joomla! Component Builder - begin code  -->
        <th class="jcb_fieldDiv jcb_fieldLabel">
            <?php echo JText::_('COM_USERS_PLAYER_LABEL'); ?>
        </th>
        <th class="jcb_fieldDiv jcb_fieldLabel">
            <?php echo JText::_('COM_USERS_ELO_LABEL'); ?>
        </th>

        <th class="jcb_fieldDiv jcb_fieldLabel">
            <?php echo JText::_('COM_USERS_COIN_LABEL'); ?>
        </th>
        <th class="jcb_fieldDiv jcb_fieldLabel">
            <?php echo JText::_('COM_USERS_LIVE_LABEL'); ?>
        </th>

        <!-- Joomla! Component Builder - begin code  -->
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="0">
            <div class="jcb_pagination"><?php echo $this->pagination->getPagesLinks(); ?>  <?php echo $this->pagination->getPagesCounter(); ?></div>
        </td>
    </tr>
    </tfoot>
    <tbody>
    <?php if(empty($this->data)){
        echo "abc";
    }
        foreach ($this->data as $dataItem):
        $checkLive = is_null($dataItem->onlineid)?$offlineImg:$onlineImg;
        $index++;
        $avatarImg = '<img width="15px" height="15px" alt="avatar" src="' . $mediaPath . $dataItem->mediaplayer . $dataItem->avatar . '" style="margin: 0;">';
        ?>

        <?php

        $link = JRoute::_("index.php?option=com_chessvn&view=player&id={$dataItem->playerid}");
        //JFactory::getApplication()->enqueueMessage($this->data);
        ?>
        <tr>
            <td class="jcb_fieldDiv jcb_fieldValue">
                <?php echo $index ?>
            </td>
            <!-- Joomla! Component Builder - begin code  -->
            <td>
                <a href="#" class="cvn-player-link cvn-contextmenu" title="<?php echo $dataItem->username; ?>"><?php echo $avatarImg; ?> <?php echo $dataItem->username; ?></a>
            </td>

            <td class="jcb_fieldDiv jcb_fieldValue">
                <?php echo $dataItem->ratingpoint; ?>
            </td>

            <td class="jcb_fieldDiv jcb_fieldValue">
                <?php echo $dataItem->coin; ?>
            </td>
            <td style="text-align: center;">
                <?php echo $checkLive; ?>
            </td>


            <!-- Joomla! Component Builder - begin code  -->
        </tr>
    <?php endforeach; ?>
    <tbody>
</table>

