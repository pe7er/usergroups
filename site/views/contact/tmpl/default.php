<?php
/**
 * @version     1.0.0
 * @package     com_usergroups
 * @copyright   Copyright (C) 2014 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Peter Martin <joomla@db8.nl> - http://www.db8.nl
 */
// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_usergroups', JPATH_ADMINISTRATOR);
$canEdit = JFactory::getUser()->authorise('core.edit', 'com_usergroups');
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_usergroups')) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item) : ?>

    <div class="item_fields">
        <table class="table">
            <tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_CONTACT_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_CONTACT_USERGROUPID'); ?></th>
			<td><?php echo $this->item->usergroupid; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_CONTACT_USER'); ?></th>
			<td><?php echo $this->item->user_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_CONTACT_CONTACTNAME'); ?></th>
			<td><?php echo $this->item->contactname; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_CONTACT_CONTACTPHONE'); ?></th>
			<td><?php echo $this->item->contactphone; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_CONTACT_CONTACTEMAIL'); ?></th>
			<td><?php echo $this->item->contactemail; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_CONTACT_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_CONTACT_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>

        </table>
    </div>
    <?php if($canEdit && $this->item->checked_out == 0): ?>
		<a class="btn" href="<?php echo JRoute::_('index.php?option=com_usergroups&task=contact.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_USERGROUPS_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_usergroups')):?>
									<a class="btn" href="<?php echo JRoute::_('index.php?option=com_usergroups&task=contact.remove&id=' . $this->item->id, false, 2); ?>"><?php echo JText::_("COM_USERGROUPS_DELETE_ITEM"); ?></a>
								<?php endif; ?>
    <?php
else:
    echo JText::_('COM_USERGROUPS_ITEM_NOT_LOADED');
endif;
?>
