<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GroupTatibModel extends CI_Model
{

	public $tableName;

	public function __construct()
	{
		parent::__construct();
		$this->tableName = "tb_group_tatib";
	}

	public function selectAll($from = 0, $offset = 0)
	{
		$query = 'SELECT * FROM ' . $this->tableName . ' ORDER BY length(kriteria), kriteria';

		return $this->db->query($query);
	}

	public function selectKriteriaAll()
	{
		$query = 'SELECT kriteria, bobot FROM ' . $this->tableName . ' ORDER BY length(kriteria), kriteria';

		return $this->db->query($query);
	}

	public function selectById($kriteria)
	{
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->where('kriteria', $kriteria);

		return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->tableName, $data);
	}

	public function update($kriteria, $data)
	{
		$this->db->set(array(
			'keterangan' => $data['keterangan'],
			'bobot' => $data['bobot']
		));
		$this->db->where('kriteria', $kriteria);
		$this->db->update($this->tableName);
	}

	public function delete($kriteria)
	{
		$this->db->where('kriteria', $kriteria);
		$this->db->delete($this->tableName);
	}
}
