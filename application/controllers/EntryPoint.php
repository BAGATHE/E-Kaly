<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EntryPoint extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('AdmisModel');
        $this->load->model('RestoModel');
        $this->load->model('AdresseModel');
    }

	public function index(){
        $id_client='null';
        $current_client=null;
        if ($this->session->userdata('client_session')) {
            $current_client = $this->session->userdata('client_session');
            $id_client=$current_client['id'];
        }
        $data['client'] = $current_client;
        $data['restaurants']=$this->RestoModel->getListeRestoComplet($id_client);
        $data['adresses']=$this->AdresseModel->getAll();
        $this->load->view('clientPage/AccueilClient',$data);
        
    }
    public function index2(){
        $this->load->view('login');
    }
}
?>
