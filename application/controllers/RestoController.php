<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RestoController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RestoModel');
        $this->load->model('AdresseModel');
        $this->load->model('PlatModel');
        $this->load->model('ChangeQuantitePlatModel');
        $this->load->model('MiseEnAvantModel');
        $this->load->helper('upload_helper');
  
    }

    /**redirectioon page acceuil resto apres success authnetification de la fonction login  */
    public function index() {
        $current_resto  = null;
        if ($this->session->userdata('resto_session')) {
            $current_resto = $this->session->userdata('resto_session');
        }
        $data['list_plat_resto'] = $this->PlatModel->getAllInfo($current_resto['id']);
        $data['current_resto'] = $current_resto;
        $data['profil']=$this->RestoModel->getById($current_resto['id']);
        $data['contents'] = "restoPage/Accueil";
        $this->load->view('templates_resto/template', $data);
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
public function logOut(){
    $this->session->unset_userdata('resto_session');
    $this->session->sess_destroy();
    $this->load->view('login');
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

    /** redirection vers une page ajout de plat */
    public function ajouterPlatPage(){
        $current_resto  = null;
        if ($this->session->userdata('resto_session')) {
            $current_resto = $this->session->userdata('resto_session');
        }
        $data['current_resto'] = $current_resto; 
        $data['profil']=$this->RestoModel->getById($current_resto['id']);
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

         $image = $_FILES['image']['name']; 
        $target_file = "assets/images/".$image; // Correction ici

        
        try{
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }catch(Exception $e){
            $e->getMessage();
        }

        $info_plat = [
            'id_resto'=>$id_resto,
            'description'=>$description,
            'prix'=>$prix,
            'image'=>$image
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
        $data['profil']=$this->RestoModel->getById($current_resto['id']);
    
        $date=$this->input->post('date');
        $mois=$this->input->post('mois');
        $annee=$this->input->post('annee');

        if($date){
            $data['historique_commande'] = $this->RestoModel->historiqueCommandeJour ($date,$current_resto['id']);    
        }else if ($mois && $annee) {
            $data['historique_commande'] = $this->RestoModel->historiqueCommandeMois($mois, $annee,$current_resto['id']);
        }
        $data['contents'] = "restoPage/HistoriqueCommande";
        
        $this->load->view('templates_resto/template', $data);

    }

/*redirection page detail commande coté historique*/
   public function getDetailCommandeByid($id_commande) {
    $current_resto  = null;
    if ($this->session->userdata('resto_session')) {
        $current_resto = $this->session->userdata('resto_session');
    }
    $data['current_resto'] = $current_resto;
    $data['profil']=$this->RestoModel->getById($current_resto['id']);

        // Récupérer les détails de la commande à partir du modèle
        $data['details_commande'] = $this->RestoModel->detailsCommmande($id_commande);
        $data['commande'] = $this->RestoModel->detailsCommandeHistorique($id_commande)[0];
        // Charger la vue avec les données de la commande
        $data["contents"] = "restoPage/DetailCommande";
        $this->load->view('templates_resto/template', $data);
    }

/*redirection page detail commande cote commande actuelle recu */
public function DetailCommandeByid($id_commande) {
    $current_resto  = null;
        if ($this->session->userdata('resto_session')) {
            $current_resto = $this->session->userdata('resto_session');
        }
        $data['current_resto'] = $current_resto;
        $data['profil']=$this->RestoModel->getById($current_resto['id']);

        $data['details_commande'] = $this->RestoModel->detailsCommmande($id_commande);
        $data['commande'] = $this->RestoModel->detailsCommandeHistorique($id_commande)[0];
        $data["contents"] = "restoPage/DetailNotification";
        $this->load->view('templates_resto/template', $data);
}

/**redirection vers la page  modification plat*/
   public function loadFormPlat($id_plat){
    $current_resto  = null;
    if ($this->session->userdata('resto_session')) {
        $current_resto = $this->session->userdata('resto_session');
        }
        $data['current_resto'] = $current_resto;
        $data['profil']=$this->RestoModel->getById($current_resto['id']);

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
            $data['profil']=$this->RestoModel->getById($current_resto['id']);

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

    $image=$_FILES['image']['name']; if($image==null) $image=$this->PlatModel->getById($id_plat)['image'];

    $target_file= "assets/images/".$image;
    try{
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }catch(Exception $e){
        $e->getMessage();
    }
    $donner = [
        'id'=>$id_plat,
        'id_resto'=>$id_resto,
        'description'=>$description,
        'prix'=>$prix,
        'image'=>$image
    ];
    $this->PlatModel->edit($id_plat,$donner);
    redirect('RestoController');
}

/**fonction load page mise en avant */
public function loadMiseEnAvantPage(){
    $current_resto  = null;
        if ($this->session->userdata('resto_session')) {
            $current_resto = $this->session->userdata('resto_session');
        }
    $data["mise_en_avant_info"] = $this->RestoModel->getMiseEnAvantParResto($current_resto['id']);
    $data["prix_mise_en_avant"] = $this->RestoModel->getPrixMiseEnAvant();
    $data['current_resto'] = $current_resto; 
    $data['profil']=$this->RestoModel->getById($current_resto['id']);

    $data['contents'] = "restoPage/MiseEnAvant";
    $this->load->view('templates_resto/template', $data);
}

/*function load page Statistique*/ 
public function loadStatistiquePage(){
    $current_resto  = null;
        if ($this->session->userdata('resto_session')) {
            $current_resto = $this->session->userdata('resto_session');
        }
    $data['current_resto'] = $current_resto; 
    $data['profil']=$this->RestoModel->getById($current_resto['id']);

    $data['contents'] = "restoPage/GlobalStatResto";
    $this->load->view('templates_resto/template', $data);
}

/*function qui recupere statistique global resto du mois ou en anner*/
public function globalStatResto(){
    $mois = $this->input->post('mois');
    $anner = $this->input->post('annee');
    $id_resto = $this->input->post("id_resto");
    $data = array();
    
    if($mois != 0 && $anner != 0){
        $data["stat_chiffre"] = $this->RestoModel->getStatForRestoJour($mois,$anner,$id_resto);
        $data["stat_vente_plat"] = $this->RestoModel->getNombrePlatVenduMois($mois,$anner,$id_resto);
    
    } else {
        $data["stat_chiffre"] = $this->RestoModel->getStatForRestoMois($anner,$id_resto);
        $data["stat_vente_plat"] = $this->RestoModel->getNombrePlatVenduAnnee($anner,$id_resto);
    }
    if($data==null){
        $data["stat_chiffre"] = array("day"=>'0',"month"=>'0',"year"=>'0',"revenue"=>'0');
        $data["stat_vente_plat"] = array("month"=>0,"year"=>0);
    }
    echo json_encode($data);
   
}

/**fonction insertion dans la table mise_en_avant */
public function ajout_abonnement(){
    $current_resto  = null;
    if ($this->session->userdata('resto_session')) {
        $current_resto = $this->session->userdata('resto_session');
    }
    $mise_en_avant_info= $this->RestoModel->getMiseEnAvantParResto($current_resto['id']);
    $prix_mise_en_avant = $this->RestoModel->getPrixMiseEnAvant();

    if ($mise_en_avant_info ==null) {
        $data = [
            'id_resto' =>  $this->input->post("id_resto"),
            'id_prix' => $this->input->post("id_prix"),
            'prix' => $this->input->post("prix"),
            'date' => $this->input->post("date"),
            'duree' => $this->input->post("duree")
        ];
        $this->MiseEnAvantModel->save($data);
        redirect("RestoController/loadMiseEnAvantPage");
    }else {
        $date=$this->input->post("date");
        // Raha mbola tafiditra ao anaty duree anle ancien mise_en_avant
        if (date_create($date) <= date_create($mise_en_avant_info['date_fin']) ) {
            $new_date=$mise_en_avant_info['date_debut'];
            $new_duree=$mise_en_avant_info['duree']+$this->input->post("duree");
            $data = [
                'id_resto' =>  $this->input->post("id_resto"),
                'id_prix' => $this->input->post("id_prix"),
                'prix' => $this->input->post("prix"),
                'date' => $new_date,
                'duree' => $new_duree
            ];
        }else {
        // Raha efa lany
            $data = [
                'id_resto' =>  $this->input->post("id_resto"),
                'id_prix' => $this->input->post("id_prix"),
                'prix' => $this->input->post("prix"),
                'date' => $this->input->post("date"),
                'duree' => $this->input->post("duree")
            ];
        }
        $this->MiseEnAvantModel->update($mise_en_avant_info['id'],$data);
        redirect("RestoController/loadMiseEnAvantPage");
        
    }
}

/**function load page notification*/
public function notificationPage(){
    $current_resto  = null;
    if ($this->session->userdata('resto_session')) {
        $current_resto = $this->session->userdata('resto_session');
    }
    $data['current_resto'] = $current_resto; 
    $data['profil']=$this->RestoModel->getById($current_resto['id']);

    $data['contents'] = "restoPage/NotificationResto";
    $this->load->view('templates_resto/template', $data);
}

/***fonction qui recupere la liste de commande du jour*/
public function getTodayOrders(){
    $current_resto  = null;
    if ($this->session->userdata('resto_session')) {
        $current_resto = $this->session->userdata('resto_session');
    }
    $data['date'] = date('Y-m-d');
    $data = $this->RestoModel->historiqueCommandeJour($data['date'],$current_resto["id"]);
     echo json_encode($data);
}

/** Fonction load Profil page du Resto */
public function infoProfil(){
    $current_resto  = null;
    if ($this->session->userdata('resto_session')) {
        $current_resto = $this->session->userdata('resto_session');
    }
    $data['current_resto'] = $current_resto; 
    // $data['image']=$current_resto['image'];
    $data['adresses']=$this->AdresseModel->getAll();
    $data['profil']=$this->RestoModel->getById($current_resto['id']);
    $data['contents'] = "restoPage/Profil";
    
    $this->load->view('templates_resto/template', $data);   
}

/** Fonction edit Resto's Profil */
public function updateProfil(){
    $current_resto  = null;
    if ($this->session->userdata('resto_session')) {
        $current_resto = $this->session->userdata('resto_session');
    }
    $image_resto=$_FILES['profile_image']['name'];  if ($image_resto==null) $image_resto=$this->RestoModel->getById($current_resto['id'])['image'];
    $id_resto = $this->input->post('id_resto');
    $nom_resto = $this->input->post('nom_resto');
    $telephone = $this->input->post('telephone');
    $heure_ouverture = $this->input->post('ouverture');
    $heure_fermeture = $this->input->post('fermeture');
    $adresse = $this->input->post('adresse');
    $repere = $this->input->post('repere');
    $description = $this->input->post('description');
    
    // Moving image to assets
    $target_file= "assets/images/".$image_resto;
    try{
        move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file);
    }catch(Exception $e){
        $e->getMessage();
    }

    $donnees = [
        'id_resto'=>$id_resto,
        'nom'=>$nom_resto,
        'telephone'=>$telephone,
        'heure_ouverture'=>$heure_ouverture,
        'heure_fermeture'=>$heure_fermeture,
        'adresse'=>$adresse,
        'repere'=>$repere,  
        'description'=>$description,
        'image'=>$image_resto
    ];
    // echo $_FILES['profile_image']['tmp_name'];
    $this->RestoModel->editData($id_resto,$donnees);
    redirect('RestoController/infoProfil');
    // redirect('RestoController');    
}

}
?>
