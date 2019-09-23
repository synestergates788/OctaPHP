<?php
/*set your base url here*/
$config['BaseUrl'] = 'http://'.$_SERVER['SERVER_NAME'].DS.'your_project_root_directory';

/*set your custom 404 landing page here*/
/*example: $error_404 = ROOT.DS.'application'.DS.'views'.DS.'error_page'.DS.'error_404.php'*/
$config['Error404'] = '';

/*set your default controller here*/

$config['DefaultController'] = [
    "Directory" => ROOT.DS.'Application'.DS.'Controllers',
    "Controller" => 'octaController',
];

$config['Session'] = true;

$config['Encrypt'] = false;