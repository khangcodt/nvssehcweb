<?php
/**
* @title		JoomShaper registration module
* @website		http://www.joomshaper.com
* @Copyright 	(C) 2010 - 2012 joomshaper.com. All rights reserved.
* @license		GNU/GPL
**/

// no direct access
defined('_JEXEC') or die('Restricted access'); 
JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');

$utilfile = JPATH_ROOT. '/media/media_chessvn/cvnphp/utils/cvnutils.php';
$configfile = JPATH_ROOT. '/media/media_chessvn/cvnphp/config/cvnconfig.php';
require_once($utilfile);
require_once($configfile);
$defaultname = $conf['default_email_prefix'].genRandomString();
$defaultemail = $defaultname.$conf['default_email_domain'];
//$document = JFactory::getDocument();
//$mediaPath = JURI::base() . '/media/media_chessvn/';
//$document->addStyleSheet($mediaPath.'css/jquery-ui-1.10.3.custom.min.css');
?>
<script>
    jQuery(document).ready(function(){
        function checkuser(username){
            var array = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','1','2','3','4','5','6','7','8','9','-','_'];
            var check = 0;
            username = username.toLowerCase();
            for(i = 0; i<username.length; i++){
                if(array.indexOf(username[i]) == -1){
                    check++;
                }else{}
            }
            if(check >0){
                return false;
            }
            return true;
        }

        document.formvalidator.setHandler('username', function(value) {
            if(checkuser(value)){
                return true;
            }

            return false;
        });


        document.formvalidator.setHandler('confirm', function (value) {
            return (document.getElementById('jform_password1').value  == value);
        });


    })
</script>

<!--<div style="padding:10px;" class="sp-reg clearfix">-->
	<form id="cvn-register-form" action="<?php echo JRoute::_('index.php?option=com_cvnusers&task=registration.register'); ?>" method="post" class="form-validate">
		<fieldset>
			<dl>
                <input type="hidden" value="<?php echo $defaultname;?>" id="jform_name" name="jform[name]" />
                <p><label class="required" for="jform_username" id="jform_username-lbl"><?php echo JText::_('USERNAME_LABEL');?><span class="star">&nbsp;*</span></label></p>
                <input type="text" size="22" class="validate-username required" value="" id="jform_username" name="jform[username]" />

                <p><label class="required" for="jform_password1" id="jform_password1-lbl"><?php echo JText::_('PASSWORD1_LABEL');?><span class="star">&nbsp;*</span></label></p>
                <input type="password" size="22" class="validate-password required" autocomplete="off" value="" id="jform_password1" name="jform[password1]" />

                <p></p><label class="required" for="jform_password2" id="jform_password2-lbl"><?php echo JText::_('PASSWORD2_LABEL');?><span class="star">&nbsp;*</span></label></p>
                <input type="password" size="22" class="validate-confirm required" autocomplete="off" value="" id="jform_password2" name="jform[password2]" />

                <input type="hidden" value="<?php echo $defaultemail;?>" id="jform_email1" name="jform[email1]" />
                <input type="hidden" value="<?php echo $defaultemail;?>" id="jform_email2" name="jform[email2]" />
			</dl>
		</fieldset>
<!--		<div>-->
<!--            <input type="submit" name="Submit" class="button" value="--><?php //echo JText::_('JREGISTER');?><!--" />-->
<!--            <button type="submit" class="validate">--><?php //echo JText::_('JREGISTER');?><!--</button>-->
        <input type="submit" name="Submit" class="button validate" value="<?php echo JText::_('JREGISTER') ?>" />
        <?php echo JText::_('OR');?>
            <br>
            <br>
            <?php 	echo '<div class="fbconnct_btn_wrp"><a href="#" rel="nofollow" title="Login or Sign-up with Facebook" class="fbconnct_btn" onclick="return poploginbox(\''.JRoute::_(JURI::base().'index.php?option=com_fbconnct&task=login&format=raw').'\')" /><img src="'.JRoute::_(JURI::base().'modules/mod_fbconnct/assets/spacer.gif').'" width="145" height="26" border="0" /></a>
	</div>';?>
<!--			<a href="--><?php //echo JRoute::_('');?><!--">--><?php //echo JText::_('JCANCEL');?><!--</a>-->
			<input type="hidden" name="option" value="com_cvnusers" />
			<input type="hidden" name="task" value="registration.register" />
			<?php echo JHtml::_('form.token');?>
<!--		</div>-->
	</form>
<!--</div>-->