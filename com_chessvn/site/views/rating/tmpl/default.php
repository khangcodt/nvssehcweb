<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$data = $this->data;
$link = JRoute::_( "index.php?option=com_chessvn&view=rating&id={$data->ratingid}" );
?>
<div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_RATING_RATINGID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->ratingid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_RATING_PLAYERID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->playerid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_RATING_CHESSTYPE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->chesstype; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_RATING_RATINGTYPE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->ratingtype; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_RATING_RATINGPOINT_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->ratingpoint; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_RATING_SELFRATING_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->selfrating; ?></span>
	</div>

</div>
