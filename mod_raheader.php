<?php

/**
 * @module	RA Header
 * @author	Chris Vaughan
 * @website	http://ramblers-webs.org.uk/
 * @copyright	Copyright (C) 2023 Chris Vaughan webmaster@ramblers-webs.org.uk All rights reserved.
 * @license	http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
// no direct access
defined("_JEXEC") or die("Restricted access");
$class = $params->get('moduleclass_sfx');
if ($class === null) {
    $class = '';
}
$moduleclass_sfx = htmlspecialchars($class);

require(JModuleHelper::getLayoutPath('mod_raheader', $params->get('layout', 'default')));