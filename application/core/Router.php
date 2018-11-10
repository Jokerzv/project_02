<?php

namespace application\core;

use application\core\View;

class Router {

    protected $routes = [];
    protected $params = [];

    public function __construct() {
        require 'application/config/routes.php';

        $id_news = trim($_SERVER['REQUEST_URI'], 'news/');
        $id_page_news = trim($_SERVER['REQUEST_URI'], 'news-settings/');
        $id_edit_news = trim($_SERVER['REQUEST_URI'], 'news-settings/edit/');

        //debug($id_edit_news);
        if($_SERVER['REQUEST_URI'] == "/"){
            $id_news = 0;
        }else if($_SERVER['REQUEST_URI'] == "/news-settings"){
            $id_news = 0;

        }else if($_SERVER['REQUEST_URI'] == "/news"){
            $id_news = 0;

        }else if($_SERVER['REQUEST_URI'] == "/slider-settings"){
            $id_news = 0;

        }else{

            $id_news = trim($_SERVER['REQUEST_URI'], 'news-settings/editslider');
            //debug($id_news);
        }

        foreach (routes($id_news) as $key => $val) {
            $this->add($key, $val);
        }
    }

    public function add($route, $params) {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
        //debug($params);
    }

    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                //debug($params);
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run(){
        if ($this->match()) {
            $path = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'].'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);

                    if(empty($this->params['id'])){
                        $id_news = 1;
                    }else{
                        $id_news = intval($this->params['id']);
                    }

                    if(!is_int($id_news) && empty($id_news)){
                        $id_news = 1;
                    }

                    $controller->$action($id_news);
                } else {
                    View::errorCode(404);
                }
            } else {

                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }

}