<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Kategori_model extends CI_Model{
    private $_table = "kategori";

    public $idkategori;
    public $nama_kategori;
    public $icon;
    public $keterangan;

    public function rules(){
        return[
                [
                    'field'=>'nama_kategori',
                    'label'=>'Nama Kategori',
                    'rules'=>'required'
                ]
            ];
    }

    public function getAll(){
        return $this->db->get($this->_table)->result();
    }

    public function getById($id){
        return $this->db->get_where($this->_table, ["idkategori" => $id])->row();
    }

    public function saveData(){
        $post = $this->input->post();
        $this->idkategori = uniqid();
        $this->nama_kategori = $post['nama_kategori'];
        $this->icon = $post['icon'];
        $this->keterangan = $post['keterangan'];
        $this->db->insert($this->_table, $this);
    }

    public function updateData(){
        $post = $this->input->post();
        $this->idkategori = $post['id'];
        $this->nama_kategori = $post['nama_kategori'];
        $this->icon = $post['icon'];
        $this->keterangan = $post['keterangan'];
        $this->db->update($this->_table, $this, array("idkategori" => $post['id']));
    }

    public function deleteData($id){
        return $this->db->delete($this->_table, array("idkategori" => $id));
    }

}