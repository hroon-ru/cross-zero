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
    }


    public function getController () {

        if (!is_file(__DIR__ . '/../Controller/' . $this->controller . '.php')) {

            $controller = new DefaultController(NULL);
            $controller->setBody($this->controller . '.html');
            $this->controller = 'DefaultController';
            $this->params = NULL;

        } else $controller = new $this->controller($this->params);

        return $controller;
    }


    public function getParams () {
        return $this->params;
    }
}