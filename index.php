<?php

$route = new Router(filter_var($_SERVER['QUERY_STRING'], FILTER_SANITIZE_STRING));

