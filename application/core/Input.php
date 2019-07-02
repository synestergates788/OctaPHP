<?php

class Input extends Controller{

    public function __construct(){
        #parent::__construct();
    }

    public function is_ajax_request(){
        return ( ! empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');
    }

    public function post($data){
        if(isset($_POST[$data])){
            return $_POST[$data];
        }else{
            return false;
        }
    }

    public function get($data){
        if(isset($_GET[$data])){
            return $_GET[$data];
        }
    }
}