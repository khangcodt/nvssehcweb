<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$data = $this->data;
$link = JRoute::_( "index.php?option=com_chessvn&view=trophy&id={$data->trophyid}" );
?>
<div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_TROPHY_TROPHYID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->trophyid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_TROPHY_PLAYERID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->playerid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_TROPHY_TROPHYTIME_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->trophytime; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_TROPHY_NAME_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->name; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_TROPHY_CHESSTYPE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->chesstype; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_TROPHY_TROPHYTYPE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->trophytype; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_TROPHY_IMAGEURL_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->imageurl; ?></span>
	</div>

</div>
