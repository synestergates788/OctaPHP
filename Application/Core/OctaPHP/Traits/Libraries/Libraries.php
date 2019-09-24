<?php
namespace OctaPHP\Traits\Libraries;

/**
 * initializing third-party libraries.
 * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
 */

trait Libraries{

    protected $classFile;

    public function __construct($Libraries){
        $this->loadLibraries($Libraries);
    }

    public function loadLibraries($ConfigLibraries){
        $DefLib = [];
        $Libraries = [];

        if($ConfigLibraries){
            foreach($ConfigLibraries as $row){
                array_push($Libraries, $row);
            }
        }

        $Libraries = array_merge($Libraries,$DefLib);

        $LibrariesDir = scandir(ROOT.DS.'Application'.DS.'Libraries');
        unset($LibrariesDir[0],$LibrariesDir[1]);
        if($LibrariesDir){

            foreach($LibrariesDir as $row){
                if(strpos($row, '.php')){
                    $classFile = str_replace(".php","",$row);
                    if(in_array($classFile,$Libraries)){
                        include_once ROOT.DS.'Application'.DS.'Libraries'.DS.$classFile.'.php';
                        $this->$classFile = new $classFile;
                    }
                }
            }
        }
    }
}