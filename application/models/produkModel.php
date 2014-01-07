<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProdukModel extends CI_Model {

    private $tab_ukmProfile = 'ukmprofile';
    private $tab_ukmKategori = 'ukmkategori';
    private $tab_ukm = 'ukm';
    private $tab_artikel = 'artikel';
    private $tab_produk = 'produk';
    private $result;

    public function getAllProduk() {
        $query = $this->db->get($this->tab_produk);
        return $query->result();
    }

    public function getProdukDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_produk, array('id' => $id));
        return $query->result();
    }

    function upload_pic($gallery_path) {
        try {
            $config = array(
                'allowed_types' => 'jpg|jpeg|png',
                'encrypt_name' => TRUE,
                'upload_path' => $gallery_path
            );

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('content')) {
                $data = $this->upload->display_errors();
                $image_data = $this->upload->data();

                $config = array(
                    'source_image' => $image_data['full_path'],
                    'new_image' => $gallery_path . 'gambar/',
                    'maintain_ratio' => FALSE,
                    'width' => 372,
                    'height' => 370,
                );

                $this->load->library('image_lib');
                $this->image_lib->initialize($config);
                $this->image_lib->resize();

                $config = array(
                    'source_image' => $image_data['full_path'],
                    'new_image' => $gallery_path . 'thumbnail/',
                    'maintain_ratio' => FALSE,
                    'width' => 212,
                    'height' => 192,
                );

                $this->image_lib->initialize($config);
                $this->image_lib->resize();

                unlink($image_data['full_path']);

                $data['img_name'] = $image_data['file_name'];
                $data['status'] = TRUE;
            } else {
                $data['status'] = FALSE;
                $this->session->set_flashdata('notif', 'File gagal di upload');
            }
        } catch (Exception $e) {
            $data['status'] = FALSE;
            $this->session->set_flashdata('notif', 'File gagal di upload');
        }
        return $data;
    }

    public function getSameName($name) {
        $this->db->select('*');
        $this->db->from($this->tab_produk);
        $this->db->where('namaProduk', $username);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function saveProduk($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_produk, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $res = TRUE;
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $res = FALSE;
            }
        } else { //update the profile
            $result = $this->getProdukDetail($id);
            if ($result[0]->gambarProduk != NULL && $_FILES['content']['error'] == 0) {
                $file_url = './produk/gambar/' . $result[0]->gambarProduk;
                $file_url1 = './produk/thumbnail/' . $result[0]->gambarProduk;
                unlink($file_url);
                unlink($file_url1);
            }
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_produk, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $res = TRUE;
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $res = FALSE;
            }
        }
        if ($res) {
            return $this->db->insert_id();
        } else {
            return $res;
        }
    }

    public function deleteProduk($id) {
        $result = $this->getProdukDetail($id);
        if (count($result) > 0) {
            if ($result[0]->gambarProduk != '') {
                $file_url = './produk/gambar/' . $result[0]->gambarProduk;
                $file_url1 = './produk/thumbnail/' . $result[0]->gambarProduk;
                unlink($file_url);
                unlink($file_url1);
            }
            $this->db->trans_start();
            $this->db->query('DELETE FROM ' . $this->tab_produk . ' WHERE id=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function deleteProdukSelected($id_selected) {
        foreach ($id_selected as $id):
            $result = $this->getProdukDetail($id);
            if (count($result) > 0) {
                if ($result[0]->gambarProduk != '') {
                    $file_url = './produk/gambar/' . $result[0]->gambarProduk;
                    $file_url1 = './produk/thumbnail/' . $result[0]->gambarProduk;
                    unlink($file_url);
                    unlink($file_url1);
                }
                $this->db->trans_start();
                $this->db->query('DELETE FROM ' . $this->tab_produk . ' WHERE id=' . $id);
                $this->db->trans_complete();
                $data[] = $this->db->trans_status();
            }
            if ($data == 0) {
                return FALSE;
                break;
            }
        endforeach;
    }

    public function getProdukByUkm($id) {
        $query = $this->db->get_where($this->tab_produk, array('idUkm' => $id));
        return $query->result();
    }
    
    public function getAllKategori(){}

}

?>
