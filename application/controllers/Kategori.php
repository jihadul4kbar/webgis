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
		$kategori = $this->Kategori_model;
		$validation = $this->form_validation;
		$validation->set_rules($kategori->rules());

		if($validation->run()){
			$kategori->saveData();
			$this->session->set_flashdata('massage', ' Data Berhasil Disimpan');
		}
		$data = array(
			'judul' => "Add Data Kategori | Web GIS Kabupaten Lombok Tengah",
			'page' => "dashboard/kategori/form",
		);
		$this->load->view('dashboard/tempelate/tempelate', $data);
	}

	public function edit($id = null)
    {
        if (!isset($id)) redirect('kategori');
       
        $kategori = $this->Kategori_model;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kategori"] = $kategori->getById($id);
        if (!$data["kategori"]) show_404();
        $data = array(
			'judul' => "Add Data Kategori | Web GIS Kabupaten Lombok Tengah",
			'page' => "dashboard/kategori/edit",
		);
		$this->load->view('dashboard/tempelate/tempelate', $data);
	}
	
	public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Kategori_model->deleteData($id)) {
            redirect(site_url('kategori'));
        }
    }
}