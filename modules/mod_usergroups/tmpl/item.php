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
$element = ModUsergroupsHelper::getItem($params);
?>

<?php if (!empty($element)) : ?>
    <div>
        <?php $fields = get_object_vars($element); ?>
        <?php foreach ($fields as $field_name => $field_value): ?>
            <?php if (ModUsergroupsHelper::shouldAppear($field_name)): ?>
                <div class="row">
                    <div class="span4"><strong><?php echo ModUsergroupsHelper::renderTranslatableHeader($params, $field_name); ?></strong></div>
                    <div class="span8"><?php echo ModUsergroupsHelper::renderElement($params->get('item_table'), $field_name, $field_value); ?></div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>