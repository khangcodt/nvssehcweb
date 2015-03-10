<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$data = $this->data;
$link = JRoute::_( "index.php?option=com_chessvn&view=buddyblacklist&id={$data->bblid}" );
?>
<div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_BUDDYBLACKLIST_BBLID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->bblid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_BUDDYBLACKLIST_PLAYERID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->playerid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_BUDDYBLACKLIST_BUDDYID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->buddyid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_BUDDYBLACKLIST_BLACKID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->blackid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_BUDDYBLACKLIST_CHESSTYPE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->chesstype; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_BUDDYBLACKLIST_REQSTATE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->reqstate; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_BUDDYBLACKLIST_CREATEDTIME_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->createdtime; ?></span>
	</div>

</div>
