<?php

class SimpananModel extends CI_model
{
	public function get_data_anggota($table)
	{
		return $this->db->get($table);
	}
	public function input_simpananwjb($sql, $table)
	{
		$this->db->insert($table, $sql);
	}
	public function hapus_data_simpananwjb($sql, $table)
	{
		$this->db->where($sql);
		$this->db->delete($table);
	}

	
	public function input_pinjaman($sql, $table)
	{
		$this->db->insert($table, $sql);
	}
}