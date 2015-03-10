<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$data = $this->data;
$link = JRoute::_( "index.php?option=com_chessvn&view=gamechat&id={$data->gamechatid}" );
?>
<div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMECHAT_GAMECHATID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->gamechatid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMECHAT_GAMEID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->gameid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMECHAT_PLAYERID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->playerid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMECHAT_CHATMSG_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->chatmsg; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMECHAT_CREATEDDATE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->createddate; ?></span>
	</div>

</div>
