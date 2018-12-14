<?php

class DefaultController
{
    private $params;
    private $body_template;


    public function __construct($params) {

        $this->params = $params;
        $this->body_template = 'default.html';
    }


    public function setParams($params)
    {
        $this->params = $params;
    }


    public function setBody ($body_template) {

        $this->body_template = $body_template;
    }

    public function execute () {

        $view = new DefaultView(['header.html', [$this->body_template], 'footer.html']);
        $view->updateView();
        $view->applyView();
    }
}