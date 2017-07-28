<?php 
session_start();

use Config\Autoload;
use Config\Request;
use Config\Router;

define('__DS__', DIRECTORY_SEPARATOR);
define('__ROOT__', realpath(dirname(__FILE__)) . __DS__);
define('__ROOT_CONTROLLER__', realpath(dirname(__FILE__)) . __DS__ . 'Controllers' . __DS__);
define('__URL__', '');

include_once(__ROOT__ . 'Config/Autoload.php');
include_once(__ROOT__ . 'vendor/autoload.php');

Autoload::run();
$request = new Request();
new Router($request);
