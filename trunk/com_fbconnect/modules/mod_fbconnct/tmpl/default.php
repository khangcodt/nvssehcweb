<?php 
/**
* @package 		Facebook Connect Extension (joomla 1.5.x & 1.6.x)
* @copyright	Copyright (C) Computer - http://www.saaraan.com. All rights reserved.
* @license		http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* @author		Saran Chamling
* @download URL	http://www.saaraan.com
*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$db = JFactory::getDBO();
$document = JFactory::getDocument();
$showfacebookimage 	= $params->get('show-facebook-image');

$javascript = '
function poploginbox(url) {
	var height = 300;
	var width = 550;
	var left = (screen.width/2)-(width/2);
	var top = (screen.height/2)-(height/2);
	
	var winop= window.open(url,\'\',\'height=\'+height+\',width=\'+width+\', top=\'+top+\', left=\'+left+\'\');
	if (window.focus) {winop.focus()}
	return false;
} 
';

$stylelink = '<style type="text/css">';
$stylelink .= '.fbconnct_btn{background: url('.JRoute::_(JURI::base().'modules/mod_fbconnct/assets/fb.png').') no-repeat 0px 0px;width:145px;height:26px;float: left;}
.fbconnct_btn_wrp{width:160px;height:26px;overflow:hidden;}';
//.fbconnct_btn:hover{background: url('.JRoute::_(JURI::base().'modules/mod_fbconnct/assets/Small_103x25.png').') no-repeat 0px -26px;}
$stylelink .= '</style>';

if($type == 'logout'){
	$logoutUrl = JRoute::_( 'index.php?task=logout&option=com_fbconnct&return='. base64_encode(JURI::current()));

	$query = "SELECT facebook_userid FROM #__facebook_joomla_connect WHERE joomla_userid=$user->id AND linked=1";
	$db->setQuery($query);
	$rows = $db->loadObjectList();
	if($rows && $showfacebookimage!='none')
	{
		$fbuserid = (strlen($rows[0]->facebook_userid)>0)?$rows[0]->facebook_userid:0;
		echo '<div class="fb_profile_pic_wrp"><img class="fb_profile_pic" src="https://graph.facebook.com/'.$fbuserid.'/picture?type='.$showfacebookimage.'" border="0" /></div>';
	}
	
	echo '<div class="fb_welcome_text_wrp"><strong>'.$user->name.' [<a href="'.$logoutUrl.'">'.JText::_('MOD_FBCONNCT_LOG_OUT').'</a>]</strong></div>';
}else{

	if($params->get('show-login-form')==1){
		
		########## J6 login Form #########
		if(fbconnctController::isJ16())
		{
			echo '<form action="'.JRoute::_('index.php', true, $params->get('usesecure')).'" method="post" id="login-form" >';
			
			if ($params->get('pretext')){
				echo '<div class="pretext">'.$params->get('pretext').'</div>'; 
			}
			echo '<fieldset class="userdata"><p id="form-login-username"><label for="modlgn-username">'.JText::_('MOD_FBCONNCT_USERNAME').'</label>';
            echo '<input id="modlgn-username" type="text" name="username" class="inputbox"  size="18" /></p>';
            echo '<p id="form-login-password"><label for="modlgn-passwd">'.JText::_('MOD_FBCONNCT_PASSWORD').'</label>';
            echo '<input id="modlgn-passwd" type="password" name="password" class="inputbox" size="18"  /></p>';
			if (JPluginHelper::isEnabled('system', 'remember'))
			{
                echo '<p id="form-login-remember"><label for="modlgn-remember">'.JText::_('MOD_FBCONNCT_REMEMBER_ME').'</label>';
                echo '<input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes"/></p>';
			}
            echo '<input type="submit" name="Submit" class="button" value="'.JText::_('MOD_FBCONNCT_LOGIN').'" />';
            echo '<input type="hidden" name="option" value="com_cvnusers" />';
            echo '<input type="hidden" name="task" value="user.login" />';
            echo '<input type="hidden" name="return" value="'.base64_encode(JURI::current()).'" />';
			echo JHtml::_('form.token');
			echo '</fieldset>';
            echo '<ul><li>';
            echo '<a href="'.JRoute::_('index.php?option=com_cvnusers&view=reset').'">';
            echo JText::_('MOD_FBCONNCT_FORGOT_PASSWORD');
			echo '</a>';
            echo '</li><li>';
            echo '<a href="'.JRoute::_('index.php?option=com_cvnusers&view=remind').'">';
            echo JText::_('MOD_FBCONNCT_FORGOT_USERNAME');
			echo '</a>';
            echo '</li>';
            $usersConfig = JComponentHelper::getParams('com_cvnusers');
            if ($usersConfig->get('allowUserRegistration')){
				echo '<li>';
				echo '<a href="'.JRoute::_('index.php?option=com_cvnusers&view=registration').'">';
				echo JText::_('MOD_FBCONNCT_CREATE_ACCOUNT');
				echo '</a></li>';
			}
            echo '</ul>';
            echo '</form>';

		}else{
		########## J5 login Form #########
			echo '<form action="'.JRoute::_( 'index.php', true, $params->get('usesecure')).'" method="post" name="login" id="form-login" >';
			if ($params->get('pretext')){
				echo '<div class="pretext">'.$params->get('pretext').'</div>'; 
			}
			echo '<fieldset class="input"><p id="form-login-username">';
            echo '<label for="modlgn_username">'.JText::_('MOD_FBCONNCT_USERNAME').'</label><br />';
            echo '<input id="modlgn_username" type="text" name="username" class="inputbox" alt="username" size="18" />';
            echo '</p><p id="form-login-password">';
            echo '<label for="modlgn_passwd">'.JText::_('MOD_FBCONNCT_PASSWORD').'</label><br />';
            echo '<input id="modlgn_passwd" type="password" name="passwd" class="inputbox" size="18" alt="password" /></p>';
            if(JPluginHelper::isEnabled('system', 'remember')){
				echo '<p id="form-login-remember">';
				echo '<label for="modlgn_remember">'.JText::_('MOD_FBCONNCT_REMEMBER_ME').'</label>';
				echo '<input id="modlgn_remember" type="checkbox" name="remember" class="inputbox" value="yes" alt="Remember Me" />';
				echo '</p>';
            }
            echo '<input type="submit" name="Submit" class="button" value="'.JText::_('MOD_FBCONNCT_LOGIN').'" />';
            echo '</fieldset>';
            echo '<ul><li>';
            echo '<a href="'.JRoute::_( 'index.php?option=com_user&view=reset' ).'">';
            echo JText::_('MOD_FBCONNCT_FORGOT_PASSWORD').'</a>';
            echo '</li><li>';
            echo '<a href="'.JRoute::_( 'index.php?option=com_user&view=remind' ).'">';
            echo JText::_('MOD_FBCONNCT_FORGOT_USERNAME').'</a></li>';
            
			$usersConfig = &JComponentHelper::getParams( 'com_cvnusers' );
            if ($usersConfig->get('allowUserRegistration')){
				echo '<li><a href="'.JRoute::_( 'index.php?option=com_user&view=register' ).'">';
				echo JText::_('MOD_FBCONNCT_CREATE_ACCOUNT');
				echo '</a></li>';
            }
            echo '</ul>';

		}

	}
	$document->addCustomTag($stylelink);
	$document->addScriptDeclaration($javascript);

	echo '<div class="fbconnct_btn_wrp"><a href="#" rel="nofollow" title="Login or Sign-up with Facebook" class="fbconnct_btn" onclick="return poploginbox(\''.JRoute::_(JURI::base().'index.php?option=com_fbconnct&task=login&format=raw').'\')" /><img src="'.JRoute::_(JURI::base().'modules/mod_fbconnct/assets/spacer.gif').'" width="145" height="26" border="0" /></a>
	</div>';
}
