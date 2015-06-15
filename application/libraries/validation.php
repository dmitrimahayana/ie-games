<?php
class Validation {
	function __construct() {
                $this->CI =& get_instance();
		$this->CI->load->library('form_validation');
                $this->CI->load->model('lokasi_model');
                $this->CI->load->helper(array('form', 'url'));
        }
        
        public function validate()
	{
		$this->CI->form_validation->set_rules('nama_tim', 'Nama Tim', 'trim|required|is_unique[tim.NAMA_TIM]|xss_clean');
		$this->CI->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->CI->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]|xss_clean');
		$this->CI->form_validation->set_rules('asal_sma', 'Asal SMA', 'trim|required|xss_clean');
		$this->CI->form_validation->set_rules('alamat_sma', 'Alamat SMA', 'trim|required|xss_clean');
		$this->CI->form_validation->set_rules('kota', 'Kota', 'trim|required|xss_clean');
		$this->CI->form_validation->set_rules('nama1', 'Nama Ketua', 'trim|required|xss_clean');
		$this->CI->form_validation->set_rules('no_telp1', 'No Telp Ketua', 'trim|required|xss_clean');
		$this->CI->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->CI->form_validation->set_rules('nama1', 'Nama Anggota 1', 'trim||xss_clean');
		$this->CI->form_validation->set_rules('no_telp1', 'No Telp Anggota 1', 'trim|xss_clean');
		$this->CI->form_validation->set_rules('nama2', 'Nama Anggota 2', 'trim|xss_clean');
		$this->CI->form_validation->set_rules('no_telp2', 'No Telp Anggota 2', 'trim|xss_clean');
		$this->CI->form_validation->set_rules('nama3', 'Nama Anggota 3', 'trim|xss_clean');
		$this->CI->form_validation->set_rules('no_telp3', 'No Telp Anggota 3', 'trim|xss_clean');

		if ($this->CI->form_validation->run() == FALSE)
		{
                    $data['lokasi']=  $this->CI->lokasi_model->getLokasi();
                    $this->CI->load->view('containerHead');
                    $this->CI->load->view('home',$data);
                    $this->CI->load->view('containerFoot');
		}
		else
		{
                    return TRUE;
		}
	}
        
        public function validateLogin()
	{
		$this->CI->form_validation->set_rules('nama_tim', 'Nama Tim', 'trim|required|xss_clean');
		$this->CI->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->CI->form_validation->run() == FALSE)
		{
                    $data['lokasi']=  $this->CI->lokasi_model->getLokasi();
                    $this->CI->load->view('containerHead');
                    $this->CI->load->view('home',$data);
                    $this->CI->load->view('containerFoot');
		}
		else
		{
                    return TRUE;
		}
	}
}
?>