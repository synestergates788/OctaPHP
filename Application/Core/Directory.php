<?php
$Directory = [
    "APP"=> ROOT . DS . 'Application' . DS,
];

$ApplicationDir = scandir(ROOT . DS . 'Application');
unset($ApplicationDir[0], $ApplicationDir[1], $ApplicationDir[2], $ApplicationDir[3]);
if($ApplicationDir){
    foreach($ApplicationDir as $KeyDir => $AppDir){
        if(!strpos($AppDir, '.php')){
            $Directory[strtoupper($AppDir)] = ROOT . DS . 'Application' . DS . $AppDir . DS;
        }
    }
}

if($ApplicationDir){
    foreach($ApplicationDir as $KeyDir=>$AppDir){
        if($AppDir == "Controllers"){
            $ControllerDir = scandir(ROOT . DS . 'Application' . DS . 'Controllers');
            unset($ControllerDir[0], $ControllerDir[1]);
            if($ControllerDir) {
                foreach($ControllerDir as $KeyC => $RowC) {
                    if(!strpos($RowC, '.php')) {
                        $Directory[strtoupper($RowC)] = ROOT . DS . 'Application' . DS . 'Controllers' . DS . $RowC . DS;
                    }
                }
            }
        }
    }
}