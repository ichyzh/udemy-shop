<?php

namespace application\controllers;
use ishop\base\Controller;

class AppController extends Controller
{
    public function __construct($route) {
        parent::__construct($route);
        new \application\models\AppModel;
    }
}