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

/**
 * Usergroups helper.
 */
class UsergroupsHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_USERGROUPS_TITLE_USERGROUPS'),
			'index.php?option=com_usergroups&view=usergroups',
			$vName == 'usergroups'
		);
		JHtmlSidebar::addEntry(
			JText::_('JCATEGORIES') . ' (' . JText::_('COM_USERGROUPS_TITLE_USERGROUPS') . ')',
			"index.php?option=com_categories&extension=com_usergroups",
			$vName == 'categories'
		);
		if ($vName=='categories') {
			JToolBarHelper::title('Usergroups: JCATEGORIES (COM_USERGROUPS_TITLE_USERGROUPS)');
		}
		JHtmlSidebar::addEntry(
			JText::_('COM_USERGROUPS_TITLE_CONTACTS'),
			'index.php?option=com_usergroups&view=contacts',
			$vName == 'contacts'
		);

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
     */
    public static function getActions() {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_usergroups';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}
