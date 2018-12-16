<?php

class DefaultModel
{
    private $model_data;


    /**
     * @return array
     */
    public function getModelData()
    {
        return $this->model_data;
    }


    public function __construct () {

        $this->model_data = [];
    }

}