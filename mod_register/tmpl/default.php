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
?>

<div style="padding:10px;" class="sp-reg clearfix">
	<form action="<?php echo JRoute::_('index.php?option=com_cvnusers&task=registration.register'); ?>" method="post" class="form-validate">
		<fieldset>
			<dl>
				<input type="hidden" value="<?php echo $defaultname;?>" id="jform_name" name="jform[name]" />
				<dt><label class="required" for="jform_username" id="jform_username-lbl"><?php echo JText::_('USERNAME_LABEL');?><span class="star">&nbsp;*</span></label></dt>
				<dd><input type="text" size="30" class="validate-username required" value="" id="jform_username" name="jform[username]" /></dd>
				
				<dt><label class="required" for="jform_password1" id="jform_password1-lbl"><?php echo JText::_('PASSWORD1_LABEL');?><span class="star">&nbsp;*</span></label></dt>
				<dd><input type="password" size="30" class="validate-password required" autocomplete="off" value="" id="jform_password1" name="jform[password1]" /></dd>
				
				<dt><label class="required" for="jform_password2" id="jform_password2-lbl"><?php echo JText::_('PASSWORD2_LABEL');?><span class="star">&nbsp;*</span></label></dt>
				<dd><input type="password" size="30" class="validate-password required" autocomplete="off" value="" id="jform_password2" name="jform[password2]" /></dd>

				<input type="hidden" value="<?php echo $defaultemail;?>" id="jform_email1" name="jform[email1]" />
				<input type="hidden" value="<?php echo $defaultemail;?>" id="jform_email2" name="jform[email2]" />
			</dl>
		</fieldset>
		<div>
			<button type="submit" class="validate"><?php echo JText::_('JREGISTER');?></button>
			<?php echo JText::_('OR');?>
			<a href="<?php echo JRoute::_('');?>"><?php echo JText::_('JCANCEL');?></a>
			<input type="hidden" name="option" value="com_cvnusers" />
			<input type="hidden" name="task" value="registration.register" />
			<?php echo JHtml::_('form.token');?>
		</div>
	</form>
</div>