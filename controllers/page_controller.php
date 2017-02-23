<?php

class PageController {

    public function index() {

        $view = 'main';

        $territory = new Territory();

        $territories = $territory->selectTerritory(1);

        require_once('views/layout.php');
    }

}
