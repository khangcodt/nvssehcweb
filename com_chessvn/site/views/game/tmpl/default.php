<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$data = $this->data;
$link = JRoute::_( "index.php?option=com_chessvn&view=game&id={$data->gameid}" );
?>
<div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAME_GAMEID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->gameid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAME_STATUS_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->status; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAME_COMPLETIONSTATUS_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->completionstatus; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAME_NEXTMOVE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->nextmove; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAME_ISCASTLEWL_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->iscastlewl; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAME_ISCASTLEWS_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->iscastlews; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAME_ISCASTLEBL_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->iscastlebl; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAME_ISCASTLEBS_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->iscastlebs; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAME_DRAWREQUEST_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->drawrequest; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAME_WTIMEUSED_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->wtimeused; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAME_BTIMEUSED_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->btimeused; ?></span>
	</div>

</div>
