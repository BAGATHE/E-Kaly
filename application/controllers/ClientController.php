<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->library('session');
        $this->load->model('ClientModel');
        $this->load->model('PlatModel');
        $this->load->model('RestoModel');
        $this->load->model('CommandeModel');
        $this->load->model('CommandePlatModel');
        if(!$this->session->userdata("client_session")){
            redirect("EntryPoint/index2");
        }
    }

    public function index() {
        if ($this->session->userdata('client_session')) {
            $current_client = $this->session->userdata('client_session');
            }
        $data['client'] = $current_client;
        $this->load->view('clientPage/AccueilClient',$data);
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mot_de_pass', 'Mot de passe', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('client/create');
        } else {
            $data = [
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'email' => $this->input->post('email'),
                'mot_de_pass' => $this->input->post('mot_de_pass')
            ];
            $this->ClientModel->save($data);
            redirect('ClientController');
        }
    }

    public function edit($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['client'] = $this->ClientModel->getById($id);

        if (empty($data['client'])) {
            show_404();
        }

        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mot_de_pass', 'Mot de passe', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('client/edit', $data);
        } else {
            $update_data = [
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'email' => $this->input->post('email'),
                'mot_de_pass' => $this->input->post('mot_de_pass')
            ];
            $this->ClientModel->edit($id, $update_data);
            redirect('ClientController');
        }
    }

    public function delete($id) {
        $this->ClientModel->delete($id);
        redirect('ClientController');
    }

    public function search() {
        $criteria = [
            'id' => $this->input->post('id'),
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'email' => $this->input->post('email'),
            'mot_de_pass' => $this->input->post('mot_de_pass')
        ];
        $data['clients'] = $this->ClientModel->search($criteria);
        $this->load->view('client/index', $data);
    }

    public function login() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mot_de_pass', 'Mot de passe', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('client/login');
        } else {
            $email = $this->input->post('email');
            $mot_de_pass = $this->input->post('mot_de_pass');
            $user = $this->ClientModel->checkLogin($email, $mot_de_pass);

            if ($user !== null) {
                $this->session->set_userdata('user_id', $user->getId());
                redirect('ClientController');
            } else {
                $data['error'] = "Invalid email or password";
                $this->load->view('client/login', $data);
            }
        }
    }

    /*redirection vers page acceuil*/ 
    public function acceuilPage(){
        $current_client  = null;
        if ($this->session->userdata('client_session')) {
            $current_client = $this->session->userdata('client_session');
            }
        $data['client'] = $current_client;
        $this->load->view('clientPage/AccueilClient',$data);
    }
  
    /*redirection vers page favoris*/ 
    public function favorisPage(){
        $current_client  = null;
        if ($this->session->userdata('client_session')) {
            $current_client = $this->session->userdata('client_session');
            }
        $data['client'] = $current_client;
        $this->load->view('clientPage/FavoriClient',$data);
    }
    /*redirection vers page apropos*/ 
    public function aboutPage(){
        $current_client  = null;
        if ($this->session->userdata('client_session')) {
            $current_client = $this->session->userdata('client_session');
            }
        $data['client'] = $current_client;
        $this->load->view('clientPage/APropos',$data);
    }
    /*redirection vers page plat resto */ 
    public function PlatClientPage(){
        $current_client  = null;
        if ($this->session->userdata('client_session')) {
            $current_client = $this->session->userdata('client_session');
            }
        $data['list_plat_resto'] = $this->PlatModel->getAllInfo(1);
        $data['info_resto'] = $this->RestoModel->getById(1); 
        $data['client'] = $current_client;
        $this->load->view('clientPage/PlatClient',$data);
    }


    /*deconnection**/
    public function clientLogout(){
        $this->session->unset_userdata('client_session');
        $this->session->sess_destroy();
        $this->load->view('clientPage/AccueilClient');
    }
    public function getPrixLivraison(){
        $adresse_resto = $this->input->post("adresse_resto");
        $adresse_target = $this->input->post("adresse_target");
        $prix_livraison = $this->ClientModel->getFraisLivraison($adresse_resto,$adresse_target);
        echo json_encode($prix_livraison);
    }

    public function ValiderPanier(){
        $articles = $this->input->post('articles');
        $idresto = $this->input->post('id_resto');
        $adresse = $this->input->post('adresse');
        $repere = $this->input->post('repere');
        $client = $this->input->post('id_client');
        $currentDateTime = date('Y-m-d H:i:s');
      
        $dataCommande = [
            'id_client' => $client,
            'adresse' => $adresse,
            'repere' => $repere, 
            'date' => $currentDateTime,
         ]; 
        $this->CommandeModel->save($dataCommande);
        $Current_id_commande = $this->CommandeModel->getLastCommandeId();
        
        if($Current_id_commande != null){
            foreach ($articles as $article) {
                // Exemple d'insertion dans la base de données
                $data = array(
                    'id_commande' => $Current_id_commande,
                    'id_plat' =>$article['id_plat'],
                    'quantite' => $article['quantity'],
                    'prix' => $article['price']
                );
            $this->CommandePlatModel->save($data);
        }
        echo json_encode("success");
        }else{
        echo json_encode("failed");
        }
}
    
    
}
?>
