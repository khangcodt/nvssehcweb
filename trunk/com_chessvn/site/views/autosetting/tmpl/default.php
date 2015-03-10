<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$data = $this->data;
$link = JRoute::_( "index.php?option=com_chessvn&view=autosetting&id={$data->autosettingid}" );
?>
<div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOSETTING_AUTOSETTINGID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->autosettingid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOSETTING_AUTOPLAYERID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->autoplayerid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOSETTING_LIVETIMESTART_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->livetimestart; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_AUTOSETTING_LIVETIMEEND_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->livetimeend; ?></span>
	</div>

</div>
