<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {
	public function index()
	{
		$data['judul'] = "Lokasi | Web GIS Kabupaten Lombok Tengah";
		$data['page'] = "dashboard/lokasi/index";
		$this->load->view('dashboard/tempelate/tempelate', $data);
	}
}
