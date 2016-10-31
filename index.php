<?php 

define('ROOT', dirname(__FILE__));

require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/DB.php');

session_start();

$router = new Router();
$router->run();