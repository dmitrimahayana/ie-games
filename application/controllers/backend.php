<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
    //var $error='';
    //var $countError=0;
    //var $count2= array();
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->library('validation');
        $this->load->model('user_model');
        $this->load->model('lokasi_model');
        $this->load->model('berandaUser_model');
        $this->load->model('backendVerEdit_model');
        $this->downloadPDF();
    }
    
    function index($data){
        $this->session->unset_userdata('user');
        if($data=="1E6AME5") $this->load->view('backend/login-backend');
        else redirect(base_url().'home');
    }
    
    function login(){
        if($this->input->post('user')=='super' && $this->input->post('pass')=='superadmin'){
            $data=array('user'=>'admin');
            $this->session->set_userdata($data);
            redirect(base_url().'beranda/show/pendaftar');
        }
        else {
            $data['error']='username atau password salah';
            $this->load->view('backend/login-backend',$data);
        }
    }

    function showDaftar($data){
        if($this->session->userdata('user')){
            if($data=='pendaftar'){
                $query['list']=$this->user_model->showPendaftar();
                $this->load->view('backend/showPendaftar',$query);
            }
            else if($data=='peserta'){
                $query['list']=$this->user_model->showPeserta();
                $this->load->view('backend/showPendaftar',$query);
            }
        }
        else {
            redirect(base_url().'backend/1E6AME5');
        }
    }
    
    function loadVer($id){
        $data['tim']=  $this->berandaUser_model->getTim($id);
        $data['peserta']=  $this->berandaUser_model->getPeserta($id);
        $data['lokasi']=  $this->lokasi_model->getLokasi();
        $data['status']= $this->berandaUser_model->getStatTerdaftar($id);
        
        return $data;
    }

    function verifikasi($id){
        if($this->session->userdata('user')){
            $data= $this->loadVer($id);
            $this->load->view('backend/verifikasi',$data);
        }
    }
    
    function verifikasiNow($url){
        $data=array(
            'verivikasi'=>'1'
        );
        $this->backendVerEdit_model->updateVerfikasi($this->input->post("ID_TIM"),$data);
        redirect(base_url().'beranda/show/'.$url.'/verifikasi/'.$this->input->post("ID_TIM"));
    }

    function edit($url,$id){
        if($this->session->userdata('user')){
            $data= $this->loadVer($id);
            $this->load->view('backend/edit',$data);
        }
    }
    
    function editNow($uri,$id){
        $config['upload_path'] = './images/dataPeserta/';
        $config['overwrite'] = TRUE;    
        $config['allowed_types'] = 'gif|jpg|png';
        $config['remove_spaces']  = TRUE;
        $config['max_size']	= '200';
        
        $newName1=$id.'_Foto1';
        $newName2=$id.'_Foto2';
        $newName3=$id.'_Foto3';
        $newName4=$id.'_Resi';
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $url= str_replace("index.php/", "", base_url());
        
        $this->backendVerEdit_model->updateDataTim();
        $this->backendVerEdit_model->updateDataPendaftar1();
        $this->backendVerEdit_model->updateDataPendaftar2();
        $this->backendVerEdit_model->updateDataPendaftar3();
        
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
                $this->backendVerEdit_model->updateGambar1($img);
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
                $this->backendVerEdit_model->updateGambar2($img);
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
                $this->backendVerEdit_model->updateGambar3($img);
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
                $this->backendVerEdit_model->updateDataBayar($img,'1');
            }
        }
        //$this->error=$this->upload->display_errors('', '');
        redirect(base_url().'beranda/show/edit/'.$uri.'/'.$this->input->post("id_tim"));
        //$this->edit($url, $id);
    }
    
    public function deleteImages($uri,$dat0,$dat1,$dat2){
        //echo $uri.' '.$dat0.' '.$dat1.' '.$dat2.' ';
        //if(read_file('./images/dataPeserta/'.$dat2)) {
            if($dat1=="pendaftar"){
                $idPeserta=  $dat0;
                $data_gmbr=array(
                    'GAMBAR'=>  ''
                );
                $this->backendVerEdit_model->updatePeserta('pendaftar',$data_gmbr,$idPeserta,'ID_PENDAFTAR');
                unlink('./images/dataPeserta/'.$dat2);
                $nameImg=  preg_split("/[_]/", $dat2);
                //echo $nameImg[0];
                redirect(base_url().'beranda/show/edit/'.$uri.'/'.$nameImg[0]);
            }
            else {
                $idPeserta=  $dat0;
                $data_gmbr=array(
                    'RESI'=>  '',
                    'BAYAR' => '0'
                );
                $this->backendVerEdit_model->updatePeserta($dat1,$data_gmbr,$idPeserta,'ID_TIM');
                unlink('./images/dataPeserta/'.$dat2);
                redirect(base_url().'beranda/show/edit/'.$uri.'/'.$dat0);
            }
        //}
        //
    }
    
    public function changePass($url,$id){
        //echo $url.' '.$id;
        $data=array('PASS_TIM'=>  sha1('hmti_its'));
        $this->backendVerEdit_model->updatePeserta('tim',$data,$id,'ID_TIM');
        redirect(base_url().'beranda/show/'.$url);
    }
    
    public function downloadPDF(){
        $this->load->library('excel');
        
        $nomor=0;
        $count=3;
        $this->excel->setActiveSheetIndex(0)
                   ->setCellValue('A1', 'DATABASE PESERTA IEGAMES 8TH EDITION')
                   ->setCellValue('A3', 'No')
                   ->setCellValue('B3', 'ID Tim')
                   ->setCellValue('C3', 'Nama Tim')
                   ->setCellValue('D3', 'Asal Sekolah')
                   ->setCellValue('E3', 'Alamat Sekolah')
                   ->setCellValue('F3', 'Kota')
                   ->setCellValue('G3', 'Nama Anggota1')
                   ->setCellValue('H3', 'Telp Anggota1')
                   ->setCellValue('I3', 'Email')
                   ->setCellValue('J3', 'Nama Anggota2')
                   ->setCellValue('K3', 'Telp Anggota2')
                   ->setCellValue('L3', 'Nama Anggota3')
                   ->setCellValue('M3', 'Telp Anggota3')
                   ->setCellValue('N3', 'Lokasi Test')
                   ->setCellValue('O3', 'Ket');
        $this->excel->setActiveSheetIndex(0)->mergeCells('A1:O1');
        $query= $this->backendVerEdit_model->getAllTim();
        foreach ($query as $row){
            $count++; 
            $nomor++;
            $id= $row->ID_tim;
            $tim= $row->NAMA_TIM;
            $sma= $row->NAMA_SMA;
            $asal= $row->ALAMAT_SMA;
            $kota= $row->kota;
            $lokasi= $row->lokasi;
            $stats= $row->bayar;
            if($stats=="0") $bayar="Belum Lunas";
            else $bayar="Sudah Lunas";
            $this->excel->setActiveSheetIndex(0)
               ->setCellValue('A'.$count,$nomor )
               ->setCellValue('B'.$count,$id )
               ->setCellValue('C'.$count,$tim )
               ->setCellValue('D'.$count,$sma)
               ->setCellValue('E'.$count,$asal)
               ->setCellValue('F'.$count,$kota)
               ->setCellValue('N'.$count,$lokasi)
               ->setCellValue('O'.$count,$bayar);

            $query2= $this->backendVerEdit_model->getAllPeserta($id);
            $count2=0;
            foreach ($query2 as $row3){
                $count2++;
                if($count2==1){
                    $this->excel->setActiveSheetIndex(0)
                        ->setCellValue('G'.$count, $row3->NAMA)
                        ->setCellValue('H'.$count, $row3->NO_TELP)
                        ->setCellValue('I'.$count, $row3->EMAIL);
                }
                else if($count2==2){
                    $this->excel->setActiveSheetIndex(0)
                        ->setCellValue('J'.$count, $row3->NAMA)
                        ->setCellValue('K'.$count, $row3->NO_TELP);
                }
                else{
                    $this->excel->setActiveSheetIndex(0)
                        ->setCellValue('L'.$count, $row3->NAMA)
                        ->setCellValue('M'.$count, $row3->NO_TELP);
                }
            }
        }
        //$this->excel->getActiveSheet()->getStyle('A'.$count.':O'.$count)->getBorders()->getAllBorders()->setColor(new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_RED));
        $this->excel->getActiveSheet()->setTitle("Rekap");
        $this->excel->setActiveSheetIndex(0);
        
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
        $objWriter->save(APPPATH."../report_pendaftaran/Rekap_Pendaftaran_IE_Games.xlsx");
        
    }
    
}
?>