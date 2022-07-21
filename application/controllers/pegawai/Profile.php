<?php

class Profile extends CI_Controller
{
	//----------------------------SYARAT LOGIN-----------------------
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('akses') !='2')
		{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                LOGIN DULU !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
              </div>');
			redirect('Welcome');
		}
	}//----------------------------AKHIR SYARAT LOGIN-----------------------

	public function index()
	{
		$data['tittle'] = "Profile";
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_pegawai/sidebar');
		$this->load->view('pegawai/profile', $data);
		$this->load->view('templet_admin/footer');
	}
}