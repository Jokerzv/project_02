<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

	public function indexAction($id) {

        if(!empty($id)) {
            $getNews = $this->model->getNews(intval($id));
            $PagesNews = $this->model->getPagesNews(intval($id));
            $img = $this->model->getImgs(0);
            $vars = [
                'news' => $getNews,
                'pages' => $PagesNews,
                'img' => $img,
            ];
            $this->view->render('Новости', $vars);
        }else {

            $result = $this->model->getNews(0);
            $PagesNews = $this->model->getPagesNews(0);
            $img = $this->model->getImgs(0);
            $vars = [
                'news' => $result,
                'pages' => $PagesNews,
                'img' => $img,
            ];
            $this->view->render('Новости', $vars);
        }


	}
    public function showAction($id) {
        //debug($id);
        $id = intval($id);
        $result = $this->model->getShowNews($id);
        $vars = [
            'show' => $result,
        ];
        $this->view->render('Новости', $vars);
    }

}