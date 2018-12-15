<?php

class DefaultModel
{
    private $model_data;
    private $envirement_vars;


    /**
     * @return array
     */
    public function getModelData()
    {
        return $this->model_data;
    }


    public function __construct () {

        $this->model_data = [];
        $this->envirement_vars[] = ['{{domain}}', $_SERVER['HTTP_HOST']];
        $this->envirement_vars[] = ['{{site_url}}', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/'];
        $this->envirement_vars[] = ['{{page_url}}', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']];
    }


    public function processTemplates ($page) {

        foreach ($this->envirement_vars as $from_to) $page = str_replace($from_to[0], $from_to[1], $page);
        return $page;

    }
}