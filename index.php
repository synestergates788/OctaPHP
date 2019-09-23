<?php
defined('ROOT') || define('ROOT',realpath(dirname(__FILE__)));
const DS = DIRECTORY_SEPARATOR;

/**
 * Initialize composer autoload.
 */
include_once ROOT.DS.'Application'.DS.'Core'.DS.'System'.DS.'Libraries'.DS.'vendor'.DS.'autoload.php';

/**
 * Initialize config.php.
 */
include_once ROOT.DS.'Application'.DS.'Config'.DS.'Config.php';

/**
 * Initialize database.
 */
include_once ROOT.DS.'Application'.DS.'Config'.DS.'Database.php';

/**
 * Initialize route.
 */
include_once ROOT.DS.'Application'.DS.'Config'.DS.'Route.php';

/**
 * Initialize assets.
 */
include_once ROOT.DS.'Application'.DS.'Config'.DS.'Assets.php';

/**
 * Initialize Parse Routes.
 */
include_once ROOT.DS.'Application'.DS.'Core'.DS.'Parse_Routes.php';

/**
 * Initialize Directory.
 */
include_once ROOT.DS.'Application'.DS.'Core'.DS.'Directory.php';

/**
 * Initialize config autoload.
 */
include_once ROOT.DS.'Application'.DS.'Config'.DS.'Autoload.php';

/**
 * define global var DefaultControllerDir.
 */
define('DefaultControllerDir', $config['DefaultController']["Directory"]);

/**
 * define global var DefaultControllerCtlr.
 */
define('DefaultControllerCtlr', $config['DefaultController']["Controller"]);

/**
 * define global var Session.
 */
define('Session', $config['Session']);

/**
 * define global var routes.
 */
define('Routes', $routes);

/**
 * define global var routes_dir.
 */
define('RoutesDir', $RoutesDir);

/**
 * define global var error_404.
 */
$config['Error404'] = ($config['Error404']) ? $config['Error404'] : ROOT.DS.'Application'.DS.'Views'.DS.'ErrorPage'.DS.'Error404.php';

/**
 * define global var routes.
 */
$config['Routes'] = $routes;

/**
 * define global var routes_dir.
 */
$config['RoutesDir'] = $RoutesDir;

/**
 * parse external directories.
 */
$modules = [];
if($Directory){
    foreach($Directory as $key_d=>$row_d){
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
new Application($router,Routes,RoutesDir,$config['Error404']);