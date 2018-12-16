<?php

class DefaultView
{
    private $model_data;
    private $page;
    private $envirement_vars;


    public function  __construct($model_data) {

        $this->model_data = $model_data;
        $this->page = '';
        $this->envirement_vars[] = ['{{domain}}', $_SERVER['HTTP_HOST']];
        $this->envirement_vars[] = ['{{site_url}}', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/'];
        $this->envirement_vars[] = ['{{page_url}}', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']];
    }


    public function processTemplates ($page) {

        foreach ($this->envirement_vars as $from_to) $page = str_replace($from_to[0], $from_to[1], $page);
        return $page;

    }


    public function updateView () {

        foreach ($this->model_data as $template) {

            if (is_array($template)) {

                foreach ($template as $templ) {
                    if (is_file(__DIR__ . '/../Page/' . $templ))
                        $this->page .= file_get_contents(__DIR__ . '/../Page/' . $templ);
                }

            } else if (is_file(__DIR__ . '/../Html/' . $template))
                $this->page .= file_get_contents(__DIR__ . '/../Html/' . $template);
        }

        $this->page = $this->processTemplates($this->page);

    }


    public function applyView () {
        echo $this->page;
    }

}