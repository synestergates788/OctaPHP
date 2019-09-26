<?php
$RoutesDir = [
    "" => "",
    "/" => "/",
];

$DefControllerDir = scandir(ROOT . DS . 'Application' . DS . 'Controllers');
unset($DefControllerDir[0], $DefControllerDir[1]);

if($DefControllerDir) {
    foreach($DefControllerDir as $key_del=>$row_def) {
        if(!strpos($row_def, '.php')) {
            $def_parent_dir = $row_def;

            $def_controller_file = scandir(ROOT . DS . 'Application' . DS . 'Controllers' . DS . $row_def);
            unset($def_controller_file[0], $def_controller_file[1]);

            if($def_controller_file) {
                foreach($def_controller_file as $key_file => $row_file) {
                    $method = str_replace('.php', '', $row_file);
                    $routes['/' . $row_def . '/' . $method . '-actions/([a-z0-9_-]+)?/([a-z0-9_-]+)?'] = ROOT . DS . 'Application' . DS . 'Controllers' . DS . $row_def . DS . $method;
                }
            }
        }
    }
}

if($routes) {
    foreach($routes as $key_dir=>$row_dir) {
        if($key_dir == "/" || $key_dir == "" || $key_dir == null) {
            $RoutesDir[$key_dir] = $row_dir;
        }else{
            $tmp_method_request = trim($key_dir, "/");
            $method_request = explode('/', $tmp_method_request);
            $this_method_request = '';
            if(isset($method_request[0])) {
                $this_method_request .= '/' . $method_request[0];
            }

            if(isset($method_request[1])) {
                $this_method_request .= '/' . $method_request[1];
            }

            $RoutesDir[$this_method_request] = $row_dir;
        }
    }
}