<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {
	public function index()
	{
		$lokasi = $this->Lokasi_model->get_all();

        $data = array(
        	'judul' => "Lokasi | Web GIS Kabupaten Lombok Tengah",
        	'page' =>  "dashboard/lokasi/index",
            'lokasi_data' => $lokasi
        );
		$this->load->view('dashboard/tempelate/tempelate', $data);
	}

	public function create(){
		 $data = array(
            'button' 		=> 'Simpan',
            'judul' 		=> 'Form Lokasi',
            'sub_title' 	=> 'Tambah data baru',
            'action' 		=> site_url('lokasi/create_action'),
			'idlokasi' 		=> set_value('idlokasi'),
			'nama' 			=> set_value('nama'),
			'latitude' 		=> set_value('latitude'),
			'logitude' 		=> set_value('logitude'),
			'idalbum' 		=> set_value('idalbum'),
			'idkategori' 	=> set_value('idkategori'),
			'keterangan' 	=> set_value('keterangan')		
	);
		$data['kategori'] = $this->db->query('SELECT * FROM kategori')->result();
		$data['page'] = "dashboard/lokasi/form";
        $this->load->view('dashboard/tempelate/tempelate', $data);
	}
	
	public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idlokasi' => $this->input->post('idlokasi',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'latitude' => $this->input->post('latiude',TRUE),
		'logitude' => $this->input->post('logitude',TRUE),
		'idalbum' => $this->input->post('idalbum',TRUE),
		'idkategori' => $this->input->post('idkategori',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Lokasi_model->insert($data);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Create Record Success</p>');
            redirect(site_url('Lokasi'));
        }
    }

    public function update($id) 
    {
        $row = $this->Lokasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'judul' => 'Lokasi | Web GIS Kabupaten Lombok Tengah',
                'sub_title' => 'Ubah Data',
                'action' => site_url('lokasi/update_action'),
		'idlokasi' => set_value('idlokasi', $row->idlokasi),
		'nama' => set_value('nama', $row->nama),
		'latitude' => set_value('latitude', $row->latitude),
		'logitude' => $this->input->post('logitude', $row->logitude),
		'idalbum' => $this->input->post('idalbum', $row->idalbum),
		'idkategori' => $this->input->post('idkategori', $row->idkategori),
		'keterangan' => $this->input->post('keterangan', $row->keterangan)
	    );
			$data['page'] = "dashboard/lokasi/form";
        	$this->load->view('dashboard/tempelate/tempelate', $data);
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Record Not Found</p>');
            redirect(site_url('lokasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idlokasi', TRUE));
        } else {
            $data = array(
		'idlokasi' => $this->input->post('idlokasi',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'latitude' => $this->input->post('latiude',TRUE),
		'logitude' => $this->input->post('logitude',TRUE),
		'idalbum' => $this->input->post('idalbum',TRUE),
		'idkategori' => $this->input->post('idkategori',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Lokasi_model->update($this->input->post('idlokasi', TRUE), $data);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update Record Success</p>');
            redirect(site_url('lokasi'));
        }
    }

    public function delete($id) 
    {
        $row = $this->Lokasi_model->get_by_id($id);

        if ($row) {
            $this->Lokasi_model->delete($id);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Delete Record Success</p>');
            redirect(site_url('jenis'));
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Record Not Found</p>');
            redirect(site_url('jenis'));
        }
    }

  public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'Nama Lokasi', 'trim|required');
	$this->form_validation->set_rules('latitude', 'Latiude', 'trim|required');
	$this->form_validation->set_rules('logitude', 'Logitude', 'trim|required');
	$this->form_validation->set_rules('idkategori', 'Id Katerori', 'trim|required');
	$this->form_validation->set_rules('idalbum', 'Id Album', 'trim|required');
	$this->form_validation->set_rules('idlokasi', 'Id Lokasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

