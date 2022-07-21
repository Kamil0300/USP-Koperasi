<?php

class Login extends CI_model
{
	public function login()
	{
		$email = set_value('email');
		$password = set_value('password');

		$hasil = $this->db->where('email', $email)
						->where('password', md5($password))
						->limit(1)
						->get('admin');
		if($hasil->num_rows()>0)
		{
			return $hasil->row();
		}else{
			return FALSE;
		}
	}
}