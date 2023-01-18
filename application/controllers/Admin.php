<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	private $head;
	public function __construct()
	{
		parent::__construct();
		$this->head['kelasheader'] = $this->KelasModel->selectAll()->result_array();
	}
	public function index()
	{
		$this->load->view('layout/aheader', $this->head);
		$this->load->view('admin/overview');
		$this->load->view('layout/afooter');
	}
	public function guru()
	{
		$data['guru'] = $this->GuruModel->selectAllJoinguru()->result_array();

		// var_dump($data['guru']);
		$this->load->view('layout/aheader', $this->head);
		$this->load->view('admin/guru', $data);
		$this->load->view('layout/afooter');
	}
	public function guruAct($comm, $id = 0)
	{
		if ($comm == "add") {
			$data['mapel'] = $this->MapelModel->selectAll()->result();
			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/fGuru', $data);
			$this->load->view('layout/afooter');	//
		} else if ($comm == "add2") {
			$data = $this->input->post();
			$users['username'] = $data['nip'];
			$users['password'] = password_hash($data['nip'], PASSWORD_DEFAULT);
			$users['kategori'] = 'guru';
			$data['id_user'] = $this->UserModel->insert($users);
			$this->GuruModel->insert($data);
			redirect('admin/guru/');
		} else if ($comm == "del") {
			$id_user = $this->GuruModel->selectById($id)->row()->id_user;
			$this->GuruModel->delete($id);
			$this->UserModel->delete($id_user);
			redirect('admin/guru');
		} else if ($comm == "edit") {
			$data['edit'] = $this->GuruModel->selectById($id)->result_array()[0];
			$data['mapel'] = $this->MapelModel->selectAll()->result();
			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/fGuruEdit', $data);
			$this->load->view('layout/afooter');
		} else if ($comm == "edit2") {
			$data = $this->input->post();
			$this->GuruModel->update($data['id'], $data);
			redirect('admin/guru/');
		}
	}

	public function grouptatib()
	{
		$data['tatib'] = $this->GroupTatibModel->selectAll()->result();
		$this->load->view('layout/aheader', $this->head);
		$this->load->view('admin/grouptatib', $data);
		$this->load->view('layout/afooter');
	}

	public function grouptatibAct($comm, $id = 0)
	{
		if ($comm == "add") {
			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/fgrouptatib');
			$this->load->view('layout/afooter');
		} else if ($comm == "add2") {
			$data = $this->input->post();
			$temp['kriteria'] = $_POST['kriteria'];
			print_r($data);
			$cek = $this->db->get_where('tb_group_tatib', $temp)->row();
			if ($cek == NULL) {
				$this->GroupTatibModel->insert($data);
				$this->session->set_flashdata('notif', 'Data berhasil disimpan');
			} else {
				$this->session->set_flashdata('notif', 'Kriteria sudah ada pada database');
			}

			redirect('admin/grouptatib/');
		} else if ($comm == "edit") {
			$data['edit'] = $this->GroupTatibModel->selectById($id)->result()[0];
			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/fgrouptatib', $data);
			$this->load->view('layout/afooter');
		} else if ($comm == "edit2") {
			$data = $this->input->post();
			$this->GroupTatibModel->update($data['kriteria2'], $data);
			redirect('admin/grouptatib/');
		} else if ($comm == "del") {
			$this->GroupTatibModel->delete($id);
			redirect('admin/grouptatib');
		}
	}

	public function tatib()
	{
		$data['tatib'] = $this->TatibModel->selectAll()->result();
		$data['grouptatib'] = $this->GroupTatibModel->selectAll()->result();
		// var_dump($data['tatib']);
		$this->load->view('layout/aheader', $this->head);
		$this->load->view('admin/tatib', $data);
		$this->load->view('layout/afooter');
	}
	public function tatibAct($comm, $id = 0)
	{
		if ($comm == "add") {
			$data['group_tatib'] = $this->db->get('tb_group_tatib')->result();
			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/ftatib', $data);
			$this->load->view('layout/afooter');
		} else if ($comm == "add2") {
			$data = $this->input->post();
			$wh['kode'] = $_POST['kode'];
			$cek = $this->db->get_where('tb_tatib', $wh)->row();
			if ($cek == NULL) {
				$this->TatibModel->insert($data);
				$this->session->set_flashdata('notif', 'Data berhasil disimpan');
			} else {
				$this->session->set_flashdata('notif', 'Kode sudah ada pada database');
			}

			redirect('admin/tatib/');
		} else if ($comm == "del") {
			$this->TatibModel->delete($id);
			redirect('admin/tatib');
		} else if ($comm == "edit") {
			$data['edit'] = $this->TatibModel->selectById($id)->result()[0];
			$data['group_tatib'] = $this->db->get('tb_group_tatib')->result();
			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/ftatib', $data);
			$this->load->view('layout/afooter');
		} else if ($comm == "edit2") {
			$data = $this->input->post();
			$this->TatibModel->update($data['id_tatib'], $data);
			redirect('admin/tatib/');
		}
	}
	public function sanksi()
	{
		$data['sanksi'] = $this->SanksiModel->selectAll()->result_array();

		// var_dump($data['sanksi']);
		$this->load->view('layout/aheader', $this->head);
		$this->load->view('admin/sanksi', $data);
		$this->load->view('layout/afooter');
	}

	public function sanksiAct($comm, $id = 0)
	{
		if ($comm == "add") {
			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/fsanksi');
			$this->load->view('layout/afooter');
		} else if ($comm == "add2") {
			$data = $this->input->post();
			$this->SanksiModel->insert($data);
			redirect('admin/sanksi/');
		} else if ($comm == "del") {
			$this->SanksiModel->delete($id);
			redirect('admin/sanksi');
		} else if ($comm == "edit") {
			$data['edit'] = $this->SanksiModel->selectById($id)->result()[0];
			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/fsanksi', $data);
			$this->load->view('layout/afooter');
		} else if ($comm == "edit2") {
			$data = $this->input->post();
			$this->SanksiModel->update($data['id_sanksi'], $data);
			redirect('admin/sanksi/');
		}
	}
	public function kelas()
	{
		$data['kelas'] = $this->KelasModel->selectAll()->result_array();

		// var_dump($data['kelas']);
		$this->load->view('layout/aheader', $this->head);
		$this->load->view('admin/kelas', $data);
		$this->load->view('layout/afooter');
	}
	public function kelasAct($comm, $id = 0)
	{
		if ($comm == "add") {
			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/fKelas');
			$this->load->view('layout/afooter');	//
		} else if ($comm == "add2") {
			$data = $this->input->post();
			$this->KelasModel->insert($data);
			redirect('admin/kelas/');
		} else if ($comm == "del") {
			$this->KelasModel->delete($id);
			redirect('admin/kelas');
		} else if ($comm == "edit") {
			$data['edit'] = $this->KelasModel->selectById($id)->result_array()[0];
			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/fKelasEdit', $data);
			$this->load->view('layout/afooter');
		} else if ($comm == "edit2") {
			$data = $this->input->post();
			$this->KelasModel->update($data['id'], $data);
			redirect('admin/kelas/');
		}
	}

	public function siswa($id_kelas)
	{
		$data['siswa'] = $this->SiswaModel->selectByIdKelas($id_kelas)->result_array();
		// var_dump($data['siswa']);
		// var_dump($this->head);
		$this->load->view('layout/aheader', $this->head);
		$this->load->view('admin/siswa', $data);
		$this->load->view('layout/afooter');
	}
	public function siswaAct($comm, $id = 0)
	{
		if ($comm == "add") {
			$data['kelas'] = $this->KelasModel->selectById($id)->row_array();
			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/fSiswa', $data);
			$this->load->view('layout/afooter');
		} else if ($comm == "add2") {
			$data = $this->input->post();
			$users['username'] = $data['nis'];
			$siswa = $this->SiswaModel->selectByNIS($data['nis']);
			if($siswa->num_rows() > 0){
				$this->session->set_flashdata('msg', 'NIS sudah terdaftar');
				redirect('admin/siswaAct/add/'.$data['id_kelas']);
			} else {
				$users['password'] = password_hash($data['nis'], PASSWORD_DEFAULT);
				$users['kategori'] = 'siswa';
				$data['id_user'] = $this->UserModel->insert($users);
				$this->SiswaModel->insert($data);
				$this->session->set_flashdata('msg', 'Siswa berhasil ditambahkan');
				redirect('admin/siswa/' . $data['id_kelas']);
			}
		} else if ($comm == "del") {
			$id_user = $this->SiswaModel->selectById($id)->row()->id_user;
			$id_kelas = $this->SiswaModel->selectById($id)->row()->id_kelas;
			$this->SiswaModel->delete($id);
			$this->UserModel->delete($id_user);
			$this->session->set_flashdata('msg', 'Siswa berhasil dihapus');
			redirect('admin/siswa/' . $id_kelas);
		} else if ($comm == "add3") {
			$data['kelas'] = $this->KelasModel->selectById($id)->row_array();
			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/fSiswaExcel', $data);
			$this->load->view('layout/afooter');
		} else if ($comm == "add4") {
			$config['upload_path']		= './uploads/excel/';
			$config['allowed_types']	= 'xls|xlsx';
			$config['max_size']			= 0;
			date_default_timezone_set("Asia/Bangkok");
			$config['file_name']		= "Excel_" . time();
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("excel")) {
				//gagal
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			} else {
				try {
					$objPHPExcel = PHPExcel_IOFactory::load('uploads/excel/' . $config['file_name'] . $this->upload->data('file_ext'));
				} catch (Exception $e) {
					die('Error loading file :' . $e->getMessage());
				}
				$id_kelas = $this->input->post('id_kelas');
				$dataE = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
				$i = 1;
				foreach ($dataE as $row) {
					if ($i != 1 && $row['A'] != "") {
						$data['nis'] = $row['A'];
						$users['username'] = $row['A'];
						$users['password'] = password_hash($data['nis'], PASSWORD_DEFAULT);
						$users['kategori'] = 'siswa';
						$data['id_user'] = $this->UserModel->insert($users);
						$data['nama'] = $row['B'];
						$data['email'] = $row['C'];
						$data['kontak'] = $row['D'];
						$data['id_kelas'] = $id_kelas;
						// var_dump($users);
						$this->SiswaModel->insert($data);
					}
					$i++;
				}
			}
			redirect('Admin/siswa/' . $id_kelas);
		} else if ($comm == "edit") {
			$this->db->where('id', $id);
			// $data['edit']=$this->SiswaModel->selectById($id)->result_array()[0];
			$data['edit'] = $this->db->get('tb_siswa')->row_array();
			$data['kelas'] = $this->KelasModel->selectById($data['edit']['id_kelas'])->row_array();
			// var_dump($data); die;

			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/fSiswaEdit', $data);
			$this->load->view('layout/afooter');
		} else if ($comm == "edit2") {
			$data = $this->input->post();
			$this->SiswaModel->update($data['id'], $data);
			$id_kelas = $this->input->post('id_kelas');
			redirect('Admin/siswa/' . $id_kelas);
		}
	}
	public function jadwal($id_kelas)
	{
		$data['jadwal'] = $this->ViewModel->selectWhere('viewjadwalajar', '*', ['idk' => $id_kelas])->result_array();
		// var_dump($data['jadwal']);
		$this->load->view('layout/aheader', $this->head);
		$this->load->view('admin/jadwal', $data);
		$this->load->view('layout/afooter');
	}
	public function jadwalAct($comm, $id = 0)
	{
		if ($comm == "add") {
			$data['kelas'] = $this->KelasModel->selectById($id)->row_array();
			$data['guru'] = $this->GuruModel->selectAllJoinMapel()->result_array();
			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/fJadwal', $data);
			$this->load->view('layout/afooter');	//
		} else if ($comm == "add2") {
			$data = $this->input->post();
			$this->JadwalModel->insert($data);
			redirect('admin/jadwal/' . $data['id_kelas']);
		} else if ($comm == "del") {
			$id_kelas = $this->JadwalModel->selectById($id)->row()->id_kelas;
			$this->JadwalModel->delete($id);
			redirect('admin/jadwal/' . $id_kelas);
		} else if ($comm == "edit") {
			$data['edit'] = $this->JadwalModel->selectById($id)->result_array()[0];
			$data['kelas'] = $this->KelasModel->selectById($id)->row_array();
			$data['guru'] = $this->GuruModel->selectAllJoinMapel()->result_array();
			// var_dump($data);

			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/fJadwalEdit', $data);
			$this->load->view('layout/afooter');
		} else if ($comm == "edit2") {
			$data = $this->input->post();
			$this->JadwalModel->update($data['id'], $data);
			$id_kelas = $this->input->post('id_kelas');
			redirect('admin/jadwal/' . $data['id_kelas']);
		}
	}

	public function pelanggaran()
	{
		$search = null;
		if($this->input->get('search')){
			$search = $this->input->get('search');
		}
		$data['guru'] = $this->GuruModel->selectAllJoinguru()->result_array();
		$data['siswa_melanggar'] = $this->PelanggaranModel->selectAllSiswaMelanggar($search)->result_array();
		$this->load->view('layout/aheader', $this->head);
		$this->load->view('pelanggaran/daftar', $data);
		$this->load->view('layout/afooter');
	}

	public function pelanggaranAct($comm, $id = 0)
	{
		if ($comm == "del") {
			$this->PelanggaranModel->delete($id);
			redirect('admin/pelanggaran');
		} else if ($comm == "edit") {
			$data['edit'] = $this->GuruModel->selectById($id)->result_array()[0];
			$data['mapel'] = $this->MapelModel->selectAll()->result();
			$this->load->view('layout/aheader', $this->head);
			$this->load->view('admin/fGuruEdit', $data);
			$this->load->view('layout/afooter');
		} else if ($comm == "edit2") {
			$data = $this->input->post();
			$this->GuruModel->update($data['id'], $data);
			redirect('admin/guru/');
		}
	}

	public function changePass()
	{
		$this->load->view('layout/aheader', $this->head);
		$this->load->view('ubah');
		$this->load->view('layout/afooter');
	}

	// public function createUser()
	// {
	// 	$this->load->model('userModel');
	// 	$this->userModel->insertAllUser();
	// }
}
