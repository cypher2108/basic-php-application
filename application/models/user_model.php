<?php

class User_model extends CI_Model
{
	function create($formArray){
		$this->db->insert('users', $formArray); //INSERT INTO users (name, email) values (?, ?);
	}

	function all(){
		return $users = $this->db->get('users')->result_array(); //SELECT * FROM USERS;
	}

	function get_user($userId){
		$this->db->where('user_id', $userId);
		return $user = $this->db->get('users')->row_array();
	}

	function updateUser($userId, $formArray){
		$this->db->where('user_id', $userId);
		$this->db->update('users', $formArray); //UPDATE USERS SET NAME = ?, EMAIL = ? WHERE USER_ID = ?

	}
}
?>
