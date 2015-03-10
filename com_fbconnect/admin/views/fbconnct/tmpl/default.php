<?php
/**
 * @package        Facebook Connect Extension (joomla 1.5.x & 1.6.x)
 * @copyright    Copyright (C) Computer - http://www.saaraan.com. All rights reserved.
 * @license        http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @author        Saran Chamling
 * @download URL    http://www.saaraan.com
 */

// No direct access
defined('_JEXEC') or die('Restricted access');
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_fbconnct/assets/fbbackend.css');

?>
<style type="text/css">
    <!--
    .style1 {
        font-weight: bold
    }

    -->
</style>

<table width="100%" border="0" cellpadding="5">
    <tr>
        <td width="79%" valign="top">
            <h3><?php echo JText::_('COM_FBCONNCT_FACEBOOK_CONNECT'); ?> <?php echo JText::_('COM_FBCONNCT_INSTRUCTIONS'); ?></h3>
            <ol>
                <li><?php echo JText::sprintf(JText::_('COM_FBCONNCT_CURL_HOST_SUPPORT'), '<a href="http://www.php.net/manual/en/intro.curl.php" target="_blank">PHP curl</a>'); ?></li>
                <li><?php echo JText::sprintf(JText::_('COM_FBCONNCT_SETUP_APPLICATION'), '<a href="http://www.sanwebe.com/2011/11/creating-facebook-application-for-your-site/" target="_blank">Setup</a>'); ?></li>
                <li><?php echo JText::_('COM_FBCONNCT_COPY_APP_ID_SECRET'); ?></li>
                <li><?php echo JText::_('COM_FBCONNCT_COPY_APP_ID_SECRET'); ?></li>
                <li><?php echo JText::_('COM_FBCONNCT_ENABLE_MODULE'); ?></li>
            </ol>
            <h4><?php echo JText::_('COM_FBCONNCT_WITHOUT_LOGIN_MODULE'); ?></h4>
            <?php echo JText::_('COM_FBCONNCT_DISPLAY_BUTTON_WITHOUT_MODULE'); ?>
            <ol>
                <li><?php echo JText::_('COM_FBCONNCT_COPY_PASTE_BUTTON_CODE'); ?>:<br/><textarea
                        style="width:300px;height:50px;background:#FFFFCC;"><a href="#"
                                                                               onclick="window.open('<?php echo JRoute::_(JURI::root() . 'index.php?option=com_fbconnct&task=login&format=raw'); ?>','name','height=300,width=550');return false;">Login
                            with Facebook</a></textarea></li>
                <li>Paste the code in your template or article where you want popup link to appear.!</li>
            </ol>
            That's it! if you know HTML &amp; CSS you can modify the code to make it look better.
            <p>

            <h3>Changelog</h3>
            <ul>
                <li>3.1 &dagger;&dagger;&dagger; Checks invalid email address at Facebook.</li>
                <li>3.0 &dagger;&dagger;&dagger; No Facebook JavaScript SDK, less bulky. Updated Facebook PHP SDK
                    (v.3.2.2)
                </li>
                <li>2.x &dagger;&dagger; No longer supported!</li>
            </ul>
        </td>
        <td width="21%" align="center" valign="top">

        </td>
    </tr>
</table>
<div id="fb-root"></div>
<div align="center" style="font-size:11px;">Facebook Connect by <a href="http://www.saaraan.com" target="_blank">sanwebe.com</a>
</div>
