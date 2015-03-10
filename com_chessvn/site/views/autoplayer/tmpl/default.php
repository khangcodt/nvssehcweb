<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$data = $this->data;
$link = JRoute::_( "index.php?option=com_chessvn&view=autoplayer&id={$data->autoplayerid}" );
?>
<div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOPLAYER_AUTOPLAYERID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->autoplayerid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOPLAYER_PLAYERID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->playerid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOPLAYER_ISONLINE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->isonline; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOPLAYER_ISACTIVE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->isactive; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOPLAYER_ISPLAYOPENGAME_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->isplayopengame; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOPLAYER_ACCEPTSTART_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->acceptstart; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOPLAYER_ACCEPTEND_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->acceptend; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOPLAYER_ELOSTART_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->elostart; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOPLAYER_ELOEND_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->eloend; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOPLAYER_RESTTIMESTART_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->resttimestart; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOPLAYER_RESTTIMEEND_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->resttimeend; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOPLAYER_CHESSTYPE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->chesstype; ?></span>
	</div>

</div>
