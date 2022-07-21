<?php

class Laporan_anggota extends CI_Controller 
{
	public function laporan_anggota()
	{
		$data['tittle'] = "Data Anggota";
		$data['anggota'] = $this->db->query('SELECT * FROM anggota')->result();
		$this->load->view('laporan_anggota', $data);
	}
}