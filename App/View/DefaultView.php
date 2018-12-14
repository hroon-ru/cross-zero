<?php

class DefaultView
{
    private $model_data;
    private $page;

    public function  __construct($model_data) {

        $this->model_data = $model_data;
        $this->page = '';
    }


    public function updateView () {

        foreach ($this->model_data as $template) {
            if (is_file(__DIR__ . '/../Html/' . $template))
                $this->page .= file_get_contents(__DIR__ . '/../Html/' . $template);
        }

    }


    public function applyView () {
        echo $this->page;
    }

}