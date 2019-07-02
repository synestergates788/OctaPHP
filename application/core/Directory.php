<?php
$directory = [
    "APP"=> ROOT.DS.'application'.DS,
];

$application_dir = scandir(ROOT.DS.'application');
unset($application_dir[0],$application_dir[1],$application_dir[2],$application_dir[3]);
if($application_dir){
    foreach($application_dir as $key_dir=>$app_dir){
        if(strpos($app_dir, '.php') == false){
            $directory[strtoupper($app_dir)] = ROOT.DS.'application'.DS.$app_dir.DS;
        }
    }
}

if($application_dir){
    foreach($application_dir as $key_dir=>$app_dir){
        if($app_dir == "controllers"){
            $controller_dir = scandir(ROOT.DS.'application'.DS.'controllers');
            unset($controller_dir[0],$controller_dir[1]);
            if($controller_dir){
                foreach($controller_dir as $key_c=>$row_c){
                    if(strpos($row_c, '.php') == false){
                        $directory[strtoupper($row_c)] = ROOT.DS.'application'.DS.'controllers'.DS.$row_c.DS;
                    }
                }
            }
        }
    }
}