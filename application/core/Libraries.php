<?php

class Libraries{

    public function __construct($libraries){
        $this->libraries($libraries);
    }

    public function libraries($config_libraries){
        $def_lib = ['debug','unit_test'];
        $libraries = [];

        if($config_libraries){
            foreach($config_libraries as $row){
                array_push($libraries, $row);
            }
        }

        $libraries = array_merge($libraries,$def_lib);

        $helper_dir = scandir(ROOT.DS.'application'.DS.'library');
        unset($helper_dir[0],$helper_dir[1]);
        if($helper_dir){
            foreach($helper_dir as $row){
                if(strpos($row, '.php')){
                    $row = str_replace(".php","",$row);
                    if(in_array($row,$libraries)){
                        include_once ROOT.DS.'application'.DS.'library'.DS.$row.'.php';
                    }
                }
            }
        }
    }
}