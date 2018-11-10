<?php

namespace application\models;

use application\core\Model;

class Settings extends Model {

	public function getListNews($page_num) {
        $num = 10;

        if(!empty($page_num) && $page_num != 0) {
            $page = $page_num;
        }else{
            $page = 1;
        }

        $posts = $this->db->count("SELECT COUNT(*) FROM `news`");

        $total = intval(($posts - 1) / $num) + 1;
        $page = intval($page);
        if(empty($page) or $page < 0) $page = 1;
        if($page > $total) $page = $total;

        if(empty($total)){
            $start = $page * $num;
        } else {
            $start = $page * $num - $num;
        }

        $result = $this->db->row('SELECT * FROM news ORDER BY id DESC LIMIT '.$start.', '.$num);
		return $result;
	}

    public function getPagesNews($page_num) {
        $num = 10;

        if(!empty($page_num) && $page_num != 0) {
            $page = $page_num;
        }else{
            $page = 1;
        }

        $posts = $this->db->count("SELECT COUNT(*) FROM `news`");

        $total = intval(($posts - 1) / $num) + 1;
        $page = intval($page);
        if(empty($page) or $page < 0) $page = 1;
        if($page > $total) $page = $total;


        // Проверяем нужны ли стрелки назад
        //if ($page != 1) $pervpage = '<input type="submit" name="page" value="'. ($page - 1) .'" />';
        // Проверяем нужны ли стрелки вперед
        //if ($page != $total) $nextpage = '<input type="submit" name="page" value="'. ($page + 1) .'" />';

        // Находим две ближайшие станицы с обоих краев, если они есть
        if($page - 2 > 0) {$page2left = '<a href ="/news-settings/'. ($page - 2) .'">'. ($page - 2) .'</a> '; }else {$page2left = "";}
        if($page - 1 > 0) {$page1left = '<a href ="/news-settings/'. ($page - 1) .'">'. ($page - 1) .'</a> '; }else {$page1left = "";}
        if($page + 2 <= $total) {$page2right = '<a href ="/news-settings/'. ($page + 2) .'">'. ($page + 2) .'</a> '; }else {$page2right = "";}
        if($page + 1 <= $total) {$page1right = '<a href ="/news-settings/'. ($page + 1) .'">'. ($page + 1) .'</a> '; }else{ $page1right = "";}
        if($total > 1) {
            $result = [$page2left . $page1left . '<a href ="/news-settings/'. $page .'">' . $page . '</a> ' . $page1right . $page2right];
        }else{
            $result = [];
        }
        return $result;
    }

    public function addNews($title, $desc, $img)
    {
        $result = $this->db->escape($title, $desc, $img);
        return $result;
    }

    public function getEditNews($id, $title, $desc, $img)
    {
        $result = $this->db->updateNews($id, $title, $desc, $img);
        return $result;
    }

    public function delNews($id)
    {
        $result = $this->db->deleteNews($id);
        return $result;
    }

    public function editNews($id)
    {
        $result = $this->db->row('SELECT * FROM news WHERE id = '.$id.' LIMIT 1');
        return $result;
    }

// SLIDER

    public function getListSlider($page_num) {
        $num = 10;

        if(!empty($page_num) && $page_num != 0) {
            $page = $page_num;
        }else{
            $page = 1;
        }

        $posts = $this->db->count("SELECT COUNT(*) FROM `slide`");

        $total = intval(($posts - 1) / $num) + 1;
        $page = intval($page);
        if(empty($page) or $page < 0) $page = 1;
        if($page > $total) $page = $total;

        if(empty($total)){
            $start = $page * $num;
        } else {
            $start = $page * $num - $num;
        }

        $result = $this->db->row('SELECT * FROM slide ORDER BY id DESC LIMIT '.$start.', '.$num);
        return $result;
    }

    public function getPagesSlider($page_num) {
        $num = 10;

        if(!empty($page_num) && $page_num != 0) {
            $page = $page_num;
        }else{
            $page = 1;
        }

        $posts = $this->db->count("SELECT COUNT(*) FROM `slide`");

        $total = intval(($posts - 1) / $num) + 1;
        $page = intval($page);
        if(empty($page) or $page < 0) $page = 1;
        if($page > $total) $page = $total;


        // Проверяем нужны ли стрелки назад
        //if ($page != 1) $pervpage = '<input type="submit" name="page" value="'. ($page - 1) .'" />';
        // Проверяем нужны ли стрелки вперед
        //if ($page != $total) $nextpage = '<input type="submit" name="page" value="'. ($page + 1) .'" />';

        // Находим две ближайшие станицы с обоих краев, если они есть
        if($page - 2 > 0) {$page2left = '<a href ="/news-settings/'. ($page - 2) .'">'. ($page - 2) .'</a> '; }else {$page2left = "";}
        if($page - 1 > 0) {$page1left = '<a href ="/news-settings/'. ($page - 1) .'">'. ($page - 1) .'</a> '; }else {$page1left = "";}
        if($page + 2 <= $total) {$page2right = '<a href ="/news-settings/'. ($page + 2) .'">'. ($page + 2) .'</a> '; }else {$page2right = "";}
        if($page + 1 <= $total) {$page1right = '<a href ="/news-settings/'. ($page + 1) .'">'. ($page + 1) .'</a> '; }else{ $page1right = "";}
        if($total > 1) {
            $result = [$page2left . $page1left . '<a href ="/news-settings/'. $page .'">' . $page . '</a> ' . $page1right . $page2right];
        }else{
            $result = [];
        }
        return $result;
    }


    public function addSlider($title, $img, $link)
    {
        $result = $this->db->addNewImg($title, $img, $link);
        return $result;
    }

    public function getEditSlider($id, $title, $link, $img)
    {
        $result = $this->db->updateSlider($id, $title, $link, $img);
        return $result;
    }

    public function delImg($id)
    {
        $result = $this->db->deleteImg($id);
        return $result;
    }

    public function edittSlider($id)
    {
        $result = $this->db->row('SELECT id, title, img, link FROM slide WHERE id = '.$id.' LIMIT 1');
        return $result;
    }
}