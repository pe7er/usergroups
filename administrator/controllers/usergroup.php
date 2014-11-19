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

jimport('joomla.application.component.controllerform');

/**
 * Usergroup controller class.
 */
class UsergroupsControllerUsergroup extends JControllerForm
{

    function __construct() {
        $this->view_list = 'usergroups';
        parent::__construct();
    }

}