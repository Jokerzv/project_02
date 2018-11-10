<?php

namespace application\models;

use application\core\Model;

class Show extends Model {

	public function getNews() {
		$result = $this->db->row('SELECT * FROM news');
		return $result;
	}

}