<?php

session_start();

spl_autoload_register(function($class) {

    if(strpos($class, 'Controller') !== false) {
        require_once("controllers/{$class}.php");

    } elseif(strpos($class, 'Mapping') !== false) {
        require_once("routes/{$class}.php");

    } else {
        require_once("models/{$class}.php");
    }
    
});

define('PDO_DATA', Sql::pdo());
define('TOP_URL', 'http://'.$_SERVER['HTTP_HOST'].'/php/public/');

$msg = PostMapping::action();
Csrf::token();
