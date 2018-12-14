<?php

class DefaultController
{
    private $params;
    private $body_template;


    public function __construct($params) {

        $this->params = $params;
        $c = get_class($this);
        if ($c === 'DefaultController') $this->body_template = 'default.html';
        else $this->body_template = strtolower($c) . '.html';
    }


    public function setParams($params)
    {
        $this->params = $params;
    }


    public function setBody ($body_template) {

        $this->body_template = $body_template;
    }

    public function execute () {

        if (empty($this->body_template)) {

            $c = get_class($this);
            if ($c === 'DefaultController') $this->body_template = 'default.html';
            else $this->body_template = strtolower($c) . '.html';
        }

        if (!is_file(__DIR__ . '/../Page/' . $this->body_template))
            $this->body_template = 'default.html';

        $view = new DefaultView(['header.html', [$this->body_template], 'footer.html']);
        $view->updateView();
        $view->applyView();
    }
}