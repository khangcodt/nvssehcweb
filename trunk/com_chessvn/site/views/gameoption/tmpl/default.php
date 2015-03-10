<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$data = $this->data;
$link = JRoute::_( "index.php?option=com_chessvn&view=gameoption&id={$data->gameoptionid}" );
?>
<div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_GAMEOPTIONID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->gameoptionid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_GAMEID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->gameid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_GAMETITLE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->gametitle; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_INITIATOR_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->initiator; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_WPLAYERID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->wplayerid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_BPLAYERID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->bplayerid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_CHESSTYPE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->chesstype; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_GAMECOIN_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->gamecoin; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_ELOWHITE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->elowhite; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_ELOBLACK_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->eloblack; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_ELOMIN_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->elomin; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_ELOMAX_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->elomax; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_ISRATING_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->israting; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_TIMEMODE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->timemode; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_MAINTIME_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->maintime; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_INCREMENTTIME_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->incrementtime; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_STARTTIME_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->starttime; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_ENDTIME_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->endtime; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_GAMEOPTION_CREATEDTIME_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->createdtime; ?></span>
	</div>

</div>
