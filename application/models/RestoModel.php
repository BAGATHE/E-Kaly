<?php

if (!defined('BASEPATH')) exit('No direct access allowed');

class  RestoModel extends CI_Model {
   protected $id;
   protected $email;
   protected $mot_de_pass;
   protected $errors = [];

   public function __construct($data = []) {
      parent::__construct();

      if (!empty($data)) {
          $this->errors = array_fill(0, 3, "");
         try {
            if(isset($data['id']))
               $this->setId($data['id']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
            if(isset($data['email']))
               $this->setEmail($data['email']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
            if(isset($data['mot_de_pass']))
               $this->setMotDePass($data['mot_de_pass']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
      }
   }

   public function hasErrors(){
      return !empty(array_filter($this->errors));
   }

   public function getId(){
      return $this->id;
   }

   public function getEmail(){
      return $this->email;
   }

   public function getMotDePass(){
      return $this->mot_de_pass;
   }

   public function setId($id){
      $this->id = $id ;
   }

   public function setEmail($email){
      $this->email = $email ;
   }

   public function setMotDePass($mot_de_pass){
      $this->mot_de_pass = $mot_de_pass ;
   }
/**fonction insertion dans la table*/
   public function save($data) {
      $data_resto = [
         'email' => $data['email'],
         'mot_de_pass' => $data['mot_de_pass'],
      ];
      
      $this->db->insert('Resto', $data_resto);
      $id_dernier_insertion = $this->RestoModel->getLastRestoId();

      $data_resto_info = [
         'id_resto' => $id_dernier_insertion,
         'nom' => $data['nom'],
         'adresse' => $data['adresse'],
         'description' => $data['description'],
         'heure_ouverture' => $data['heure_ouverture'],
         'heure_fermeture' => $data['heure_fermeture'],
         'image' => $data["image"],
      ];
      $this->db->insert('Info_resto', $data_resto_info);
   }

/**fonction qui recupere tout les resto dans la base */
   public function getAll() {
      $query = $this->db->get('Resto');
      return $query->result_array();
   }
   public function getAllWithInfo() {
      $this->db->select('resto.id, resto.email, info_resto.nom, info_resto.adresse as id_adresse,adresse.nom as adresse, info_resto.description, info_resto.heure_ouverture, info_resto.heure_fermeture,info_resto.image');
      $this->db->from('Resto resto');
      $this->db->join('Info_resto info_resto', 'resto.id = info_resto.id_resto');
      $this->db->join('Adresse adresse', 'info_resto.adresse = adresse.id');
      $query = $this->db->get();
      return $query->result_array();
  }
  
/**update d"un" ligne dans une table */
  public function edit($nom_table,$condition,$id,$data) {
   $this->db->where($condition,$id);
   return $this->db->update($nom_table, $data);
}

/** update generaliser */
public function editData($id, $data) {
   $this->db->where('id_resto', $id);
   return $this->db->update('info_resto', $data);
}

/**supresision de ligne dans  une table */
   public function delete($id) {
      $this->db->where('id',$id);
      return $this->db->delete('Resto');
   }

/* recuperation  info resto par l'ID*/
public function getById($id) {
      $this->db->select('resto.id, resto.email, info_resto.nom, info_resto.adresse,info_resto.repere,info_resto.description,info_resto.heure_ouverture,info_resto.heure_fermeture,info_resto.image,info_resto.telephone,info_resto.latitude,info_resto.longitude');
      $this->db->from('Resto resto');
      $this->db->join('Info_resto info_resto', 'resto.id = info_resto.id_resto');
      $this->db->where('resto.id',$id);
      $query = $this->db->get();
      return $query->row_array();
   }

/*fontion authentification pour se connecter*/
public function checkLogin($email,$mot_de_pass) {
      $this->db->where('email', $email);
      $this->db->where('mot_de_pass', $mot_de_pass);
      $query = $this->db->get('Resto');

      if ($query->num_rows() === 1) {
         $row = $query->row_array();
         return $this->RestoModel->getById($row["id"]);
      } else {
          return null;
      }
  }

/*recherche multicritere*/   
public function search($criteria = []) {
      $this->db->select('Resto.id,Resto.email,Resto.mot_de_pass');
      $this->db->from('Resto');
      if (!empty($criteria['id'])) {
            $this->db->like('Resto.id', $criteria['id']);
      }
      if (!empty($criteria['email'])) {
            $this->db->like('Resto.email', $criteria['email']);
      }
      if (!empty($criteria['mot_de_pass'])) {
            $this->db->like('Resto.mot_de_pass', $criteria['mot_de_pass']);
      }
      $query = $this->db->get('Resto');
      return $query->result_array();
   }


/*fonction qui recupere dernier insertion*/ 
public function getLastRestoId() {
      $this->db->select('id');
      $this->db->order_by('id', 'DESC');
      $query = $this->db->get('Resto', 1);
      $result = $query->row_array();
      return $result ? $result['id'] : null;
   }

/*fonction qui recupere la performance  flux entrer argent  du resto au cours de l'anner retourne performance au cours des 12mois*/
public function getStatForRestoMois($annee,$id) {
      $this->db->where('id_resto',$id);
      $this->db->where('year',$annee);
      $query = $this->db->get('v_revenu_depense_chiffre_mois_for_resto');
      return $query->result_array();
   }
/*fonction qui recupere la performance flux entrer argent  du resto au cours du mois choisi retourne performance au cours des 30jour du mois choisi*/
public function getStatForRestoJour($mois,$annee,$id) {
      $this->db->where('id_resto',$id);
      $this->db->where('month',$mois);
      $this->db->where('year',$annee);
      $query = $this->db->get('v_revenu_depense_chiffre_jour_for_resto');
      return $query->result_array();
   }

/*recupere le nombre de plat vendu par plat aux cours du mois et annee choisi */
  public function getNombrePlatVenduMois($mois,$annee,$id){
      $this->db->where('id_resto',$id);
      $this->db->where('month',$mois);
      $this->db->where('year',$annee);
      $query = $this->db->get('v_nombre_plat_vendu_resto_mois');
      return $query->result_array();
   }
/*recupere le nombre de plat vendu par plat aux cours de l'annee choisi */
   public function getNombrePlatVenduAnnee($annee,$id){
      $this->db->where('id_resto',$id);
      $this->db->where('year',$annee);
      $query = $this->db->get('v_nombre_plat_vendu_resto_annee');
      return $query->result_array();
   }
/**top des plat vendu au cours du mois  */
   public function getTop5RendableMois($limit,$mois,$annee,$id){
      $this->db->where('id_resto',$id);
      $this->db->where('month',$mois);
      $this->db->where('year',$annee);
      $this->db->limit(0,$limit);
      $query = $this->db->get('v_nombre_plat_vendu_resto_mois');
      return $query->result_array();
   }
/**top des plat vendu au cours de l'anner  */
public function getTop5RendableAnnee($limit,$annee,$id){
      $this->db->where('id_resto',$id);
      $this->db->where('year',$annee);
      $this->db->limit(0,$limit);
      $query = $this->db->get('v_nombre_plat_vendu_resto_annee');
      return $query->result_array();
   }
/**recuperation prix mise en avant*/
public function getPrixMiseEnAvant(){
      $this->db->select('*');
      $this->db->order_by('id','DESC');
      $this->db->limit(1);
      $query = $this->db->get('Prix_mise_en_avant');
      return $query->row_array();
   }
/**recuperation de l'information mise en avant du resto */
public function getMiseEnAvantParResto($idResto) {

      $this->db->where('id_resto', $idResto);
      $query = $this->db->get('v_mise_en_avant_dates');
      return $query->row_array();
   }

   public function getAllMiseEnAvant(){
      $query = $this->db->get('v_mise_en_avant_dates_with_info_resto');
      return $query->result_array();
   }

/*historique des commmande du mois choisi*/
public function historiqueCommandeMois($mois, $annee,$id_resto)
   {
       $sql= 'select* from v_historique_commande_restaurant_avec_nom_client where MONTH(date)='.$mois.' and YEAR(date)='.$annee.' and id_resto='.$id_resto;
       $query= $this->db->query($sql);
       return $query->result_array();
   }

/*historique des commmande du jour choisi*/
public function historiqueCommandeJour($date,$id_resto)
   {
       $sql= "select * from v_historique_commande_restaurant_avec_nom_client_avec_status where DATE(date)='".$date."' and id_resto=".$id_resto;
       $query= $this->db->query($sql);
       return $query->result_array();
   }
   /* deteail d'un commande*/
public function detailsCommandeHistorique($id_commande)
   {
       $sql= "select * from v_historique_commande_restaurant_avec_nom_client where id_commande=".$id_commande;
       $query= $this->db->query($sql);
       return $query->result_array();
   }
   
public function detailsCommmande($idCommande)
   {
       $this->db->where('id_commande',$idCommande);
       $query = $this->db->get('v_details_commande_avec_nom_plat');
       return $query->result_array();
   }

   /* Info resto avec note */
public function getRestaurantByIdWithNote($id){
   $this->db->where('id', $id);
   $query = $this->db->get('v_infoRestoNote');
   return $query->result_array();
}

//recherche multicriteres Resto (avec details)
   public function searchRestoWithCriteria ($heureOuverture, $heureFermeture, $adresse, $nom)
   {
      $this->db->from('Info_resto');
      if (!empty($heureOuverture) || $heureOuverture!=null) {
         $this->db->like('Info_resto.heure_ouverture', $heureOuverture);
      }
      if (!empty($heureFermeture) || $heureFermeture!=null) {
         $this->db->like('Info_resto.heure_fermeture', $heureFermeture); 
      }
      if (!empty($adresse) || $adresse!=null) {
         $this->db->like('Info_resto.adresse', $adresse);
      }
      if (!empty($nom) || $nom!=null) {
         $this->db->like('Info_resto.nom', $nom);
      }
      $query = $this->db->get();
      return $query->result_array();
   }
   public function searchRestoWithCriteriaWithFavorite($heureOuverture, $heureFermeture, $adresse, $nom, $idClient)
   {
       $this->db->select('vr.id_resto, vr.nom_resto, vr.adresse, vr.repere, vr.description, vr.telephone, vr.heure_ouverture, vr.heure_fermeture,vr.note_moyenne, vr.image, fc.id_client AS id_client_favori');
       $this->db->from('v_liste_resto_complet vr');
   
       if (!empty($heureOuverture)) {
           $this->db->where('vr.heure_ouverture >=', $heureOuverture);
       }
       if (!empty($heureFermeture)) {
           $this->db->where('vr.heure_fermeture <=', $heureFermeture);
       }
       if (!empty($adresse)) {
           $this->db->where('vr.id_adresse', $adresse);
       }
       if (!empty($nom)) {
           $this->db->like('vr.nom_resto', $nom);
       }
   
       // Jointure avec Favori_client
       if (!empty($idClient)) {
           $this->db->join('Favori_client fc', 'vr.id_resto = fc.id_resto AND fc.id_client = ' . $idClient, 'left');
       }
   
       $query = $this->db->get();
       return $query->result_array();
   }
   

   public function getListeRestoAvecNoteEtParMiseEnAvant(){
      $query = $this->db->get('v_liste_resto_avec_note_et_mise_en_avant');
      return $query->result_array();
   }
   public function getListeRestoComplet($idClient)
   {
      $this->db->select('vlc.id_resto, vlc.nom_resto, vlc.adresse, vlc.repere, vlc.description, vlc.telephone, vlc.heure_ouverture, vlc.heure_fermeture, vlc.image, vlc.note_moyenne, vlc.mise_en_avant_valide, fc.id_client AS id_client_favori');
      $this->db->from('v_liste_resto_complet vlc');
      
      if ($idClient !== null) {
         $this->db->join('Favori_client fc', 'vlc.id_resto = fc.id_resto AND fc.id_client = ' . $this->db->escape($idClient), 'left');
      } else {
         $this->db->join('Favori_client fc', 'vlc.id_resto = fc.id_resto AND fc.id_client IS NULL', 'left');
      }

      $this->db->order_by('vlc.mise_en_avant_valide', 'DESC');
      $this->db->order_by('vlc.note_moyenne', 'DESC');

      $query = $this->db->get();
      return $query->result_array();
   }
   
   public function ableToTakeCommand($id_resto,$heur){
      $query = "SELECT ableToTakeCommand(?, ?) AS able";
      $result = $this->db->query($query, array($id_resto, $heur));
      
      if ($result->num_rows() > 0) {
         return $result->row()->able;
      } else {
         return null; 
      }
   }
}


?>