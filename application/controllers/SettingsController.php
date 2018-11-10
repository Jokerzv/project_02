<?php

namespace application\controllers;

use application\core\Controller;

class SettingsController extends Controller {


	public function newsAction($id) {

        if(isset($_POST["page"])) {
            $ListNews = $this->model->getListNews(intval($_POST["page"]));
            $PagesNews = $this->model->getPagesNews(intval($_POST["page"]));

            $vars = [
                'news' => $ListNews,
                'pages' => $PagesNews,
            ];
            $this->view->Loadrender($vars);
        }elseif(isset($_POST["add_news"])) {

            if(isset($_POST["add_img"])){
                if (empty($_FILES['img']) || $_FILES['img']['size'] > 500 * 1024) {
                    echo '<div style="padding: 5px; background: #E42125; color: #fff; font-size: 14px;">';
                    echo "Объем файла превышает 500 килобайт или файл не удалось принять!";
                    echo '</div><br />';
                    return;

                } elseif (is_uploaded_file($_FILES['img']['tmp_name'])) {

                    $imginfo = getimagesize(realpath($_FILES['img']['tmp_name']));
                    if ($imginfo[2] == '1' || $imginfo[2] == '2' || $imginfo[2] == '3') {

                        //$ext = array_pop(explode('.', $_FILES['img']['name'])); // расширение
                        $temp1 = explode('.', $_FILES['img']['name']);
                        $ext = array_pop($temp1);
                        $new_name = time() . '.' . $ext; // новое имя с расширением
                        $full_path = $_SERVER['DOCUMENT_ROOT'] . '/public/imgnews/' . $new_name; // полный путь с новым именем и расширением

                        if ($_FILES['img']['error'] == 0) {
                            if (move_uploaded_file($_FILES['img']['tmp_name'], $full_path)) {
                                $img_link = '/public/imgnews/' . $new_name;
                            }else{
                                echo '<div style="padding: 5px; background: #E42125; color: #fff; font-size: 14px;">';
                                echo "Ошибка изображения!";
                                echo '</div><br />';
                                return;
                            }
                        }else{
                            echo '<div style="padding: 5px; background: #E42125; color: #fff; font-size: 14px;">';
                            echo "Ошибка изображения!";
                            echo '</div><br />';
                            return;
                        }

                    }
                }
            }else{
                $img_link = "";
            }
            $this->model->addNews($_POST["title"], $_POST["desc"], $img_link);

            $ListNews = $this->model->getListNews(0);
            $PagesNews = $this->model->getPagesNews(0);
            $vars = [
                'news' => $ListNews,
                'pages' => $PagesNews,
            ];
            $this->view->Loadrender($vars);
        }elseif(isset($_POST["id_news"])) {

            $this->model->delNews(intval($_POST["id_news"]));

            $ListNews = $this->model->getListNews(0);
            $PagesNews = $this->model->getPagesNews(0);
            $vars = [
                'news' => $ListNews,
                'pages' => $PagesNews,
            ];
            $this->view->Loadrender($vars);
        }else{
            $ListNews = $this->model->getListNews($id);
            $PagesNews = $this->model->getPagesNews($id);

            $vars = [
                'news' => $ListNews,
                'pages' => $PagesNews,
            ];

            $this->view->render('Список новостей', $vars);
        }


//	    if(!empty($_POST)){
//            $this->view->message('error','Новости');
//        }

	}

    public function editAction($id) {
        if(isset($_POST["edit_news"])) {

            if(isset($_POST["add_img"])){
                if (empty($_FILES['img']) || $_FILES['img']['size'] > 500 * 1024) {
                    echo '<div style="padding: 5px; background: #E42125; color: #fff; font-size: 14px;">';
                    echo "Объем файла превышает 500 килобайт или файл не удалось принять!";
                    echo '</div><br />';
                    return;

                } elseif (is_uploaded_file($_FILES['img']['tmp_name'])) {

                    $imginfo = getimagesize(realpath($_FILES['img']['tmp_name']));
                    if ($imginfo[2] == '1' || $imginfo[2] == '2' || $imginfo[2] == '3') {

                        //$ext = array_pop(explode('.', $_FILES['img']['name'])); // расширение
                        $temp1 = explode('.', $_FILES['img']['name']);
                        $ext = array_pop($temp1);
                        $new_name = time() . '.' . $ext; // новое имя с расширением
                        $full_path = $_SERVER['DOCUMENT_ROOT'] . '/public/imgnews/' . $new_name; // полный путь с новым именем и расширением

                        if ($_FILES['img']['error'] == 0) {
                            if (move_uploaded_file($_FILES['img']['tmp_name'], $full_path)) {
                                $img_link = '/public/imgnews/' . $new_name;
                                unlink($_SERVER['DOCUMENT_ROOT'] . $_POST["del_img_now"]);
                            }else{
                                echo '<div style="padding: 5px; background: #E42125; color: #fff; font-size: 14px;">';
                                echo "Ошибка изображения!";
                                echo '</div><br />';
                                return;
                            }
                        }else{
                            echo '<div style="padding: 5px; background: #E42125; color: #fff; font-size: 14px;">';
                            echo "Ошибка изображения!";
                            echo '</div><br />';
                            return;
                        }

                    }
                }
            }else{
                $img_link = "";
            }

            $this->model->getEditNews(intval($id), $_POST["title"], $_POST["desc"], $img_link);

            $ListNews = $this->model->getListNews(0);
            $PagesNews = $this->model->getPagesNews(0);
            $vars = [
                'news' => $ListNews,
                'pages' => $PagesNews,
            ];
            $this->view->Loadrender($vars);
        }

        $EditNews = $this->model->editNews(intval($id));
        $vars = [
            'edit' => $EditNews,
        ];
        $this->view->EditNewsrender('Редактирование новости', $vars);
    }



