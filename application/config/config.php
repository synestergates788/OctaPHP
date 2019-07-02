<?php
/*set your base url here*/
$squeed_config['base_url'] = 'http://'.$_SERVER['SERVER_NAME'].DS.'your_project_root_directory';

/*set your custom 404 landing page here*/
/*example: $error_404 = ROOT.DS.'application'.DS.'views'.DS.'error_page'.DS.'error_404.php'*/
$squeed_config['error_404'] = '';

/*set your default controller here*/
$default_controller = [
    "DIRECTORY" => ROOT.DS.'application'.DS.'controllers',
    "CONTROLLER" => 'octaController',
];

$squeed_config['session'] = true;

$squeed_config['encrypt'] = false;