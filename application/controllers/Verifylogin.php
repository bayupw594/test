<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class VerifyLogin extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login','',TRUE);
    }

    function index() {
       $this->load->library('form_validation');

       $this->form_validation->set_rules('username', 'Username', 'trim|required');
       $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

       if($this->form_validation->run() == FALSE) {
         $this->load->view('login_view');
       } else {
         redirect('home', 'refresh');
       }
    }

    function check_database($password) {
     $username = $this->input->post('username');
     $password = $this->input->post('password');

     $result = $this->login->log_in( $username, $password);

     if($result) {
         $sess_array = array();
         foreach($result as $row) {
             $sess_array = array(
               'username' => $row->username,
               'level' => $row->level
             );
             
             $this->session->set_userdata('logged_in', $sess_array);
         }
         return TRUE;
     } else {
       $this->form_validation->set_message('check_database', 'Username Atau Password Salah');
       return false;
       }
    }
  }
?>