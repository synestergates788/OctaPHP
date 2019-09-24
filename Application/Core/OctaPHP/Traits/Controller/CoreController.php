<?php
namespace OctaPHP\Traits\Controller;

use \Twig\Environment;
use \Twig\TwigFunction;

$loader = Environment::class;
use \Twig\Loader\FilesystemLoader;
$loader = new FilesystemLoader(ROOT.DS.'Application'.DS.'Views');
$view = new Environment($loader);
$GLOBALS['template'] = $view;

use Core\Input;
use Core\Libraries;
use Core\Helpers;

/**
 * ###########################
 * ###START OF DEBUG CONSOLE##
 * ###########################
 *
 * Initialize Debug class.
 * Enables the debug tools,
 * This method registers an error handler and an exception handler.
 */
use Symfony\Component\Debug\Debug;
Debug::enable();

/**
 * Initialize Debug class.
 * Registers the error handler.
 */
use Symfony\Component\Debug\ErrorHandler;
ErrorHandler::register();

/**
 * Initialize Debug class.
 * Registers the exception handler.
 */
use Symfony\Component\Debug\ExceptionHandler;
ExceptionHandler::register();

/**
 * Initialize Debug class.
 * Wraps all autoloaders.
 */
use Symfony\Component\Debug\DebugClassLoader;
DebugClassLoader::enable();

/**
 * Initialize zend Config class.
 *
 * Provides a property based interface to an array.
 * The data are read-only unless $allowModifications is set to true
 * on construction.
 *
 * Implements Countable, Iterator and ArrayAccess
 * to facilitate easy access to the data.
 */
use Zend\Config\Config as OctaConfig;

trait CoreController{

    protected $input;
    protected $config;

    public function __construct(){
        /**
         * initializing database component using redbeanPhp.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->config = $this->config($GLOBALS['config']);

        /**
         * initializing assets directory base on configuration settings.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->assets($GLOBALS['template'],$this->config->Assets);

        /**
         * initializing input validator.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $this->input = new Input();
    }

    /**
     * autoload model with/without alias.
     *
     * @param string $modelName      model name
     * @param string $alias      model alias
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function model($modelName,$alias=null){
        if(!is_array($modelName)){
            $models_dir = scandir(ROOT.DS.'Application'.DS.'Models');
            unset($models_dir[0],$models_dir[1]);

            if($models_dir){
                foreach($models_dir as $key_m=>$row_m){

                    if(strpos($row_m, '.php') == false){
                        if(file_exists(ROOT.DS.'Application'.DS.'Models'.DS.$row_m.DS.$modelName.".php")){

                            include_once ROOT.DS.'Application'.DS.'Models'.DS.$row_m.DS.$modelName.".php";
                            if($alias){
                                $this->$alias = new $modelName;
                            }else{
                                $this->$modelName = new $modelName;
                            }
                        }
                    }
                }
            }

        }else{
            $models_dir = scandir(ROOT.DS.'Application'.DS.'Models');
            unset($models_dir[0],$models_dir[1]);

            $model_checker = [];
            if($models_dir){
                foreach($models_dir as $key_m=>$row_m){
                    if(strpos($row_m, '.php') == false){

                        if($modelName){
                            foreach($modelName as $key_arrm=>$row_arrm){

                                if(!in_array($key_arrm,$model_checker)){
                                    if(file_exists(ROOT.DS.'Application'.DS.'Models'.DS.$row_m.DS.$key_arrm.".php")){
                                        include_once ROOT.DS.'Application'.DS.'Models'.DS.$row_m.DS.$key_arrm.".php";
                                        $this->hm = new $key_arrm;
                                    }

                                    $model_checker[] = $key_arrm;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * loading .html.twig files as views.
     *
     * @param string $template_name      your view file (your_view.html.twig) file name
     * @param array $data      an array of data to be pass on the view file
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function view($template_name,$data=[]){
        if($template_name){
            echo $GLOBALS['template']->render($template_name, $data);
        }else{
            include_once(ROOT.DS.'Application'.DS.'Views'.DS.'ErrorPage'.DS.'ErrorTemplate.php');
        }
    }

    /**
     * loading assets directory configuration using symfony assets component.
     * @param string $view
     * @param string $assets_config
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function assets($view,$assets_config){
        if($assets_config){
            $view->addFunction(new TwigFunction($this->config->Assets->DirectoryName, function ($asset) {
                return sprintf($this->config->Assets->DirectoryUrl.DS.'%s', ltrim($asset, '/'));
            }));
        }
    }

    /**
     * zend config component.
     * @param  array $array
     * @param  boolean $allowModifications
     * @return OctaConfig class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function config(array $array, $allowModifications = false){
        return new OctaConfig($array, $allowModifications);
    }
}