<?php

$routes = [
    "/" => "PageController",
    "/main/" => ['PageController', 'main'],
    "/ajax/" => "AjaxController",
    "/ajax/cities/" => ["AjaxController", "cities"],
    "/ajax/areas/" => ["AjaxController", "areas"],
    "/ajax/saveuser/" => ["AjaxController", "saveUser"],
];

