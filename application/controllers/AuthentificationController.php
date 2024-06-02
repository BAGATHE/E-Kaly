<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthentificationController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AdmisModel');
        $this->load->model('ClientModel');

    }

    
    public function index() {
       
    }
   
    public function adminLogout() {
        $this->session->unset_userdata('admin_session');
        $this->session->sess_destroy();
        $this->load->view('login');
    }


   
  







}
?>
