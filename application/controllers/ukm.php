<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ukm extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_in') && ($this->session->userdata('tipeUser') == 1 || $this->session->userdata('tipeUser') == 2)) {
            $this->load->model('userModel');
            $this->load->model('ukmProfileModel');
            $this->load->model('ukmModel');
        } else {
            redirect('user');
        }
    }

    public function index() {
        
    }

    public function ukmList() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['allUkm'] = $this->ukmModel->getAllUkmRequest(1);
        $data['headTitle'] = 'UKM';
        $data['view'] = 'admin/listUkm';
        $data['title'] = 'List UKM';
        $this->load->view('templateAdmin', $data);
    }

    public function ukmRequest() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['allUkm'] = $this->ukmModel->getAllUkmRequest(0);
        $data['headTitle'] = 'Requested UKM';
        $data['view'] = 'admin/listUkm';
        $data['title'] = 'Requested UKM';
        $this->load->view('templateAdmin', $data);
    }

    public function ukmDetail($id = NULL) {
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($this->ukmModel->getUkmDetail($id)));
    }

    public function ukmConfirm($id = NULL) {
        $id = $this->input->post('id');
        $this->db->update('user', array('isActive' => 1), array('id' => $id));
        if ($this->db->affected_rows()) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function ukmDelete($id = NULL) {
        $id = $this->input->post('id');
        $status = $this->ukmModel->deleteUkm($id);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function ukmDeleteSelected() {
        $check = $this->input->post('check');
        $result = $this->ukmModel->deleteUkmSelected($check);
        if ($result == FALSE) {
            $this->session->set_flashdata('notif', 'Data bershasil dihapus');
            redirect('ukm');
        } else {
            $this->session->set_flashdata('notif', 'Data gagal dihapus');
            redirect('ukm');
        }
    }

    public function ukmTambahKategori() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['kategori'] = $this->ukmModel->getAllKategoriUkm();
        $data['action'] = site_url('ukm/ukmSaveKategori');
        $data['title'] = 'Tambah Kategori UKM';
        $data['view'] = 'admin/inputKategoriUkm';
        $this->load->view('templateAdmin', $data);
    }

    public function ukmSaveKategori() {
        $kategori = array(
            'namaKategoriUkm' => $this->input->post('namaKategoriUkm')
        );
        if ($this->input->post('idKategori')) {
            $id = $this->input->post('idKategori');
        }
        $this->ukmModel->saveKategoriUkm($id = NULL, $kategori);
        redirect('ukm/ukmTambahKategori');
    }

    public function ukmEditKategori($id) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['kategori'] = $this->ukmModel->getAllKategoriUkm();
        $data['kategoriDetail'] = $this->ukmModel->getKategoriUkmDetail($id);
        $data['action'] = site_url('ukm/ukmSaveKategori');
        $data['title'] = 'Edit Kategori UKM';
        $data['view'] = 'admin/inputKategoriUkm';
        $this->load->view('templateAdmin', $data);
    }

    public function ukmDeleteKategori($id) {
        $result = $this->ukmModel->getKategoriUkmDetail($id);
        if (count($result) > 0) {
            $this->db->trans_start();
            $this->db->query('DELETE FROM ukmkategori WHERE id=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();
        }
        if ($data){
            $this->session->set_flashdata('notif', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('notif', 'Data gagal dihapus');
        }
        redirect('ukm/ukmTambahKategori');
    }
    
}
