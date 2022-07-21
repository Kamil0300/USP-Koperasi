<?php

class DataSimpanan extends CI_Controller
{
//-----------------------------SYARAT LOGIN------------------------
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('akses') !='1')
		{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                LOGIN DULU !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
              </div>');
			redirect('Welcome');
		}
	}//-----------------------------AKHIR SYARAT LOGIN------------------------


	
	public function index()
	{
		$data['tittle'] = "Daftar Anggota";
		$data['anggota'] = $this->SimpananModel->get_data_anggota('anggota')->result();
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_admin/sidebar');
		$this->load->view('admin/simpanan', $data);
		$this->load->view('templet_admin/footer');
	}
	/*public function tambah_datapk($id)
	{
		$data['tittle'] = "Tambah Simpanan Pokok";
		$data['anggota'] = $this->db->query("SELECT * FROM anggota WHERE nak='$id'")->result();
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_admin/sidebar');
		$this->load->view('admin/tambahdatapk', $data);
		$this->load->view('templet_admin/footer');
	}
	public function update_datapk($id)
	{
		$sql = array('nak' => $id);
		$data['pokok'] = $this->db->query("SELECT * FROM simpanan_pk WHERE nak='$id'")->result();
		$data['tittle'] = "Edit Data Anggota";
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_admin/sidebar');
		$this->load->view('admin/updatedatapk', $data);
		$this->load->view('templet_admin/footer');
	}
	public function simpananpk()
	{
		$data['tittle'] = "Simpanan Pokok";
		$data['pokok'] = $this->db->query("SELECT * FROM anggota, simpanan_pk WHERE anggota.NIK = simpanan_pk.NIK")->result();
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_admin/sidebar');
		$this->load->view('admin/daftarsimpananpk', $data);
		$this->load->view('templet_admin/footer');
	}
	public function hapus_simpananpk($id)
	{
		$sql = array('id_pk' => $id);
		$this->SimpananModel->hapus_data_simpananpk($sql, 'simpanan_pk');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Transaksi Terhapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
		redirect('admin/DataSimpanan/simpananpk');
	}*/
	//-----------------------------SIMPANAN WAJIB------------------------------
	public function tambah_datawjb($id)
	{
		$data['tittle'] = "Tambah Simpanan Wajib";
		$data['anggota'] = $this->db->query("SELECT * FROM anggota WHERE nak='$id'")->result();
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_admin/sidebar');
		$this->load->view('admin/tambahdatawjb', $data);
		$this->load->view('templet_admin/footer');
	}
	public function simpananwajib()
	{
		$data['tittle'] = "Simpanan Wajib";
		$data['pokok'] = $this->db->query("SELECT * FROM anggota, simpanan_wjb WHERE anggota.nak = simpanan_wjb.nak")->result();
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_admin/sidebar');
		$this->load->view('admin/daftarsimpananwjb', $data);
		$this->load->view('templet_admin/footer');
	}

	//-----------------------------PROSES QUERY------------------------------
	public function proses_insert_simpananwajib()
	{
		$nak = $this->input->post('nak');
	 	$simpanan_wjb = $this->input->post('simpanan_wjb');
	 	$tgl_pembayaran = $this->input->post('tgl_pembayaran');
	    $sql = array('nak' =>$nak , 'simpanan_wjb' =>$simpanan_wjb, 'tgl_pembayaran' =>$tgl_pembayaran);
	    $this->SimpananModel->input_simpananwjb($sql, 'simpanan_wjb');
	    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Transaksi Berhasil Ditambahkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
	    redirect('admin/DataSimpanan/simpananwajib');
	}
	public function hapus_simpananwjb($id)
	{
		$sql = array('id_wjb' => $id);
		$this->SimpananModel->hapus_data_simpananwjb($sql, 'simpanan_wjb');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Transaksi Terhapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
		redirect('admin/DataSimpanan/simpananwajib');
	}
}