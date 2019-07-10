<?php
$loader = \Twig\Environment::class;
use \Twig\Loader\FilesystemLoader;
$loader = new FilesystemLoader(ROOT.DS.'application'.DS.'views');
$view = new \Twig\Environment($loader);
$GLOBALS['template'] = $view;

/*use \RedBeanPHP\R;
$GLOBALS['asd'] = use \RedBeanPHP\R;*/

/*allocating assets directory*/
/*$view->addFunction(new \Twig_SimpleFunction('assets', function ($asset) {
    return sprintf(base_url.DS.'application'.DS.'assets'.DS.'%s', ltrim($asset, '/'));
}));*/
/*end allocating assets directory*/

class Controller{

    protected $view;
    protected $model;
    protected $session;
    protected $db;
    protected $hm;
    protected $am;
    protected $template;
    protected $assets;
    protected $input;
    protected $bean;
    protected $octa;

    public function __construct(){
        $this->assets($GLOBALS['template'],assets_config);
        $this->parse_library(libraries);
        $this->parse_helpers(helpers);
        $this->input = new Input();
        $this->bean = new R();
        $this->octa = new octa_redbean(DB,$this->bean);
    }

    public function model($modelName,$alias=null){
        if(!is_array($modelName)){
            $models_dir = scandir(ROOT.DS.'application'.DS.'models');
            unset($models_dir[0],$models_dir[1]);

            if($models_dir){
                foreach($models_dir as $key_m=>$row_m){

                    if(!strpos($row_m, '.php')){
                        if(file_exists(ROOT.DS.'application'.DS.'models'.DS.$row_m.DS.$modelName.".php")){

                            include_once ROOT.DS.'application'.DS.'models'.DS.$row_m.DS.$modelName.".php";
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
            $models_dir = scandir(ROOT.DS.'application'.DS.'models');
            unset($models_dir[0],$models_dir[1]);

            $model_checker = [];
            if($models_dir){
                foreach($models_dir as $key_m=>$row_m){
                    if(!strpos($row_m, '.php')){

                        foreach($modelName as $key_arrm=>$row_arrm){
                            if(!in_array($key_arrm,$model_checker)){
                                if(file_exists(ROOT.DS.'application'.DS.'models'.DS.$row_m.DS.$key_arrm.".php")){
                                    include_once ROOT.DS.'application'.DS.'models'.DS.$row_m.DS.$key_arrm.".php";
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

    public function parse_helpers($helpers){
        new Helpers($helpers);
    }

    public function parse_library($libraries){
        new Libraries($libraries);
    }

    public function session(){
        if(session == true){
            $this->session = new Sessions(session);
        }
    }

    public function view($template_name,$data=[]){
        if($template_name){
            echo $GLOBALS['template']->render($template_name, $data);
        }else{
            include_once(ROOT.DS.'application'.DS.'views'.DS.'error_page'.DS.'error_template.php');
        }
    }

    public function assets($view,$assets_config){
        if($assets_config){
            foreach($assets_config as $key=>$row){
                $GLOBALS['asset_row'] = $row;
                $view->addFunction(new \Twig_SimpleFunction($key, function ($asset) {
                    return sprintf($GLOBALS['asset_row'].DS.'%s', ltrim($asset, '/'));
                }));
            }
        }
    }
}