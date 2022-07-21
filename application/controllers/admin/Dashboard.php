<?php

/**
 * 
 */
class Dashboard extends CI_Controller 
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
		$data['tittle'] = "Beranda";
		$anggota = $this->db->query("SELECT * FROM anggota");
		$peminjaman = $this->db->query("SELECT * FROM peminjaman");
		$data['peminjaman'] = $peminjaman->num_rows();
		$data['peminjamann'] = $this->db->query("SELECT peminjaman.nak, anggota.NIK, anggota.nama, peminjaman.jumlah_pinjaman, peminjaman.tgl_pinjaman, peminjaman.tenggang_wkt, peminjaman.bayar, peminjaman.total_pinjam, total_peminjaman.jumlah_pinjaman
			FROM peminjaman
			INNER JOIN total_peminjaman ON peminjaman.nak=total_peminjaman.nak
			INNER JOIN anggota ON total_peminjaman.nak=anggota.nak")->result();
		$data['anggota'] = $anggota->num_rows();
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templet_admin/footer');
	}
}