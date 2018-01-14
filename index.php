<?php
// Front Controller design pattern

// error_reporting (E_ALL);
if (version_compare(phpversion(), '5.2.0', '<') == true) { die ('PHP 5.2.0 Min.'); }

// Constants:
define ('DIRSEP', DIRECTORY_SEPARATOR);

// Get site path
$site_path = realpath('.' . DIRSEP) . DIRSEP;

if (is_dir($site_path) == false) {
	die('Invalid site path: ' . $site_path);
}
define ('site_path', $site_path);

// config directory path
$config_path = $site_path . 'config' . DIRSEP; 

if (is_dir($config_path) == false) {
	die('Invalid config path: ' . $config_path);
}
define ('config_path', $config_path);

// include configuration file
if(file_exists(realpath(config_path . 'Config.php')) == false) {
	die('Main configuration file not found: ' . config_path . 'Config.php');
}

include(config_path . 'Config.php');
include(models_path . 'Db.php');
include(controllers_path . 'Controller.php');
include(commands_path . 'Command.php');
Controller::Run();

?>