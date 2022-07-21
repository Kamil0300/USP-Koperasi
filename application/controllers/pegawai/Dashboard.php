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
		$data['tittle'] = "Beranda - pegawai";
		$anggota = $this->db->query("SELECT * FROM anggota");
		$peminjaman = $this->db->query("SELECT * FROM peminjaman");
		$simpananwjb = $this->db->query("SELECT * FROM simpanan_wjb");
		$data['sum'] = $this->db->query("SELECT SUM(simpanan_wjb) AS total FROM simpanan_wjb")->result();
		$data['peminjaman'] = $peminjaman->num_rows();
		$data['peminjamann'] = $this->db->query("SELECT peminjaman.nak, anggota.NIK, anggota.nama, peminjaman.jumlah_pinjaman, peminjaman.tgl_pinjaman, peminjaman.tenggang_wkt, peminjaman.bayar, peminjaman.total_pinjam, total_peminjaman.jumlah_pinjaman
			FROM anggota
			INNER JOIN peminjaman ON anggota.nak=peminjaman.nak
			INNER JOIN total_peminjaman ON peminjaman.id_pinjaman=total_peminjaman.id_pinjaman")->result();
		$data['simpananwjb'] = $simpananwjb->num_rows();
		$data['anggota'] = $anggota->num_rows();
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_pegawai/sidebar');
		$this->load->view('pegawai/dashboard', $data);
		$this->load->view('templet_admin/footer');

	}
}