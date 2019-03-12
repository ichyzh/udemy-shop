<?php

use ishop\App;

require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php';

$app = new App;

throw new Exception('Page not found', 500);
?>