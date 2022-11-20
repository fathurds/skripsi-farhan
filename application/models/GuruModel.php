<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GuruModel extends CI_Model
{

	public $tableName;

	public function __construct()
	{
		parent::__construct();
		$this->tableName = "tb_guru";
	}

	public function selectAll($from = 0, $offset = 0)
	{
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->limit($from, $offset);

		return $this->db->get();
	}
	public function selectAllJoinGuru()
	{
		$this->db->select('tb_guru.*');
		$this->db->select('tb_mapel.nama as matapelajaran');
		$this->db->from($this->tableName);
		$this->db->join('tb_mapel', 'tb_mapel.id = tb_guru.id_mapel');
		// $this->db->limit($from,$offset);

		// $this->db->select('*')->from($this->tableName);

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
}
