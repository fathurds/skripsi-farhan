<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HNilaiModel extends CI_Model {

	public $tableName;

	public function __construct(){
		parent::__construct();
		$this->tableName = "tb_hnilai";
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

		return $this->db->get();
	}
	public function selectByIdAlt($id){
		$this->db->select('tb_hnilai.*');
		$this->db->select('tb_guru.nama');
		$this->db->select('tb_mapel.nama as mapel');		$this->db->from($this->tableName);
		$this->db->where('tb_hnilai.id',$id);
		$this->db->join('tb_guru','tb_guru.id = tb_hnilai.id_guru');
		$this->db->join('tb_mapel','tb_mapel.id = tb_guru.id_mapel');
		return $this->db->get();
	}	
	public function selectByIdKelas($id,$where=null){
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->where('id_kelas',$id);
		if(!is_null($where)){
			$this->db->where('kategori',$where);
			$this->db->where('onsite',1);
		}
		return $this->db->get();
	}	
	public function selectByIdKelasAlt($id,$where=null){
		$this->db->select('tb_hnilai.*');
		$this->db->select('tb_guru.nama');
		$this->db->select('tb_mapel.nama as mapel');
		$this->db->from($this->tableName);
		$this->db->where('id_kelas',$id);
		$this->db->join('tb_guru','tb_guru.id = tb_hnilai.id_guru');
		$this->db->join('tb_mapel','tb_mapel.id = tb_guru.id_mapel');

		if(!is_null($where)){
			$this->db->where('kategori',$where);
			$this->db->where('onsite',1);
		}
		return $this->db->get();
	}		

	public function selectWhere($field = array()){
		$this->db->select('*');
		$this->db->distinct('nama');
		$this->db->from($this->tableName);
		foreach($field as $list => $val){
			$this->db->where($list,$val);
		}
		// $this->db->limit($from,$offset);

		return $this->db->get();		
	}
	
	public function insert($data){
		$this->db->insert($this->tableName,$data);

		return $this->db->insert_id();
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
