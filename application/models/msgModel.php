<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MsgModel extends CI_Model {

    private $tab_ukmProfile = 'ukmprofile';
    private $tab_ukmKategori = 'ukmkategori';
    private $tab_ukm = 'ukm';
    private $tab_artikel = 'artikel';
    private $tab_msg = 'msg';
    private $tab_typeMsg = 'typeMsg';
    private $tab_user_msg = 'user_msg';
    private $result;

    public function getAllArtikel() {
        $query = $this->db->get($this->tab_artikel);
        return $query->result();
    }

    public function getArtikelDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_artikel, array('id' => $id));
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
                    'width' => 614,
                    'height' => 300,
                );

                $this->load->library('image_lib');
                $this->image_lib->initialize($config);
                $this->image_lib->resize();

                $config = array(
                    'source_image' => $image_data['full_path'],
                    'new_image' => $gallery_path . 'thumbnail/',
                    'maintain_ratio' => FALSE,
                    'width' => 92,
                    'height' => 92,
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
        $this->db->from($this->tab_artikel);
        $this->db->where('namaArtikel', $username);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function saveArtikel($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_artikel, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $res = TRUE;
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $res = FALSE;
            }
        } else { //update the profile
            $result = $this->getArtikelDetail($id);
            if ($result[0]->gambarArtikel != NULL && $_FILES['content']['error'] == 0) {
                $file_url = './artikel/gambar/' . $result[0]->gambarArtikel;
                $file_url1 = './artikel/thumbnail/' . $result[0]->gambarArtikel;
                unlink($file_url);
                unlink($file_url1);
            }
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_artikel, $data)) {
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

    public function deleteArtikel($id) {
        $result = $this->getArtikelDetail($id);
        if (count($result) > 0) {
            if ($result[0]->gambarArtikel != '') {
                $file_url = './artikel/gambar/' . $result[0]->gambarArtikel;
                $file_url1 = './artikel/thumbnail/' . $result[0]->gambarArtikel;
                unlink($file_url);
                unlink($file_url1);
            }
            $this->db->trans_start();
            $this->db->query('DELETE FROM ' . $this->tab_artikel . ' WHERE id=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function deleteArtikelSelected($id_selected) {
        foreach ($id_selected as $id):
            $result = $this->getArtikelDetail($id);
            if (count($result) > 0) {
                if ($result[0]->gambarArtikel != '') {
                    $file_url = './artikel/gambar/' . $result[0]->gambarArtikel;
                    $file_url1 = './artikel/thumbnail/' . $result[0]->gambarArtikel;
                    unlink($file_url);
                    unlink($file_url1);
                }
                $this->db->trans_start();
                $this->db->query('DELETE FROM ' . $this->tab_artikel . ' WHERE id=' . $id);
                $this->db->trans_complete();
                $data[] = $this->db->trans_status();
            }
            if ($data == 0) {
                return FALSE;
                break;
            }
        endforeach;
    }

    public function getLatestArtikel($limit) {
        $this->db->select('*');
        $this->db->from($this->tab_artikel);
        $this->db->order_by('tglInput', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result();
    }

    public function getFeaturedArtikel($limit) {
        $this->db->select('*');
        $this->db->from($this->tab_artikel);
        $this->db->where('tagArtikel', 'featured');
        $this->db->order_by('tglInput', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result();
    }
	
	public function getArtikelByUser($id){
        $this->db->select('*');
        $this->db->from($this->tab_artikel);
        $this->db->where('inputBy', $id);
        $this->db->order_by('tglInput', 'DESC');
        $query = $this->db->get();
        return $query->result();
	}

}

?>
