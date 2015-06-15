<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
    public function getTim($nama,$pass){
        $this->db->select('*');
        $this->db->from('tim');
        $this->db->where("`NAMA_TIM` = '$nama' and `PASS_TIM` = '$pass'");

        $query = $this->db->get();
        return $query->result();
    }
    
    public function getName($nama){
        $this->db->select('*');
        $this->db->from('tim');
        $this->db->where('NAMA_TIM', $nama);

        $query = $this->db->get();
        return $query->result();
    }

    public function cekLogin()
    {
        $nama=$this->input->post('nama_tim');
        $pass=sha1($this->input->post('password'));
        return $this->getTim($nama,$pass);
    }
    
    public function cekName(){
        $nama=$this->input->post('nama_tim');
        return $this->getName($nama);
    }
    
    public function getPass($id,$pass){
        $this->db->select('*');
        $this->db->from('tim');
        $this->db->where("ID_TIM = '$id' and PASS_TIM = '$pass'");

        $query = $this->db->get();
        return $query->result();
    }
    
    public function updatePeserta($data,$id)
    {
        $this->db->where('ID_TIM', $id);
        $this->db->update('TIM', $data); 
    }
}
?>