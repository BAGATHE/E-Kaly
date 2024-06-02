<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LivreurController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LivreurModel');
    }

    public function index() {
       
    }

    /*insertion dans la base**/
    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mot_de_pass', 'Mot de passe', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('LivreurController/insertionPage');
        } else {
            $data = [
                'email' => $this->input->post('email'),
                'mot_de_pass' => $this->input->post('mot_de_pass'),
                'nom_complet' => $this->input->post('nom_complet'),
                'adresse' => $this->input->post('adresse')
            ];
            $this->LivreurModel->save($data);
            redirect('LivreurController/insertionPage');
        }
    }

    /**recupere donné livreur par id*/
    public function loadForm($id_livreur){
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data['current_administrator'] = $current_administrator; 
        $data['livreur'] = $this->LivreurModel->getById($id_livreur);
        $data['contents'] = "adminPage/ModifLivreur";
        $this->load->view('templates/template', $data);
    }

    /*modifie dans la table livreur*/
    public function edit() {
            $id = $this->input->post('id');
            $nom_table = "Livreur";
            $condition = "id";
            $update_livreur_data = [
                'email' => $this->input->post('email')
            ];

            $this->LivreurModel->edit($nom_table,$condition,$id,$update_livreur_data );
            $nom_table = "Info_livreur";
            $condition = "id_livreur";
            $update_info_livreur_data = [
                'nom_complet' => $this->input->post('nom_complet'),
                'adresse' =>$this->input->post('adresse'),
            ];
            $this->LivreurModel->edit($nom_table,$condition,$id,$update_info_livreur_data );
        
            redirect('RouteController/listRestoLivreur');
        }
    

    public function delete($id) {
        $this->LivreurModel->delete($id);
        redirect('RouteController/listRestoLivreur');
        //redirect('LivreurController');
    }

    public function search() {
        $criteria = [
            'id' => $this->input->post('id'),
            'email' => $this->input->post('email'),
            'mot_de_pass' => $this->input->post('mot_de_pass'),
        ];
        $data['livreurs'] = $this->LivreurModel->search($criteria);
        $this->load->view('livreur/index', $data);
        
    }

    /***redirection vers une page ajout*/
    public function insertionPage(){
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data['current_administrator'] = $current_administrator; 
        $data['contents'] = "adminPage/Ajout";
        $this->load->view('templates/template', $data);
    }





}
?>
