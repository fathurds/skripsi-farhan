<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	private $head;
	function __construct(){
		parent::__construct();
		$this->load->model('GroupTatibModel');
		$this->load->helper('url');
		$this->load->database();
	}

  public function rekapJumlahPoin()
  {
      $data['kelas'] = $this->KelasModel->selectAll()->result_array();
      $data['kategori_pelanggaran'] = $this->GroupTatibModel->selectAll()->result_array();
			$pelanggaran_group = $this->PelanggaranModel->selectPelanggaranGroupKelas()->result_array();
			$res_rekap = $this->getRekap($pelanggaran_group);
			$data['pelanggaran_group'] = $res_rekap['jumlah_poin'];
			// echo "<pre>";
			// var_dump($data['pelanggaran_group']);exit;
      // var_dump($data['tatib']);
      $this->load->view('layout/aheader',$this->head);
      $this->load->view('kelas/rekap',$data);
      $this->load->view('layout/afooter');
  }

	private function getRekap($data_rekap)
	{
		$result_rekap = [];
		if(is_array($data_rekap) && count($data_rekap)>0){
			foreach ($data_rekap as $val_data_rekap) {
				$result_rekap['jumlah_poin'][$val_data_rekap['kelas']][$val_data_rekap['kode_group_tatib']] = $val_data_rekap['jumlah_poin'];
				$result_rekap['jumlah_siswa'][$val_data_rekap['kelas']][$val_data_rekap['kode_group_tatib']] = $val_data_rekap['jumlah_siswa'];
			}
		}

		return $result_rekap;
	}

	public function rekapJumlahSiswa()
	{
      $data['kelas'] = $this->KelasModel->selectAll()->result_array();
      $data['kategori_pelanggaran'] = $this->GroupTatibModel->selectAll()->result_array();
			$pelanggaran_group = $this->PelanggaranModel->selectPelanggaranGroupKelas()->result_array();
			$res_rekap = $this->getRekap($pelanggaran_group);
			$data['pelanggaran_group_siswa'] = $res_rekap['jumlah_siswa'];
			// echo "<pre>";
			// var_dump($data['pelanggaran_group']);exit;
      // var_dump($data['tatib']);
      $this->load->view('layout/aheader',$this->head);
      $this->load->view('kelas/rekap_siswa',$data);
      $this->load->view('layout/afooter');
	}
}
