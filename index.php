<?php
defined('ROOT') || define('ROOT',realpath(dirname(__FILE__)));
const DS = DIRECTORY_SEPARATOR;

/**
 * Initialize composer autoload.
 */
include_once ROOT.DS.'application'.DS.'core'.DS.'system'.DS.'libraries'.DS.'vendor'.DS.'autoload.php';

/**
 * Initialize config.php.
 */
include_once ROOT.DS.'application'.DS.'config'.DS.'config.php';

/**
 * Initialize database.
 */
include_once ROOT.DS.'application'.DS.'config'.DS.'database.php';

/**
 * Initialize route.
 */
include_once ROOT.DS.'application'.DS.'config'.DS.'route.php';

/**
 * Initialize assets.
 */
include_once ROOT.DS.'application'.DS.'config'.DS.'assets.php';

/**
 * Initialize Parse Routes.
 */
include_once ROOT.DS.'application'.DS.'core'.DS.'Parse_Routes.php';

/**
 * Initialize Directory.
 */
include_once ROOT.DS.'application'.DS.'core'.DS.'Directory.php';

/**
 * Initialize config autoload.
 */
include_once ROOT.DS.'application'.DS.'config'.DS.'autoload.php';

/**
 * define global var default_controller_dir.
 */
define('default_controller_dir', $config['default_controller']["directory"]);

/**
 * define global var default_controller_ctlr.
 */
define('default_controller_ctlr', $config['default_controller']["controller"]);

/**
 * define global var session.
 */
define('session', $config['session']);

/**
 * define global var routes.
 */
define('routes', $routes);

/**
 * define global var routes_dir.
 */
define('routes_dir', $routes_dir);

/**
 * define global var error_404.
 */
$config['error_404'] = ($config['error_404']) ? $config['error_404'] : ROOT.DS.'application'.DS.'views'.DS.'error_page'.DS.'error_404.php';

/**
 * define global var routes.
 */
$config['routes'] = $routes;

/**
 * define global var routes_dir.
 */
$config['routes_dir'] = $routes_dir;

/**
 * parse external directories.
 */
$modules = [];
if($directory){
    foreach($directory as $key_d=>$row_d){
        define($key_d, $row_d);
        $modules[] = $row_d;
    }
}

/**
 * parse include paths.
 */
set_include_path(get_include_path().PATH_SEPARATOR.implode(PATH_SEPARATOR,$modules));
spl_autoload_register('spl_autoload', false);

/**
 * instantiate router.
 */
$router = new \Bramus\Router\Router();
new Application($router,routes,routes_dir,$config['error_404']);