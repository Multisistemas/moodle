<?php

/**
 * Multisistemas
 *
 * @package    theme_multisistemas
 * @copyright  2017 Luis Medrano
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

function theme_multisistemas_get_main_scss_content($theme) {                                                                                
    global $CFG;                                                                                                                    
 
    $scss = '';                                                                                                                     
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;                                                 
    $fs = get_file_storage();                                                                                                       
 
    $context = context_system::instance();                                                                                          
    if ($filename == 'default.scss') {                                                                                                            
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');                                        
    } else if ($filename == 'plain.scss') {                                                                  
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/plain.scss');                                          
    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_multisistemas', 'preset', 0, '/', $filename))) {         
        $scss .= $presetfile->get_content();                                                                                        
    } else {                                                                                 
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');                                        
    }

    $pre = file_get_contents($CFG->dirroot . '/theme/multisistemas/scss/pre.scss');
    $post = file_get_contents($CFG->dirroot . '/theme/multisistemas/scss/post.scss');

    return $pre . "\n" . $scss . "\n" . $post;                                                                                                                   
}

function theme_multisistemas_update_settings_images($settingname) {
	global $CFG;

	$parts = explode('_', $settingname);
	$settingname = end($parts);
	
	$syscontext = context_system::instance();
	$component = 'theme_multisistemas';

	$filename = get_config($component, $settingname);
	$extension = substr($filename, strrpos($filename, '.') + 1);
	$fullpath = "/{$syscontext->id}/{$component}/{$settingname}/0{$filename}";
	$fs = get_file_storage();
	
	if ($file = $fs->get_file_by_hash(sha1($fullpath))) {
		$pathname = $CFG->dataroot . '/pix_plugins/theme/multisistemas/' . $settingname . '.' . $extension;

		$pathpattern = $CFG->dataroot . '/pix_plugins/theme/multisistemas/' . $settingname . '.*';

		@mkdir($CFG->dataroot . '/pix_plugins/theme/multisistemas/', $CFG->directorypermissions, true);
		
		foreach (glob($pathpattern) as $filename) {
			@unlink($filename);
		}

		$file->copy_content_to($pathname);
	}

	theme_reset_all_caches();
}