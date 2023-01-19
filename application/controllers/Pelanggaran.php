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
		$this->head['kelasheader'] = $this->KelasModel->selectAll()->result_array();
	}
	public function addPelanggaran()
	{
		$data = [];
		$data['listTatib'] = $this->TatibModel->selectAllDropdown();
		$this->load->view('layout/aheader', $this->head);
		$this->load->view('pelanggaran/tambah_pelanggaran', $data);
		$this->load->view('layout/afooter');
	}

	public function pelanggaranAct($comm, $id = 0)
	{
		if ($comm == "del") {
			$this->PelanggaranModel->delete($id);
			$this->session->set_flashdata('msg', 'Data berhasil dihapus');
			redirect('admin/pelanggaran');
		} else if ($comm == "edit") {
			$data['edit'] = true;
			$data['listTatib'] = $this->TatibModel->selectAllDropdown();
			$data['pelanggaranPeserta'] = $this->PelanggaranModel->selectPelanggaranById($id)->row();
			$data['riwayat'] = $this->PelanggaranModel->selectPelanggaranByNis($data['pelanggaranPeserta']->nis)->result();
			$data['poin'] = array_reduce($data['riwayat'], function ($carry, $item) {
				return $carry + $item->poin;
			});
			$data['rekomendasi'] = $this->PelanggaranModel->getRekomendasi($data['poin'])->row();
			$this->load->view('layout/aheader', $this->head);
			$this->load->view('pelanggaran/tambah_pelanggaran', $data);
			$this->load->view('layout/afooter');
		} else if ($comm == "edit2") {
			$siswa = $this->SiswaModel->selectByNIS($this->input->post('nis'))->row();
			$tatib = $this->TatibModel->selectById($this->input->post('pelanggaran'))->row();

			$data = array(
				'nis' => $this->input->post('nis'),
				'kriteria' => $tatib->id_kriteria,
				'kode_tatib' => $this->input->post('pelanggaran'),
				'alasan' => $this->input->post('alasan'),
				'id_kelas' => $siswa->id_kelas
			);
			$this->PelanggaranModel->update($this->input->post('id_pelanggaran'), $data);
			$this->session->set_flashdata('msg', 'Data berhasil diubah');
			redirect('admin/pelanggaran/');
		}
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
		$this->session->set_flashdata('msg', 'Pelanggaran berhasil ditambah');
		redirect('admin/pelanggaran');
	}
}
