<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RestoController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RestoModel');
        $this->load->model('AdresseModel');
    }

    public function index() {
        
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mot_de_pass', 'Mot de passe', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['contents'] = "adminPage/Ajout";
            $this->load->view('templates/template', $data);
        } else {
            $data = [
                'email' => $this->input->post('email'),
                'mot_de_pass' => $this->input->post('mot_de_pass'),
                'nom' => $this->input->post('nom'),
                'adresse' => $this->input->post('adresse'),
                'description' =>$this->input->post('description'),
                'heure_ouverture'=>$this->input->post('heure_ouverture'),
                'heure_fermeture'=>$this->input->post('heure_fermeture')
            ];
            $this->RestoModel->save($data);
            redirect('RestoController/insertionPage');
        }
    }

    /**recupere donné Resto par id*/
        public function loadForm($id_resto){
            $current_administrator  = null;
            if ($this->session->userdata('admin_session')) {
                $current_administrator = $this->session->userdata('admin_session');
            }
            $data["adresses"] = $this->AdresseModel->getAll();
            $data['current_administrator'] = $current_administrator; 
            $data['resto'] = $this->RestoModel->getById($id_resto);
            $data['contents'] = "adminPage/ModifResto";
            $this->load->view('templates/template', $data);
        }

      /*modifie dans la table livreur*/
      public function edit() {
        $id = $this->input->post('id');
        $nom_table = "Resto";
        $condition = "id";
        $update_resto_data = [
            'email' => $this->input->post('email')
        ];

       $this->RestoModel->edit($nom_table,$condition,$id,$update_resto_data );
        $nom_table = "Info_resto";
        $condition = "id_resto";
        $update_info_resto_data = [
            'nom' => $this->input->post('nom'),
            'adresse' => $this->input->post('adresse'),
            'description' =>$this->input->post('description'),
            'heure_ouverture'=>$this->input->post('heure_ouverture'),
            'heure_fermeture'=>$this->input->post('heure_fermeture')
        ];
        
        $this->RestoModel->edit($nom_table,$condition,$id,$update_info_resto_data );
    
        redirect('RouteController/listRestoLivreur');
    }

    public function delete($id) {
        $this->RestoModel->delete($id);
        redirect('RestoController');
    }

    public function search() {
        $criteria = [
            'id' => $this->input->post('id'),
            'email' => $this->input->post('email'),
            'mot_de_pass' => $this->input->post('mot_de_pass')
        ];
        $data['restos'] = $this->RestoModel->search($criteria);
        $this->load->view('resto/index', $data);
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
