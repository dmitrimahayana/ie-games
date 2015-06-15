<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BackendVerEdit_model extends CI_Model {
    public function getAllTim(){
        $this->db->select('t.ID_tim as ID_tim, t.NAMA_TIM as NAMA_TIM, t.NAMA_SMA as NAMA_SMA, t.ALAMAT_SMA as ALAMAT_SMA, t.kota as kota, t.lokasi as lokasi, p.bayar as bayar');
        $this->db->from('peserta p');
        $this->db->join('tim t','p.ID_TIM=t.ID_TIM');
        $this->db->order_by('ID_tim','asc');

        $query = $this->db->get();
        return $query->result();
    }
    
    public function getAllPeserta($id){
        $this->db->select('*');
        $this->db->from('pendaftar');
        $this->db->where('ID_TIM', $id);

        $query = $this->db->get();
        return $query->result();
    }
    
    public function updateVerfikasi($id,$data){
        $this->db->where('ID_TIM', $id);
        $this->db->update('peserta', $data); 
    }
    
    public function updatePeserta($tabel,$data,$id,$field_id)
    {
        $this->db->where($field_id, $id);
        $this->db->update($tabel, $data); 
    }
    
    public function updateDataTim(){
            $idTim=$this->input->post('id_tim');
            $data_tim=array(
                'ID_TIM'=>  $idTim,
                'NAMA_TIM'=>  $this->input->post('nama_tim'),
                'NAMA_SMA'=>  $this->input->post('asal_sma'),
                'ALAMAT_SMA'=>  $this->input->post('alamat_sma'),
                'KOTA'=>  $this->input->post('kota'),
                'lokasi' => $this->input->post('lokasi')
            );
            $this->updatePeserta('tim',$data_tim,$idTim,'ID_TIM');
    }
    public function updateDataPendaftar1(){
            $idTim=$this->input->post('id_tim');
            $idPeserta=  $this->input->post('id1');
            //echo $idTim.' '.$idPeserta.' '.$data1.'<br/>';
            $data_ketua=array(
                'ID_PENDAFTAR'=>  $idPeserta,
                'ID_TIM'=>  $idTim,
                'NAMA'=>  $this->input->post('nama1'),
                'EMAIL'=>  $this->input->post('email'),
                'NO_TELP'=>  $this->input->post('no_telp1')
            );
            $this->updatePeserta('pendaftar',$data_ketua,$idPeserta,'ID_PENDAFTAR');
    }
    public function updateGambar1($data1){
            $idTim=$this->input->post('id_tim');
            $idPeserta=  $this->input->post('id1');
            //echo $idTim.' '.$idPeserta.' '.$data1.'<br/>';
            $data_ketua=array(
                'GAMBAR'=>  $data1
            );
            $this->updatePeserta('pendaftar',$data_ketua,$idPeserta,'ID_PENDAFTAR');
    }
    public function updateDataPendaftar2(){
            $idTim=$this->input->post('id_tim');
            $idPeserta=  $this->input->post('id2');
            //echo $idTim.' '.$idPeserta.' '.$data2.'<br/>';
            $data_anggota1=array(
                'ID_PENDAFTAR'=>  $idPeserta,
                'ID_TIM'=>  $idTim,
                'NAMA'=>  $this->input->post('nama2'),
                'EMAIL'=>  '',
                'NO_TELP'=>  $this->input->post('no_telp2')
            );
            $this->updatePeserta('pendaftar',$data_anggota1,$idPeserta,'ID_PENDAFTAR');
    }
    public function updateGambar2($data2){
            $idTim=$this->input->post('id_tim');
            $idPeserta=  $this->input->post('id2');
            //echo $idTim.' '.$idPeserta.' '.$data2.'<br/>';
            $data_anggota1=array(
                'GAMBAR'=>  $data2
            );
            $this->updatePeserta('pendaftar',$data_anggota1,$idPeserta,'ID_PENDAFTAR');
    }
    public function updateDataPendaftar3(){
            $idTim=$this->input->post('id_tim');
            $idPeserta=  $this->input->post('id3');
            //echo $idTim.' '.$idPeserta.' '.$data3.'<br/>';
            $data_anggota2=array(
                'ID_PENDAFTAR'=>  $idPeserta,
                'ID_TIM'=>  $idTim,
                'NAMA'=>  $this->input->post('nama3'),
                'EMAIL'=>  '',
                'NO_TELP'=> $this->input->post('no_telp3')
            );
            $this->updatePeserta('pendaftar',$data_anggota2,$idPeserta,'ID_PENDAFTAR');
    }
    public function updateGambar3($data3){
            $idTim=$this->input->post('id_tim');
            $idPeserta=  $this->input->post('id3');
            //echo $idTim.' '.$idPeserta.' '.$data3.'<br/>';
            $data_anggota2=array(
                'GAMBAR'=>  $data3
            );
            $this->updatePeserta('pendaftar',$data_anggota2,$idPeserta,'ID_PENDAFTAR');
    }
    public function updateDataBayar($data,$stat){
            $idTim=$this->input->post('id_tim');
           // echo $data;
            $dataPeserta=array(
                'ID_TIM' => $idTim,
                'RESI' => $data,
                'BAYAR' => $stat
            );
            $this->updatePeserta('peserta',$dataPeserta,$idTim,'ID_TIM');
        }
}
?>