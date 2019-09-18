<?php

class Routes{

    protected $controllers;
    protected $actions = 'index';
    protected $params = [];
    protected $router;

    public function __construct($router,$routes,$routes_dir,$error_404){
        $this->routes($router,$routes,$routes_dir,$error_404);
    }

    public function routes($router,$routes,$routes_dir,$error_404){
        $this->router = $router;
        $request = trim($_SERVER['REQUEST_URI'], "/");
        $url = explode('/', $request);
        $segment_1 = (isset($url[1])) ? $url[1] : '';
        $segment_2 = (isset($url[2])) ? $url[2] : '';
        $segment_3 = (isset($url[3])) ? $url[3] : '';
        $segment_4 = (isset($url[4])) ? $url[4] : '';

        $GLOBALS['segment_1'] = $segment_1;
        $GLOBALS['segment_2'] = $segment_2;
        $GLOBALS['segment_3'] = $segment_3;
        $GLOBALS['segment_4'] = $segment_4;

        $requested_url = '';
        if(isset($url[1])){
            $requested_url .= '/'.$segment_1;
        }

        if(isset($url[2])){
            $requested_url .= '/'.$segment_2;
        }

        if(isset($url[3])){
            $requested_url .= '/'.$segment_3;
        }

        if(isset($url[4])){
            $requested_url .= '/'.$segment_4;
        }

        $GLOBALS['routes'] = $routes;
        /*overwriting default controller if null*/
        if($GLOBALS['routes'][''] == null && $GLOBALS['routes'][''] == ""){
            $GLOBALS['routes'][''] = default_controller_dir.DS.default_controller_ctlr;

        }
        if($GLOBALS['routes']['/'] == null && $GLOBALS['routes']['/'] == ""){
            $GLOBALS['routes']['/'] = default_controller_dir.DS.default_controller_ctlr;
        }
        /*end of overwriting default controller if null*/

        #echo '<pre>';
        #print_r($GLOBALS['routes_dir']);
        #print_r($GLOBALS['routes']);
        #echo '</pre>';
        #exit;

        $GLOBALS['error_404'] = $error_404;
        $GLOBALS['routes_dir'] = $routes_dir;
        $GLOBALS['requested_url'] = $requested_url;
        $GLOBALS['class_method'] = isset($url[3]) ? $url[3] : 'index';
        $GLOBALS['url_segment_1'] = isset($url[1]) ? true : false;

        $this->router->match('GET|POST', $requested_url, function() {

            $tmp_method_request = trim($GLOBALS['requested_url'], "/");
            $method_request = explode('/', $tmp_method_request);
            $this_method_request = '';
            if(isset($method_request[0])){
                $this_method_request .= '/'.$method_request[0];
            }

            if(isset($method_request[1])){
                $this_method_request .= '/'.$method_request[1];
            }

            if(array_key_exists($this_method_request, $GLOBALS['routes_dir'])){

                if($GLOBALS['url_segment_1'] == true){
                    $get_controller_file = $GLOBALS['routes']['/'.$GLOBALS['segment_1'].'/'.$GLOBALS['segment_2'].'/([a-z0-9_-]+)?/([a-z0-9_-]+)?'];
                    $url_array = explode(DS,$get_controller_file);
                    $tmp_controller_file = end($url_array);
                    $controller_file = str_replace(".php","",$tmp_controller_file);

                    $dirInt = count($url_array) - 2;
                    $controllerDir = $url_array[$dirInt];
                    $class_file = 'application\\controllers\\'.$controllerDir.'\\'.$controller_file;

                    $this->controllers = new $class_file;
                    $this->actions = $GLOBALS['class_method'];
                    $this->params = !empty($url) ? array_values($url) : [];

                }else{
                    $get_controller_file = $GLOBALS['routes']['/'];
                    $url_array = explode(DS,$get_controller_file);
                    $tmp_controller_file = end($url_array);
                    $controller_file = str_replace(".php","",$tmp_controller_file);

                    $this->controllers = new $controller_file;
                    $this->actions = $GLOBALS['class_method'];
                    $this->params = !empty($url) ? array_values($url) : [];
                }

                if(method_exists($this->controllers, $this->actions)){
                    call_user_func_array([$this->controllers, $this->actions],$this->params);

                }else{
                    include_once ROOT.DS.'application'.DS.'views'.DS.'error_page'.DS.'error_methods.php';
                }

            }else{
                include_once $GLOBALS['error_404'];
            }
        });

        $this->router->run();
    }
}