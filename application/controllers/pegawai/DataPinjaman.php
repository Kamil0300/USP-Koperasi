<?php
class DataPinjaman extends CI_Controller
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
		$data['tittle'] = "Riwayat Peminjaman";
		$data['pinjaman'] = $this->db->query("SELECT anggota.nama, anggota.NIK, anggota.nak, peminjaman.jumlah_pinjaman, peminjaman.tenggang_wkt, peminjaman.tgl_pinjaman
			FROM anggota
			INNER JOIN peminjaman ON anggota.nak=peminjaman.nak")->result();
		$data['nama'] = $this->db->query("SELECT nama FROM anggota")->result();
		$data['tahun'] = $this->db->query("SELECT YEAR(tgl_pinjaman) AS tahun FROM peminjaman GROUP BY YEAR(tgl_pinjaman) ORDER BY YEAR(tgl_pinjaman)ASC ")->result();
		
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_pegawai/sidebar');
		$this->load->view('pegawai/daftarpeminjaman', $data);
		$this->load->view('templet_admin/footer');
	}
	public function aksi_transaksi_pinjaman()
	{
		$data['tittle'] = 'LAPORAN PEMINJAMAN';
		$nama = $this->input->post('nama');
		$data['print'] = $this->db->query("SELECT anggota.nak, anggota.NIK, anggota.nama, peminjaman.jumlah_pinjaman, peminjaman.tenggang_wkt, peminjaman.tgl_pinjaman, (total_peminjaman.jumlah_pinjaman) AS sisa
			FROM anggota 
			INNER JOIN peminjaman ON anggota.nak=peminjaman.nak
			INNER JOIN total_peminjaman ON peminjaman.id_pinjaman=total_peminjaman.id_pinjaman
			WHERE anggota.nama='$nama'")->result();
		$this->load->view('laporan_pinjaman', $data);
			
	}

	public function thnbln()
	{
		$data['tittle'] = 'LAPORAN PEMINJAMAN';
		$tahun = $this->input->post('tahun_peminjaman');
		$bulan = $this->input->post('bulan_peminjaman');
		$data['print'] = $this->db->query("SELECT anggota.NIK, anggota.nak, anggota.nama, peminjaman.jumlah_pinjaman, peminjaman.tenggang_wkt, peminjaman.tgl_pinjaman, (total_peminjaman.jumlah_pinjaman) AS sisa
		FROM anggota
		INNER JOIN peminjaman ON anggota.nak=peminjaman.nak
		INNER JOIN total_peminjaman ON peminjaman.id_pinjaman=total_peminjaman.id_pinjaman
		WHERE MONTH(tgl_pinjaman)='$bulan' AND YEAR(tgl_pinjaman)='$tahun'")->result();
		$this->load->view('laporan_pinjaman', $data);
	}
}