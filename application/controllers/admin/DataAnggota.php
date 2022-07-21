<?php

/**
 * 
 */
class DataAnggota extends CI_Controller 
{
//----------------------------SYARAT LOGIN-----------------------
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
	}//----------------------------AKHIR SYARAT LOGIN-----------------------


	public function index()
	{
		$data['tittle'] = "Data Anggota";
		$data['anggota'] = $this->Anggota->get_data('anggota')->result();
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_admin/sidebar');
		$this->load->view('admin/dataanggota', $data);
		$this->load->view('templet_admin/footer');
	}

	public function tambah_data()
	{
		$model = $this->Anggota->nak();
		$nak = (int) substr($model, 4, 3);
		$urutan = $nak+1;
		$data = array('nak' => $urutan);
		$data['tittle'] = "Tambah Data Anggota";
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_admin/sidebar');
		$this->load->view('admin/tambahdataanggota', $data);
		$this->load->view('templet_admin/footer');
	}

	public function update_anggota($id)
	{
		$sql = array('NIK' => $id);
		$data['anggota'] = $this->db->query("SELECT * FROM anggota WHERE NIK='$id'")->result();
		$data['tittle'] = "Edit Data Anggota";
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_admin/sidebar');
		$this->load->view('admin/updatedataanggota', $data);
		$this->load->view('templet_admin/footer');
	}

	
//----------------------------PROSES QUERY----------------------------
	public function proses_tambah_data()
	{
		$NIK = $this->input->post('NIK');
		$nak = $this->input->post('nak');
		$nama = $this->input->post('nama');
		$tgl_lahir = $this->input->post('tgl_lahir');
	 	$JK = $this->input->post('JK');
	 	$alamat = $this->input->post('alamat');
	 	$jabatan = $this->input->post('jabatan');
	 	$dana_kematian = $this->input->post('dana_kematian');
	 	$simpanan_wajib = $this->input->post('simpanan_wajib');
	 	$simpanan_pokok = $this->input->post('simpanan_pokok');

	    
	    $sql = array('NIK' =>$NIK , 'nak' =>$nak, 'nama' =>$nama, 'tgl_lahir' =>$tgl_lahir, 'JK' =>$JK, 'alamat' =>$alamat, 'jabatan' =>$jabatan, 'dana_kematian' =>$dana_kematian, 'simpanan_wajib' =>$simpanan_wajib, 
	    	'simpanan_pokok' =>$simpanan_pokok);
	    $this->Anggota->input_anggota($sql, 'anggota');
	    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Ditambahkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
	    redirect('admin/DataAnggota');
	}

	public function proses_update_data()
	{
		$NIK = $this->input->post('NIK');
		$nak = $this->input->post('nak');
		$nama = $this->input->post('nama');
		$tgl_lahir = $this->input->post('tgl_lahir');
	 	$JK = $this->input->post('JK');
	 	$alamat = $this->input->post('alamat');
	 	$jabatan = $this->input->post('jabatan');

	 	$data = array('nak' => $nak, 'nama' => $nama, 'tgl_lahir' => $tgl_lahir, 'JK' => $JK, 'alamat' => $alamat, 'jabatan' => $jabatan,);
	 	$sql = array('NIK' => $NIK);
	 	$this->Anggota->update_anggota('anggota', $data, $sql);
	 	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Di-update!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
	 	redirect('admin/DataAnggota');
	}

	public function hapus_anggota($id)
	{
		$sql = array('NIK' => $id);
		$this->Anggota->hapus_data_anggota($sql, 'anggota');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Terhapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
		redirect('admin/DataAnggota');
	}
}