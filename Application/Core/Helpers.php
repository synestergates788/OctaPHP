<?php
namespace Core;

class Helpers{

    public function __construct($Helpers){
        $this->loadHelpers($Helpers);
    }

    public function loadHelpers($ConfigHelpers){
        $DefHelpers = ['CoreHelper'];
        $Helpers = [];

        if($ConfigHelpers){
            foreach($ConfigHelpers as $row){
                array_push($Helpers, $row);
            }
        }

        $Helpers = array_merge($Helpers,$DefHelpers);

        $HelperDir = scandir(ROOT.DS.'Application'.DS.'Helpers');
        unset($HelperDir[0],$HelperDir[1]);
        if($HelperDir){
            foreach($HelperDir as $row){
                if(strpos($row, '.php')){
                    $row = str_replace(".php","",$row);
                    if(in_array($row,$Helpers)){
                        include_once ROOT.DS.'Application'.DS.'Helpers'.DS.$row.'.php';
                    }
                }
            }
        }
    }
}