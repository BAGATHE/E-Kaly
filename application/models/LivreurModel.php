<?php

if (!defined('BASEPATH')) exit('No direct access allowed');

class  LivreurModel extends CI_Model {
   protected $id;
   protected $email;
   protected $mot_de_pass;
   protected $adresse;
   protected $nom_complet;
   protected $errors = [];

   public function __construct($data = []) {
      parent::__construct();

      if (!empty($data)) {
          $this->errors = array_fill(0, 5, "");
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
         try {
            if(isset($data['adresse']))
               $this->setAdresse($data['adresse']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
            if(isset($data['nom_complet']))
               $this->setNomComplet($data['nom_complet']);
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
   public function getAdresse(){
      return $this->adresse;
   }
   public function getNomComplet(){
      return $this->nom_complet;
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

   public function setAdresse($adresse){
      $this->adresse = $adresse;
   }
   public function setNomComplet($nom_complet){
      $this->nom_complet = $nom_complet;
   }

   public function save($data) {
      $data_livreur = [
         'email' => $data['email'],
         'mot_de_pass' => $data['mot_de_pass'],
      ];
      
      $this->db->insert('Livreur', $data_livreur);
      $id_dernier_insertion = $this->LivreurModel->getLastLivreurId();

      $data_livreur_info = [
         'id_livreur' => $id_dernier_insertion,
         'nom_complet' => $data['nom_complet'],
         'adresse' => $data['adresse'],
      ];
      $this->db->insert('Info_livreur', $data_livreur_info);
      $data_status = [
         'id_livreur' => $id_dernier_insertion,
         'status' => 'en attente',
      ];
      $this->db->insert('Status',$data_status);
   }

   public function getAll() {
      $query = $this->db->get('Livreur');
      return $query->result_array();
   }

   public function getAllWithInfo() {
      $this->db->select('livreur.id, livreur.email, info_livreur.nom_complet, info_livreur.adresse as id_adresse,adresse.nom as adresse');
      $this->db->from('Livreur livreur');
      $this->db->join('Info_livreur info_livreur', 'livreur.id = info_livreur.id_livreur');
      $this->db->join('Adresse adresse', 'info_livreur.adresse = adresse.id');
      $query = $this->db->get();
      return $query->result_array();
  }
  public function getStatusLivreur($id_livreur) {
   $this->db->select('status');
   $this->db->from('Status');
   $this->db->where('id_livreur', $id_livreur);
   
   $query = $this->db->get();
   if ($query->num_rows() > 0) {
       $row = $query->row();
       return $row->status;
   } else {
       return null;
   }
}

   public function edit($nom_table,$condition,$id,$data) {
      $this->db->where($condition,$id);
      return $this->db->update($nom_table, $data);
   }

   public function updateLivraisonPayementCommande($id, $paye) {
      $data = array('paye' => $paye);
      $this->db->where("id_commande", $id);
      return $this->db->update("Livraison_payement_commande", $data);
  }

  public function updateStatus($id_livreur,$status) {
   $data = array('status' => $status);
   $this->db->where("id_livreur", $id_livreur);
   return $this->db->update("Status", $data);
}
  
   public function delete($id) {
      $this->db->where('id',$id);
      return $this->db->delete('Livreur');
   }

   public function getById($id) {
      $this->db->select('livreur.id, livreur.email, info_livreur.nom_complet, info_livreur.adresse');
      $this->db->from('Livreur livreur');
      $this->db->join('Info_livreur info_livreur', 'livreur.id = info_livreur.id_livreur');
      $this->db->where('livreur.id',$id);
      $query = $this->db->get();
      return $query->row_array();
   }

/*fontion authentification pour se connecter*/
public function checkLogin($email,$mot_de_pass) {
   $this->db->where('email', $email);
   $this->db->where('mot_de_pass', $mot_de_pass);
   $query = $this->db->get('Livreur');

   if ($query->num_rows() === 1) {
      $row = $query->row_array();
      return $this->LivreurModel->getById($row["id"]);
   } else {
       return null;
   }
}

   public function getLastLivreurId() {
      $this->db->select('id');
      $this->db->order_by('id', 'DESC');
      $query = $this->db->get('Livreur', 1);
      $result = $query->row_array();
      return $result ? $result['id'] : null;
  }
  

   public function search($criteria = []) {
      $this->db->select('Livreur.id,Livreur.email,Livreur.mot_de_pass');
      $this->db->from('Livreur');
      if (!empty($criteria['id'])) {
            $this->db->like('Livreur.id', $criteria['id']);
      }
      if (!empty($criteria['email'])) {
            $this->db->like('Livreur.email', $criteria['email']);
      }
      if (!empty($criteria['mot_de_pass'])) {
            $this->db->like('Livreur.mot_de_pass', $criteria['mot_de_pass']);
      }
      $query = $this->db->get('Livreur');
      return $query->result_array();
   }
   public function getCommandesPayeesByLivreurTotal($idLivreur) {
      $this->db->select('c.*'); // Sélectionne toutes les colonnes de la table Commande
      $this->db->from('Livraison_payement_commande lpc');
      $this->db->join('Commande c', 'lpc.id_commande = c.id');
      $this->db->where('lpc.id_livreur', $idLivreur);
      $this->db->where('lpc.paye', true); // Ajoute la condition où la commande est payée

      $query = $this->db->get();
      return $query->result_array();
  }

//commande disponible avec details
public function algoCommandeLivreur($id,$dateRechercher) {
      $this->db->where('id_livreur', $id);
      $this->db->where('DATE(date)', $dateRechercher);
      $query = $this->db->get('v_livreur_commande_frais_commission_payement');
      return $query->result_array();
   }

   public function getCommandeLivreur($id) {
      $this->db->where('id_commande', $id);
      $query = $this->db->get('v_frais_livraison_commission_detail');
      return $query->result_array();
   }

//livraison du jour
public function getLivraisonLivreurEnUneJourne($idLivreur,$dateRechercher){ 
      $this->db->where('id_livreur', $idLivreur);
      $this->db->where('DATE(date_commande)', $dateRechercher);
      $query = $this->db->get('v_liste_livraison_livreur_jour');
      return $query->result_array();
   }
  
public function getLivraisonLivreurEnUneJourneAvecGain($idLivreur, $dateRechercher){ 
      $this->db->where('id_livreur', $idLivreur);
      $this->db->where('DATE(date_commande)', $dateRechercher);
      $query = $this->db->get('v_livraison_livreur_avec_gain');
      return $query->result_array();
   }
//tout les livraison du mois d'un livreur


// STATISTIQUE LIVREUR

   public function getStatistiqueJour($idLivreur,$annee,$mois)
   {
      $sql= 'select * from v_total_commission_frais_livraison_par_jour WHERE YEAR(date)='.$annee.' AND MONTH(date)='.$mois.' AND id_livreur='.$idLivreur;
      $query= $this->db->query($sql);
      return $query->result_array();
   }
   public function getCommissionDuJour($idLivreur,$dateRechercher)
   {
      $sql= 'select * from v_total_commission_frais_livraison_par_jour WHERE DATE(date)="'.$dateRechercher.'" AND id_livreur='.$idLivreur;
      $query= $this->db->query($sql);
      $solde=$query->row_array();
      if($solde==null){
         $solde['somme_commission']=0;
         $solde["somme_frais_livraison"]=0;
      }
      return $solde;
   }
   public function getCommandesPayes()
   {
      $query = $this->db->get('v_commande_payes');
      return $query->result_array();
   }

   // Fonction pour insérer une livraison et un paiement de commande
   public function insert_livraison_payement_commande($id_commande, $id_livreur) {
      // Préparer les données à insérer
      $data = array(
         'id_commande' => $id_commande,
         'id_livreur' => $id_livreur,
         'paye' => 0 // Initialement, la commande n'est pas payée
      );

      // Insérer les données dans la table
      return $this->db->insert('Livraison_payement_commande', $data);
   }
}

?>