<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Msg extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_in') && ($this->session->userdata('tipeUser') == 1 || $this->session->userdata('tipeUser') == 2)) {
            $this->load->model('userModel');
            $this->load->model('ukmProfileModel');
            $this->load->model('ukmModel');
            $this->load->model('artikelModel');
            $this->load->model('msgModel');
        } else {
            redirect('user');
        }
    }

    public function index() {
        
    }

    public function msgMail() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['action'] = site_url('msg/msgSend');
        $data['view'] = 'admin/templateMsg';
        $data['msgView'] = 'admin/msg';
        $data['title'] = 'UKM Mail';
        $this->load->view('templateAdmin', $data);
    }

    public function msgCompose() {
        $data['notif'] = $this->session->flashdata('notif');
        if ($this->session->userdata('tipeUser') == 1) {
            $data['user'] = $this->userModel->getAllUkm();
        } else {
            $data['user'] = $this->userModel->getAllAdmin();
        }
        $data['action'] = site_url('msg/msgSend');
        $data['view'] = 'admin/templateMsg';
        $data['msgView'] = 'admin/compose';
        $data['title'] = 'UKM Mail';
        $this->load->view('templateAdmin', $data);
    }

}
