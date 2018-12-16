<?php

class Router
{
    private $url;
    private $route;
    private $request_type;
    private $get_params;
    private $post_params;
    private $https;
    private $controller;


    public function __construct () {

        $this->url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_STRING);
        $this->controller = 'DefaultController';
        $this->route = trim($this->url, '/');
        $this->params = explode( '/', $this->route);
        $this->controller = ucwords($this->params[1]);
        require_once __DIR__ . '/routes.php';
    }


    public function changeRoute($pattern)
    {

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