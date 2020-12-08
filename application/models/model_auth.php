<?php 

	class Model_auth extends CI_Model
	{
		public function cek_login()
		{
			$email = set_value('email');
			$password = set_value('password');

			$result = $this->db->where('email', $email)
							   ->where('password', $password)
							   //utk membuat login aktif dg nilai 1
							   // ->where('is_active', 1)
							   ->limit(1)
							   ->get('tb_user');
			if ($result->num_rows() > 0) {
				return $result->row();							
		  } else{
		  	   return array();
		  }					   
		}

		public function cek_customer()
		{
			$email = set_value('email');
			// $password = set_value('password');

			$result = $this->db->where('email', $email)
							   // ->where('password', $password)
							   //utk membuat login aktif dg nilai 1
							   // ->where('is_active', 1)
							   ->limit(1)
							   ->get('tb_customer');
			if ($result->num_rows() > 0) {
				return $result->row();							
		  } else{
		  	   return array();
		  }					   
		}

		public function data_level_1($email)
		{
			$this->db->select('*');
			$this->db->from('tb_admin');
			$this->db->where('email', $email);
			$get = $this->db->get();
			return $get->result();
		}

		public function data_level_2($email)
		{
			$this->db->select('*');
			$this->db->from('tb_jasa');
			$this->db->where('email', $email);
			$get = $this->db->get();
			return $get->result();
		}	

		public function data_level_3($email)
		{
			$this->db->select('*');
			$this->db->from('tb_customer');
			$this->db->where('email', $email);
			$get = $this->db->get();
			return $get->result();
		}	
	}
 ?>