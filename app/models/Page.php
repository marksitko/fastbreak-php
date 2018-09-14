<?php
namespace Fastbreak\models;

use Fastbreak\libraries\Model;

class Page extends Model 
{

	public function __construct() 
	{
		parent::__construct();
	}

	public function getUseres() 
	{
		$this->db->query('SELECT * FROM users');
		return $this->db->results();
	}

	public function insertPost($data)
	{
		if($this->areAllFieldsFilled($data)) {
			$this->db->query('INSERT INTO posts (user_id, title, body) VALUES (:user_id, :title, :body)');
			$this->db->bind(':user_id', $data['userId']);
			$this->db->bind(':title', $data['title']);
			$this->db->bind(':body', $data['body']);
			if ($this->db->execute()) {
				return true;
			}
		}
		return false;
	}

}