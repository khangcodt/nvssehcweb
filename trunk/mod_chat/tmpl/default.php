<?php

// no direct access
defined('_JEXEC') or die;
//$limitStr = "...";
$document = JFactory::getDocument();
$mediaPath = JURI::base() . '/media/media_chessvn/';
$document->addScript($mediaPath . 'js/jquery/jquery-1.8.2.min.js');
$document->addStyleSheet($mediaPath . 'css/chessvn.css');
$userid = JFactory::getUser()->id;
$gameid = JRequest::getVar('gameid');
//echo mb_strimwidth("Hello World", 0, 20, "...");
?>

<div id="mod-chat">
    <h3> Phòng chat </h3><hr>
    <div id="box-chat">

    </div>

    <div id="enter-message">
        <input type="text" maxlength="200" id="text-message" placeholder="Enter Message">
        <a onclick="sendMessage()">Send</a>
    </div>
</div>
<script type="text/javascript">

    var baseUri = '<?php echo JURI::base(); ?>';
    var gameid = '<?php echo $gameid ?>';
    var userid = '<?php echo $userid ?>';
    //console.log(gameid);
    //console.log(userid);
    //Event onclick button send
    function sendMessage(){
        //console.log('test');
        message = $('#text-message').val();
        if(message != ''){
            data = {gameid : gameid, userid: userid, message: message };
            //console.log(data);
            var url = baseUri + '?option=com_chessvn&task=send';
            jQuery.post(url, data, function(){
                $('#text-message').val('');
                getXmlChat();
            });
        }
    }

    function getXmlChat() {
        var url = baseUri + '?option=com_chessvn&view=chessvn&layout=chat&format=xml&gameid='+gameid;
        jQuery.get(url, processXmlChat);
    }

    function processXmlChat(xmlData){
        //var i, games = jQuery(xmlData).find('GAMECHAT');
        $("#box-chat").empty();
        //console.log(xmlData)''
        $(xmlData).find('GAMECHAT').each(function(){
            var username = $(this).find('USERNAME').text();
            var message = $(this).find('MESSAGE').text();
            $("#box-chat").append('<span style="font-size: 13px"> <span style="font-weight: bold">' +username +'</span> : '+ message + ' <br>');
        })
    }

    jQuery(document).ready(function(){
        setInterval(function(){
            getXmlChat();
        },1000);
    });


</script>