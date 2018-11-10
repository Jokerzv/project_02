<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public function getNews($page_num) {
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
        if($page - 2 > 0) {$page2left = '<div class="page_d"><a class="page_click" href ="/news/'. ($page - 2) .'">'. ($page - 2) .'</a></div> '; }else {$page2left = "";}
        if($page - 1 > 0) {$page1left = '<div class="page_d"><a class="page_click" href ="/news/'. ($page - 1) .'">'. ($page - 1) .'</a></div> '; }else {$page1left = "";}
        if($page + 2 <= $total) {$page2right = '<div class="page_d"><a class="page_click" href ="/news/'. ($page + 2) .'">'. ($page + 2) .'</a></div> '; }else {$page2right = "";}
        if($page + 1 <= $total) {$page1right = '<div class="page_d"><a class="page_click" href ="/news/'. ($page + 1) .'">'. ($page + 1) .'</a></div> '; }else{ $page1right = "";}
        if($total > 1) {
            $result = [$page2left . $page1left . '<div class="page_d"><a class="page_click" href ="/news/'. $page .'">' . $page . '</a></div> ' . $page1right . $page2right];
        }else{
            $result = [];
        }
        return $result;
    }

    public function getImgs() {
        $result = $this->db->row('SELECT * FROM slide LIMIT 3');
        return $result;
    }

    public function getShowNews($id) {
        $result = $this->db->row('SELECT * FROM news WHERE id = '.$id.' LIMIT 1');
        return $result;
    }

}