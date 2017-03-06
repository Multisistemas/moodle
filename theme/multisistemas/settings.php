<?php

/**
 * Multisistemas
 *
 * @package    theme_multisistemas
 * @copyright  2017 Luis Medrano
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

	$settings = new theme_boost_admin_settingspage_tabs('themesettingmultisistemas', get_string('configtitle', 'theme_multisistemas'));
	$page = new admin_settingpage('theme_multisistemas_general', get_string('generalsettings', 'theme_multisistemas'));

	$name = 'theme_multisistemas/preset';                                                                                                   
  $title = get_string('preset', 'theme_multisistemas');                                                                                   
  $description = get_string('preset_desc', 'theme_multisistemas');                                                                        
  $default = 'default.scss';

  $context = context_system::instance();                                                                                          
  $fs = get_file_storage();                                                                                                       
  $files = $fs->get_area_files($context->id, 'theme_multisistemas', 'preset', 0, 'itemid, filepath, filename', false);
  $choices = [];

  foreach ($files as $file) {                                                                                                     
    $choices[$file->get_filename()] = $file->get_filename();                                                                    
  } 

  $choices['default.scss'] = 'default.scss';                                                                                      
  $choices['plain.scss'] = 'plain.scss';

  $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);                                     
  $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
  $page->add($setting);

  $name = 'theme_multisistemas/presetfiles';                                                                                              
  $title = get_string('presetfiles','theme_multisistemas');                                                                               
  $description = get_string('presetfiles_desc', 'theme_multisistemas');

  $setting = new admin_setting_configstoredfile(
  	$name, 
  	$title, 
  	$description, 
  	'preset', 
  	0, 
  	array(
  		'maxfiles' => 20, 
  		'accepted_types' => array('.scss')
  	)
  );                                                               
   
  $page->add($setting);

  $name = 'theme_multisistemas/brandcolor';                                                                                               
  $title = get_string('brandcolor', 'theme_multisistemas');                                                                               
  $description = get_string('brandcolor_desc', 'theme_multisistemas');                                                                    
  $setting = new admin_setting_configcolourpicker($name, $title, $description, '');                                               
  $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
  $page->add($setting);

  $settings->add($page);

  $page = new admin_settingpage('theme_multisistemas_advanced', get_string('advancedsettings', 'theme_multisistemas'));

  $setting = new admin_setting_configtextarea(
  	'theme_multisistemas/scsspre',                                                              
    get_string('rawscsspre', 'theme_multisistemas'), 
    get_string('rawscsspre_desc', 'theme_multisistemas'), 
    '', 
    PARAM_RAW
  );

  $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
  $page->add($setting);

  $setting = new admin_setting_configtextarea('theme_multisistemas/scss', 
  	get_string('rawscss', 'theme_multisistemas'),                           
    get_string('rawscss_desc', 'theme_multisistemas'), 
    '', 
    PARAM_RAW
  );
  $setting->set_updatedcallback('theme_reset_all_caches');
  $page->add($setting);

  $name = 'theme_multisistemas/loginbackgroundimage';
  $title = get_string('loginbackgroundimage', 'theme_multisistemas');
  $description = get_string('loginbackgroundimage_desc', 'theme_multisistemas');
  $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbackgroundimage');
  $setting->set_updatedcallback('theme_multisistemas_update_settings_images');
  $page->add($setting);

  $settings->add($page);

}
