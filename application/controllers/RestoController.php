<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RestoController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RestoModel');
        $this->load->model('AdresseModel');
        $this->load->model('PlatModel');
        $this->load->model('ChangeQuantitePlatModel');
        $this->load->model('HistoriqueCommande');
    }

    /**redirectioon page acceuil resto apres success authnetification de la fonction login  */
    public function index() {
        $current_resto  = null;
        if ($this->session->userdata('resto_session')) {
            $current_resto = $this->session->userdata('resto_session');
            }
        $data['list_plat_resto'] = $this->PlatModel->getAllInfo($current_resto['id']);
        $data['current_resto'] = $current_resto;
        $data['contents'] = "restoPage/Accueil";
        $this->load->view('templates_resto/template', $data);
    }

    /**Fontion insertion dans la base */
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
            $user = $this->RestoModel->checkLogin($email, $mot_de_pass);
            if ($user !== null) {
                $this->session->set_userdata('resto_session', $user);
                redirect('RestoController');
            } else {
                $data['error'] = "Invalid email or password";
                $this->load->view('login', $data);
            }
        }
    }



/* fonction insertion dans la base*/
    public function delete($id) {
        $this->RestoModel->delete($id);
        redirect('RestoController');
    }

    /*fonction recherche */
    public function search() {
        $criteria = [
            'id' => $this->input->post('id'),
            'email' => $this->input->post('email'),
            'mot_de_pass' => $this->input->post('mot_de_pass')
        ];
        $data['restos'] = $this->RestoModel->search($criteria);
        $this->load->view('resto/index', $data);
    }

      /***redirection vers une page ajout Restaurant*/
      public function insertionPage(){
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data['current_administrator'] = $current_administrator; 
        $data['contents'] = "adminPage/Ajout";
        $this->load->view('templates/template', $data);        
    }
    
    /** redirection vers une page ajout de plat */
    public function ajouterPlatPage(){
        $current_resto  = null;
        if ($this->session->userdata('resto_session')) {
            $current_resto = $this->session->userdata('resto_session');
        }
        $data['current_resto'] = $current_resto; 
        $data['contents'] = "restoPage/AjoutResto";
        $this->load->view('templates_resto/template', $data);        
    }
    
    /**fonction insertion plat et quantiter plat **/
    public function insertionPlat_etQuantiteProduction(){
        $id_resto = $this->input->post('id_resto');
        $description = $this->input->post('description');
        $prix = $this->input->post('prix');
        $quantite_production = $this->input->post('production');
        $date = $this->input->post('date');
        $info_plat = [
            'id_resto'=>$id_resto,
            'description'=>$description,
            'prix'=>$prix
        ];
        $this->PlatModel->save($info_plat);
        $id_last_idPlat = $this->PlatModel-> getLastPLatId();
        $info_quantiter_production = [
            'id_plat'=>$id_last_idPlat,
            'date'=>$date,
            'production'=>$quantite_production
        ];
        $this->ChangeQuantitePlatModel->save($info_quantiter_production);
        redirect('RestoController');

    }



    /**redirection page historique commande */
    public function historiqueCommande(){
        $current_resto  = null;
        if ($this->session->userdata('resto_session')) {
            $current_resto = $this->session->userdata('resto_session');
        }
        $data['current_resto'] = $current_resto;
        
        $date=$this->input->post('date');
        $mois=$this->input->post('mois');
        $annee=$this->input->post('annee');

        if($date){
            $data['historique_commande'] = $this->HistoriqueCommande->historiqueCommandeJour ($date,$current_resto['id']);    
        }else if ($mois && $annee) {
            $data['historique_commande'] = $this->HistoriqueCommande->historiqueCommandeMois($mois, $annee,$current_resto['id']);
        }else{
            $data['date'] = date('Y-m-d');
            $data['historique_commande'] = $this->HistoriqueCommande->historiqueCommandeJour ($data['date'],$current_resto['id']);
        }
        $data['contents'] = "restoPage/HistoriqueCommande";
        
        $this->load->view('templates_resto/template', $data);

    }

/*redirection page detail commande*/

   public function getDetailCommandeByid($id_commande) {
        // Récupérer les détails de la commande à partir du modèle
        $data['details_commande'] = $this->HistoriqueCommande->detailsCommmande($id_commande);
        $data['commande'] = $this->HistoriqueCommande->detailsCommandeHistorique($id_commande)[0];
        // Charger la vue avec les données de la commande
        $data["contents"] = "restoPage/DetailCommande";
        $this->load->view('templates_resto/template', $data);
    }

   /**redirection vers la page  modification plat*/
   public function loadFormPlat($id_plat){
    $current_resto  = null;
    if ($this->session->userdata('resto_session')) {
        $current_resto = $this->session->userdata('resto_session');
        }
        $data['current_resto'] = $current_resto;
        $data['plat'] = $this->PlatModel->getById($id_plat);
        $data['change_quantiter_plat'] = $this->ChangeQuantitePlatModel->getByIdPlat($id_plat);
        $data['contents'] = "restoPage/ModifPlat";
        $this->load->view('templates_resto/template', $data);
        }
  
    /**redirection page modification quantiter production plat journaliere*/
    public function loadFormModifQuantiteProduction(){
        $current_resto  = null;
        if ($this->session->userdata('resto_session')) {
            $current_resto = $this->session->userdata('resto_session');
            }
            $data['current_resto'] = $current_resto;
            //$data['id_plat'] = $id_plat;
            $data['contents'] = "restoPage/ModifQuantitePlat";
            $this->load->view('templates_resto/template', $data);
    }


  
  /****fonction modifier quantiter production plat */


  public function modifierQuantitePlat(){
    $id_quantiter = $this->input->post('id'); 
    $id_plat = $this->input->post('id_plat');
    $quantite_production = $this->input->post('production');
    $date = $this->input->post('date');
    $donner = [
        'id'=>$id_quantiter,
        'id_plat'=>$id_plat,
        'date'=>$date,
        'production'=>$quantite_production
    ];
    $this->ChangeQuantitePlatModel->edit($id_quantiter,$donner);
    redirect('RestoController');
}

/**fonction modifier plat */
public function modifierPlat(){
    $id_plat= $this->input->post('id_plat'); 
    $id_resto = $this->input->post('id_resto');
    $description = $this->input->post('description_plat');
    $prix = $this->input->post('prix_plat');
    $donner = [
        'id'=>$id_plat,
        'id_resto'=>$id_resto,
        'description'=>$description,
        'prix'=>$prix
    ];
    $this->PlatModel->edit($id_plat,$donner);
    redirect('RestoController');
}

/**fonction load page mise en avant */
public function loadMiseEnAvantPage(){
    $data['contents'] = "restoPage/MiseEnAvant";
    $this->load->view('templates_resto/template', $data);
}

/*fonction load page revenu*/ 
public function loadRevenuPage(){
    $data['contents'] = "restoPage/RevenuResto";
    $this->load->view('templates_resto/template', $data);
}

/*function load page Commission*/ 
public function loadComissionPage(){
    $data['contents'] = "restoPage/CommissionResto";
    $this->load->view('templates_resto/template', $data);
}

}
?>
