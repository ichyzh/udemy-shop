<?php

namespace application\controllers;

use ishop\Cache;

class MainController extends AppController
{
    public function indexAction() {
        $posts = \R::findAll('test');
        $posts = \R::findOne('test', 'id = ?', [2]);
        $this->setMeta('Main Page', 'Description...', 'key');
        $name = 'John';
        $age = 30;
        $names = ['Andrey', 'Jane', 'Mike'];
        $cache = Cache::instance();
        // $cache->set('test', $names);
        // $cache->delete('test');
        $data = Cache::get('test');
        if (!$data) {
            $cache->set('test', $names);
        }
        debug($data);
        $this->set(compact('name', 'age', 'names', 'posts'));
    }
}