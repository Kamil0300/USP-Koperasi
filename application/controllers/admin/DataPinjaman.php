<?php

/**
 * 
 */
class DataPinjaman extends CI_Controller
{
//---------------------------SYARAT LOGIN---------------------------
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
	}//---------------------------AKHIR SYARAT LOGIN---------------------------


	
	public function index()
	{
		$data['tittle'] = "Peminjaman";
		$data['anggota'] = $this->SimpananModel->get_data_anggota('anggota')->result();
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_admin/sidebar');
		$this->load->view('admin/peminjaman', $data);
		$this->load->view('templet_admin/footer');
	}
	public function peminjaman()
	{
		$data['tittle'] = "Riwayat Peminjaman dan Pembayaran";
		$data['pinjaman'] = $this->db->query("SELECT peminjaman.id_pinjaman, peminjaman.nak, peminjaman.jumlah_pinjaman, peminjaman.tgl_pinjaman, peminjaman.tenggang_wkt, peminjaman.bayar, peminjaman.total_pinjam, total_peminjaman.jumlah_pinjaman, anggota.NIK, anggota.nama
			FROM peminjaman
			INNER JOIN total_peminjaman ON peminjaman.id_pinjaman=total_peminjaman.id_pinjaman
			INNER JOIN anggota ON total_peminjaman.nak=anggota.nak")->result();
		$data['total'] = $this->db->query("SELECT pembayaran.id_pembayaran, pembayaran.jumlah_bayar, pembayaran.tenggang_wkt, pembayaran.tgl_bayar, anggota.nama, anggota.NIK, anggota.nak
			FROM pembayaran
			INNER JOIN anggota ON pembayaran.nak=anggota.nak")->result();
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_admin/sidebar');
		$this->load->view('admin/daftarpeminjaman', $data);
		$this->load->view('templet_admin/footer');
	}
	public function tambah_data_pinjaman($id)
	{
		$data['tittle'] = "Pinjaman";
		$data['pinjaman'] = $this->db->query("SELECT * FROM anggota WHERE nak='$id'")->result();
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_admin/sidebar');
		$this->load->view('admin/tambahdatapinjaman', $data);
		$this->load->view('templet_admin/footer');
	}
	public function pembayaran($id)
	{
		$data['tittle'] = "Proses Pembayaran";
		$data['pembayaran'] = $this->db->query("SELECT anggota.nama, anggota.NIK, anggota.nak, peminjaman.id_pinjaman,
												peminjaman.bayar
												FROM anggota
												INNER JOIN peminjaman ON anggota.nak=peminjaman.nak
												WHERE id_pinjaman='$id'")->result();
		$this->load->view('templet_admin/header', $data);
		$this->load->view('templet_admin/sidebar');
		$this->load->view('admin/pembayaran', $data);
		$this->load->view('templet_admin/footer');
	}
	public function invoice($id)
	{
		$sql = array('id_pinjaman' => $id);
		$data['tittle'] = 'Nota Pinjaman';
		$data['print'] = $this->db->query("SELECT anggota.nama, anggota.NIK, anggota.nak, 
										peminjaman.jumlah_pinjaman, peminjaman.total_pinjam, peminjaman.tenggang_wkt, peminjaman.bayar
										FROM anggota
										INNER JOIN peminjaman ON anggota.nak=peminjaman.nak
										WHERE id_pinjaman='$id'")->result();
										$this->load->view('invoice', $data);
	}
//----------------------------PROSES QUERY----------------------------
	public function proses_input_pinjaman()
	{
		
		$jumlah_pinjaman = $this->input->post('jumlah_pinjaman');
		$nak = $this->input->post('nak');
	 	$tgl_pinjaman = $this->input->post('tgl_pinjaman');
	 	$tenggang_wkt = $this->input->post('tenggang_wkt');
	 	$provisi = 0.01;
	 	$pajak = 0.015;
	    $sql = array('jumlah_pinjaman' =>$jumlah_pinjaman-$jumlah_pinjaman*$provisi, 'nak' =>$nak,  'tgl_pinjaman' =>$tgl_pinjaman, 'tenggang_wkt' =>$tenggang_wkt, 'total_pinjam' => (($jumlah_pinjaman-$jumlah_pinjaman*$provisi)/$tenggang_wkt+($jumlah_pinjaman-$jumlah_pinjaman*$provisi)/$tenggang_wkt*$pajak)*$tenggang_wkt, 'bayar' => ($jumlah_pinjaman-$jumlah_pinjaman*$provisi)/$tenggang_wkt+($jumlah_pinjaman-$jumlah_pinjaman*$provisi)/$tenggang_wkt*$pajak);
	    $this->SimpananModel->input_pinjaman($sql, 'peminjaman');
	    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Transaksi Berhasil Ditambahkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
	    redirect('admin/Datapinjaman/peminjaman');
	    /*<td>Rp. <?php echo number_format(($p->jumlah_pinjaman/$p->tenggang_wkt+$p->jumlah_pinjaman/$p->tenggang_wkt*$pajak)*$p->tenggang_wkt,0,',','.')?></td>
	    <td>Rp. <?php echo number_format($p->jumlah_pinjaman/$p->tenggang_wkt+$p->jumlah_pinjaman/$p->tenggang_wkt*$pajak,0,',','.')?> /Bln</td>*/
	}

	public function proses_input_pembayaran()
	{
		$jumlah_bayar = $this->input->post('jumlah_bayar');
		$tenggang_wkt = $this->input->post('tenggang_wkt');
		$id_pinjaman = $this->input->post('id_pinjaman');
		$nak = $this->input->post('nak');
	 	$tgl_bayar = $this->input->post('tgl_bayar');
	    $sql = array('jumlah_bayar' =>$jumlah_bayar, 'tenggang_wkt' =>$tenggang_wkt, 'id_pinjaman' =>$id_pinjaman, 'nak' =>$nak,  'tgl_bayar' =>$tgl_bayar);
	    $this->SimpananModel->input_simpananwjb($sql, 'pembayaran');
	    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Transaksi Berhasil Ditambahkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
	    redirect('admin/Datapinjaman/peminjaman');
	}

	public function hapus($id)
	{
		$sql = array('nak' => $id);
		$this->SimpananModel->hapus_data_simpananwjb($sql, 'peminjaman');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Transaksi Terhapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
		redirect('admin/DataPinjaman/peminjaman');
	}
	public function hapus_riwayat($id)
	{
		$sql = array('id_pembayaran' => $id);
		$this->SimpananModel->hapus_data_simpananwjb($sql, 'pembayaran');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Transaksi Terhapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
		redirect('admin/DataPinjaman/peminjaman');
	}
}