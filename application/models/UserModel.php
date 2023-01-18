<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	public $tableName;

	public function __construct(){
		parent::__construct();
		$this->tableName = "tb_users";
	}

	public function selectAll($from=0,$offset=0){
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->limit($from,$offset);

		return $this->db->get();
	}
	public function selectByUsername($id){
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->where('username',$id);
		// $this->db->limit($from,$offset);

		return $this->db->get();
	}

	public function checkLogin($username,$pwd){
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->where('username',$username);
		$this->db->where('password',$pwd);

		if($this->db->get()->num_rows() > 0){
			return true;
		}else{
			return false;
		}
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

	public function getAllUser() {
		$this->db->select('nis');
		$this->db->from('tb_siswa');
		$this->db->where('id > 740');
		$this->db->limit(1200);
		return $this->db->get();
	}

	// public function insertAllUser(){
	// 	$nisArr = $this->getAllUser()->result();
		
	// 	for($i=0;$i<count($nisArr);$i++){
	// 		$data = array(
	// 			'username' => $nisArr[$i]->nis,
	// 			'password' => password_hash($nisArr[$i]->nis, PASSWORD_DEFAULT),
	// 			'kategori' => 'siswa'
	// 		);
			
	// 		$this->db->insert('tb_users', $data);
	// 	}
	// }

}

?>
