<?php

require_once (__DIR__ . '/App/autoload.php');

$route = new Router();
$controller = $route->getController();
$result = $controller->execute();

?>
