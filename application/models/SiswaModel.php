<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaModel extends CI_Model
{

	public $tableName;

	public function __construct()
	{
		parent::__construct();
		$this->tableName = "tb_siswa";
	}

	public function selectAll($from = 0, $offset = 0)
	{
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->limit($from, $offset);

		return $this->db->get();
	}
	public function selectById($id)
	{
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->where('id', $id);
		// $this->db->limit($from,$offset);

		return $this->db->get();
	}
	public function selectByIdUser($id)
	{
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->where('id_user', $id);
		// $this->db->limit($from,$offset);
		return $this->db->get();
	}
	public function selectByIdKelas($id)
	{
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->where('id_kelas', $id);
		// $this->db->limit($from,$offset);
		return $this->db->get();
	}
	public function selectByNIS($id)
	{
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->where('nis', $id);
		// $this->db->limit($from,$offset);
		return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->tableName, $data);
	}

	public function update($id, $data)
	{
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update($this->tableName);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->tableName);
	}

	public function insertPelanggaran($data)
	{
		$searchSiswa = $this->db->get_where($this->tableName, array('nis' => $data['nis']), 1)->row();
		print_r($searchSiswa);
		if (isset($searchSiswa->nis)) {
			$data_pelanggaran = array(
				'nis' => $searchSiswa->nis,
				'kode_tatib' => $data['pelanggaran'],
				'alasan' => $data['alasan'],
				'created_date' => date_create()->format('Y-m-d')
			);
			return $this->db->insert('tb_pelanggaran', $data_pelanggaran);
		}
		return false;
	}
}
