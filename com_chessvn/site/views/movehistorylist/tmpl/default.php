<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<table>
	<thead>
		<tr>
			<th>
				View
			</th>
<!-- Joomla! Component Builder - begin code  -->
	<th class="jcb_fieldDiv jcb_fieldLabel">
		<?php echo JText::_( 'COM_CHESSVN_MOVEHISTORY_MOVEID_LABEL' ); ?>
	</th>
	<th class="jcb_fieldDiv jcb_fieldLabel">
		<?php echo JText::_( 'COM_CHESSVN_MOVEHISTORY_MOVETIME_LABEL' ); ?>
	</th>
	<th class="jcb_fieldDiv jcb_fieldLabel">
		<?php echo JText::_( 'COM_CHESSVN_MOVEHISTORY_PLAYERID_LABEL' ); ?>
	</th>
	<th class="jcb_fieldDiv jcb_fieldLabel">
		<?php echo JText::_( 'COM_CHESSVN_MOVEHISTORY_MOVE_LABEL' ); ?>
	</th>
	<th class="jcb_fieldDiv jcb_fieldLabel">
		<?php echo JText::_( 'COM_CHESSVN_MOVEHISTORY_GAMEID_LABEL' ); ?>
	</th>

<!-- Joomla! Component Builder - begin code  -->
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="0">
				<div class="jcb_pagination"><?php echo $this->pagination->getPagesLinks(); ?> - <?php echo $this->pagination->getPagesCounter(); ?></div>
			</td>
		</tr>
	</tfoot>
	<tbody>
<?php foreach($this->data as $dataItem): ?> 
<?php
	$link = JRoute::_( "index.php?option=com_chessvn&view=movehistory&id={$dataItem->moveid}" );
?>
		<tr>
			<td>
				<!-- You can use $link var for link edit controller -->
				<a href="<?php echo $link; ?>">View</a>
			</td>
<!-- Joomla! Component Builder - begin code  -->
	<td class="jcb_fieldDiv jcb_fieldValue">
		<?php echo $dataItem->moveid; ?>
	</td>
	<td class="jcb_fieldDiv jcb_fieldValue">
		<?php echo $dataItem->movetime; ?>
	</td>
	<td class="jcb_fieldDiv jcb_fieldValue">
		<?php echo $dataItem->playerid; ?>
	</td>
	<td class="jcb_fieldDiv jcb_fieldValue">
		<?php echo $dataItem->move; ?>
	</td>
	<td class="jcb_fieldDiv jcb_fieldValue">
		<?php echo $dataItem->gameid; ?>
	</td>

<!-- Joomla! Component Builder - begin code  -->
		</tr>
<?php endforeach; ?>
	<tbody>
</table>