    public function sliderAction($id) {

        if(isset($_POST["page"])) {
            $ListNews = $this->model->getListNews(intval($_POST["page"]));
            $PagesNews = $this->model->getPagesNews(intval($_POST["page"]));

            $vars = [
                'news' => $ListNews,
                'pages' => $PagesNews,
            ];
            $this->view->Loadrender($vars);
        }elseif(isset($_POST["add_slider"])) {

            if (empty($_FILES['img']) || $_FILES['img']['size'] > 500 * 1024) {
                echo '<div style="padding: 5px; background: #E42125; color: #fff; font-size: 14px;">';
                echo "Объем файла превышает 500 килобайт или файл не удалось принять!";
                echo '</div><br />';
                return;

            } elseif (is_uploaded_file($_FILES['img']['tmp_name'])) {

                $imginfo = getimagesize(realpath($_FILES['img']['tmp_name']));
                if ($imginfo[2] == '1' || $imginfo[2] == '2' || $imginfo[2] == '3') {

                    //$ext = array_pop(explode('.', $_FILES['img']['name'])); // расширение
                    $temp1 = explode('.', $_FILES['img']['name']);
                    $ext = array_pop($temp1);
                    $new_name = time() . '.' . $ext; // новое имя с расширением
                    $full_path = $_SERVER['DOCUMENT_ROOT'] . '/public/slider/' . $new_name; // полный путь с новым именем и расширением
                    $img_link = '/public/slider/' . $new_name;
                    if ($_FILES['img']['error'] == 0) {
                        if (move_uploaded_file($_FILES['img']['tmp_name'], $full_path)) {
                            $this->model->addSlider($_POST["title"], $img_link, $_POST["link"]);
                        }
                    }

                }
            }



            $ListNews = $this->model->getListSlider(0);
            $PagesNews = $this->model->getPagesSlider(0);
            $vars = [
                'news' => $ListNews,
                'pages' => $PagesNews,
            ];
            $this->view->LoadSlider($vars);
        }elseif(isset($_POST["id_img"])) {

            $this->model->delImg(intval($_POST["id_img"]));

            $ListNews = $this->model->getListSlider(0);
            $PagesNews = $this->model->getPagesSlider(0);
            $vars = [
                'news' => $ListNews,
                'pages' => $PagesNews,
            ];
            $this->view->LoadSlider($vars);
        }else{

            $ListNews = $this->model->getListSlider($id);
            $PagesNews = $this->model->getPagesSlider($id);

            $vars = [
                'news' => $ListNews,
                'pages' => $PagesNews,
            ];

            $this->view->render('Настройки слайдера', $vars);
        }


//	    if(!empty($_POST)){
//            $this->view->message('error','Новости');
//        }

    }

    public function edittAction($id) {
        if(isset($_POST["edit_slider"])) {
            if(isset($_POST["add_img"])) {
                if (empty($_FILES['img']) || $_FILES['img']['size'] > 500 * 1024) {
                    echo '<div style="padding: 5px; background: #E42125; color: #fff; font-size: 14px;">';
                    echo "Объем файла превышает 500 килобайт или файл не удалось принять!";
                    echo '</div><br />';
                    return;

                } elseif (is_uploaded_file($_FILES['img']['tmp_name'])) {

                    $imginfo = getimagesize(realpath($_FILES['img']['tmp_name']));
                    if ($imginfo[2] == '1' || $imginfo[2] == '2' || $imginfo[2] == '3') {

                        //$ext = array_pop(explode('.', $_FILES['img']['name'])); // расширение
                        $temp1 = explode('.', $_FILES['img']['name']);
                        $ext = array_pop($temp1);
                        $new_name = time() . '.' . $ext; // новое имя с расширением
                        $full_path = $_SERVER['DOCUMENT_ROOT'] . '/public/slider/' . $new_name; // полный путь с новым именем и расширением
                        $img_link = '/public/slider/' . $new_name;
                        if ($_FILES['img']['error'] == 0) {
                            if (move_uploaded_file($_FILES['img']['tmp_name'], $full_path)) {
                                $img_link = '/public/slider/' . $new_name;
                                unlink($_SERVER['DOCUMENT_ROOT'] . $_POST["del_img_now"]);
                            }
                        }

                    }
                }
            }else{
                $img_link = "";
            }

            $this->model->getEditSlider(intval($id), $_POST["title"], $_POST["link"], $img_link);

            $ListNews = $this->model->getListSlider(0);
            $PagesNews = $this->model->getPagesSlider(0);
            $vars = [
                'news' => $ListNews,
                'pages' => $PagesNews,
            ];
            $this->view->Loadrender($vars);
        }

        $EditNews = $this->model->edittSlider(intval($id));
        $vars = [
            'edit' => $EditNews,
        ];
        $this->view->EditSliderrender('Редактирование новости', $vars);
    }


}