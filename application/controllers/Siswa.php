<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	private $head;
	private $id_kelas;
	public function __construct(){
		parent::__construct();
		$data['siswa'] = $this->SiswaModel->selectByNIS($this->session->userdata('username'))->row();
		$this->head['datasiswa'] = $this->SiswaModel->selectByIdUser($data['siswa']->id)->row_array();
		$this->head['segment'] = $this->uri->segment(1);
		$this->id_kelas = $this->head['datasiswa']['id_kelas'];
		// var_dump($this->head);
	}
	public function index()
	{
		$arr = ['ids' => $this->head['datasiswa']['id']];
		$asd = $this->ViewModel->selectWhere('viewnilai','*',$arr)->result_array();
		$i = 0 ;
		$j = 0;
		$cat = 0;
		foreach($asd as $key){
			if($key['kategori'] == 'kuis'){
				$series[$i] = (int)$key['nilai'];
				$axis[$i] = $key['namaheader'];
				$i++;
			}else if($key['kategori'] == 'tugas'){
				$series2[$j] = (int)$key['nilai'];
				$axis2[$j] = $key['namaheader'];
				$j++;
			}
		}

		if(!isset($series)){
			$series = array();
			$axis = array();
		}
		if(!isset($series2)){
			$series2 = array();
			$axis2 = array();
		}		
		$data['all'] = $asd;
		$data['grafik'] = json_encode($series);
		$data['axis'] = json_encode($axis);		
		$data['grafik2'] = json_encode($series2);
		$data['axis2'] = json_encode($axis2);		
		$this->load->view('layout/dheader',$this->head);
		$this->load->view('siswa/beranda',$data);
		$this->load->view('layout/dfooter');
		// $this->load->view('siswa/beranda');
	}
	public function mapel(){
		$data['mapel'] = $this->ViewModel->selectByIDKelas('viewmapel',$this->id_kelas)->result_array();
		// var_dump($data['mapel']);
		$this->load->view('layout/dheader',$this->head);
		$this->load->view('siswa/mapel',$data);
		$this->load->view('layout/dfooter');
	}
	public function materi(){
		$data['materi'] = $this->ViewModel->selectByIDKelas('viewmateri',$this->id_kelas)->result_array();
		// var_dump($data['mapel']);
		$this->load->view('layout/dheader',$this->head);
		$this->load->view('siswa/materi',$data);
		$this->load->view('layout/dfooter');		
	}
	public function tugas(){
		$data['tugas'] = $this->ViewModel->selectByIDKelas('viewtugas',$this->id_kelas)->result_array();
		$i=0;
		foreach($data['tugas'] as $check){
			if($this->JawabanModel->checkJawaban($_SESSION['id'],$check['idt'])->num_rows() != 0){
				$data['tugas'][$i]['terkirim'] = TRUE;
			}else{
				$data['tugas'][$i]['terkirim'] = FALSE;
			}
			$i++;
		}		
		// var_dump($data['tugas']);
		// var_dump($data['mapel']);
		$this->load->view('layout/dheader',$this->head);
		$this->load->view('siswa/tugas',$data);
		$this->load->view('layout/dfooter');		
	}
	public function tugas_det($mapel="",$id){
		$data['tugas'] = $this->TugasModel->selectByID($id)->row_array();
		$data['mapel'] = $mapel;
		$data['jawaban'] = $this->JawabanModel->checkJawaban($_SESSION['id'],$id)->row_array();
		$this->load->view('layout/dheader',$this->head);
		$this->load->view('siswa/tugas_det',$data);
		$this->load->view('layout/dfooter');				
	}
	public function tugasAct($comm,$id=0){
		if($comm == "add"){
			$data = $this->input->post();
			// var_dump($data);
			$this->JawabanModel->insert($data);
			redirect('siswa/tugas');
		}elseif($comm == "edit"){
			$data = $this->input->post();
			$this->JawabanModel->update($id,$data);
			redirect('siswa/tugas');			
		}
	}	
	public function changePass(){
		$this->load->view('layout/dheader',$this->head);
		$this->load->view('siswa/Upass');
		$this->load->view('ubah');
		$this->load->view('layout/dfooter');			
	}	
	public function kuis(){
		$data['all'] = $this->HNilaiModel->selectByIdKelasAlt($this->id_kelas,'kuis')->result_array();
		$nilai = array();
		$i=0;
		foreach($data['all'] as $hm){
			$dummy = $this->NilaiModel->selectByIdHNilaiIdSiswa($hm['id'],$this->head['datasiswa']['id'])->row_array();
			$nilai[$i] = $dummy['nilai'];
			$i++;
		}
		$data['nilai'] = $nilai;
		// var_dump($data['all']);
		$this->load->view('layout/dheader',$this->head);
		$this->load->view('siswa/kuis',$data);
		$this->load->view('layout/dfooter');					
	}
	public function cbt($id_hnilai,$page=0){
		$data['kuis'] = $this->HNilaiModel->selectByIdAlt($id_hnilai)->row_array();
		$data['jumlah'] = $this->SoalModel->selectByIdHNilai($id_hnilai)->num_rows();
		$data['soal'] = $this->SoalModel->selectByIdHNilai($id_hnilai)->result_array();		
		$this->load->view('layout/dheader',$this->head);
		$this->load->view('siswa/cbt',$data);
		$this->load->view('layout/dfooter');			
	}
	public function calculate(){
		$data = $this->input->post();
		$id_hnilai = $data['id_hnilai'];
		unset($data['id_hnilai']);
		$soal = $this->SoalModel->selectByIdHNilai($id_hnilai)->result_array();
		$jml = $this->SoalModel->selectByIdHNilai($id_hnilai)->num_rows();
		$i=0;
		$b=0;$s=0;
		foreach($data as $answ){
			if($soal[$i]['jawaban'] == $answ){
				$b++;
			}else{
				$s++;
			}
			$i++;
		}
		$hnilai = $this->HNilaiModel->selectById($id_hnilai)->row_array();
		$new['id_hnilai'] = $id_hnilai;
		$new['id_guru'] = $hnilai['id_guru'];
		$new['id_siswa'] = $this->head['datasiswa']['id'];
		$new['nilai'] = ($b*100)/$jml;
		$this->NilaiModel->insert($new);
		redirect('siswa/kuis');
	}

	function pelanggaran()
	{
		$nis = $this->session->userdata('username');
		$hasil = [];
		$data['siswa'] = $this->SiswaModel->selectByNIS($nis)->row();
		$data['riwayat'] = $this->PelanggaranModel->selectPelanggaranByNis($nis)->result();
		
		$this->load->view('layout/dheader',$this->head);
		$this->load->view('siswa/pelanggaran',$data);
		$this->load->view('layout/dfooter');
	}
}
