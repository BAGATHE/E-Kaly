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

        $this->load->model('AdresseModel');
        
        $this->load->model('PlatModel');
        if(!$this->session->userdata("client_session")){
            redirect("EntryPoint/index2");
        }
    }

    public function index() {
        redirect('EntryPoint');
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
        redirect('EntryPoint');
    }
  
    /*redirection vers page favoris*/ 
    public function favorisPage(){
        $current_client  = null;
        if ($this->session->userdata('client_session')) {
            $current_client = $this->session->userdata('client_session');
            }
        $data['favoris_restaurant']=$this->ClientModel->getRestoFavorisClient($current_client['id']);    
        $data['client'] = $current_client;
        //var_dump($data['favoris_restaurant']);
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
    public function PlatClientPage($id_resto){
        $current_client  = null;
        if ($this->session->userdata('client_session')) {
            $current_client = $this->session->userdata('client_session');
            }
        $data['list_plat_resto'] = $this->PlatModel->getAllInfo($id_resto);
        $data['info_resto'] = $this->RestoModel->getById($id_resto); 
        $data['client'] = $current_client;
        $data['adresses'] = $this->AdresseModel->getAll();
       
        $this->load->view('clientPage/PlatClient',$data);
    }


    /*deconnection**/
    public function clientLogout(){
        $this->session->unset_userdata('client_session');
        $this->session->sess_destroy();
        redirect('EntryPoint');
    }
    public function getPrixLivraison(){
        $adresse_resto = $this->input->post("adresse_resto");
        $adresse_target = $this->input->post("adresse_target");
        $prix_livraison = $this->ClientModel->getFraisLivraison($adresse_resto,$adresse_target);
        echo json_encode($prix_livraison);
    }
    /* Validation panier */
public function ValiderPanier() {
    $articles = $this->input->post('articles');
    $idresto = $this->input->post('id_resto');
    $adresse = $this->input->post('adresse');
    $repere = $this->input->post('repere');
    $client = $this->input->post('id_client');
    $latitude = $this->input->post('latitude');
    $longitude = $this->input->post('longitude');
    $currentDateTime = date('Y-m-d H:i:s');
    $currentTime = date('H:i:s', strtotime($currentDateTime));
    /* Vérification de la quantité disponible aujourd'hui pour chaque plat */
    $verification = "";
    $date = date('Y-m-d');
    
    if ($this->RestoModel->ableToTakeCommand($idresto,$currentTime) == 0) { 
        $response = ["status" => "failed", "response" => "Le restaurant ne peut plus prendre votre commande"];
        echo json_encode($response);    
        return;
    }


    for ($i = 0; $i < count($articles); $i++) {
    $article = $articles[$i];
    $production = $this->PlatModel->getProductionJournalierePlat($article['id_plat']); 
    $consommation = $this->PlatModel->getConsommationJournalierePLat($date, $article['id_plat']);
    
    if ($consommation == null) {
        $consommation["consommation"] = 0;
        $consommation["description"] = $this->PlatModel->getById($article['id_plat'])["description"];
    }
    
    if (!isset($production["production"])) {
        $production["production"] = 0; // Ensure production is set to avoid errors
    }

    $restePlat = $production["production"] - $consommation["consommation"];
    
    if ($production["production"] < $article['quantity']) {
        $verification .= "Vous pouvez commander que " . $production["production"] . " de " . $consommation["description"] . "\n";
    } else if ($restePlat < $article['quantity']) {
        $verification .= "La quantité restante disponible de " . $consommation["description"] . " est de " . $restePlat . "\n";
    }
   }
   
    if ($verification !="") { 
        $response = ["status" => "failed", "response" => $verification];
        echo json_encode($response); 
        return;
    } else {
        $dataCommande = [
            'id_client' => $client,
            'adresse' => $adresse,
            'repere' => $repere,
            'date' => $currentDateTime,
            'latitude' => $latitude,
            'longitude' => $longitude
        ];
        $this->db->trans_start(); // Démarrer une transaction
        $this->CommandeModel->save($dataCommande);
        $Current_id_commande = $this->CommandeModel->getLastCommandeId();

        if ($Current_id_commande != null) {
            foreach ($articles as $article) {
                // Exemple d'insertion dans la base de données
                $data = array(
                    'id_commande' => $Current_id_commande,
                    'id_plat' => $article['id_plat'],
                    'quantite' => $article['quantity'],
                    'prix' => $article['price']
                );
                $this->CommandePlatModel->save($data);
            }
            $this->db->trans_complete(); // Terminer la transaction

            if ($this->db->trans_status() === FALSE) {
                $response = ["status" => "failed", "response" => "Erreur lors de l'enregistrement de la commande."];
            } else {
                $response = ["status" => "success"];
            }
        } else {
            $response = ["status" => "failed", "response" => "Erreur lors de la récupération de l'ID de la commande."];
            $this->db->trans_rollback(); // Annuler la transaction
        }

        echo json_encode($response);
    }
}


    
    public function toFavorite($id_resto) {
        $this->load->model('Favori_model');
        // Vérifier si l'utilisateur est connecté (id_client en session)
        $id_client = $this->session->userdata('client_session')['id'];

        // Vérifier si le restaurant est déjà favori pour cet utilisateur
        $is_favorite = $this->Favori_model->isFavorite($id_resto, $id_client);

        if ($is_favorite) {
            // Si déjà favori, supprimer le favori
            $this->Favori_model->removeFavorite($id_resto, $id_client);
        } else {
            // Sinon, ajouter le restaurant aux favoris
            $this->Favori_model->addFavorite($id_resto, $id_client);
        }

        redirect('ClientController'); // À adapter selon votre structure de routage
    }
    public function search_resto_multi_critere()
    {
        $heureOuverture = $this->input->get('heureOuverture');
        $heureFermeture = $this->input->get('heureFermeture');
        $adresse = $this->input->get('adresse');
        $nom = $this->input->get('nom');
        $current_client = $this->session->userdata('client_session');

        $data['restaurants'] = $this->RestoModel->searchRestoWithCriteriaWithFavorite($heureOuverture, $heureFermeture, $adresse, $nom, $current_client['id']);
        $data['client'] = $current_client;
        $data['adresses']=$this->AdresseModel->getAll();
        $this->load->view('clientPage/AccueilClient',$data);
    }

/** recherche plat dans un restorant specific */
public function rechercherPlat(){
    $current_client  = null;
    if ($this->session->userdata('client_session')) {
        $current_client = $this->session->userdata('client_session');
        }
    $id_resto = $this->input->post('id_resto');
    $prix_min = $this->input->post('prix_min');
    $prix_max = $this->input->post('prix_max');
    $nom_plat = $this->input->post('nom_plat');
    $data['plat_recherche'] =$this->PlatModel->searchPlatWithCriteria ($id_resto,$prix_min, $prix_max ,$nom_plat);
    $data['list_plat_resto'] = $this->PlatModel->getAllInfo($id_resto);
    $data['info_resto'] = $this->RestoModel->getById($id_resto);
    $data['client'] = $current_client; 
    $data['adresses'] = $this->AdresseModel->getAll();
    $this->load->view('clientPage/PlatClient',$data);
   /* $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($response));
   */
}  

/**recupere la note du resto que le client a mis */
public function getNoteRestoClient() {
    $id_resto = $this->input->get('id_resto');
    $id_client = $this->input->get('id_client');
    
    // Vérifiez si le client a déjà noté ce restaurant
    $this->db->where('id_resto', $id_resto);
    $this->db->where('id_client', $id_client);
    $query = $this->db->get('Note_resto');
    $note = $query->row_array();

    if ($note) {
        echo json_encode(array('status' => 'success', 'note' => $note['note']));
    } else {
        echo json_encode(array('status' => 'success', 'note' => null));
    }
}

/**insere le note resto que le client actif a mis  */
public function insertNoteRestoClient() {
    $id_resto = $this->input->post('id_resto');
    $id_client = $this->input->post('id_client');
    $note = $this->input->post('rate');
    
    // Vérifiez si le client a déjà noté ce restaurant
    $this->db->where('id_resto', $id_resto);
    $this->db->where('id_client', $id_client);
    $query = $this->db->get('Note_resto');
    
    if ($query->num_rows() > 0) {
        // Mise à jour de la note existante
        $this->db->where('id_resto', $id_resto);
        $this->db->where('id_client', $id_client);
        $this->db->update('Note_resto', array('note' => $note));
        
        if ($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => 'success', 'message' => 'Note mise à jour avec succès'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Erreur lors de la mise à jour de la note'));
        }
    } else {
        // Insertion d'une nouvelle note
        $data = array(
            'id_resto' => $id_resto,
            'id_client' => $id_client,
            'note' => $note
        );
        
        $this->db->insert('Note_resto', $data);
        
        if ($this->db->affected_rows() > 0) {
            echo json_encode(array('status' => 'success', 'message' => 'Note insérée avec succès'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Erreur lors de l\'insertion de la note'));
        }
    }
}
/*insertion de note sur un plat */
public function insertNotePlatClient() {
    $id_plat = $this->input->post('id_plat');
    $id_client = $this->input->post('id_client');
    $note = $this->input->post('note');
    
    // Vérifier si le client a déjà noté ce plat
    $this->db->where('id_plat', $id_plat);
    $this->db->where('id_client', $id_client);
    $query = $this->db->get('Note_Plat');
    $existing_note = $query->row_array();

    if ($existing_note) {
        // Mise à jour de la note existante
        $this->db->where('id', $existing_note['id']);
        $this->db->update('Note_Plat', array('note' => $note));
    } else {
        // Insertion d'une nouvelle note
        $this->db->insert('Note_Plat', array(
            'id_client' => $id_client,
            'id_plat' => $id_plat,
            'note' => $note
        ));
    }

    echo json_encode(array('status' => 'success'));
}
    
}
?>
