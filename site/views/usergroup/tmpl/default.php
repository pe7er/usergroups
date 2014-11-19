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
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_TITLE'); ?></th>
			<td><?php echo $this->item->title; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_SLUG'); ?></th>
			<td><?php echo $this->item->slug; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_CATID'); ?></th>
			<td><?php echo $this->item->catid_title; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_CATEGORIES'); ?></th>
			<td><?php echo $this->item->categories; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_DESCRIPTION'); ?></th>
			<td><?php echo $this->item->description; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_MEETINGINFO'); ?></th>
			<td><?php echo $this->item->meetinginfo; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_LOCATION'); ?></th>
			<td><?php echo $this->item->location; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_ADDRESS'); ?></th>
			<td><?php echo $this->item->address; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_POSTCODE'); ?></th>
			<td><?php echo $this->item->postcode; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_CITY'); ?></th>
			<td><?php echo $this->item->city; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_REGION'); ?></th>
			<td><?php echo $this->item->region; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_COUNTRY'); ?></th>
			<td><?php echo $this->item->country; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_LAT'); ?></th>
			<td><?php echo $this->item->lat; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_LNG'); ?></th>
			<td><?php echo $this->item->lng; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_WEBSITE'); ?></th>
			<td><?php echo $this->item->website; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_USERGROUPEMAIL'); ?></th>
			<td><?php echo $this->item->usergroupemail; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_LOGO'); ?></th>
			<td><?php echo $this->item->logo; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_PHOTO'); ?></th>
			<td><?php echo $this->item->photo; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_TWITTER'); ?></th>
			<td><?php echo $this->item->twitter; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_LINKEDIN'); ?></th>
			<td><?php echo $this->item->linkedin; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_FACEBOOK'); ?></th>
			<td><?php echo $this->item->facebook; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_GOOGLEPLUS'); ?></th>
			<td><?php echo $this->item->googleplus; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_RSSFEED'); ?></th>
			<td><?php echo $this->item->rssfeed; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_MEETUP_APIKEY'); ?></th>
			<td><?php echo $this->item->meetup_apikey; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_MEETUP_GROUPID'); ?></th>
			<td><?php echo $this->item->meetup_groupid; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_FULLPROVISIONAL'); ?></th>
			<td><?php echo $this->item->fullprovisional; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_TEAMDETAILS'); ?></th>
			<td><?php echo $this->item->teamdetails; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_ACTIVE'); ?></th>
			<td><?php echo $this->item->active; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_VERSION'); ?></th>
			<td><?php echo $this->item->version; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_LANGUAGE'); ?></th>
			<td><?php echo $this->item->language; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_HITS'); ?></th>
			<td><?php echo $this->item->hits; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_USERGROUPS_FORM_LBL_USERGROUP_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>

        </table>
    </div>
    <?php if($canEdit && $this->item->checked_out == 0): ?>
		<a class="btn" href="<?php echo JRoute::_('index.php?option=com_usergroups&task=usergroup.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_USERGROUPS_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_usergroups')):?>
									<a class="btn" href="<?php echo JRoute::_('index.php?option=com_usergroups&task=usergroup.remove&id=' . $this->item->id, false, 2); ?>"><?php echo JText::_("COM_USERGROUPS_DELETE_ITEM"); ?></a>
								<?php endif; ?>
    <?php
else:
    echo JText::_('COM_USERGROUPS_ITEM_NOT_LOADED');
endif;
?>
