<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MailController extends CI_Controller { 
    function __construct()
    {
        parent::__construct();
        /* $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'de2.mit.goekiel.tc@gmail.com',
            'smtp_pass' => '27031992',
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");*/
    }
    public function index()
    {
        
        /*$this->email->from('de2.mit.goekiel.tc@gmail.com', 'dmitri yanno mahayana');
        $this->email->to('de2.mit.goekiel.tc@gmail.com');
        //$this->email->cc('de2.mit.goekiel.tc@gmail.com');
        //$this->email->bcc('de2.mit.goekiel.tc@gmail.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();

        echo $this->email->print_debugger();*/
        $this->load->library('phpmailer');
        //$this->load->library('excel');
        $emailFrom = 'de2.mit.goekiel.tc@gmail.com';
        $namaFrom = 'dmitri';
        $toEmail = 'de2_mit_goekiel@yahoo.com';
        $toName = 'nama penerima';
        $subjectMsg = 'Testing email';

        $msg="ISI EMAIL DISINI ADASDASDASDAS";

        $kirim = send_email_smtp($emailFrom,$namaFrom,$toEmail,$toName,$subjectMsg,$msg);
        if($kirim === true)
        {
        // isi script
        }
    }
}
    

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>