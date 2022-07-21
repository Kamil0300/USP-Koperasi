<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {

	public function index()
	{
		$this->_rules();

		if($this->form_validation->run()==FALSE)
		{
			$data['tittle'] = "Login";
			$this->load->view('templet_admin/header', $data);
			$this->load->view('formlogin');
		}else{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$login = $this->Login->login($email, $password);
			if ($login == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Email atau Password Salah !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
              </div>');
				redirect('Welcome');
			}else{
				$this->session->set_userdata('akses',$login->akses);
				$this->session->set_userdata('nama',$login->nama);
				$this->session->set_userdata('email',$login->email);
				$this->session->set_userdata('password',$login->password);
				$this->session->set_userdata('status',$login->status);
				switch ($login->akses)
				{
					case 1 : redirect('admin/Dashboard');
					break;

					case 2 : redirect('pegawai/Dashboard');
					break;
					default : break;
				}
			}
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Welcome');
	}
}
