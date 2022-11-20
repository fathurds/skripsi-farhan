<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

	private $head;
	private $id_guru;
	public function __construct()
	{
		parent::__construct();
		$this->head['dataguru'] = $this->GuruModel->selectByIdUser($_SESSION['id'])->row_array();
		$this->id_guru = $this->head['dataguru']['id'];
	}
	public function index()
	{ {
			$this->load->view('layout/guruheader', $this->head);
		}
		print_r($this->session);
		$data['jadwal'] = $this->ViewModel->selectByIDGuru('viewjadwalajar', $this->id_guru)->result_array();
		$listheader = $this->HNilaiModel->selectWhere(['id_guru' => $this->id_guru, 'kategori' => 'kuis'])->result_array();
		// var_dump($listheader);
		$i = 0;
		foreach ($listheader as $x) {
			$axis[$i]['name'] =  $x['namaheader'];
			$row = $this->ViewModel->selectWhere('viewnilai', '*', ['id_guru' => $this->id_guru, 'id_hnilai' => $x['id']])->result_array();
			$j = 0;

			$r = 0;
			$s = 0;
			$t = 0;
			foreach ($row as $y) {
				if ((int)$y['nilai'] < (int)$y['kkm1']) {
					$r++;
				} else if ((int)$y['nilai'] > (int)$y['kkm2']) {
					$t++;
				} else {
					$s++;
				}
			}

			$dataz = array();
			array_push($dataz, $r);
			array_push($dataz, $s);
			array_push($dataz, $t);
			// var_dump($dataz);
			$axis[$i]['data'] = $dataz;
			$i++;
		}
		if (!isset($axis)) {
			$axis = array();
		}
		$data['guru'] = $this->head['dataguru'];
		$data['series'] = json_encode($axis);
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/beranda', $data);
		$this->load->view('layout/gfooter');
		// $this->load->view('siswa/beranda');
	}

	public function pelanggaran()
	{ {
			$this->load->view('layout/guruheader', $this->head);
		}
		$data['jadwal'] = $this->ViewModel->selectByIDGuru('viewjadwalajar', $this->id_guru)->result_array();
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/jadwal', $data);
		$this->load->view('layout/gfooter');
	}
	public function materi($idk)
	{ {
			$this->load->view('layout/guruheader', $this->head);
		}
		$data['materi'] = $this->MateriModel->selectByIdGuruIdKelas($this->id_guru, $idk)->result_array();
		$data['kelas'] = $this->KelasModel->selectById($idk)->row_array();
		// var_dump($data);
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/materi', $data);
		$this->load->view('layout/gfooter');	// 
	}
	public function materiAct($comm, $idk = 0)
	{
		if ($comm == "add") {
			$this->load->view('layout/gheader', $this->head);
			$this->load->view('guru/fMateri');
			$this->load->view('layout/gfooter');	// 			
		} else if ($comm == "add2") {
			$data = $this->input->post();
			$data['id_guru'] = $this->id_guru;
			$matapelajaran = $this->MapelModel->selectById($this->GuruModel->selectById($this->id_guru)->row()->id_mapel)->row()->nama;

			$config['upload_path']		= './uploads/materi/';
			$config['allowed_types']	= '*';
			$config['max_size']			= 0;
			date_default_timezone_set("Asia/Bangkok");
			$config['file_name']		= "MATERI_" . $matapelajaran . "_" . time();
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("link")) {
				//gagal
				$error = array('error' => $this->upload->display_errors());
				// var_dump($error);
			} else {
				$data['link'] = $config['file_name'] . $this->upload->data('file_ext');
				// var_dump($data)
			}
			$this->MateriModel->insert($data);
			redirect('guru/materi/' . $data['id_kelas']);
		} else if ($comm == "del") {
			// $this->MateriModel->selectById($idk)->
			$file = $this->MateriModel->selectById($idk)->row()->link;
			if ($file != NULL) {
				unlink('uploads/materi/' . $file);
			}
			$this->MateriModel->delete($idk);
			redirect('guru/jadwal');
		}
	}
	public function nilai($idk)
	{ {
			$this->load->view('layout/guruheader', $this->head);
		}
		$data['header'] = $this->HNilaiModel->selectByIdKelas($idk)->result_array();
		// var_dump($data);
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/nilai', $data);
		$this->load->view('layout/gfooter');	// 
	}
	public function nilaiAct($comm, $idk = 0)
	{
		if ($comm == "add") {
			$this->load->view('layout/gheader', $this->head);
			$this->load->view('guru/fNilai');
			$this->load->view('layout/gfooter');	// 			
		} else if ($comm == "add2") {
			$data = $this->input->post();
			$data['id_guru'] = $this->id_guru;
			$config['upload_path']		= './uploads/excel/';
			$config['allowed_types']	= 'xls|xlsx';
			$config['max_size']			= 0;
			date_default_timezone_set("Asia/Bangkok");
			$config['file_name']		= "EXCEL_" . time();
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("link")) {
				//gagal
				$error = array('error' => $this->upload->display_errors());
			} else {
				$id_hnilai = $this->HNilaiModel->insert($data);
				try {
					$objPHPExcel = PHPExcel_IOFactory::load('uploads/excel/' . $config['file_name'] . $this->upload->data('file_ext'));
				} catch (Exception $e) {
					die('Error loading file :' . $e->getMessage());
				}
				$dataE = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
				$i = 1;
				foreach ($dataE as $row) {
					if ($i != 1) {
						$nilai['id_siswa'] = $this->SiswaModel->selectByNIS($row['A'])->row()->id;
						$nilai['id_guru'] = $this->id_guru;
						$nilai['id_hnilai'] = $id_hnilai;
						$nilai['nilai'] = (int)$row['B'];
						$this->NilaiModel->insert($nilai);
					}
					$i++;
				}
				redirect('guru/nilai/' . $data['id_kelas']);
			}
		} else if ($comm == "del") {
			$all = $this->NilaiModel->selectByIdHNilai($idk)->result_array();
			foreach ($all as $z) {
				$this->NilaiModel->delete($z['id']);
			}
			$this->HNilaiModel->delete($idk);
			redirect('guru/jadwal');
		} else if ($comm == "set") {
			$data['nilai'] = $this->NilaiModel->selectByIdJoinSiswa($idk)->row_array();
			$this->load->view('layout/gheader', $this->head);
			$this->load->view('guru/fSetNilai', $data);
			$this->load->view('layout/gfooter');
		} else if ($comm == "set2") {
			$upd = $this->input->post();
			// var_dump($upd);
			$this->NilaiModel->update($idk, $upd);
			redirect('guru/jadwal/');
		} else if ($comm == "det") {
			$data['nilai'] = $this->ViewModel->selectWhere('viewnilai', '*', ['id_hnilai' => $idk])->result_array();
			$this->load->view('layout/gheader', $this->head);
			$this->load->view('guru/nilaidet', $data);
			$this->load->view('layout/gfooter');
		} else if ($comm == "del2") {
			$id_hnilai = $this->NilaiModel->selectByID($idk)->row()->id_hnilai;
			$this->NilaiModel->delete($idk);
			redirect('guru/nilaiAct/det/' . $id_hnilai);
		} else if ($comm == "send") {
			$kirim = $this->ViewModel->selectWhere('viewnilai', '*', ['id_hnilai' => $idk])->result_array();
			foreach ($kirim as $row) {
				if ((int)$row['nilai'] < (int)$row['kkm1']) {
					$this->sendMail($row['email'], $row['mess1']);
				} else if ((int)$row['nilai'] > (int)$row['kkm2']) {
					$this->sendMail($row['email'], $row['mess3']);
				} else {
					$this->sendMail($row['email'], $row['mess2']);
				}
			}
		}
	}
	public function tugas($idk)
	{ {
			$this->load->view('layout/guruheader', $this->head);
		}
		$data['tugas'] = $this->TugasModel->selectByIdGuruIdKelas($this->id_guru, $idk)->result_array();
		$data['kelas'] = $this->KelasModel->selectById($idk)->row_array();
		// var_dump($data);
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/tugas', $data);
		$this->load->view('layout/gfooter');	// 
	}
	public function tugasAct($comm, $idk = 0)
	{
		if ($comm == "add") {
			$this->load->view('layout/gheader', $this->head);
			$this->load->view('guru/fTugas');
			$this->load->view('layout/gfooter');	// 			
		} else if ($comm == "add2") {
			$data = $this->input->post();
			$data['id_guru'] = $this->id_guru;
			$matapelajaran = $this->MapelModel->selectById($this->GuruModel->selectById($this->id_guru)->row()->id_mapel)->row()->nama;

			$config['upload_path']		= './uploads/tugas/';
			$config['allowed_types']	= '*';
			$config['max_size']			= 0;
			date_default_timezone_set("Asia/Bangkok");
			$config['file_name']		= "Tugas_" . $matapelajaran . "_" . time();
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("link")) {
				//gagal
				$error = array('error' => $this->upload->display_errors());
				// var_dump($error);
			} else {
				$data['link'] = $config['file_name'] . $this->upload->data('file_ext');
				// var_dump($data);
				// redirect('guru/materi/'.$data['id_kelas']);	
			}
			$this->TugasModel->insert($data);
			redirect('guru/tugas/' . $data['id_kelas']);
		} else if ($comm == "del") {
			$file = $this->TugasModel->selectById($idk)->row()->link;
			if ($file != NULL) {
				unlink('uploads/tugas/' . $file);
			}
			$this->TugasModel->delete($idk);
			redirect('guru/jadwal');
		}
	}
	public function kategori()
	{ {
			$this->load->view('layout/guruheader', $this->head);
		}
		$data['mapel'] = $this->MapelModel->selectById($this->head['dataguru']['id_mapel'])->row_array();
		// var_dump($this->head['dataguru']);
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/behavior', $data);
		$this->load->view('layout/gfooter');
	}
	public function setNilai()
	{
		$data['mapel'] = $this->MapelModel->selectById($this->head['dataguru']['id_mapel'])->row_array();
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/set', $data);
		$this->load->view('layout/gfooter');
	}
	public function setMessage()
	{
		$data['mapel'] = $this->MapelModel->selectById($this->head['dataguru']['id_mapel'])->row_array();
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/mail', $data);
		$this->load->view('layout/gfooter');
	}
	public function set()
	{
		$data = $this->input->post();
		$id = $data['id'];
		unset($data['id']);
		$this->MapelModel->update($id, $data);
		redirect('guru/kategori');
	}

	public function grafikc($id)
	{ {
			$this->load->view('layout/guruheader', $this->head);
		}
		$data['daftar'] = $this->SiswaModel->selectByIdKelas($id)->result_array();
		$listheader = $this->HNilaiModel->selectWhere(['id_kelas' => $id, 'id_guru' => $this->id_guru, 'kategori' => 'kuis'])->result_array();
		$i = 0;
		foreach ($listheader as $x) {
			$axis[$i]['name'] =  $x['namaheader'];
			$row = $this->ViewModel->selectWhere('viewnilai', '*', ['idk' => $id, 'id_guru' => $this->id_guru, 'id_hnilai' => $x['id']])->result_array();
			$j = 0;

			$r = 0;
			$s = 0;
			$t = 0;
			foreach ($row as $y) {
				if ((float)$y['nilai'] < (int)$y['kkm1']) {
					$r++;
				} else if ((float)$y['nilai'] > (int)$y['kkm2']) {
					$t++;
				} else {
					$s++;
				}
			}
			$dataz = array();
			array_push($dataz, $r);
			array_push($dataz, $s);
			array_push($dataz, $t);
			$axis[$i]['data'] = $dataz;
			$i++;
		}
		if (!isset($axis)) {
			$axis = array();
		}
		$data['series'] = json_encode($axis);
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/grafikc', $data);
		$this->load->view('layout/gfooter');
	}
	public function grafikp($id)
	{
		$arr = ['ids' => $id, 'id_guru' => $this->id_guru];
		$data['siswa'] = $this->SiswaModel->selectById($id)->row_array();
		$asd = $this->ViewModel->selectWhere('viewnilai', '*', $arr)->result_array();
		$i = 0;
		$j = 0;
		$cat = 0;
		foreach ($asd as $key) {
			if ($key['kategori'] == 'kuis') {
				$series[$i] = (int)$key['nilai'];
				$axis[$i] = $key['namaheader'];
				$i++;
			} else if ($key['kategori'] == 'tugas') {
				$series2[$j] = (int)$key['nilai'];
				$axis2[$j] = $key['namaheader'];
				$j++;
			}
		}
		// $this->defineKelompok($series);

		if (!isset($series)) {
			$series = array();
			$axis = array();
		}
		if (!isset($series2)) {
			$series2 = array();
			$axis2 = array();
		}
		$data['all'] = $asd;
		$data['grafik'] = json_encode($series);
		$data['axis'] = json_encode($axis);
		$data['grafik2'] = json_encode($series2);
		$data['axis2'] = json_encode($axis2);
		// var_dump($data['grafik']);	
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/grafikp', $data);
		$this->load->view('layout/gfooter');
	}
	public function personal($ids)
	{
		$data['siswa'] = $this->SiswaModel->selectById($ids)->row_array();
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/personal', $data);
		$this->load->view('layout/gfooter');
	}
	public function sendPersonal()
	{
		$data = $this->input->post();
		$this->sendMail($data['email'], $data['mess']);
		// redirect('guru/kelompok');
	}
	public function changePass()
	{
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/Upass', $this->head);
		$this->load->view('ubah');
		$this->load->view('layout/gfooter');
	}
	public function kuis($idk)
	{
		$data['kuis'] = $this->HNilaiModel->selectByIdKelas($idk, "kuis")->result_array();
		$data['kelas'] = $this->KelasModel->selectById($idk)->row_array();
		// var_dump($data);
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/kuis', $data);
		$this->load->view('layout/gfooter');	// 
	}
	public function kuisAct($comm, $idk = 0)
	{
		if ($comm == "add") {
			$this->load->view('layout/gheader', $this->head);
			$this->load->view('guru/fKuis');
			$this->load->view('layout/gfooter');	// 			
		} else if ($comm == "add2") {
			$data = $this->input->post();
			$data['id_guru'] = $this->id_guru;
			$data['kategori'] = 'kuis';
			$data['onsite'] = 1;
			$matapelajaran = $this->MapelModel->selectById($this->GuruModel->selectById($this->id_guru)->row()->id_mapel)->row()->nama;

			$config['upload_path']		= './uploads/kuis/';
			$config['allowed_types']	= 'xls|xlsx';
			$config['max_size']			= 0;
			date_default_timezone_set("Asia/Bangkok");
			$config['file_name']		= "KUIS_" . $matapelajaran . "_" . time();
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("link")) {
				//gagal
				$error = array('error' => $this->upload->display_errors());
				// redirect('guru/kuis/'.$data['id_kelas']);
			} else {
				$id_hnilai = $this->HNilaiModel->insert($data);
				try {
					$objPHPExcel = PHPExcel_IOFactory::load('uploads/kuis/' . $config['file_name'] . $this->upload->data('file_ext'));
				} catch (Exception $e) {
					die('Error loading file :' . $e->getMessage());
				}
				$dataE = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
				$i = 1;
				foreach ($dataE as $row) {
					if ($i != 1) {
						$soal['soal'] = $row['A'];
						$soal['id_hnilai'] = $id_hnilai;
						$soal['a'] = $row['B'];
						$soal['b'] = $row['C'];
						$soal['c'] = $row['D'];
						$soal['d'] = $row['E'];
						$soal['jawaban'] = $row['F'];
						$this->SoalModel->insert($soal);
					}
					$i++;
				}
			}
			redirect('guru/kuis/' . $data['id_kelas']);
		} else if ($comm == "aktif") {
			if ($this->HNilaiModel->selectById($idk)->row()->onsite) {
				$upd['onsite'] = 0;
				$this->HNilaiModel->update($this->HNilaiModel->selectById($idk)->row()->id, $upd);
			} else {
				$upd['onsite'] = 1;
				$this->HNilaiModel->update($this->HNilaiModel->selectById($idk)->row()->id, $upd);
			}
			redirect('guru/kuis/' . $this->HNilaiModel->selectById($idk)->row()->id_kelas);
		}
	}
	public function soal($id_hnilai)
	{
		$data['soal'] = $this->SoalModel->selectByIdHNilai($id_hnilai)->result_array();
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/soal', $data);
		$this->load->view('layout/gfooter');	// 
	}
	public function soalAct($comm, $idk = 0)
	{
		if ($comm == "add") {
			$this->load->view('layout/gheader', $this->head);
			$this->load->view('guru/fSoal');
			$this->load->view('layout/gfooter');	// 			
		} else if ($comm == "add2") {
			$data = $this->input->post();
			$this->SoalModel->insert($data);
			redirect('guru/soal/' . $data['id_hnilai']);
		} else if ($comm == "edit") {
			$data['val'] = $this->SoalModel->selectById($idk)->row_array();
			$this->load->view('layout/gheader', $this->head);
			$this->load->view('guru/fSoal', $data);
			$this->load->view('layout/gfooter');	// 		
		} else if ($comm == "edit2") {
			$data = $this->input->post();
			$this->SoalModel->update($idk, $data);
			redirect('guru/soal/' . $data['id_hnilai']);
		} else if ($comm == "del") {
			$id_hnilai = $this->SoalModel->selectById($idk)->row()->id_hnilai;
			$this->SoalModel->delete($idk);
			redirect('guru/soal/' . $id_hnilai);
		}
	}
	public function sendMail($email, $mess)
	{
		/*
			** SEND MAIL **
		*/

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'faisal.faisal.anwar@student.upi.edu',
			'smtp_pass' => 'sddaassddasad',
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1'
		);

		$this->load->library('email', $config);

		$this->email->set_newline("\r\n");
		/* sender  */
		$from_mail = "araqu478962@gmail.com";
		$from_name = "Your Teacher";

		/* dest */
		$to_mail = $email;

		/*mail subject*/
		$subject = "Pesan Guru Mata Pelajaran";

		/* mail body (html format)*/
		$message = "<table style='width:100%; font-family:arial; text-align: center; color:#6d6d6d; border: none; background-color: #d0d4dc;'>
			<tr style='height:30px;'></tr>
			<tr style='color:#fff; ; height: 100px; text-align: center;'>
				<td></td>
				<td style='width: 700px;background-color: #007eff;border-bottom: 5px solid #f8e042;'><img src='https://s11.postimg.org/iq8dpvakj/logo.png' style='width:200px;'></td>
				<td></td>
			</tr>
			<tr style=''>
				<td></td>
				<td style='width: 700px;background-color: #fff; border-top: none;'>
					<br>
					<h3 style='color: #007eff'>E-Learning SD Laboratorium Percontohan UPI<br>(Elearning Labschool UPI)</h3>
					<hr style='width: 500px; border-top: 1px solid #d0d4dc;'>
					<p>
						<br>";
		$message .= nl2br($mess);
		$message .= "<br>
						<hr style='width: 500px; border-top: 1px solid #d0d4dc;'>
						<br>
						More info at:
						<a href='http://smp1sukabumi.com/elearning' target='_blank'style='color:#007eff;'>smp1sukabumi.com/elearning</a><br>
						<br>
					</p>
				</td>
				<td></td>
			</tr>
			<tr style='height:30px;'></tr>
		</table>";

		$this->email->set_newline("\r\n");
		$this->email->from($from_mail, $from_name);
		$this->email->to($to_mail);
		$this->email->subject($subject);
		$this->email->message($message);
		$result = $this->email->send();
		// var_dump($result);
		if ($result) {
			echo "success";
		} else {
			echo $this->email->print_debugger();
		}
	}
	public function jawaban($idt)
	{
		$data['jawaban'] = $this->JawabanModel->selectByIdTugas($idt)->result_array();
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/jawaban', $data);
		$this->load->view('layout/gfooter');
	}
	public function kelompok()
	{ {
			$this->load->view('layout/guruheader', $this->head);
		}
		$data['jadwal'] = $this->ViewModel->selectByIDGuru('viewjadwalajar', $this->id_guru)->result_array();
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/kelompok', $data);
		$this->load->view('layout/gfooter');
	}
	public function kelompokk($idk)
	{
		$data['kelas'] = $this->KelasModel->selectByID($idk)->row_array();
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/kelompokkategori', $data);
		$this->load->view('layout/gfooter');
	}
	public function viewKelompok($idk, $cat)
	{

		$siswa = $this->SiswaModel->selectByIdKelas($idk)->result_array();
		$view = array();
		foreach ($siswa as $siswarow) {
			$data = $this->ViewModel->selectWhere('viewnilai', '*', ['idk' => $idk, 'id_guru' => $this->id_guru, 'id_siswa' => $siswarow['id']], "id_hnilai")->result_array();
			$nilai[0] = null;
			$nilai[1] = null;
			$nilai[2] = null;
			$i = 0;
			$satu = array();
			foreach ($data as $nilaisiswa) {
				if ($nilaisiswa['kategori'] == "kuis") {
					$nilai[$i] = $nilaisiswa['nilai'];
					$i++;
				}
			} //endfor data nilai

			if ($nilai[1] != NULL && $nilai[0] != NULL) {
				$satu['id'] = $siswarow['id'];
				$satu['nama'] = $siswarow['nama'];
				$satu['kategori'] = $this->defineKelompok($nilai[0], $nilai[1], $nilai[2], $data[0]['kkm1'], $data[0]['kkm2']);
			} else {
				$satu['id'] = $siswarow['id'];
				$satu['nama'] = $siswarow['nama'];
				$satu['kategori'] = 0;
			}
			array_push($view, $satu);
		} //endfor siswa
		$data['view'] = $view;
		// var_dump($data['view']);
		$data['kelas'] = $this->KelasModel->selectByID($idk)->row_array();
		$data['cat'] = $cat;
		$this->load->view('layout/gheader', $this->head);
		$this->load->view('guru/kelompokkelas', $data);
		$this->load->view('layout/gfooter');
	}
	public function excelKelompok($idk, $cat)
	{
		$siswa = $this->SiswaModel->selectByIdKelas($idk)->result_array();
		$view = array();
		foreach ($siswa as $siswarow) {
			$data = $this->ViewModel->selectWhere('viewnilai', '*', ['idk' => $idk, 'id_guru' => $this->id_guru, 'id_siswa' => $siswarow['id']], "id_hnilai")->result_array();
			$nilai[0] = null;
			$nilai[1] = null;
			$nilai[2] = null;
			$i = 0;
			$satu = array();
			foreach ($data as $nilaisiswa) {
				if ($nilaisiswa['kategori'] == "kuis") {
					$nilai[$i] = $nilaisiswa['nilai'];
					$i++;
				}
			} //endfor data nilai

			if ($nilai[1] != NULL && $nilai[0] != NULL) {
				$satu['id'] = $siswarow['id'];
				$satu['nis'] = $siswarow['nis'];
				$satu['nama'] = $siswarow['nama'];
				if ($this->defineKelompok($nilai[0], $nilai[1], $nilai[2], $data[0]['kkm1'], $data[0]['kkm2']) == 0) {
					$satu['kategori'] = "Belum Ter-identifikasi";
				} else if ($this->defineKelompok($nilai[0], $nilai[1], $nilai[2], $data[0]['kkm1'], $data[0]['kkm2']) == 1) {
					$satu['kategori'] = "Kelompok Naik";
				} else if ($this->defineKelompok($nilai[0], $nilai[1], $nilai[2], $data[0]['kkm1'], $data[0]['kkm2']) == 2) {
					$satu['kategori'] = "Kelompok Turun";
				} else if ($this->defineKelompok($nilai[0], $nilai[1], $nilai[2], $data[0]['kkm1'], $data[0]['kkm2']) == 3) {
					$satu['kategori'] = "Kelompok Bagus Buruk Bagus";
				} else if ($this->defineKelompok($nilai[0], $nilai[1], $nilai[2], $data[0]['kkm1'], $data[0]['kkm2']) == 4) {
					$satu['kategori'] = "Kelompok Buruk Bagus Buruk";
				} else if ($this->defineKelompok($nilai[0], $nilai[1], $nilai[2], $data[0]['kkm1'], $data[0]['kkm2']) == 5) {
					$satu['kategori'] = "Kelompok Stabil";
				} else if ($this->defineKelompok($nilai[0], $nilai[1], $nilai[2], $data[0]['kkm1'], $data[0]['kkm2']) == 6) {
					$satu['kategori'] = "Kelompok Stabil";
				} else if ($this->defineKelompok($nilai[0], $nilai[1], $nilai[2], $data[0]['kkm1'], $data[0]['kkm2']) == 7) {
					$satu['kategori'] = "Kelompok Stabil";
				} else if ($this->defineKelompok($nilai[0], $nilai[1], $nilai[2], $data[0]['kkm1'], $data[0]['kkm2']) == 8) {
					$satu['kategori'] = "Kelompok Stabil";
				}
			} else {
				$satu['id'] = $siswarow['id'];
				$satu['nis'] = $siswarow['nis'];
				$satu['nama'] = $siswarow['nama'];
				$satu['kategori'] = "Belum Ter-identifikasi";;
			}
			if ($cat == 1 && $satu['kategori'] == "Kelompok Naik") {
				array_push($view, $satu);
			} else if ($cat == 2 && $satu['kategori'] == "Kelompok Turun") {
				array_push($view, $satu);
			} else if ($cat == 3 && $satu['kategori'] == "Kelompok Bagus Buruk Bagus") {
				array_push($view, $satu);
			} else if ($cat == 4 && $satu['kategori'] == "Kelompok Buruk Bagus Buruk") {
				array_push($view, $satu);
			} else if ($cat == 5 && $satu['kategori'] == "Kelompok Stabil") {
				array_push($view, $satu);
			}
		} //endfor siswa
		$data['view'] = $view;
		// var_dump($data['view']);
		$data['kelas'] = $this->KelasModel->selectByID($idk)->row_array();
		$data['cat'] = $cat;


		// Create new PHPExcel object 
		$objPHPExcel = new PHPExcel();
		// Set document properties 
		$objPHPExcel->getProperties()->setCreator("Admin")
			->setLastModifiedBy("Admin")
			->setTitle("Laporan_Kelompok")
			->setSubject("Laporan_Kelompok")
			->setDescription("Laporan Kelompok Belajar siswa" . $data['kelas']['nama'])
			->setKeywords("Laporan_Kelompok");
		// Add some data 
		if ($view != NULL) {
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('B1', 'Laporan Kelompok Belajar Siswa ' . $view[0]['kategori']);
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B1:E1');
		} else {
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('B1', 'Laporan Kelompok Belajar Siswa');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B1:E1');
		}

		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('B2', 'Kelas ' . $data['kelas']['nama']);
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B2:E2');
		//$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:B2');


		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('B4', 'No')
			->setCellValue('C4', 'NIS')
			->setCellValue('D4', 'Nama Siswa')
			->setCellValue('E4', 'Kelompok');

		$no = 1;
		$cel = 5;
		foreach ($view as $roz) {

			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('B' . $cel, $no)
				->setCellValue('C' . $cel, $roz['nis'])
				->setCellValue('D' . $cel, $roz['nama'])
				->setCellValue('E' . $cel, $roz['kategori']);
			$objPHPExcel->getActiveSheet()->getStyle('B' . $cel)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$no++;
			$cel++;
		}

		// Rename worksheet (worksheet, not filename) 
		$objPHPExcel->getActiveSheet()->setTitle("Laporan Kelompok " . $data['kelas']['nama']);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getStyle('B4:E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet 
		$objPHPExcel->setActiveSheetIndex(0);

		ob_end_clean();
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Laporan_Kelompok_' . $data['kelas']['nama'] . '_' . date('dmY') . '.xls"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
	}
	public function defineKelompok($nilai1, $nilai2, $nilai3, $kkm1, $kkm2)
	{
		$pre = 0;
		$mid = 0;
		$post = 0;
		if ($nilai1 < $kkm1) {
			$pre = 1;
		} else {
			if ($nilai1 > $kkm2) {
				$pre = 3;
			} else {
				$pre = 2;
			}
		}
		if ($nilai2 < $kkm1) {
			$mid = 1;
		} else {
			if ($nilai2 > $kkm2) {
				$mid = 3;
			} else {
				$mid = 2;
			}
		}
		if ($nilai3 != NULL) {
			if ($nilai3 < $kkm1) {
				$post = 1;
			} else {
				if ($nilai3 > $kkm2) {
					$post = 3;
				} else {
					$post = 2;
				}
			}
		}
		if ($post == 0) {
			if ($pre == $mid) {
				if ($pre == 3) {
					return 5;
				} else if ($pre == 2) {
					return 6;
				} else if ($pre == 1) {
					return 7;
				}
			} else if ($pre < $mid) {
				return 2;
			} else {
				return 1;
			}
		} else {
			if ($pre == $mid) {
				if ($mid == $post) {
					if ($pre == 3) {
						return 5;
					} else if ($pre == 2) {
						return 6;
					} else if ($pre == 1) {
						return 7;
					}
				} else if ($mid < $post) {
					return 2;
				} else if ($mid > $post) {
					return 1;
				}
			} else if ($pre < $mid) {
				if ($mid == $post) {
					return 2;
				} else if ($mid < $post) {
					return 2;
				} else if ($mid > $post) {
					return 4;
				}
			} else { //pre > mid
				if ($mid == $post) {
					return 1;
				} else if ($mid < $post) {
					return 3;
				} else if ($mid > $post) {
					return 1;
				}
			}
		}
	}
}
