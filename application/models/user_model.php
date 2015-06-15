<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
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
    
    public function showPendaftar(){
        $this->db->select('t.ID_tim as ID_tim, t.NAMA_TIM as NAMA_TIM, t.NAMA_SMA as NAMA_SMA, t.kota as kota, t.lokasi as lokasi, p.bayar as bayar');
        $this->db->from('peserta p');
        $this->db->join('tim t','p.ID_TIM=t.ID_TIM');
        $this->db->where('p.verivikasi','0');

        $query = $this->db->get();
        return $query->result();
    }
    
    public function showPeserta(){
        $this->db->select('t.ID_tim as ID_tim, t.NAMA_TIM as NAMA_TIM, t.NAMA_SMA as NAMA_SMA, t.kota as kota, t.lokasi as lokasi, p.bayar as bayar');
        $this->db->from('peserta p');
        $this->db->join('tim t','p.ID_TIM=t.ID_TIM');
        $this->db->where('p.verivikasi','1');

        $query = $this->db->get();
        return $query->result();
    }
}
?>