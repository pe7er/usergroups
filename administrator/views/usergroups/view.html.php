<?php

/**
 * @version     1.0.0
 * @package     com_usergroups
 * @copyright   Copyright (C) 2014 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Peter Martin <joomla@db8.nl> - http://www.db8.nl
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of Usergroups.
 */
class UsergroupsViewUsergroups extends JViewLegacy {

    protected $items;
    protected $pagination;
    protected $state;

    /**
     * Display the view
     */
    public function display($tpl = null) {
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        UsergroupsHelper::addSubmenu('usergroups');

        $this->addToolbar();

        $this->sidebar = JHtmlSidebar::render();
        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     *
     * @since	1.6
     */
    protected function addToolbar() {
        require_once JPATH_COMPONENT . '/helpers/usergroups.php';

        $state = $this->get('State');
        $canDo = UsergroupsHelper::getActions($state->get('filter.category_id'));

        JToolBarHelper::title(JText::_('COM_USERGROUPS_TITLE_USERGROUPS'), 'usergroups.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR . '/views/usergroup';
        if (file_exists($formPath)) {

            if ($canDo->get('core.create')) {
                JToolBarHelper::addNew('usergroup.add', 'JTOOLBAR_NEW');
            }

            if ($canDo->get('core.edit') && isset($this->items[0])) {
                JToolBarHelper::editList('usergroup.edit', 'JTOOLBAR_EDIT');
            }
        }

        if ($canDo->get('core.edit.state')) {

            if (isset($this->items[0]->state)) {
                JToolBarHelper::divider();
                JToolBarHelper::custom('usergroups.publish', 'publish.png', 'publish_f2.png', 'JTOOLBAR_PUBLISH', true);
                JToolBarHelper::custom('usergroups.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            } else if (isset($this->items[0])) {
                //If this component does not use state then show a direct delete button as we can not trash
                JToolBarHelper::deleteList('', 'usergroups.delete', 'JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state)) {
                JToolBarHelper::divider();
                JToolBarHelper::archiveList('usergroups.archive', 'JTOOLBAR_ARCHIVE');
            }
            if (isset($this->items[0]->checked_out)) {
                JToolBarHelper::custom('usergroups.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
        }

        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state)) {
            if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
                JToolBarHelper::deleteList('', 'usergroups.delete', 'JTOOLBAR_EMPTY_TRASH');
                JToolBarHelper::divider();
            } else if ($canDo->get('core.edit.state')) {
                JToolBarHelper::trash('usergroups.trash', 'JTOOLBAR_TRASH');
                JToolBarHelper::divider();
            }
        }

        if ($canDo->get('core.admin')) {
            JToolBarHelper::preferences('com_usergroups');
        }

        //Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_usergroups&view=usergroups');

        $this->extra_sidebar = '';
        
		JHtmlSidebar::addFilter(

			JText::_('JOPTION_SELECT_PUBLISHED'),

			'filter_published',

			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true)

		);

    }

	protected function getSortFields()
	{
		return array(
		'a.id' => JText::_('JGRID_HEADING_ID'),
		'a.title' => JText::_('COM_USERGROUPS_USERGROUPS_TITLE'),
		'a.slug' => JText::_('COM_USERGROUPS_USERGROUPS_SLUG'),
		'a.catid' => JText::_('COM_USERGROUPS_USERGROUPS_CATID'),
		'a.categories' => JText::_('COM_USERGROUPS_USERGROUPS_CATEGORIES'),
		'a.description' => JText::_('COM_USERGROUPS_USERGROUPS_DESCRIPTION'),
		'a.meetinginfo' => JText::_('COM_USERGROUPS_USERGROUPS_MEETINGINFO'),
		'a.location' => JText::_('COM_USERGROUPS_USERGROUPS_LOCATION'),
		'a.address' => JText::_('COM_USERGROUPS_USERGROUPS_ADDRESS'),
		'a.postcode' => JText::_('COM_USERGROUPS_USERGROUPS_POSTCODE'),
		'a.city' => JText::_('COM_USERGROUPS_USERGROUPS_CITY'),
		'a.region' => JText::_('COM_USERGROUPS_USERGROUPS_REGION'),
		'a.country' => JText::_('COM_USERGROUPS_USERGROUPS_COUNTRY'),
		'a.lat' => JText::_('COM_USERGROUPS_USERGROUPS_LAT'),
		'a.lng' => JText::_('COM_USERGROUPS_USERGROUPS_LNG'),
		'a.website' => JText::_('COM_USERGROUPS_USERGROUPS_WEBSITE'),
		'a.usergroupemail' => JText::_('COM_USERGROUPS_USERGROUPS_USERGROUPEMAIL'),
		'a.logo' => JText::_('COM_USERGROUPS_USERGROUPS_LOGO'),
		'a.photo' => JText::_('COM_USERGROUPS_USERGROUPS_PHOTO'),
		'a.twitter' => JText::_('COM_USERGROUPS_USERGROUPS_TWITTER'),
		'a.linkedin' => JText::_('COM_USERGROUPS_USERGROUPS_LINKEDIN'),
		'a.facebook' => JText::_('COM_USERGROUPS_USERGROUPS_FACEBOOK'),
		'a.googleplus' => JText::_('COM_USERGROUPS_USERGROUPS_GOOGLEPLUS'),
		'a.rssfeed' => JText::_('COM_USERGROUPS_USERGROUPS_RSSFEED'),
		'a.meetup_apikey' => JText::_('COM_USERGROUPS_USERGROUPS_MEETUP_APIKEY'),
		'a.meetup_groupid' => JText::_('COM_USERGROUPS_USERGROUPS_MEETUP_GROUPID'),
		'a.fullprovisional' => JText::_('COM_USERGROUPS_USERGROUPS_FULLPROVISIONAL'),
		'a.teamdetails' => JText::_('COM_USERGROUPS_USERGROUPS_TEAMDETAILS'),
		'a.active' => JText::_('COM_USERGROUPS_USERGROUPS_ACTIVE'),
		'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
		'a.state' => JText::_('JSTATUS'),
		'a.version' => JText::_('COM_USERGROUPS_USERGROUPS_VERSION'),
		'a.language' => JText::_('JGRID_HEADING_LANGUAGE'),
		'a.hits' => JText::_('COM_USERGROUPS_USERGROUPS_HITS'),
		'a.created_by' => JText::_('COM_USERGROUPS_USERGROUPS_CREATED_BY'),
		);
	}

}
