<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LivreurController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LivreurModel');
        $this->load->model('AdresseModel');
    }

    public function index() {
        $current_livreur  = null;
        if ($this->session->userdata('livreur_session')) {
            $current_livreur = $this->session->userdata('livreur_session');
            }
        $data['status'] = $this->LivreurModel->getStatusLivreur($current_livreur['id']);
        $data['current_livreur'] = $current_livreur;
        $data['solde']=$this->LivreurModel->getCommissionDuJour($current_livreur['id'],date("Y-m-d"));
        $data['livraison']=$this->LivreurModel->algoCommandeLivreur($current_livreur['id'],date("Y-m-d"));
        $data['contents'] = "livreurPage/LivreurAccueil";
       $this->load->view('templates_livreur/template', $data);
    }

 

    /**recupere donné livreur par id*/
    public function loadForm($id_livreur){
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data["adresses"] = $this->AdresseModel->getAll();
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

      /*login authentification */
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
            $user = $this->LivreurModel->checkLogin($email, $mot_de_pass);
            if ($user !== null) {
                $this->session->set_userdata('livreur_session', $user);
                redirect('LivreurController');
            } else {
                $data['error'] = "Invalid email or password";
                $this->load->view('login', $data);
            }
        }
    }
/****redirection vers la page du livraison du jour  */
    public function LoadLivraisonPage(){
        if ($this->session->userdata('livreur_session')) {
            $current_livreur = $this->session->userdata('livreur_session');
            }
        $data['current_livreur'] = $current_livreur;
        $data['date'] = date('Y-m-d');
        $data['solde']=$this->LivreurModel->getCommissionDuJour($current_livreur['id'],date("Y-m-d"));
        $data["livraison_du_jours"] = $this->LivreurModel->getLivraisonLivreurEnUneJourneAvecGain($current_livreur["id"],$data['date']);
        $data['contents'] = "livreurPage/LivraisonJournalier";
        $this->load->view('templates_livreur/template', $data);
      
    }

    /*redirection vers la page  statistique*/ 
    public function LoadPerformancePage(){
        if ($this->session->userdata('livreur_session')) {
            $current_livreur = $this->session->userdata('livreur_session');
            }
        $data['current_livreur'] = $current_livreur;
        $data['contents'] = "livreurPage/StatistiqueLivreur";
        $this->load->view('templates_livreur/template', $data);
    }
/**fonction qui recupere donner du mois du livreur */
    public function statistiqueLivreur(){
        $mois = $this->input->post('mois');
        $anner = $this->input->post('annee');
        $idLivreur = $this->input->post("id_livreur");
        $data = array();
        if($mois != 0 && $anner != 0){
            $data =  $this->LivreurModel->getStatistiqueJour($idLivreur,$anner,$mois);
        } 
        if($data==null){
            $data = array("day"=>'0',"month"=>'0',"year"=>'0',"revenue"=>'0');
        }
        echo json_encode($data);
    }

    /***fonction update livraison payement */

    public function updateLivraison($id_commande){
        
        if ($this->session->userdata('livreur_session')) {
            $current_livreur = $this->session->userdata('livreur_session');
            }
        $this->LivreurModel->updateLivraisonPayementCommande($id_commande,1);
        $this->LivreurModel->updateStatus($current_livreur["id"],"dispo");
        $data['current_livreur'] = $current_livreur;
        $data['date'] = date('Y-m-d');
        $data['solde']=$this->LivreurModel->getCommissionDuJour($current_livreur['id'],date("Y-m-d"));
        $data["livraison_du_jours"] = $this->LivreurModel->getLivraisonLivreurEnUneJourneAvecGain($current_livreur["id"],$data['date']);
        $data['contents'] = "livreurPage/LivraisonJournalier";
        $this->load->view('templates_livreur/template', $data);
    }

    /**update status livreur */
    public function updateStatus(){
        if ($this->session->userdata('livreur_session')) {
            $current_livreur = $this->session->userdata('livreur_session');
        }
        $status = $this->input->post('status');
        $this->LivreurModel->updateStatus($current_livreur["id"],$status);
        redirect('LivreurController');
    }

    public function accepterLivreur($id_commande){
        if ($this->session->userdata('livreur_session')) {
            $current_livreur = $this->session->userdata('livreur_session');
        }
        
        $this->LivreurModel->insert_livraison_payement_commande($id_commande, $current_livreur['id']);
        $this->LivreurModel->updateStatus($current_livreur["id"],"non-dispo");
        redirect('LivreurController');
    }

    public function livreurLogout() {
    $this->session->unset_userdata('livreur_session');
    $this->session->sess_destroy();
    $this->load->view('login');
    }


}
?>
