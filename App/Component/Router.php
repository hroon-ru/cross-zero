<?php

class Router
{
    private $route;
    private $controller;
    private $params;


    public function __construct ($url) {

        $this->controller = 'DefaultController';
        $this->route = trim($url, '/');
        $this->params = explode( '/', $this->route);
        $this->controller = ucwords($this->params[1]);

        if (!is_file(__DIR__ . '/../Controller/' . $this->controller . '.php')) {
            $this->controller = 'DefaultController';
            $this->params = NULL;
        }
    }


    public function getController () {
        return new $this->controller();
    }


    public function getParams () {
        return $this->params;
    }
}