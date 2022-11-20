<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NilaiModel extends CI_Model {

	public $tableName;

	public function __construct(){
		parent::__construct();
		$this->tableName = "tb_nilai";
	}

	public function selectAll($from=0,$offset=0){
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->limit($from,$offset);

		return $this->db->get();
	}
	public function selectById($id){
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->where('id',$id);
		// $this->db->limit($from,$offset);

		return $this->db->get();
	}
	public function selectByIdHNilai($id){
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->where('id_hnilai',$id);

		return $this->db->get();		
	}
	public function selectByIdHNilaiIdSiswa($id,$ids){
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->where('id_hnilai',$id);
		$this->db->where('id_siswa',$ids);

		return $this->db->get();		
	}	

	public function selectByIdJoinSiswa($id){
		$this->db->select('tb_nilai.*');
		$this->db->select('tb_siswa.nama');
		$this->db->from($this->tableName);
		$this->db->where('tb_nilai.id',$id);
		$this->db->join('tb_siswa','tb_siswa.id = tb_nilai.id_siswa');

		return $this->db->get();
	}
	
	public function insert($data){
		$this->db->insert($this->tableName,$data);
	}

	public function update($id,$data){
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update($this->tableName);
	}

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete($this->tableName);
	}

}

?>
