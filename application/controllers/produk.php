<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_in') && ($this->session->userdata('tipeUser') == 1 || $this->session->userdata('tipeUser') == 2)) {
            $this->load->model('userModel');
            $this->load->model('ukmProfileModel');
            $this->load->model('ukmModel');
            $this->load->model('artikelModel');
            $this->load->model('produkModel');
        } else {
            redirect('user');
        }
    }

    public function index() {
        
    }

    public function produkInput() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['action'] = site_url('produk/produkSave');
        $data['view'] = 'admin/inputProduk';
        $data['title'] = 'Input Produk';
        $this->load->view('templateAdmin', $data);
    }

    public function produkList() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['action'] = site_url('produk/produkDeleteSelected');
        $data['produk'] = $this->produkModel->getAllProduk();
        $data['view'] = 'admin/listProduk';
        $data['title'] = 'List Produk';
        $this->load->view('templateAdmin', $data);
    }

    public function produkSave() {
        $idUkm = $this->ukmModel->getIdUkm($this->session->userdata('id'));
        $produk = array(
            'idUkm' => $idUkm,
            'namaProduk' => $this->input->post('namaProduk'),
            'hargaProduk' => $this->input->post('hargaProduk'),
            'gambarProduk' => $this->input->post('gambarProduk'),
            'deskripsiProduk' => $this->input->post('deskripsiProduk'),
            'tglInput' => date('Y-m-d H:i:s'),
            'inputBy' => $this->session->userdata('id')
        );
//        $check = $this->productsModel->getSameName($products['namaProducts']);
//        if (!empty($check) && $check != NULL) {
//            $this->session->set_flashdata('notif', 'Nama produk telah digunakan');
//            redirect('products/productsManage');
//        }
        if ($_FILES['content']['error'] == 0) {
            $status = $this->produkModel->upload_pic('./produk/');
            if ($status['status'] == TRUE) {
                $produk['gambarProduk'] = $status['img_name'];
            } else {
                redirect('produk/produkInput');
            }
        } else if ($_FILES['content'][error] == 4) {
            $this->session->set_flashdata('notif', 'masukkan file gambar produk terlebih dahulu');
            redirect('produk/produkInput');
        } else {
            $this->session->set_flashdata('notif', 'File gambar produk rusak');
            redirect('produk/produkInput');
        }
        $idArtikel = $this->produkModel->saveProduk($id, $produk);
        redirect('produk/produkList');
    }

    public function produkEdit($id) {
        if ($id) {
            $data['notif'] = $this->session->flashdata('notif');
            $data['produkDetail'] = $this->produkModel->getProdukDetail($id);
            $data['action'] = site_url('produk/produkUpdate');
            $data['view'] = 'admin/inputProduk';
            $data['title'] = 'Update Produk';
            $this->load->view('templateAdmin', $data);
        } else {
            redirect('user/userError');
        }
    }

    public function produkUpdate() {
        $id = $this->input->post('idProduk');
        $idUkm = $this->ukmModel->getIdUkm($this->session->userdata('id'));
        $produk = array(
            'idUkm' => $idUkm,
            'namaProduk' => $this->input->post('namaProduk'),
            'hargaProduk' => $this->input->post('hargaProduk'),
            'deskripsiProduk' => $this->input->post('deskripsiProduk'),
            'tglUpdate' => date('Y-m-d H:i:s'),
            'updateBy' => $this->session->userdata('id')
        );
//        $check = $this->productsModel->getSameName($products['namaProducts']);
//        if (!empty($check) && $check != NULL) {
//            $this->session->set_flashdata('notif', 'Nama produk telah digunakan');
//            redirect('products/productsManage');
//        }
        if ($_FILES['content']['error'] == 0) {
            $status = $this->produkModel->upload_pic('./produk/');
            if ($status['status'] == TRUE) {
                $produk['gambarProduk'] = $status['img_name'];
            } else {
                redirect('produk/produkEdit/' . $id);
            }
        } else if ($_FILES['content'][error] == 4) {
            $gambar = FALSE;
        } else {
            $this->session->set_flashdata('notif', 'File gambar artikel rusak');
            redirect('produk/produkEdit/' . $id);
        }
        $idArtikel = $this->produkModel->saveProduk($id, $produk);
        redirect('produk/produkList');
    }

    public function produkDelete($id = NULL) {
        $id = $this->input->post('id');
        $status = $this->produkModel->deleteProduk($id);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function produkDeleteSelected() {
        $check = $this->input->post('check');
        $result = $this->produkModel->deleteProdukSelected($check);
        if ($result == FALSE) {
            $this->session->set_flashdata('notif', 'Data bershasil dihapus');
            redirect('produk/produkList');
        } else {
            $this->session->set_flashdata('notif', 'Data gagal dihapus');
            redirect('produk/produkList');
        }
    }

    public function produkSearchAuto($key = NULL) {
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($this->produkModel->searchAutoProduk($key)));
//        //$key = $this->input->post('search');
//        $data = $this->produkModel->searchAutoProduk($key);
//        header('Content-Type: application/x-json; charset=utf-8');
//
//        echo (json_encode($data));
    }

}
