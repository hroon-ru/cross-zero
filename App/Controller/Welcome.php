<?php

class Welcome extends DefaultController
{
    /*public function execute () {
        echo 'Welcome !!!';
    }*/


    public function __construct ($params) {

        $this->setParams($params);
        $this->setBody('welcome.html');
    }
}


?>

