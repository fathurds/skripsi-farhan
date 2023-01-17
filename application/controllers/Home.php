<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

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
	public function index()
	{
		$this->load->view('index');
	}
	public function login()
	{
		$cek = $this->db->get_where('tb_users', ['username' => $this->input->post('username')]);
		if($cek->num_rows() > 0) {
			$hasil = $cek->row();
			if (password_verify($this->input->post('password'), $hasil->password)) {
				$dataz = $this->UserModel->selectByUsername($this->input->post('username'))->row_array();
				$userdata = array(
					'id'  => $dataz['id'],
					'username'  => $dataz['username'],
					'kategori'  => $dataz['kategori'],
					'log'  => $dataz['log'],
					'logged_in' => TRUE
				);
				$this->session->set_userdata($userdata);
				if ($this->session->kategori == 'siswa')
					redirect('siswa/pelanggaran');
				elseif ($this->session->kategori == 'guru')
					redirect('guru/');
				elseif ($this->session->kategori == 'admin')
					redirect('admin/');
				elseif ($this->session->kategori == 'kepsek')
					redirect('admin/');
			} else {
				$this->session->set_flashdata('notif', 'Username atau Password salah.');
				redirect('/');
			}
		}
	}
	// public function login()
	// {
	// 	// var_dump($this->input->post());
	// 	if ($this->UserModel->checkLogin($this->input->post('username'), ($this->input->post('password')))) { //if($this->UserModel->checkLogin($this->input->post('username'),md5($this->input->post('password')))){
	// 		$dataz = $this->UserModel->selectByUsername($this->input->post('username'))->row_array();
	// 		$userdata = array(
	// 			'id'  => $dataz['id'],
	// 			'username'  => $dataz['username'],
	// 			'kategori'  => $dataz['kategori'],
	// 			'log'  => $dataz['log'],
	// 			'logged_in' => TRUE
	// 		);
	// 		$this->session->set_userdata($userdata);
	// 		if ($this->session->kategori == 'siswa')
	// 			redirect('siswa/pelanggaran');
	// 		elseif ($this->session->kategori == 'guru')
	// 			redirect('guru/');
	// 		elseif ($this->session->kategori == 'admin')
	// 			redirect('admin/');
	// 		elseif ($this->session->kategori == 'kepsek')
	// 			redirect('admin/');
	// 	} else {
	// 		$this->session->set_flashdata('notif', 'Username atau Password salah.');
	// 		redirect('/');
	// 	}
	// }
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
	public function cPass()
	{
		$data = $this->UserModel->selectByUsername($_SESSION['username'])->row_array();
		$form = $this->input->post();
		// if (($form['old']) == $data['password']) { //if(md5($form['old']) == $data['password']){
		// 	if ($form['new1'] == $form['new2']) {
		// 		$upd['password'] = ($form['new1']); //$upd['password'] = md5($form['new1']);
		// 		$this->UserModel->update($data['id'], $upd);
		// 		if ($this->session->kategori == 'siswa')
		// 			redirect('siswa/');
		// 		elseif ($this->session->kategori == 'guru')
		// 			redirect('guru/');
		// 		elseif ($this->session->kategori == 'admin')
		// 			redirect('admin/');
		// 	}
		// }

		if($form['old'] == $data['password']) {
			if ($form['new1'] == $form['new2']) {
				$upd['password'] = password_hash($form['new1'], PASSWORD_DEFAULT);
				$this->UserModel->update($data['id'], $upd);
	
				if ($this->session->kategori == 'siswa')
					redirect('siswa/');
				elseif ($this->session->kategori == 'guru')
					redirect('guru/');
				elseif ($this->session->kategori == 'admin')
					redirect('admin/');
			}
		} else {
			redirect($this->session->kategori.'/changePass');
		}
	}
}
