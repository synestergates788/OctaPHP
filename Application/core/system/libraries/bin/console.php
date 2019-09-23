#!/usr/bin/env php
<?php
require_once ROOT.DS.'application'.DS.'core'.DS.'system'.DS.'libraries'.DS.'vendor'.DS.'autoload.php';

use Symfony\Component\Console\Application as OctaConsoleApplication;

$app = new OctaConsoleApplication();
$app->run();