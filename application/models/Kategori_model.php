<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Kategori_model extends CI_Model{
    private $_table = "kategori";

    public $idKategori;
    public $nama_kategori;
    public $icon;
    public $keterangan;

    public function rules(){
        return[
                [
                    'field'=>'nama_kategori',
                    'label'=>'Nama Kategori',
                    'rules'=>'required'
                ],
                [
                    'field'=>'icon',
                    'label'=>'Icon',
                    'rules'=>'required'
                ],
                [
                    'field'=>'keterangan',
                    'label'=>'Keterangan',
                    'rules'=>'required'
                ]
            ];
    }

    public function getAll(){
        return $this->db->get($this->_table)->result();
    }

    public function getById($id){
        return $this->db->get_where($this->_table, ["idKategori" => $id])->row();
    }

    public function saveData(){
        $post = $this->input->post();
        $this->idKategori = uniqid();
        $this->nama_kategori = $post['nama_kategori'];
        $this->icon = $post['icon'];
        $this->keterangan = $post['keterangan'];
        $this->db->insert($this->_table, $this);
    }

    public function updateData(){
        $post = $this->input->post();
        $this->idKategori = $post['id'];
        $this->nama_kategori = $post['nama_kategori'];
        $this->icon = $post['icon'];
        $this->keterangan = $post['keterangan'];
        $this->db->update($this->_table, $this, array("idKategori" => $post['id']));
    }

    public function deleteData(){
        return $this->db->delete($this->_table, array("idKategori" => $id));
    }

}