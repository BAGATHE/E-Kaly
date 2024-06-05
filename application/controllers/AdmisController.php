<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmisController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AdmisModel');
        $this->load->model('ClientModel');
    }

    
    public function index() {
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data['current_administrator'] = $current_administrator; 
        $data['administrators'] = $this->AdmisModel->getAll();
        $data['clients'] = $this->ClientModel->getAll();
        $data['contents'] = "adminPage/index";
        $this->load->view('templates/template', $data);
    }


    /**recupere donné administrator*/
    public function loadForm($id_admin){
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data['current_administrator'] = $current_administrator; 
        $data['administrator'] = $this->AdmisModel->getById($id_admin);
        $data['contents'] = "adminPage/ModifAdmin";
        $this->load->view('templates/template', $data);
    }

    /**insertion dans la base */
    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mot_de_pass', 'Mot de passe', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['contents'] = "adminPage/Ajout";
            $this->load->view('templates/template', $data);
        } else {
            $data = [
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'email' => $this->input->post('email'),
                'mot_de_pass' => $this->input->post('mot_de_pass')
            ];
            echo "mety";
            $this->AdmisModel->save($data);
            redirect('AdmisController');
        }
    }

    /*modifier les renesignement de l'admin**/
    public function edit() {
        $id = $this->input->post('id');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mot_de_pass', 'Mot de passe', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('AdmisController');
        } else {
            $update_data = [
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'email' => $this->input->post('email'),
                'mot_de_pass' => $this->input->post('mot_de_pass')
            ];
            $this->AdmisModel->edit($id,$update_data);
            redirect('AdmisController');
        }
    }

    /*suppresion*/
    public function delete($id) {
        $this->AdmisModel->delete($id);
        redirect('AdmisController');
    }


    /*** recherche multi critère  */
    public function search() {
        $criteria = [
            'id' => $this->input->post('id'),
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'email' => $this->input->post('email'),
            'mot_de_pass' => $this->input->post('mot_de_pass')
        ];
        $data['admis'] = $this->AdmisModel->search($criteria);
        $this->load->view('admis/index', $data);
    }


/**login */
    public function login() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mot_de_pass', 'Mot de passe', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $mot_de_pass = $this->input->post('mot_de_pass');
            $user = $this->AdmisModel->checkLogin($email, $mot_de_pass);
            if ($user !== null) {
                $this->session->set_userdata('admin_session', $user);
                redirect('AdmisController');
            } else {
                $data['error'] = "Invalid email or password";
                $this->load->view('login', $data);
            }
        }
    }
    /*redirection vers page insertion**/
    public function insertionPage(){
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data['current_administrator'] = $current_administrator; 
        $data['contents'] = "adminPage/Ajout";
        $this->load->view('templates/template', $data);
    }

    /**page de revenue*/
    public function revenue(){
        $data['contents'] = "adminPage/Revenu";
        $this->load->view('templates/template', $data);
        
    }

    public function livreurPaye(){
        $data['contents'] = "adminPage/LivreurPaye";
        $this->load->view('templates/template',$data);
    }


}
?>
