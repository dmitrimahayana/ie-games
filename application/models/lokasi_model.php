<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lokasi_model extends CI_Model {
    public function getLokasi(){
        $this->db->select('*');
        $this->db->from('lokasi_test');
        $this->db->order_by('id_lokasi_test ','asc');

        $query = $this->db->get();
        return $query->result();
    }
}