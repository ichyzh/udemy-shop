<?php

use ishop\App;

require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php';

$app = new App;
debug($app::$app->getProperties());
?>