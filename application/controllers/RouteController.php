<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RouteController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LivreurModel');
        $this->load->model('RestoModel');
        $this->load->model('AdresseModel');
    }

    public function index(){

    }
   
    public function listRestoLivreur(){
        $data = array();
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data["restaurants"] = $this->RestoModel->getAllWithInfo();
        $data["livreurs"] = $this->LivreurModel->getAllWithInfo();
        $data['current_administrator'] = $current_administrator; 
        $data['contents'] = "adminPage/ListeRestoLivreur";
        $this->load->view('templates/template', $data);
    }

    public function insertionRestoLivreurPage(){
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data["adresses"] = $this->AdresseModel->getAll();
        $data['current_administrator'] = $current_administrator; 
        $data['contents'] = "adminPage/Ajout";
        $this->load->view('templates/template', $data);
    }
}
?>
