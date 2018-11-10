<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

	public function indexAction() {
		$result = $this->model->getNews();
		$vars = [
			'show' => $result,
		];
		$this->view->render('Новости', $vars);
	}

}