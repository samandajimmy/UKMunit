<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_in') && ($this->session->userdata('tipeUser') == 1 || $this->session->userdata('tipeUser') == 2)) {
            $this->load->model('userModel');
            $this->load->model('ukmProfileModel');
            $this->load->model('ukmModel');
            $this->load->model('artikelModel');
        } else {
            redirect('user');
        }
    }

    public function index() {
        
    }

    public function artikelInput() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['action'] = site_url('artikel/artikelSave');
        $data['view'] = 'admin/inputArtikel';
        $data['title'] = 'Input Artikel';
        $this->load->view('templateAdmin', $data);
    }

    public function artikelList() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['action'] = site_url('artikel/artikelDeleteSelected');
        $data['artikel'] = $this->artikelModel->getAllArtikel();
        $data['view'] = 'admin/listArtikel';
        $data['title'] = 'List Artikel';
        $this->load->view('templateAdmin', $data);
    }

    public function artikelSave() {
        $artikel = array(
            'namaArtikel' => $this->input->post('namaArtikel'),
            'deskripsiArtikel' => $this->input->post('deskripsiArtikel'),
            'isiArtikel' => $this->input->post('isiArtikel'),
            'tagArtikel' => $this->input->post('tagArtikel'),
            'tglInput' => date('Y-m-d H:i:s'),
            'inputBy' => $this->session->userdata('id')
        );
//        $check = $this->productsModel->getSameName($products['namaProducts']);
//        if (!empty($check) && $check != NULL) {
//            $this->session->set_flashdata('notif', 'Nama produk telah digunakan');
//            redirect('products/productsManage');
//        }
        if ($_FILES['content']['error'] == 0) {
            $status = $this->artikelModel->upload_pic('./artikel/');
            if ($status['status'] == TRUE) {
                $artikel['gambarArtikel'] = $status['img_name'];
            } else {
                redirect('artikel/artikelInput');
            }
        } else if ($_FILES['content'][error] == 4) {
            $this->session->set_flashdata('notif', 'masukkan file gambar artikel terlebih dahulu');
            redirect('artikel/artikelInput');
        } else {
            $this->session->set_flashdata('notif', 'File gambar artikel rusak');
            redirect('artikel/artikelInput');
        }
        $idArtikel = $this->artikelModel->saveArtikel($id = NULL, $artikel);
        redirect('artikel/artikelList');
    }

    public function artikelEdit($id) {
        if ($id) {
            $data['notif'] = $this->session->flashdata('notif');
            $data['artikelDetail'] = $this->artikelModel->getArtikelDetail($id);
            $data['action'] = site_url('artikel/artikelUpdate');
            $data['view'] = 'admin/inputArtikel';
            $data['title'] = 'Input Artikel';
            $this->load->view('templateAdmin', $data);
        } else {
            redirect('user/userError');
        }
    }

    public function artikelUpdate() {
        date_default_timezone_set();
        $id = $this->input->post('idArtikel');
        $artikel = array(
            'namaArtikel' => $this->input->post('namaArtikel'),
            'deskripsiArtikel' => $this->input->post('deskripsiArtikel'),
            'isiArtikel' => $this->input->post('isiArtikel'),
            'tagArtikel' => $this->input->post('tagArtikel'),
            'tglUpdate' => date('Y-m-d H:i:s'),
            'UpdateBy' => $this->session->userdata('id')
        );
//        $check = $this->productsModel->getSameName($products['namaProducts']);
//        if (!empty($check) && $check != NULL) {
//            $this->session->set_flashdata('notif', 'Nama produk telah digunakan');
//            redirect('products/productsManage');
//        }
        if ($_FILES['content']['error'] == 0) {
            $status = $this->artikelModel->upload_pic('./artikel/');
            if ($status['status'] == TRUE) {
                $artikel['gambarArtikel'] = $status['img_name'];
            } else {
                redirect('artikel/artikelEdit/' . $id);
            }
        } else if ($_FILES['content'][error] == 4) {
            $gambar = FALSE;
        } else {
            $this->session->set_flashdata('notif', 'File gambar artikel rusak');
            redirect('artikel/artikelEdit/' . $id);
        }
        $idArtikel = $this->artikelModel->saveArtikel($id, $artikel);
        redirect('artikel/artikelList');
    }

    public function artikelDelete($id = NULL) {
        $id = $this->input->post('id');
        $status = $this->artikelModel->deleteArtikel($id);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function artikelDeleteSelected() {
        $check = $this->input->post('check');
        $result = $this->artikelModel->deleteArtikelSelected($check);
        if ($result == FALSE) {
            $this->session->set_flashdata('notif', 'Data bershasil dihapus');
            redirect('artikel/artikelList');
        } else {
            $this->session->set_flashdata('notif', 'Data gagal dihapus');
            redirect('artikel/artikelList');
        }
    }

}
