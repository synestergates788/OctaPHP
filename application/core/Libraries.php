<?php

class Libraries{

    public function __construct($libraries){
        $this->libraries($libraries);
    }

    public function libraries($libraries){
        $def_lib = ['debug','unit_test','redbean','squeed_redbean'];
        $libraries = array_merge($libraries,$def_lib);

        $helper_dir = scandir(ROOT.DS.'application'.DS.'library');
        unset($helper_dir[0],$helper_dir[1]);
        if($helper_dir){
            foreach($helper_dir as $row){
                if(strpos($row, '.php') == true){
                    $row = str_replace(".php","",$row);
                    if(in_array($row,$libraries)){
                        include_once ROOT.DS.'application'.DS.'library'.DS.$row.'.php';
                    }
                }
            }
        }
    }
}