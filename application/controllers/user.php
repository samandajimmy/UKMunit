<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        $this->load->model('userModel');
        $this->load->model('ukmProfileModel');
        $this->load->model('ukmModel');
        $this->load->model('artikelModel');
        $this->load->model('produkModel');
    }

    public function index() {
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('user/userHome');
        } else {
            switch ($this->session->userdata('tipeUser')) {
                case 1:
                    $this->session->set_flashdata('notif', 'Selamat Datang!!' . $this->session->userdata('username'));
                    redirect('user/adminDashboard');
                    break;
                case 2:
                    $this->session->set_flashdata('notif', 'Selamat Datang!!' . $this->session->userdata('username'));
                    redirect('user/adminDashboard');
                    break;
                case 3:
                    $this->session->set_flashdata('notif', 'Selamat Datang!!' . $this->session->userdata('username'));
                    redirect('user');
                    break;
            }
        }
    }

    public function userAdmin() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['title'] = 'Login Page';
        $this->load->view('loginPage', $data);
    }

    public function userRegis() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['kategoriUkmDrop'] = $this->ukmProfileModel->getKategoriUkmDrop();
        $data['title'] = 'Registration Page';
        $this->load->view('user/regisPage', $data);
    }

    public function ukmSave() {
        $user = array(
            'username' => $this->input->post('username'),
            'password' => do_hash($this->input->post('password'), 'MD5'),
            'email' => $this->input->post('email'),
            'hash' => '',
            'isActive' => 0,
            'tipeUser' => 2
        );
        $ukm = array(
            'namaUKM' => $this->input->post('namaUKM'),
            'alamatUKM' => $this->input->post('alamatUKM'),
            'teleponUKM' => $this->input->post('teleponUKM'),
            'hpUKM' => $this->input->post('hpUKM'),
            'profilUKM' => $this->input->post('profilUKM'),
            'namaPemilik' => $this->input->post('fullname'),
            'alamatPemilik' => $this->input->post('address'),
            'kelaminPemilik' => $this->input->post('gender'),
            'kotaPemilik' => $this->input->post('city'),
        );
        $lastUserID = $this->userModel->saveUser($id, $user);
        if ($lastUserID) {
            if ($_FILES['content']['error'] == 0) {
                $status = $this->userModel->upload_pic('./ukm/');
                if ($status['status'] == TRUE) {
                    $ukm['gambarUKM'] = $status['img_name'];
                } else {
                    redirect('user/userRegis');
                }
            } else if ($_FILES['content'][error] == 4) {
                $this->session->set_flashdata('notif', 'masukkan file gambar artikel terlebih dahulu');
                redirect('user/userRegis');
            } else {
                $this->session->set_flashdata('notif', 'File gambar UKM rusak');
                redirect('user/userRegis');
            }
            $lastUkmID = $this->ukmProfileModel->saveUkmProfile($id, $ukm);
            if ($lastUkmID) {
                $ukm = array(
                    'idUkmProfile' => $lastUkmID,
                    'idKategoriUKM' => $this->input->post('idKategoriUkm'),
                    'idUser' => $lastUserID
                );
                $this->ukmModel->saveUkm($id, $ukm);
                redirect('user/userHome');
            } else {
                redirect('user/userRegis');
            }
        } else {
            redirect('user/userRegis');
        }
    }

    public function errorKategori() {
        $data['notif'] = $this->session->flashdata('notif');
        $kategori = $this->ukmModel->getAllKategoriUkm();
        foreach ($kategori as $row) {
            $data['kategori'][$row->id] = $row->namaKategoriUkm;
        }
        $data['action'] = site_url('user/updateKategori');
        $data['title'] = 'UKM Error Kategori';
        $this->load->view('admin/errorKategori', $data);
    }

    public function updateKategori() {
        if ($this->input->post('idKategori')) {
            $query = $this->db->get_where('ukm', array('idUser' => $this->session->userdata('id')));
            $ukm = $query->result();
            $this->db->update('ukm', array('idKategoriUkm' => $this->input->post('idKategori')), 'id = ' . $ukm[0]->id);
            redirect('user/adminDashboard');
        } else {
            $this->session->set_flashdata('notif', 'Silahkan pilih kategori UKM anda');
            redirect('user/errorKategori');
        }
    }

    public function adminDashboard() {
        if ($this->session->userdata('logged_in') && ($this->session->userdata('tipeUser') == 1 || $this->session->userdata('tipeUser') == 2)) {
            if ($this->session->userdata('tipeUser') == 2) {
                $query = $this->db->get_where('ukm', array('idUser' => $this->session->userdata('id')));
                $ukm = $query->result();
                $kategori = $this->ukmModel->getKategoriUkmDetail($ukm[0]->idKategoriUkm);
                if ($kategori == FALSE) {
                    $this->session->set_flashdata('notif', 'Kategori UKM anda mengalami perubahan, silahkan pilih kategori UKM anda kembali');
                    redirect('user/errorKategori');
                }
            }
            $data['notif'] = $this->session->flashdata('notif');
            $data['title'] = 'Admin Kecamatan Dashboard';
            $data['view'] = 'admin/dashboard';
            $this->load->view('templateAdmin', $data);
        } else {
            $this->session->set_flashdata('notif', 'Anda tidak memilik hak akses ke dalam sistem');
            redirect('user/userAdmin');
        }
    }

    public function adminManage() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') == 1) {
            $data['notif'] = $this->session->flashdata('notif');
            $data['admin'] = $this->userModel->getAllAdmin();
            $data['action'] = site_url('user/adminSave');
            $data['title'] = 'Manage Admin Kecamatan';
            $data['view'] = 'admin/manageAdmin';
            $this->load->view('templateAdmin', $data);
        } else {
            $this->session->set_flashdata('notif', 'Silahkan login terlebih dahulu');
            redirect('user/userAdmin');
        }
    }

    public function adminSave() {
        if ($this->input->post('password') == $this->input->post('rpassword')) {
            $admin = array(
                'username' => $this->input->post('username'),
                'password' => do_hash($this->input->post('password'), 'MD5'),
                'email' => $this->input->post('email'),
                'isActive' => 1,
                'tipeUser' => 1
            );
            $this->userModel->saveUser($id, $admin);
            redirect('user/adminManage');
        } else {
            $this->session->set_flashdata('notif', 'silahkan masukkan dua password yang sama');
            redirect('user/adminManage');
        }
    }

    public function adminEdit($id) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') == 1) {
            if ($id != NULL) {
                $data['notif'] = $this->session->flashdata('notif');
                $data['adminDetail'] = $this->userModel->getUserDetail($id);
                $data['admin'] = $this->userModel->getAllAdmin();
                $data['action'] = site_url('user/adminUpdate');
                $data['title'] = 'Manage Admin Kecamatan';
                $data['view'] = 'admin/manageAdmin';
                $this->load->view('templateAdmin', $data);
            } else {
                redirect('user/userError');
            }
        } else {
            $this->session->set_flashdata('notif', 'Silahkan login terlebih dahulu');
            redirect('user/userAdmin');
        }
    }

    public function adminUpdate() {
        $idAdmin = $this->input->post('idAdmin');
        if ($this->input->post('password') == $this->input->post('rpassword')) {
            $admin = array(
                'username' => $this->input->post('username'),
                'password' => do_hash($this->input->post('password'), 'MD5'),
                'email' => $this->input->post('email'),
            );
            $this->userModel->saveUser($idAdmin, $admin);
            redirect('user/adminManage');
        } else {
            $this->session->set_flashdata('notif', 'silahkan masukkan dua password yang sama');
            redirect('user/adminEdit/' . $idAdmin);
        }
    }

    public function adminDelete($id) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') == 1) {
            if ($id != NULL) {
                $res = $this->userModel->deleteAdmin($id);
                if ($res) {
                    $this->session->set_flashdata('notif', 'data telah berhasil dihapus');
                    redirect('user/adminManage');
                } else {
                    $this->session->set_flashdata('notif', 'data tidak berhasil dihapus');
                    redirect('user/adminManage');
                }
            } else {
                redirect('user/userError');
            }
        } else {
            $this->session->set_flashdata('notif', 'Silahkan login terlebih dahulu');
            redirect('user/userAdmin');
        }
    }

    public function userHome() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['artikel'] = $this->artikelModel->getLatestArtikel(9);
        $data['featuredArtikel'] = $this->artikelModel->getFeaturedArtikel(5);
        $data['ukm'] = $this->ukmModel->getUkmHome();
        $data['title'] = 'Home';
        $data['view'] = 'user/home';
        $data['slide'] = 'user/slide';
        $this->load->view('templateUser', $data);
    }

    //authentication method
    private function _authenticate($username, $password) {
        $query = $this->db->get_where('user', array('username' => $username));
        $res = $query->result();
        $act = $res[0]->isActive;
        if (count($res) == 1) {
            if ($act == 1) {
                if ($res[0]->password == do_hash($password, 'md5')) {
                    $newdata = array(
                        'id' => $res[0]->id,
                        'username' => $res[0]->username,
                        'logged_in' => TRUE,
                        'tipeUser' => $res[0]->tipeUser,
                    );
                    $this->session->set_userdata($newdata);
                    $respond = 1;
                } else {
                    $respond = 0;
                    $this->session->set_flashdata('notif', 'Password yang anda masukkan salah');
                }
            } else {
                $respond = 2;
                $this->session->set_flashdata('notif', 'Anda belum melakukan aktivasi account');
            }
        } else {
            $repond = 3;
            $this->session->set_flashdata('notif', 'Username tidak terdaftar');
        }
        return $respond;
    }

    public function userLogin() {
//retrieve post value
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        switch ($this->_authenticate($username, $password)) {
            case 0:
                redirect('user/userAdmin');
                break;
            case 1:
                $this->session->set_flashdata('notif', 'Selamat datang!!');
                redirect('user/adminDashboard');
                break;
            case 2:
                redirect('user/userAdmin');
                break;
            case 3:
                redirect('user/userAdmin');
                break;
        }
    }

    //logout action
    public function userLogout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('user/userAdmin');
    }

    public function userInput() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') == 0) {
            $data['notif'] = $this->session->flashdata('notif');
            $data['action'] = site_url('user/userSave');
            $data['title'] = 'Input User';
            $data['view'] = 'admin/inputUser';
            $this->load->view('templateAdmin', $data);
        } else {
            $this->session->set_flashdata('notif', 'Silahkan login sebagai admin terlebih dahulu');
            redirect('user');
        }
    }

    public function userSendingEmail($idUser) {
        $user = $this->userModel->getUserDetail($idUser);
        $config = Array(
            'protocol' => "smtp",
            'smtp_host' => "ssl://smtp.googlemail.com",
            'smtp_port' => 465,
            'smtp_user' => "samandajimmyr@gmail.com",
            'smtp_pass' => "superbubur",
            'mailtype' => "text",
            'charset' => "iso-8859-1"
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $msg = '
            Thanks for signing up! 
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below. 
 
            ------------------------ 
            Username: ' . $user[0]->username . ' 
            ------------------------ 
 
            Please click this link to activate your account: 
 
            http://localhost/ecome/index.php/user/userActivation/' . $user[0]->email . '/' . $user[0]->hash;

        $this->email->from('samandajimmyr@gmail.com', 'Jimmy Samanda');
        $this->email->to($user[0]->email);
        $this->email->subject('Email Activation');
        $this->email->message($msg);
        $this->email->send();
    }

    public function userSave() {
        $user = array(
            'username' => $this->input->post('username'),
            'password' => do_hash($this->input->post('password'), 'MD5'),
            'email' => $this->input->post('email'),
            'hash' => do_hash(rand(0, 1000), 'MD5'),
            'tipeUser' => 0,
        );
        $checkUsername = $this->userModel->getSameName($user['username']);
        $checkEmail = $this->userModel->getSameEmail($user['email']);
        if ($checkUsername) {
            if ($checkEmail) {
                $idUser = $this->userModel->saveUser($id, $user);
                $this->userSendingEmail($idUser);
                redirect('user/userInput');
            } else {
                $this->session->set_flashdata('notif', 'email telah digunakan');
                redirect('user/userInput');
            }
        } else {
            $this->session->set_flashdata('notif', 'username telah digunakan');
            redirect('user/userInput');
        }
    }

    public function userActivation() {
        $email = $this->uri->segment(3);
        $hash = $this->uri->segment(4);
        if ($email && $hash) {
            $this->db->select('isActive');
            $this->db->from('user');
            $this->db->where('email', $email);
            $query = $this->db->get();
            $data = $query->result();
            $act = $data[0]->isActive;
            if ($data) {
                if ($act == 0) {
                    $this->db->update('user', array('isActive' => 1), array('email' => $email, 'hash' => $hash));
                    print_r('1');
                    die();
                } else {
                    print_r('2');
                    die();
                }
            } else {
                print_r('3');
                die();
            }
        } else {
            print_r('4');
            die();
        }
    }

    public function ukmHome($id) {
        $data = $this->produkModel->produkPagination('ukmHome', $id);
        $data['notif'] = $this->session->flashdata('notif');
        $data['view'] = 'user/ukmHome';
        $data['title'] = 'UKM Home';
        $data['ukm'] = $this->ukmModel->getUkmDetail($id);
        $data['kategori'] = $this->ukmModel->getAllKategoriUkm();
        $data ['title'] = $data['ukm'][0]->namaUKM . ' Home';
        $this->load->view('templateUser', $data);
    }

    public function ukmList() {
        $data = $this->ukmModel->pagination('ukmList', 'ukm', $cari = NULL, $price = NULL);
        $data['notif'] = $this->session->flashdata('notif');
        $data['view'] = 'user/ukmList';
        $data['title'] = 'Daftar UKM Kami';
        $data['kategori'] = $this->ukmModel->getAllKategoriUkm();
        $this->load->view('templateUser', $data);
    }

    public function artikelList() {
        $data = $this->ukmModel->pagination('artikelList', 'artikel', $cari = NULL, $price = NULL);
        $data['notif'] = $this->session->flashdata('notif');
        $data['view'] = 'user/artikelList';
        $data['title'] = 'Daftar artikel Kami';
        $data['kategori'] = $this->ukmModel->getAllKategoriUkm();
        $this->load->view('templateUser', $data);
    }

    public function produkDetail($id) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['view'] = 'user/produkDetail';
        $data['title'] = 'Detail Produk';
        $data['produk'] = $this->produkModel->getProdukDetail($id);
        $data['relProduk'] = $this->produkModel->getRelatedProduk($data['produk'][0]->idUkm);
        $this->load->view('templateUser', $data);
    }

    public function artikelDetail($id) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['view'] = 'user/artikelDetail';
        $data['title'] = 'Detail artikel';
        $data['artikel'] = $this->artikelModel->getArtikelDetail($id);
        //$data['relProduk'] = $this->produkModel->getRelatedProduk($data['produk'][0]->idUkm);
        $this->load->view('templateUser', $data);
    }

}
