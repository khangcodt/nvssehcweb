<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$data = $this->data;
$link = JRoute::_( "index.php?option=com_chessvn&view=player&id={$data->playerid}" );
?>
<div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_PLAYER_PLAYERID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->playerid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_PLAYER_USERID_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->userid; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_PLAYER_CHESSTITLE_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->chesstitle; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_PLAYER_COIN_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->coin; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_PLAYER_FAVPLAYER_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->favplayer; ?></span>
	</div>
	<div class="jcb_fieldDiv">
		<span class="jcb_fieldLabel"><?php echo JText::_( 'COM_CHESSVN_PLAYER_AVATAR_LABEL' ); ?></span>
		<span class="jcb_fieldValue"><?php echo $data->avatar; ?></span>
	</div>

</div>
