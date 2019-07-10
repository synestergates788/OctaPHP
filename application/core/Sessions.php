<?php

class Sessions{

    public function __construct($session){
        if($session){
            session_start();
        }
    }

    public function start($data,$val=null){
        if($data){
            if(is_array($data)){
                foreach($data as $key=>$row){
                    $_SESSION[$key] = $row;
                }
            }else {
                $_SESSION[$data] = $val;
            }
        }
    }

    public function destroy($key){
        if($_SESSION){
            if($key == "All" || $key == "all"){
                foreach($_SESSION as $key=>$row){
                    unset($_SESSION[$key]);
                }

            }else{
                unset($_SESSION[$key]);
            }

        }else{
            return 'session already destroyed';
        }
    }

    public function get($data){
        if($_SESSION){
            if($data == "All" || $data == "all"){
                return $_SESSION;
            }else{
                return $_SESSION[$data];
            }
        }else{
            return 'session got destroyed';
        }
    }
}