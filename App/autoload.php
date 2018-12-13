<?php

function __autoload ($class)
{
    $auto_folders = [ '/Component/', '/Controller/' ];

    foreach ($auto_folders as $auto_folder) {

        $path = __DIR__ . $auto_folder . str_replace('\\', '/', $class) . '.php';

        if (is_file($path)) {

            require_once ($path);
            break;
        }
    }

}