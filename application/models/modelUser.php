<?php
	class ModelUser extends CI_Model{
		
		public function check_user($data){
			$this->db->select('id, username, password');
			$this->db->from('users');
			$this->db->where('username', $data['username']);
			$this->db->where('password', $data['password']);
			
			$query = $this->db->get();
			if($query->num_rows() == 1)
				return $query->result();
			else
				return false;
		}
		
		public function insert_user($data){
			$db_data = array(
				'username' => $data['username'],
				'password' => $data['password'],
				'email' => $data['email']
			);
		
			if($this->db->insert('users', $data)){
				return true;
			} else
				return false;
		}
	}
?>