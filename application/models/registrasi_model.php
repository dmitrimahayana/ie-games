<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi_model extends CI_Model {
    
	public function addTim($data)
	{
             $this->db->insert('tim',$data);
	}
        
        public function addPendaftar($data)
	{
             $this->db->insert('pendaftar',$data);
	}
        
        public function addPeserta($data)
	{
             $this->db->insert('peserta',$data);
	}
        
        public function getLast(){
            $this->db->select('*');
            $this->db->from('tim');
            $this->db->order_by('ID_TIM','desc');
            $this->db->limit(1);

            $query = $this->db->get();
            return $query->result();
        }
        
        public function getLastPerson(){
            $this->db->select('*');
            $this->db->from('pendaftar');
            $this->db->order_by('ID_PENDAFTAR ','desc');
            $this->db->limit(1);

            $query = $this->db->get();
            return $query->result();
        }
        
        public function dataRegister(){
            $idTim=$this->generateIDTIM();
            $data_tim=array(
                'ID_TIM'=>  $idTim,
                'NAMA_TIM'=>  $this->input->post('nama_tim'),
                'PASS_TIM'=> sha1($this->input->post('password')),
                'NAMA_SMA'=>  $this->input->post('asal_sma'),
                'ALAMAT_SMA'=>  $this->input->post('alamat_sma'),
                'KOTA'=>  $this->input->post('kota'),
                'lokasi' => $this->input->post('lokasi')
            );
            $this->addTim($data_tim);
            
            $idPeserta=  $this->generateIDPendaftar();
            $data_ketua=array(
                'ID_PENDAFTAR'=>  $idPeserta,
                'ID_TIM'=>  $idTim,
                'NAMA'=>  $this->input->post('nama1'),
                'EMAIL'=>  $this->input->post('email'),
                'NO_TELP'=>  $this->input->post('no_telp1'),
                'GAMBAR'=>  ''
            );
            $this->addPendaftar($data_ketua);
            
            $idPeserta=  $this->generateIDPendaftar();
            $data_anggota1=array(
                'ID_PENDAFTAR'=>  $idPeserta,
                'ID_TIM'=>  $idTim,
                'NAMA'=>  $this->input->post('nama2'),
                'EMAIL'=>  '',
                'NO_TELP'=>  $this->input->post('no_telp2'),
                'GAMBAR'=>  ''
            );
            $this->addPendaftar($data_anggota1);
            
            $idPeserta=  $this->generateIDPendaftar();
            $data_anggota2=array(
                'ID_PENDAFTAR'=>  $idPeserta,
                'ID_TIM'=>  $idTim,
                'NAMA'=>  $this->input->post('nama3'),
                'EMAIL'=>  '',
                'NO_TELP'=> $this->input->post('no_telp3'),
                'GAMBAR'=>  ''
            );
            $this->addPendaftar($data_anggota2);
            
            $dataPeserta=array(
                'ID_TIM' => $idTim,
                'RESI' => '',
                'verivikasi' => '0',
                'BAYAR' => '0'
            );
            $this->addPeserta($dataPeserta);
        }
        
        public function generateIDTIM(){
        if($idTIM=$this->getLast()){
            $tmp='';
            foreach ($idTIM as $row1)
                $tmp=$row1->ID_TIM;
            //echo 'id '.$tmp;
            $val=  substr($tmp, 2);
            //echo ' substr'.$val;
            $intID=(int)$val;
            $intID+=1;
            //echo ' int'.$intID;
            if($intID<10){
                $str='IE0000'.$intID;
                return $str;
            }
            else if($intID<100){
                $str='IE000'.$intID;
                return $str;
            }
            else if($intID<1000){
                $str='IE00'.$intID;
                return $str;
            }
            else if($intID<10000){
                $str='IE0'.$intID;
                return $str;
            }
            else if($intID<100000){
                $str='IE'.$intID;
                return $str;
            }
        }
        else {
            $str='IE00001';
            return $str;
        }
    }
    
    public function generateIDPendaftar(){
        if($idPendaftar=$this->getLastPerson()){
            $tmp='';
            foreach ($idPendaftar as $row1){
                $tmp=$row1->ID_PENDAFTAR;
            }
            //echo 'id '.$tmp;
            $val=  substr($tmp, 3);
            //echo ' substr'.$val;
            $intID=(int)$val;
            $intID+=1;
            //echo ' int'.$intID;
            if($intID<10){
                $str='IER0000'.$intID;
                return $str;
            }
            else if($intID<100){
                $str='IER000'.$intID;
                return $str;
            }
            else if($intID<1000){
                $str='IER00'.$intID;
                return $str;
            }
            else if($intID<10000){
                $str='IER0'.$intID;
                return $str;
            }
            else if($intID<100000){
                $str='IER'.$intID;
                return $str;
            }
        }
        else {
            $str='IER00001';
            return $str;
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */