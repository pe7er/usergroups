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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

$user = JFactory::getUser();
$userId = $user->get('id');
$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
$canCreate = $user->authorise('core.create', 'com_usergroups');
$canEdit = $user->authorise('core.edit', 'com_usergroups');
$canCheckin = $user->authorise('core.manage', 'com_usergroups');
$canChange = $user->authorise('core.edit.state', 'com_usergroups');
$canDelete = $user->authorise('core.delete', 'com_usergroups');
?>

<form action="<?php echo JRoute::_('index.php?option=com_usergroups&view=usergroups'); ?>" method="post" name="adminForm" id="adminForm">

    
    <table class="table table-striped" id = "usergroupList" >
        <thead >
            <tr >
                <?php if (isset($this->items[0]->state)): ?>
        <th width="1%" class="nowrap center">
            <?php echo JHtml::_('grid.sort', 'JSTATUS', 'a.state', $listDirn, $listOrder); ?>
        </th>
    <?php endif; ?>

    				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_TITLE', 'a.title', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_SLUG', 'a.slug', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_CATID', 'a.catid', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_CATEGORIES', 'a.categories', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_DESCRIPTION', 'a.description', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_MEETINGINFO', 'a.meetinginfo', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_LOCATION', 'a.location', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_ADDRESS', 'a.address', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_POSTCODE', 'a.postcode', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_CITY', 'a.city', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_REGION', 'a.region', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_COUNTRY', 'a.country', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_LAT', 'a.lat', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_LNG', 'a.lng', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_WEBSITE', 'a.website', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_USERGROUPEMAIL', 'a.usergroupemail', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_LOGO', 'a.logo', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_PHOTO', 'a.photo', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_TWITTER', 'a.twitter', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_LINKEDIN', 'a.linkedin', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_FACEBOOK', 'a.facebook', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_GOOGLEPLUS', 'a.googleplus', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_RSSFEED', 'a.rssfeed', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_MEETUP_APIKEY', 'a.meetup_apikey', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_MEETUP_GROUPID', 'a.meetup_groupid', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_FULLPROVISIONAL', 'a.fullprovisional', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_TEAMDETAILS', 'a.teamdetails', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_ACTIVE', 'a.active', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_VERSION', 'a.version', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_LANGUAGE', 'a.language', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_HITS', 'a.hits', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_USERGROUPS_USERGROUPS_CREATED_BY', 'a.created_by', $listDirn, $listOrder); ?>
				</th>


    <?php if (isset($this->items[0]->id)): ?>
        <th width="1%" class="nowrap center hidden-phone">
            <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
        </th>
    <?php endif; ?>

    				<?php if ($canEdit || $canDelete): ?>
					<th class="center">
				<?php echo JText::_('COM_USERGROUPS_USERGROUPS_ACTIONS'); ?>
				</th>
				<?php endif; ?>

    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="<?php echo isset($this->items[0]) ? count(get_object_vars($this->items[0])) : 10; ?>">
            <?php echo $this->pagination->getListFooter(); ?>
        </td>
    </tr>
    </tfoot>
    <tbody>
    <?php foreach ($this->items as $i => $item) : ?>
        <?php $canEdit = $user->authorise('core.edit', 'com_usergroups'); ?>

        				<?php if (!$canEdit && $user->authorise('core.edit.own', 'com_usergroups')): ?>
					<?php $canEdit = JFactory::getUser()->id == $item->created_by; ?>
				<?php endif; ?>

        <tr class="row<?php echo $i % 2; ?>">

            <?php if (isset($this->items[0]->state)): ?>
                <?php $class = ($canEdit || $canChange) ? 'active' : 'disabled'; ?>
                <td class="center">
                    <a class="btn btn-micro <?php echo $class; ?>"
                       href="<?php echo ($canEdit || $canChange) ? JRoute::_('index.php?option=com_usergroups&task=usergroupform.publish&id=' . $item->id . '&state=' . (($item->state + 1) % 2), false, 2) : '#'; ?>">
                        <?php if ($item->state == 1): ?>
                            <i class="icon-publish"></i>
                        <?php else: ?>
                            <i class="icon-unpublish"></i>
                        <?php endif; ?>
                    </a>
                </td>
            <?php endif; ?>

            				<td>
				<?php if (isset($item->checked_out) && $item->checked_out) : ?>
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'usergroups.', $canCheckin); ?>
				<?php endif; ?>
				<a href="<?php echo JRoute::_('index.php?option=com_usergroups&view=usergroup&id='.(int) $item->id); ?>">
				<?php echo $this->escape($item->title); ?></a>
				</td>
				<td>

					<?php echo $item->slug; ?>
				</td>
				<td>

					<?php echo $item->catid; ?>
				</td>
				<td>

					<?php echo $item->categories; ?>
				</td>
				<td>

					<?php echo $item->description; ?>
				</td>
				<td>

					<?php echo $item->meetinginfo; ?>
				</td>
				<td>

					<?php echo $item->location; ?>
				</td>
				<td>

					<?php echo $item->address; ?>
				</td>
				<td>

					<?php echo $item->postcode; ?>
				</td>
				<td>

					<?php echo $item->city; ?>
				</td>
				<td>

					<?php echo $item->region; ?>
				</td>
				<td>

					<?php echo $item->country; ?>
				</td>
				<td>

					<?php echo $item->lat; ?>
				</td>
				<td>

					<?php echo $item->lng; ?>
				</td>
				<td>

					<?php echo $item->website; ?>
				</td>
				<td>

					<?php echo $item->usergroupemail; ?>
				</td>
				<td>

					<?php echo $item->logo; ?>
				</td>
				<td>

					<?php echo $item->photo; ?>
				</td>
				<td>

					<?php echo $item->twitter; ?>
				</td>
				<td>

					<?php echo $item->linkedin; ?>
				</td>
				<td>

					<?php echo $item->facebook; ?>
				</td>
				<td>

					<?php echo $item->googleplus; ?>
				</td>
				<td>

					<?php echo $item->rssfeed; ?>
				</td>
				<td>

					<?php echo $item->meetup_apikey; ?>
				</td>
				<td>

					<?php echo $item->meetup_groupid; ?>
				</td>
				<td>

					<?php echo $item->fullprovisional; ?>
				</td>
				<td>

					<?php echo $item->teamdetails; ?>
				</td>
				<td>

					<?php echo $item->active; ?>
				</td>
				<td>

					<?php echo $item->version; ?>
				</td>
				<td>

					<?php echo $item->language; ?>
				</td>
				<td>

					<?php echo $item->hits; ?>
				</td>
				<td>

							<?php echo JFactory::getUser($item->created_by)->name; ?>				</td>


            <?php if (isset($this->items[0]->id)): ?>
                <td class="center hidden-phone">
                    <?php echo (int)$item->id; ?>
                </td>
            <?php endif; ?>

            				<?php if ($canEdit || $canDelete): ?>
					<td class="center">
						<?php if ($canEdit): ?>
							<a href="<?php echo JRoute::_('index.php?option=com_usergroups&task=usergroupform.edit&id=' . $item->id, false, 2); ?>" class="btn btn-mini" type="button"><i class="icon-edit" ></i></a>
						<?php endif; ?>
						<?php if ($canDelete): ?>
							<button data-item-id="<?php echo $item->id; ?>" class="btn btn-mini delete-button" type="button"><i class="icon-trash" ></i></button>
						<?php endif; ?>
					</td>
				<?php endif; ?>

        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>

    <?php if ($canCreate): ?>
        <a href="<?php echo JRoute::_('index.php?option=com_usergroups&task=usergroupform.edit&id=0', false, 2); ?>"
           class="btn btn-success btn-small"><i
                class="icon-plus"></i> <?php echo JText::_('COM_USERGROUPS_ADD_ITEM'); ?></a>
    <?php endif; ?>

    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="boxchecked" value="0"/>
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
    <?php echo JHtml::_('form.token'); ?>
</form>

<script type="text/javascript">

    jQuery(document).ready(function () {
        jQuery('.delete-button').click(deleteItem);
    });

    function deleteItem() {
        var item_id = jQuery(this).attr('data-item-id');
        if (confirm("<?php echo JText::_('COM_USERGROUPS_DELETE_MESSAGE'); ?>")) {
            window.location.href = '<?php echo JRoute::_('index.php?option=com_usergroups&task=usergroupform.remove&id=', false, 2) ?>' + item_id;
        }
    }
</script>


