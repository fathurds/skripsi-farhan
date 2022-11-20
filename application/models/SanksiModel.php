<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SanksiModel extends CI_Model
{

	public $tableName;

	public function __construct()
	{
		parent::__construct();
		$this->tableName = "tb_sanksi";
	}

	public function selectAll($from = 0, $offset = 0)
	{
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->order_by('poin_min');
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

	public function insert($data)
	{
		$this->db->insert($this->tableName, $data);
	}

	public function update($id, $data)
	{
		$this->db->set(array(
			'sanksi' => $data['sanksi'],
			'tindak_lanjut' => $data['tindak_lanjut']
		));
		$this->db->where('id', $id);
		$this->db->update($this->tableName);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->tableName);
	}
}
