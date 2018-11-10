<?php

namespace application\lib;

use PDO;

class Db {

	protected $db;
	
	public function __construct() {
		$config = require 'application/config/db.php';
		$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password']);
	}

	public function query($sql, $params = []) {
		$stmt = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$stmt->bindValue(':'.$key, $val);
			}
		}
		$stmt->execute();
		return $stmt;
	}

	public function row($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

    public function count($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

	public function column($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchColumn();
	}

	public function escape($title, $description, $img){
	    if(!empty($title) && !empty($description)) {
            $stmt = $this->db->prepare("INSERT INTO news (title, description, img, date_add) VALUES (:title, :description, :img, ".time().")");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':img', $img);


            $stmt->execute();
        }
    }

    public function addNewImg($title, $img, $link){
        if(!empty($title) && !empty($img)&& !empty($link)) {
            $stmt = $this->db->prepare("INSERT INTO slide (title, img, link, date_add) VALUES (:title, :img, :link, ".time().")");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':img', $img);
            $stmt->bindParam(':link', $link);


            $stmt->execute();
        }
    }

    public function deleteNews($id){

        $stmt = $this->db->prepare("DELETE FROM news WHERE id = '$id' LIMIT 1");
        $stmt->execute();

    }

    public function deleteImg($id){

        $stmt = $this->db->prepare("DELETE FROM slide WHERE id = '$id' LIMIT 1");
        $stmt->execute();

    }

    public function updateNews($id, $title, $description, $img){

        if(!empty($title) && !empty($description)) {
            if(empty($img)) {
                $stmt = $this->db->prepare("UPDATE news SET title =:title, description = :description WHERE id = '$id' LIMIT 1");
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':description', $description);
            }else{
                $stmt = $this->db->prepare("UPDATE news SET title =:title, description = :description, img = :img WHERE id = '$id' LIMIT 1");
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':img', $img);
            }



            $stmt->execute();
        }
    }

    public function updateSlider($id, $title, $link, $img){

        if(!empty($title) && !empty($link)) {
            if(empty($img)) {
                $stmt = $this->db->prepare("UPDATE slide SET title =:title, link = :link WHERE id = '$id' LIMIT 1");
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':link', $link);
            }else{
                $stmt = $this->db->prepare("UPDATE slide SET title =:title, link = :link, img = :img WHERE id = '$id' LIMIT 1");
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':link', $link);
                $stmt->bindParam(':img', $img);
            }



            $stmt->execute();
        }
    }


}