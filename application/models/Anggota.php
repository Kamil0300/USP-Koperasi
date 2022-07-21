<?php

class Anggota extends CI_model
{
	public function get_data($table)
	{
		return $this->db->get($table);
	}
	public function input_anggota($sql, $table)
	{
		$this->db->insert($table, $sql);
	}
	public function input_simpananpk($sql, $table)
	{
		$this->db->insert($table, $sql);
	}
	public function update_anggota($table, $data, $sql)
	{
		$this->db->update($table, $data, $sql);
	}
	public function hapus_data_anggota($sql, $table)
	{
		$this->db->where($sql);
		$this->db->delete($table);
	}
	public function nak()
	{
		$query = $this->db->query("SELECT max(nak) as nomoranggota FROM anggota");
		$hasil = $query->row();
		return $hasil->nomoranggota;
	}
}