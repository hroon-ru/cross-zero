<?php

class DefaultController
{
    private $params;

    public function __construct($params) {

        $this->params = $params;
    }

    public function execute () {

        $view = new DefaultView(['header.html', 'default.html', 'footer.html']);
        $view->updateView();
        $view->applyView();
    }
}