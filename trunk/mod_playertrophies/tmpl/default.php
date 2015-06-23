<?php

$document = JFactory::getDocument();
$mediaPath = JURI::base() . '/media/media_chessvn/';
$document->addStyleSheet($mediaPath . 'css/chessvn.css');
?>
<div id="mod-playertrophies">
    <table>
        <?php
        foreach ($trophies as $trophy):
            $trophyImg = '<img width="45px" height="45px" alt="trophyImg" src="' . $mediaPath . 'images/' . $trophy->imageurl . '" style="margin: 0;">';
            $trophyLabel= $trophy->name;

            ?>
            <tr>
                <td><?php echo $trophyImg; ?></td>
                <td><?php echo JText::_($trophyLabel); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>