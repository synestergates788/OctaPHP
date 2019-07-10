<?php

class Helpers{

    public function __construct($helpers){
        $this->helpers($helpers);
    }

    public function helpers($helpers){
        $def_helpers = ['core_helper'];
        $helpers = array_merge($helpers,$def_helpers);

        $helper_dir = scandir(ROOT.DS.'application'.DS.'helpers');
        unset($helper_dir[0],$helper_dir[1]);
        if($helper_dir){
            foreach($helper_dir as $row){
                if(!strpos($row, '.php')){
                    $row = str_replace(".php","",$row);
                    if(in_array($row,$helpers)){
                        include_once ROOT.DS.'application'.DS.'helpers'.DS.$row.'.php';
                    }
                }
            }
        }
    }
}