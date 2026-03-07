<?php
$path = $_GET['url'] ?? 'cliente/index';
list($controllerName, $method) = explode('/', $path);
$controllerClass = ucfirst($controllerName) . 'Controller';

require_once "controllers/{$controllerClass}.php";
$controller = new $controllerClass();
$controller->$method();
?>