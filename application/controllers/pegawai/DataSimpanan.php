<?php

class DataSimpanan extends CI_Controller
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
	
	public function simpananpk()
	{
		$data['tittle'] = "Simpanan Pokok";
		$data['pokok'] = $this->db->query("SELECT * FROM simpanan_pk")->result();
		$data['nama'] = $this->db->query("SELECT nama FROM anggota")->result();
		$data['tahun'] = $this->db->query("SELECT YEAR(tgl_pembayaran) AS tahun FROM simpanan_pk GROUP BY YEAR(tgl_pembayaran) ORDER BY YEAR(tgl_pembayaran)ASC ")->result();
		
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_pegawai/sidebar');
		$this->load->view('pegawai/daftarsimpananpk', $data);
		$this->load->view('templet_admin/footer');
	}

	public function nama()
	{
		$data['tittle'] = 'LAPORAN SIMPANAN POKOK';
		$nama = $this->input->post('nama');
		$data['print'] = $this->db->query("SELECT anggota.nama, anggota.NIK, anggota.jabatan, simpanan_wjb.simpanan_wjb, simpanan_wjb.tgl_pembayaran
		FROM anggota
		INNER JOIN simpanan_wjb ON anggota.nak=simpanan_wjb.nak
		WHERE nama='$nama'")->result();
		$this->load->view('laporan_simpananwajib', $data);
			
		}
	public function simpananwajib()
	{
		$data['tittle'] = "Simpanan Wajib";
		$data['wajib'] = $this->db->query("SELECT simpanan_wjb.simpanan_wjb, simpanan_wjb.tgl_pembayaran, anggota.nama, anggota.jabatan, anggota.nak, anggota.NIK, anggota.alamat
			FROM anggota
			INNER JOIN simpanan_wjb ON anggota.nak=simpanan_wjb.nak")->result();
		$data['nama'] = $this->db->query("SELECT nama FROM anggota")->result();
		$data['tahun'] = $this->db->query("SELECT YEAR(tgl_pembayaran) AS tahun FROM simpanan_wjb GROUP BY YEAR(tgl_pembayaran) ORDER BY YEAR(tgl_pembayaran)ASC ")->result();
		
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_pegawai/sidebar');
		$this->load->view('pegawai/daftarsimpananwajib', $data);
		$this->load->view('templet_admin/footer');
	}
	public function thnbln()
	{
		$data['tittle'] = 'LAPORAN SIMPANAN WAJIB';
		$tahun = $this->input->post('thn_simpananwjb');
		$bulan = $this->input->post('bulan_simpananwjb');
		$data['print'] = $this->db->query("SELECT anggota.NIK, anggota.nama, anggota.jabatan, simpanan_wjb.simpanan_wjb, 
			simpanan_wjb.tgl_pembayaran 
			FROM anggota
			INNER JOIN simpanan_wjb ON anggota.nak=simpanan_wjb.nak
			WHERE MONTH(tgl_pembayaran)='$bulan' AND YEAR(tgl_pembayaran)='$tahun'")->result();
		$this->load->view('laporan_simpananwajib', $data);
	}
	}