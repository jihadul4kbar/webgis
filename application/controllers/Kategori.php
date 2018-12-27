<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function index()
	{
		$data = array(
			'judul' => "Kategori | Web GIS Kabupaten Lombok Tengah",
			'page' => "dashboard/kategori/index",
			'data_kategori' => $this->Kategori_model->getAll()
		);
		$this->load->view('dashboard/tempelate/tempelate', $data);
	}

	function addData(){
		$data = array(
			'judul' => "Add Data Kategori | Web GIS Kabupaten Lombok Tengah",
			'page' => "dashboard/kategori/form",
		);
		$this->load->view('dashboard/tempelate/tempelate', $data);
	}

	function saveData(){
		$data = array(
			'judul' => "Add Data Kategori | Web GIS Kabupaten Lombok Tengah",
			'page' => "dashboard/kategori/form",
		);
		$kategori = $this->Kategori_model;
		$validation = $this->form_validation;
		$validation->set_rules($kategori->rules());

		if($validation->run()){
			$kategori->saveData();
			$this->session->set_flashdata('massage', ' Data Berhasil Disimpan');
		}
		$this->load->view('dashboard/tempelate/tempelate', $data);
	}
}