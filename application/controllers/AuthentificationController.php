<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthentificationController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ClientModel');
        $this->load->model('LivreurModel');
        $this->load->model('AdmisModel');
        $this->load->model('RestoModel');
        $this->load->library('session');
    }


public function checkUserLogin(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mot_de_pass', 'Mot de passe', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $mot_de_pass = $this->input->post('mot_de_pass');
            $client =$this->ClientModel->checkLogin($email, $mot_de_pass);
            $resto = $this->RestoModel->checkLogin($email,$mot_de_pass);
            $livreur = $this->LivreurModel->checkLogin($email, $mot_de_pass); 
            $admin = $this->AdmisModel->checkLogin($email, $mot_de_pass);
            if($client){
                $this->session->set_userdata('client_session',$client);
                redirect('ClientController');
            }else if($resto){
                $this->session->set_userdata('resto_session',$resto);
                redirect('RestoController');
            }else if($livreur){
                $this->session->set_userdata('livreur_session',$livreur);
                redirect('LivreurController');
            }else if($admin){
                $this->session->set_userdata('admin_session',$admin);
                redirect('AdmisController');
            }else{
                $data['error'] = "Invalid email or password";
                $this->load->view('login', $data);
            }
     
        }
}

}