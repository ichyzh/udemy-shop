<?php

namespace application\controllers;
use ishop\base\Controller;
use application\models\AppModel;
use application\widgets\currency\Currency;
use ishop\App;
use ishop\Cache;

class AppController extends Controller
{
    public function __construct($route) {
        parent::__construct($route);
        new AppModel;
        App::$app->setProperty('currencies', Currency::getCurrencies());
        App::$app->setProperty('currency', Currency::getCurrency(App::$app->getProperty('currencies')));
        App::$app->setProperty('cats', self::cacheCategory());

    }

    public static function cacheCategory() {
        $cache = Cache::instance();
        $cats = $cache->get('cats');
        if (!$cats) {
            $cats = \R::getAssoc("SELECT * FROM category");
            $cache->set('cats', $cats);
        }
        return $cats;
    }
}