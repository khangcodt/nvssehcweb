<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_cvnusers
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */

defined('_JEXEC') or die;
$utilfile = JPATH_ROOT. '/media/media_chessvn/cvnphp/utils/cvnutils.php';
require_once($utilfile);

?>

<fieldset id="users-profile-core">
    <legend>
        <?php echo JText::_('COM_USERS_PROFILE_CORE_LEGEND'); ?>
    </legend>
    <dl>
        <dt>
            <?php echo JText::_('COM_USERS_PROFILE_NAME_LABEL'); ?>
        </dt>
        <dd>
            <?php echo $this->data->name; ?>
        </dd>
        <dt>
            <?php echo JText::_('COM_USERS_PROFILE_REGISTERED_DATE_LABEL'); ?>
        </dt>
        <dd>
            <?php echo JHtml::_('date', $this->data->registerDate); ?>
        </dd>
        <dt>
            <?php echo JText::_('COM_USERS_PROFILE_LAST_VISITED_DATE_LABEL'); ?>
        </dt>

        <?php if ($this->data->lastvisitDate != '0000-00-00 00:00:00'){?>
            <dd>
                <?php echo JHtml::_('date', $this->data->lastvisitDate); ?>
            </dd>
            <dt>
                <?php echo JText::_('COM_USERS_PROFILE_EMAIL_LABEL'); ?>
            </dt>
            <dd>
                <?php
                echo $this->data->email;
                ?>
            </dd>

            <dt>
                Coin
            </dt>

            <dd>
                <?php
                echo readableNumber($this->data->coin);
                ?>
            </dd>

            <dt>
                <?php echo JText::_('COM_USERS_PROFILE_AVATAR_LABEL'); ?>
            </dt>

            <dd>
                <img width="80px" height="80px" alt="AVATAR" src="<?php echo $this->data->mediaplayer.$this->data->avatar ?>" >
            </dd>

        <?php }
        else {?>
            <dd>
                <?php echo JText::_('COM_USERS_PROFILE_NEVER_VISITED'); ?>
            </dd>
        <?php } ?>

    </dl>
</fieldset>
