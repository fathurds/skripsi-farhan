<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TatibModel extends CI_Model
{

	public $tableName;

	public function __construct()
	{
		parent::__construct();
		$this->tableName = "tb_tatib";
	}

	public function selectAll()
	{
		// $this->db->select('*');
		// $this->db->from($this->tableName);
		// $this->db->limit($from,$offset);

		// return $this->db->get();
		$query = 'SELECT kode, nama, poin, kriteria
					FROM `tb_tatib`
					INNER JOIN `tb_group_tatib`
					ON tb_tatib.id_kriteria = tb_group_tatib.kriteria';

		return $this->db->query($query);
	}
	public function selectById($kode)
	{
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->where('kode', $kode);
		// $this->db->limit($from,$offset);

		return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->tableName, $data);
	}

	public function update($kode, $data)
	{
		$this->db->set(array(
			'kode' => $data['kode'],
			'id_kriteria' => $data['id_kriteria'],
			'nama' => $data['nama'],
			'poin' => $data['poin'],
		));
		$this->db->where('id', $kode);
		$this->db->update($this->tableName);
	}

	public function delete($kode)
	{
		$this->db->where('kode', $kode);
		$this->db->delete($this->tableName);
	}

	public function selectAllDropdown()
	{
		$this->db->select('nama, kode');
		$this->db->from($this->tableName);
		$query = $this->db->get();
		return $query->result();
	}
}
