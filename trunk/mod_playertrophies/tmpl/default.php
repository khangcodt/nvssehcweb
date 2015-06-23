<?php

$document = JFactory::getDocument();
$mediaPath = JURI::base() . '/media/media_chessvn/';
$document->addStyleSheet($mediaPath . 'css/chessvn.css');

?>
<div id="mod-playertrophies">
    <table>
        <?php
        foreach ($trophies as $trophy):
            $jText = 'acb';
            $trophyImg = '<img width="45px" height="45px" alt="avatar" src="' . $mediaPath . 'images/' . $trophy->imageurl . '" style="margin: 0;">';
            $trophyLabel= $trophy->name;
            switch($trophyLabel){
                case  'win3':
                    $jText ='MOD_PLAYERTROPHIES_WIN3';
                    break;
                case 'win5':
                    $jText ='MOD_PLAYERTROPHIES_WIN5';
                    break;
                case 'win10':
                    $jText ='MOD_PLAYERTROPHIES_WIN10';
                    break;
            }
            ?>
            <tr>
                <td><?php echo $trophyImg; ?></td>
                <td><?php echo JText::_($jText) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>