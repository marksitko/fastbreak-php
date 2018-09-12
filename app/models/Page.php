<?php
namespace Fastbreak\models;

use Fastbreak\libraries\Database;

class Page  {

	private $db;

	public function __construct() {
		$this->db = Database::instance();
	}

	public function getUseres() {
		$this->db->query('SELECT * FROM users');
		return $this->db->results();
	}

}