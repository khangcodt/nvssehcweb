<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$data = $this->data;
$link = JRoute::_( "index.php?option=com_chessvn&view=movehistory&id={$data->moveid}" );
?>
<div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_MOVEHISTORY_MOVEID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->moveid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_MOVEHISTORY_MOVETIME_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->movetime; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_MOVEHISTORY_PLAYERID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->playerid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_MOVEHISTORY_MOVE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->move; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_MOVEHISTORY_GAMEID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->gameid; ?></span>
	</div>

</div>
