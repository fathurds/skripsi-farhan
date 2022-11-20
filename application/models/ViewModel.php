<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewModel extends CI_Model {


	public function selectAll($viewName){
		$this->db->select('*');
		$this->db->from($viewName);
		$this->db->limit($from,$offset);

		return $this->db->get();
	}

	public function selectByIDKelas($viewName,$id){
		$this->db->select('*');
		$this->db->from($viewName);
		$this->db->where('id',$id);

		return $this->db->get();
	}
	public function selectByIDGuru($viewName,$id){
		$this->db->select('*');
		$this->db->from($viewName);
		$this->db->where('id',$id);

		return $this->db->get();
	}	

	public function selectAllOrderBy($viewName,$field){
		$this->db->select('*');
		$this->db->from($viewName);
		$this->db->order_by($field);

		return $this->db->get();		
	}

	public function selectWhere($viewName,$col,$field = array(),$order_by=null){
		$this->db->select($col);
		$this->db->from($viewName);
		foreach($field as $list => $val){
			$this->db->where($list,$val);
		}
		if($order_by!=null){
			$this->db->order_by($order_by,'desc');
		}

		return $this->db->get();		
	}

}

?>
