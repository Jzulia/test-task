<?php

require_once('models/User.php');
require_once('models/Territory.php');
require_once('connection.php');
require_once('routes.php');
require_once('Router.php');

Router::route($routes);

