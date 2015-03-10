<?php
//JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
defined('_JEXEC') or die('Restricted access');
$document = JFactory::getDocument();
$document->setMimeEncoding('text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<SERVER>';
echo '<RESPONSE>';
//echo CvnDao::getChallenges(231,1);
echo CvnDao::getViewChallenges($this->userid,1);
echo '</RESPONSE>';
echo '</SERVER>';
?>