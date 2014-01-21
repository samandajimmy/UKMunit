<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UkmModel extends CI_Model {

    private $tab_ukmProfile = 'ukmprofile';
    private $tab_ukmKategori = 'ukmkategori';
    private $tab_ukm = 'ukm';
    private $tab_produk = 'produk';
    private $tab_user = 'user';
    private $tab_artikel = 'artikel';
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
	
	public function pagination($url, $sort = NULL, $cari = NULL, $price = NULL) {
        $config = array();
        $i = 4;
        if ($sort) {
            $url1 = $sort;
        } else if ($cari) {
            $url1 = $cari;
        } else if ($price) {
            $url1 = 'priceMin/' . $price['priceMin'] . '/priceMax/' . $price['priceMax'];
            $i = 7;
        }
        $config["base_url"] = base_url() . "index.php/user/" . $url . "/" . $url1;
        $config["total_rows"] = $this->countData($sort, $cari, $price);
        $config["per_page"] = 6;
        $config["uri_segment"] = $i;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $this->pagination->initialize($config);
        $page = ($this->uri->segment($i)) ? $this->uri->segment($i) : 0;
        $data['num_links'] = $config["num_links"];
        $data["result"] = $this->fetchData($config["per_page"], $page, $sort, $cari, $price);
        $data["links"] = $this->pagination->create_links();
        return $data;
    }
	
	public function countData($sort = NULL, $cari = NULL, $price = NULL) {
        if (!is_numeric($sort)) {
            if ($sort == 'ukm') {
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
				$query = $this->db->get();
                $data = $query->result();
            } else if ($sort == 'artikel') {
                $query = $this->db->get_where($this->tab_artikel);
                $data = $query->result();
            } else if ($sort == 'produk') {
                $query = $this->db->get_where($this->tab_produk);
                $data = $query->result();
            } 
        } else {				
		$this->db->select('*');
		$this->db->select('ukm.id AS idUkm');
		$this->db->from('ukmkategori');
		$this->db->join('ukm', 'ukmkategori.id = ukm.idKategoriUkm', 'INNER');
		$this->db->join('ukmprofile', 'ukm.idUkmProfile = ukmprofile.id', 'INNER');		
		$this->db->join('user', 'ukm.idUser = user.id', 'INNER');
		$this->db->where('ukmkategori.id', $sort);
		$this->db->where('user.isActive', 1);
		$query = $this->db->get();
		$data = $query->result();
			}
        if ($cari) {
            $this->db->like('namaProducts', $cari);
            $query = $this->db->get($this->tab_products);
            $data = $query->result();
        }
        if ($price) {
            $this->db->where('hargaProducts >=', $price['priceMin']);
            $this->db->where('hargaProducts <=', $price['priceMax']);
            $query = $this->db->get($this->tab_products);
            $data = $query->result();
        }
        $counter = count($data);
        return $counter;
    }

    public function fetchData($limit, $start, $sort = NULL, $cari = NULL, $price = NULL) {
        if (!is_numeric($sort)) {
			switch ($sort){
				case 'ukm':					
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
					$this->db->limit($limit, $start);
					$query = $this->db->get();
					$data = $query->result();
					break;
				case 'artikel':
					$this->db->select($this->tab_artikel . '.*');
					$this->db->from($this->tab_artikel);
					$this->db->limit($limit, $start);
					$query = $this->db->get();
					$data = $query->result();
					break;
				case 'produk':
					$this->db->select($this->tab_produk . '.*');
					$this->db->from($this->tab_produk);
					$this->db->limit($limit, $start);
					$query = $this->db->get();
					$data = $query->result();
			}
        } else {			
		$this->db->select('*');
		$this->db->select('ukm.id AS idUkm');
		$this->db->from('ukmkategori');
		$this->db->join('ukm', 'ukmkategori.id = ukm.idKategoriUkm', 'INNER');
		$this->db->join('ukmprofile', 'ukm.idUkmProfile = ukmprofile.id', 'INNER');		
		$this->db->join('user', 'ukm.idUser = user.id', 'INNER');
		$this->db->where('ukmkategori.id', $sort);
		$this->db->where('user.isActive', 1);
		$query = $this->db->get();
		return $query->result();
		}
        if ($cari) {
            $this->db->select($this->tab_products . '.*');
            $this->db->select($this->tab_category . '.namaCategory');
            $this->db->from($this->tab_category);
            $this->db->join($this->tab_products, $this->tab_products . '.idCategory = ' . $this->tab_category . '.id', 'inner');
            $this->db->like($this->tab_products . '.namaProducts', $cari);
            $this->db->limit($limit, $start);
            $this->db->order_by($this->tab_products . '.date', 'DESC');
            $query = $this->db->get();
            $data = $query->result();
        }
        if ($price) {
            $this->db->select($this->tab_products . '.*');
            $this->db->select($this->tab_category . '.namaCategory');
            $this->db->from($this->tab_category);
            $this->db->join($this->tab_products, $this->tab_products . '.idCategory = ' . $this->tab_category . '.id', 'inner');
            $this->db->where('hargaProducts >=', $price['priceMin']);
            $this->db->where('hargaProducts <=', $price['priceMax']);
            $this->db->limit($limit, $start);
            $this->db->order_by($this->tab_products . '.hargaProducts', 'ASC');
            $query = $this->db->get();
            $data = $query->result();
        }
        return $data;
    }

}

?>
