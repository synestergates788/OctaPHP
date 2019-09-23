<?php
namespace Core;

class Libraries{

    public function __construct($Libraries){
        $this->loadLibraries($Libraries);
    }

    public function loadLibraries($ConfigLibraries){
        $DefLib = ['Debug','UnitTest'];
        $Libraries = [];

        if($ConfigLibraries){
            foreach($ConfigLibraries as $row){
                array_push($Libraries, $row);
            }
        }

        $Libraries = array_merge($Libraries,$DefLib);

        $HelperDir = scandir(ROOT.DS.'Application'.DS.'Libraries');
        unset($HelperDir[0],$HelperDir[1]);
        if($HelperDir){
            foreach($HelperDir as $row){
                if(strpos($row, '.php')){
                    $row = str_replace(".php","",$row);
                    if(in_array($row,$Libraries)){
                        include_once ROOT.DS.'Application'.DS.'Libraries'.DS.$row.'.php';
                    }
                }
            }
        }
    }
}