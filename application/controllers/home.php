<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    var $error='';
    var $countError=0;
    var $count2= array();
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->library('validation');
        $this->load->model('login_model');
        $this->load->model('lokasi_model');
        $this->load->model('berandaUser_model');
    }
    public function index()
    {
        $this->session->unset_userdata('id_tim');
        $this->session->unset_userdata('name');
        $data['lokasi']=  $this->lokasi_model->getLokasi();
        $this->load->view('containerHead');
	$this->load->view('home',$data);
        $this->load->view('containerFoot');
    }
    
    public function cek_validate(){
        if($this->validation->validate()){
            $this->load->model('registrasi_model');
            $this->registrasi_model->dataRegister();
            redirect(base_url().'home/showAttention');
        }
    }
    
    public function showAttention(){
        //load view sukses daftar
        echo "Anda sukses melakukan registrasi silahkan login untuk melakukan update profile dan upload gambar, resi";
    }
    
    public function login(){
        $this->session->unset_userdata('id_tim');
        $this->session->unset_userdata('name');
        if($this->validation->validateLogin()){
            $this->load->model('login_model');
            if($this->login_model->cekName()){
                if($data=$this->login_model->cekLogin()){
                    foreach ($data as $row){
                        $session=array(
                            'id_tim' => $row->ID_TIM,
                            'name'=> $row->NAMA_TIM
                        );
                        $this->session->set_userdata($session);
                        redirect(base_url().'home/berandaUser');
                    }
                }
                else {
                    $data['salah1']="Password atau username salah";
                    $data['lokasi']=  $this->lokasi_model->getLokasi();
                    $this->load->view('containerHead');
                    $this->load->view('home',$data);
                    $this->load->view('containerFoot');
                }
            }
            else {
                $data['salah2']="ID tidak terdaftar";
                $data['lokasi']=  $this->lokasi_model->getLokasi();
                $this->load->view('containerHead');
                $this->load->view('home',$data);
                $this->load->view('containerFoot');
            }
        }
    }
    
    public function updateBerandaUser(){
        if($this->session->userdata('id_tim')){
            $config['upload_path'] = './images/dataPeserta/';
            $config['overwrite'] = TRUE;    
            $config['allowed_types'] = 'gif|jpg|png';
            $config['remove_spaces']  = TRUE;
            $config['max_size']	= '200';

            $newName1=$this->session->userdata('id_tim').'_Foto1';
            $newName2=$this->session->userdata('id_tim').'_Foto2';
            $newName3=$this->session->userdata('id_tim').'_Foto3';
            $newName4=$this->session->userdata('id_tim').'_Resi';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $url= str_replace("index.php/", "", base_url());
            
            //echo base_url().'<br/>'.$url;
            
            $this->berandaUser_model->updateDataTim();
            $this->berandaUser_model->updateDataPendaftar1();
            $this->berandaUser_model->updateDataPendaftar2();
            $this->berandaUser_model->updateDataPendaftar3();

            if($_FILES['foto1']['name']){
                if (!$this->upload->do_upload('foto1',$newName1))
                {
                    $this->countError+=1;
                    $this->count2[]=array('index'=>1);
                }    
                else
                {
                    $data1=$this->upload->data();
                    $img=$url.'images/dataPeserta/'.$data1['file_name'];
                    $this->berandaUser_model->updateGambar1($img);
                }
            }
            if($_FILES['foto2']['name']){
                if (!$this->upload->do_upload('foto2',$newName2))
                {
                    $this->countError+=1;
                    $this->count2[]=array('index'=>2);
                }    
                else
                {
                    $data2=$this->upload->data();
                    $img=$url.'images/dataPeserta/'.$data2['file_name'];
                    $this->berandaUser_model->updateGambar2($img);
                }
            }
            if($_FILES['foto3']['name']){
                if (!$this->upload->do_upload('foto3',$newName3))
                {
                    $this->countError+=1;
                    $this->count2[]=array('index'=>3);
                }    
                else
                {
                    $data3=$this->upload->data();
                    $img=$url.'images/dataPeserta/'.$data3['file_name'];
                    $this->berandaUser_model->updateGambar3($img);
                }
            }
            if($_FILES['resi']['name']){
                if (!$this->upload->do_upload('resi',$newName4))
                {
                    $this->countError+=1;
                    $this->count2[]=array('index'=>4);
                }    
                else
                {
                    $data4=$this->upload->data();
                    $img=$url.'images/dataPeserta/'.$data4['file_name'];
                    $this->berandaUser_model->updateDataBayar($img,'1');
                }
            }
            $this->error=$this->upload->display_errors('', '');
            //$this->berandaUser();
            redirect(base_url().'home/berandaUser');
        }
        else {
            redirect(base_url().'home');
        }
    }
    
    public function loadViewBeranda(){
        $data['tim']=  $this->berandaUser_model->getTim($this->session->userdata('id_tim'));
        $data['peserta']=  $this->berandaUser_model->getPeserta($this->session->userdata('id_tim'));
        $data['lokasi']=  $this->lokasi_model->getLokasi();
        $data['status']= $this->berandaUser_model->getStatTerdaftar($this->session->userdata('id_tim'));
        //foreach ($data['status'] as $row) echo 'test '.$row->ID_TIM.' '.$row->BAYAR.'<br/>';
            
        $count=0;
        $hasil= array();
        $i=1;
        //echo 'jmlError '.$this->countError.'<br/>';
        $temp=str_split($this->error,72);
        
        foreach ($this->count2 as $row) :
            for($i=1;$i<=4;$i++):
                //echo 'i='.$i.' index='.$row['index'].'<br/>';
                if($row['index']==$i){
                    $hasil[]=array('error'=>$temp[$count], 'count'=>$i);
                    //echo 'i='.$i.' index='.$row['index'].' count='.$count.'<br/>';
                    $count++;
                }
            endfor;
        endforeach;
            
        $data['err'] = $hasil;
        return $data;
    }

    public function berandaUser(){
        if($this->session->userdata('id_tim')){
            $data=$this->loadViewBeranda();
            $this->load->view('containerHead');
            $this->load->view('berandaUser',$data);
            $this->load->view('containerFoot');
        }
        else {
            redirect(base_url().'home');
        }
    }
    
    public function changePass(){
        $query=$this->login_model->getPass($this->session->userdata('id_tim'),sha1($this->input->post('passwordLama')));
        $passDB='';
        foreach ($query as $row)
            $passDB= $row->PASS_TIM;
        if($passDB=sha1($this->input->post('passwordLama'))){
            $data=array('PASS_TIM'=>sha1($this->input->post('passwordNew')));
            $this->login_model->updatePeserta($data,$this->session->userdata('id_tim'));
            redirect(base_url().'home/berandaUser');
        }
        else { redirect(base_url().'home/berandaUser'); }
    }
    
    public function deleteImages($dat0,$dat1,$dat2){
        //echo $dat0.' '.$dat1.' '.$dat2.' ';
        if(read_file('./images/dataPeserta/'.$dat2)) {
            //unlink('./images/dataPeserta/'.$dat2);
            if($dat1=="pendaftar"){
                $idPeserta=  $dat0;
                $data_gmbr=array(
                    'GAMBAR'=>  ''
                );
                //echo $idPeserta.' '.$dat1.' '.$data_gmbr['GAMBAR'];
                $this->berandaUser_model->updatePeserta($dat1,$data_gmbr,$idPeserta,'ID_PENDAFTAR');
                unlink('./images/dataPeserta/'.$dat2);
            }
            else {
                    $this->berandaUser_model->updateDataBayar('','0');
                    unlink('./images/dataPeserta/'.$dat2);
            }
        }
        redirect(base_url().'home/berandaUser');
    }
    
    public function idCard($id){
        if($this->session->userdata('id_tim')){
            $data['tim']=  $this->berandaUser_model->getTim($this->session->userdata('id_tim'));
            $data['peserta']=  $this->berandaUser_model->getPeserta($this->session->userdata('id_tim'));
            $query= $this->berandaUser_model->getStatTerdaftar($this->session->userdata('id_tim'));
            foreach ($query as $row) {
                $data['status']=$row->BAYAR;
            }
            $this->load->view('idcard',$data);
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>