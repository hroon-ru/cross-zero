<?php

require_once (__DIR__ . '/App/autoload.php');

$route = new Router(filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_STRING));
$controller = $route->getController();
$result = $controller->execute();

?>
