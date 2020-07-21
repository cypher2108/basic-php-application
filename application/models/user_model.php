<?php

class User_model extends CI_Model
{
	function create($formArray){
		$this->db->insert('users', $formArray); //INSERT INTO users (name, email) values (?, ?);
	}

	function all(){
		return $users = $this->db->get('users')->result_array(); //SELECT * FROM USERS;
	}

	function get_user($user_id){
		$this->db->where('user_id', $user_id);
		return $user = $this->db->get('users')->row_array();
	}
}
?>
