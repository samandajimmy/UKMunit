<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserModel extends CI_Model {

    private $tab_user = 'user';
    private $result;

    public function getAllUser() {
        $query = $this->db->get($this->tab_user);
        return $query->result();
    }

    public function getAllAdmin() {
        $query = $this->db->get_where($this->tab_user, array('tipeUser' => 1));
        return $query->result();
    }

    public function getUserDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_user, array('id' => $id));
        return $query->result();
    }

    public function getUsernameDetail($username) {
        $query = $this->db->get_where($this->tab_user, array('username' => $username));
        return $query->result();
    }

    public function getSameName($username) {
        $this->db->select('*');
        $this->db->from($this->tab_user);
        $this->db->where('username', $username);
        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function getSameEmail($email) {
        $this->db->select('*');
        $this->db->from($this->tab_user);
        $this->db->where('email', $email);
        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function saveUser($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_user, $data)) {
                $res = TRUE;
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $res = FALSE;
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        } else { //update the profile
            $this->result = $this->getUserDetail($id);
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_user, $data)) {
                $res = TRUE;
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $res = FALSE;
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
        if ($res) {
            return $this->db->insert_id();
        } else {
            return $res;
        }
    }

    public function deleteAdmin($id) {
        $result = $this->getUserDetail($id);
        if (count($result) > 0) {
            $this->db->trans_start();
            $this->db->query('DELETE FROM user WHERE id=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function deleteAdminSelected($id_selected) {
        foreach ($id_selected as $id):
            $result = $this->getUserDetail($id);
            if (count($result) > 0) {
                $this->db->trans_start();
                $this->db->query('DELETE FROM user WHERE id=' . $id);
                $this->db->trans_complete();
                $data[] = $this->db->trans_status();
            }
            if ($data == 0) {
                return FALSE;
                break;
            }
        endforeach;
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
                    'width' => 694,
                    'height' => 240,
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

}

?>
