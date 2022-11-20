<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriPelanggaran extends CI_Controller {
	private $head;
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
}
