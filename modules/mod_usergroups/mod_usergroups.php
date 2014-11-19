<?php

/**
 * @version     1.0.0
 * @package     com_usergroups
 * @subpackage  mod_usergroups
 * @copyright   Copyright (C) 2014 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Peter Martin <joomla@db8.nl> - http://www.db8.nl
 */
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$doc = JFactory::getDocument();

/* */
$doc->addStyleSheet(JURI::base() . '/modules/mod_usergroups/assets/css/style.css');

/* */
$doc->addScript(JURI::base() . '/modules/mod_usergroups/assets/js/script.css');

require JModuleHelper::getLayoutPath('mod_usergroups', $params->get('content_type', 'blank'));
