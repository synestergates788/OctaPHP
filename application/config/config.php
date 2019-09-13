<?php
/*set your base url here*/
$config['base_url'] = 'http://'.$_SERVER['SERVER_NAME'].DS.'your_project_root_directory';

/*set your custom 404 landing page here*/
/*example: $error_404 = ROOT.DS.'application'.DS.'views'.DS.'error_page'.DS.'error_404.php'*/
$config['error_404'] = '';

/*set your default controller here*/

$config['default_controller'] = [
    "directory" => ROOT.DS.'application'.DS.'controllers',
    "controller" => 'octaController',
];

$config['session'] = true;

$config['encrypt'] = false;