<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UkmModel extends CI_Model {

    private $tab_ukmProfile = 'ukmprofile';
    private $tab_ukmKategori = 'ukmkategori';
    private $tab_ukm = 'ukm';
    private $tab_produk = 'produk';
    private $tab_user = 'user';
    private $result;

    public function getAllUkm() {
        $query = $this->db->get($this->tab_ukm);
        return $query->result();
    }

    public function getUkmDetailed($id = NULL) {
        $query = $this->db->get_where($this->tab_ukm, array('id' => $id));
        return $query->result();
    }

    public function getUkmDetail($id = NULL) {
        $this->db->select('ukm.*');
        $this->db->select('ukm.id as idUkm');
        $this->db->select('user.*');
        $this->db->select('ukmkategori.*');
        $this->db->select('ukmProfile.*');
        $this->db->from('user');
        $this->db->join('ukm', 'user.id = ukm.idUser', 'inner');
        $this->db->join('ukmprofile', 'ukmprofile.id = ukm.idUkmProfile', 'inner');
        $this->db->join('ukmkategori', 'ukmkategori.id = ukm.idkategoriUkm', 'inner');
        $this->db->where('ukm.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllUkmRequest($isActive) {
        $this->db->select('ukm.*');
        $this->db->select('ukm.id as idUkm');
        $this->db->select('user.*');
        $this->db->select('ukmkategori.*');
        $this->db->select('ukmProfile.*');
        $this->db->from('user');
        $this->db->join('ukm', 'user.id = ukm.idUser', 'inner');
        $this->db->join('ukmprofile', 'ukmprofile.id = ukm.idUkmProfile', 'inner');
        $this->db->join('ukmkategori', 'ukmkategori.id = ukm.idkategoriUkm', 'inner');
        $this->db->where('user.isActive', $isActive);
        $query = $this->db->get();
        return $query->result();
    }

    public function getUkmHome() {
        $this->db->select('ukm.*');
        $this->db->select('ukm.id as idUkm');
        $this->db->select('user.*');
        $this->db->select('ukmkategori.*');
        $this->db->select('ukmProfile.*');
        $this->db->from('user');
        $this->db->join('ukm', 'user.id = ukm.idUser', 'inner');
        $this->db->join('ukmprofile', 'ukmprofile.id = ukm.idUkmProfile', 'inner');
        $this->db->join('ukmkategori', 'ukmkategori.id = ukm.idkategoriUkm', 'inner');
        $this->db->where('user.isActive', 1);
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();
    }

    public function saveUkm($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_ukm, $data)) {
                $res = TRUE;
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $res = FALSE;
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        } else { //update the profile
            $this->result = $this->getUkmDetailed($id);
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_ukm, $data)) {
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

    public function deleteUkm($id) {
        $result = $this->getUkmDetailed($id);
        if (count($result) > 0) {
            $this->db->trans_start();
            $this->db->query('DELETE FROM ' . $this->tab_ukm . ' WHERE id=' . $id);
            $this->db->query('DELETE FROM ' . $this->tab_user . ' WHERE id=' . $result[0]->idUser);
            $this->db->query('DELETE FROM ' . $this->tab_ukmProfile . ' WHERE id=' . $result[0]->idUkmProfile);
            $this->db->query('DELETE FROM ' . $this->tab_produk . ' WHERE idUkm=' . $result[0]->id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function deleteUkmSelected($id_selected) {
        foreach ($id_selected as $id):
            $result = $this->getUkmDetailed($id);
            if (count($result) > 0) {
                $this->db->trans_start();
                $this->db->query('DELETE FROM ' . $this->tab_ukm . ' WHERE id=' . $id);
                $this->db->query('DELETE FROM ' . $this->tab_user . ' WHERE id=' . $result[0]->idUser);
                $this->db->query('DELETE FROM ' . $this->tab_ukmProfile . ' WHERE id=' . $result[0]->idUkmProfile);
                $this->db->query('DELETE FROM ' . $this->tab_produk . ' WHERE idUkm=' . $result[0]->id);
                $this->db->trans_complete();
                $data[] = $this->db->trans_status();
            }
            if ($data == 0) {
                return FALSE;
                break;
            }
        endforeach;
    }

    public function getAllKategoriUkm() {
        $query = $this->db->get($this->tab_ukmKategori);
        return $query->result();
    }

    public function getKategoriUkmDetail($id) {
        $query = $this->db->get_where($this->tab_ukmKategori, array('id' => $id));
        return $query->result();
    }

    public function saveKategoriUkm($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_ukmKategori, $data)) {
                $res = TRUE;
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $res = FALSE;
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        } else { //update the profile
            $this->result = $this->getKategoriUkmDetail($id);
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_ukmKategori, $data)) {
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
    
    public function getIdUkm($id){
        $query = $this->db->get_where('ukm', array('idUser' => $id));
        $data = $query->result();
        return $data[0]->id;
    }

}

?>
