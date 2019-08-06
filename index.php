<?php
defined('ROOT') || define('ROOT',realpath(dirname(__FILE__)));
const DS = DIRECTORY_SEPARATOR;
include_once ROOT.DS.'application'.DS.'config'.DS.'config.php';
include_once ROOT.DS.'application'.DS.'config'.DS.'database.php';

define('DB', $database);
define('base_url', $squeed_config['base_url']);
define('default_controller_dir', $default_controller["DIRECTORY"]);
define('default_controller_ctlr', $default_controller["CONTROLLER"]);

include_once ROOT.DS.'application'.DS.'core'.DS.'system'.DS.'libraries'.DS.'vendor'.DS.'autoload.php';
include_once ROOT.DS.'application'.DS.'config'.DS.'route.php';
include_once ROOT.DS.'application'.DS.'config'.DS.'assets.php';
include_once ROOT.DS.'application'.DS.'core'.DS.'Parse_Routes.php';
include_once ROOT.DS.'application'.DS.'core'.DS.'Directory.php';
include_once ROOT.DS.'application'.DS.'config'.DS.'autoload.php';

define('routes', $default_routes);
define('assets_config', $assets_config['assets']);
define('routes_dir', $default_routes_dir);
define('error_404', ($squeed_config['error_404']) ? $squeed_config['error_404'] : ROOT.DS.'application'.DS.'views'.DS.'error_page'.DS.'error_404.php');
define('helpers', $autoload['helper']);
define('libraries', $autoload['libraries']);
define('session', $squeed_config['session']);

$modules = [];
if($directory){
    foreach($directory as $key_d=>$row_d){
        define($key_d, $row_d);
        $modules[] = $row_d;
    }
}

set_include_path(get_include_path().PATH_SEPARATOR.implode(PATH_SEPARATOR,$modules));
spl_autoload_register('spl_autoload', false);

$router = new \Bramus\Router\Router();
new Application($router,routes,routes_dir,error_404);