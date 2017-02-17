<?php

/**
 * Multisistemas
 *
 * @package    theme_multisistemas
 * @copyright  2017 Luis Medrano
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$THEME->scss = function($theme) {                                                                                                   
    return theme_multisistemas_get_main_scss_content($theme);                                                                               
};

$THEME->name = 'multisistemas';
$THEME->sheets = [];
$THEME->editor_sheets = [];
$THEME->parents = ['boost'];
$THEME->enable_dock = false;
$THEME->yuicssmodules = array();
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->requiredblocks = '';
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;
