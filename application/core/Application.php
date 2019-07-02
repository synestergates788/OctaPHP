<?php

class Application{
    protected $session;

    public function __construct($router,$routes,$routes_dir,$error_404){
        $this->load_router($router,$routes,$routes_dir,$error_404);
    }

    public function load_router($router,$routes,$routes_dir,$error_404){
        $this->session = new Routes($router,$routes,$routes_dir,$error_404);
    }

    public function url_segment($segment){
        $request = trim($_SERVER['REQUEST_URI'], "/");
        if(!empty($request)){
            $url = explode('/',$request);

            return (isset($url[$segment])) ? $url[$segment] : '';
        }
    }
}