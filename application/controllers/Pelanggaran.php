<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggaran extends CI_Controller
{
	private $head;
	function __construct()
	{
		parent::__construct();
		$this->load->model('siswamodel');
		$this->load->model('tatibmodel');
		$this->load->helper('url');
		$this->load->database();
	}
	public function addPelanggaran()
	{
		$data = [];
		$data['listTatib'] = $this->TatibModel->selectAllDropdown();
		$this->load->view('layout/aheader', $this->head);
		$this->load->view('pelanggaran/tambah_pelanggaran', $data);
		$this->load->view('layout/afooter');
	}

	public function getSiswa()
	{
		$nis = $this->input->get('nis');
		$hasil = [];
		$hasil['siswa'] = $this->SiswaModel->selectByNIS($nis)->row();
		$hasil['riwayat'] = $this->PelanggaranModel->selectPelanggaranByNis($nis)->result_array();

		if (is_null($hasil)) {
			header('HTTP/1.1 400 Kesalahan');
			header('Content-Type: application/json; charset=UTF-8');
			$result = array();
			$result['messages'] = 'Gagal';
			die(json_encode($result));
		}
		echo json_encode($hasil);
	}

	function getRekomendasi()
	{
		$poin = $this->input->get('poin');
		$hasil = [];
		$hasil['rekomendasi'] = $this->PelanggaranModel->getRekomendasi($poin)->result_array();

		if (is_null($hasil)) {
			header('HTTP/1.1 400 Kesalahan');
			header('Content-Type: application/json; charset=UTF-8');
			$result = array();
			$result['messages'] = 'Gagal';
			die(json_encode($result));
		}
		echo json_encode($hasil);
	}

	public function simpanPelanggaran()
	{
		$melanggar = [];
		$melanggar['nis'] = $this->input->post('nis');
		$melanggar['pelanggaran'] = $this->input->post('pelanggaran');
		$melanggar['alasan'] = $this->input->post('alasan');

		$kriteria = $this->TatibModel->selectById($melanggar['pelanggaran'])->result()[0];
		$melanggar['kriteria'] = $kriteria->id_kriteria;
		$kelas = $this->SiswaModel->selectByNIS($melanggar['nis'])->result()[0];
		$melanggar['kelas'] = $kelas->id_kelas;

		// $pelanggaran
		// echo json_encode($res);

		$this->SiswaModel->insertPelanggaran($melanggar);
		redirect('admin/pelanggaran');
	}
}
