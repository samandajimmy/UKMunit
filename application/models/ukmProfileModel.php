<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UkmProfileModel extends CI_Model {

    private $tab_ukmProfile = 'ukmprofile';
    private $tab_ukmKategori = 'ukmkategori';
    private $result;

    public function getAllUkmProfile() {
        $query = $this->db->get($this->tab_ukmProfile);
        return $query->result();
    }

    public function getUkmProfileDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_ukmProfile, array('id' => $id));
        return $query->result();
    }

    public function getSameName($name) {
        $this->db->select('*');
        $this->db->from($this->tab_ukmProfile);
        $this->db->where('username', $name);
        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function getKategoriUkmDrop() {
        $query = $this->db->get($this->tab_ukmKategori);
        $param = $query->result();
        $data[''] = 'Pilih Kategori';
        foreach ($param as $row) {
            $data[$row->id] = $row->namaKategoriUkm;
        }
        return $data;
    }

    public function saveUkmProfile($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_ukmProfile, $data)) {
                $res = TRUE;
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $res = FALSE;
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        } else { //update the profile
            $result = $this->getUkmDetail($id);
            if ($result[0]->gambarUKM != NULL && $_FILES['content']['error'] == 0) {
                $file_url = './ukm/gambar/' . $result[0]->gambarUKM;
                $file_url1 = './ukm/thumbnail/' . $result[0]->gambarUKM;
                unlink($file_url);
                unlink($file_url1);
            }
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_ukmProfile, $data)) {
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

    public function deleteUkmProfile($id) {
        $result = $this->getUkmDetail($id);
        if (count($result) > 0) {
            $this->db->trans_start();
            $this->db->query('DELETE FROM ' . $this->tab_ukmProfile . ' WHERE id=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function deleteUkmProfileSelected($id_selected) {
        foreach ($id_selected as $id):
            $result = $this->getUserDetail($id);
            if (count($result) > 0) {
                $this->db->trans_start();
                $this->db->query('DELETE FROM ' . $this->tab_ukmProfile . ' WHERE id=' . $id);
                $this->db->trans_complete();
                $data[] = $this->db->trans_status();
            }
            if ($data == 0) {
                return FALSE;
                break;
            }
        endforeach;
    }

}

?>
