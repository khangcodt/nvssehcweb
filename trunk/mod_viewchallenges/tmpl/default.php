<?php
/**
 * @package        Joomla.Site
 * @subpackage    MOD_ONLINEPLAYERS
 * @copyright    Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$document = JFactory::getDocument();
$mediaPath = JURI::base() . '/media/media_chessvn/';
$document->addScript($mediaPath . 'js/sorttable.js');
$document->addScript($mediaPath . 'js/jquery/jquery-1.8.2.min.js');
$document->addStyleSheet($mediaPath . 'css/chessvn.css');
$userid = JFactory::getUser()->id;
?>

<!--html code-->
<table id="listChallenges" class="sortable" width="100%">
    <thead>
    <tr>
        <!--        <th><a>--><?php //echo JText::_('MOD_VIEWCHALLENGES_THEAD_INITIATOR'); ?><!--</a></th>-->
        <!--        <th><a>--><?php //echo JText::_('MOD_VIEWCHALLENGES_THEAD_GAMETITTLE'); ?><!--</a></th>-->
        <!--        <th><a>--><?php //echo JText::_('MOD_VIEWCHALLENGES_THEAD_GAMECOIN'); ?><!--</a></th>-->
        <!--        <th><a>--><?php //echo JText::_('MOD_VIEWCHALLENGES_THEAD_OPPONENT'); ?><!--</a></th>-->
        <!--        <th><a>--><?php //echo JText::_('MOD_VIEWCHALLENGES_THEAD_ISRATING'); ?><!--</a></th>-->
        <!--        <th><a>--><?php //echo JText::_('MOD_VIEWCHALLENGES_THEAD_INITIATORSIDE'); ?><!--</a></th>-->
        <!--        <th><a>--><?php //echo JText::_('MOD_VIEWCHALLENGES_THEAD_ACTION'); ?><!--</a></th>-->
        <th><a><?php echo JText::_('Nguoi tao'); ?></a></th>
        <th><a><?php echo JText::_('Ten game'); ?></a></th>
        <th><a><?php echo JText::_('Dat cuoc'); ?></a></th>
        <th><a><?php echo JText::_('Doi thu'); ?></a></th>
        <th><a><?php echo JText::_('Tinh diem'); ?></a></th>
        <th><a><?php echo JText::_('Quan'); ?></a></th>
        <th><a><?php echo JText::_('Hanh dong'); ?></a></th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!--script code-->
<script type="text/javascript">

    var baseUri = '<?php echo JURI::base(); ?>';
    var userid = <?php echo $userid;?>;
    var updateChallengesSpeed = 10000;//get from config file

    function getXmlChallenges() {
        var url = baseUri + '?option=com_chessvn&format=xml&userid=' + userid;
        console.log('url = ' + url);
//        alert('url = ' + url);
        jQuery.get(url, processXmlChallenges);
    }

    function processXmlChallenges(xmlData) {
        window.setTimeout('getXmlChallenges()', updateChallengesSpeed);
        var i, games = jQuery(xmlData).find('GAMES'), content = '', desc, gid, wid, bid, initid, status, color, timeout, type, fen;

        jQuery("#listChallenges > tbody").empty();//remove content before udpate new
        var data = "fdsafsa";//test code
        for (i = 0; i < games.length; i++) {
//            desc = games[i].getElementsByTagName('DESCRIPTION').item(0).firstChild.data;
//            gid = games[i].getElementsByTagName('GAMEID').item(0).firstChild.data;
//            status = games[i].getElementsByTagName('STATUS').item(0).firstChild.data;
//            initid = games[i].getElementsByTagName('INITIATOR').item(0).firstChild.data;
//            wid = games[i].getElementsByTagName('WHITE').item(0).firstChild.data;
//            bid = games[i].getElementsByTagName('BLACK').item(0).firstChild.data;
//            timeout = games[i].getElementsByTagName('TIMEOUT').item(0).firstChild.data;
//            type = games[i].getElementsByTagName('GAMETYPE').item(0).firstChild.data;
//            rated = games[i].getElementsByTagName('RATED').item(0).firstChild.data;
//            time_created = games[i].getElementsByTagName('TIMECREATED').item(0).firstChild.data;
//            time_ctrl1 = games[i].getElementsByTagName('TIMECONTROL1').item(0).firstChild.data;
//            time_ctrl2 = games[i].getElementsByTagName('TIMECONTROL2').item(0).firstChild.data;
//            fen = games[i].getElementsByTagName('GAMEFEN').item(0).firstChild.data;
//
//            var data = {desc: desc, gid: gid, status: status, initid: initid, wid: wid, bid: bid, timeout: timeout, type: type, rated: rated, time_created: time_created, time_ctrl1: time_ctrl1, time_ctrl2: time_ctrl2, fen: fen};
            drawChallengesTableRow(data);
        }
    }

    function drawChallengesTableRow(data) {
        jQuery("#listChallenges > tbody").append("<tr>" +
            "<td>player01</td>" +
            "<td>game title 02</td>" +
            "<td>1021021 game coin</td>" +
            "<td>to all</td>" +
            "<td>reated game</td>" +
            "<td>white</td>" +
            "<td>Play</td>" +
            "</tr>");
    }

    jQuery(document).ready(function(){
        getXmlChallenges();
    });
</script>