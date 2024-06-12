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
  

   public function edit($nom_table,$condition,$id,$data) {
      $this->db->where($condition,$id);
      return $this->db->update($nom_table, $data);
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
  public function getCommandesPayeesByLivreur($idLivreur, $mois, $annee) {
      // Déterminer la date de début et de fin du mois spécifié
      $premiereJourMois = date("Y-m-d", strtotime("$annee-$mois-01"));
      $derniereJourMois = date("Y-m-t", strtotime("$annee-$mois-01"));

      $this->db->select('c.*, DATE_FORMAT(c.date, "%Y-%m-%d") AS date_commande_format');
      $this->db->from('Livraison_payement_commande lpc');
      $this->db->join('Commande c', 'lpc.id_commande = c.id');
      $this->db->where('lpc.id_livreur', $idLivreur);
      $this->db->where('lpc.paye', true); // Ajoute la condition où la commande est payée
      $this->db->where('c.date >=', $premiereJourMois);
      $this->db->where('c.date <=', $derniereJourMois);
      $this->db->order_by('c.date', 'ASC');

      $query = $this->db->get();
      $result = $query->result_array();

      // Regrouper les commandes par jour
      $commandesParJour = [];
      foreach ($result as $commande) {
         $dateCommande = $commande['date_commande_format'];
         if (!isset($commandesParJour[$dateCommande])) {
               $commandesParJour[$dateCommande] = [];
         }
         $commandesParJour[$dateCommande][] = $commande;
      }

      return $commandesParJour;
   }
   public function detailsLivreurMois($idLivreur, $mois, $annee) {
      $this->load->model("CommandeModel");
      // Récupérer les commandes payées du livreur pour le mois spécifié
      $commandesParJour = $this->getCommandesPayeesByLivreur($idLivreur, $mois, $annee);
  
      // Initialiser les variables pour le rapport
      $rapport = [];
      // Requête pour récupérer la valeur de 'benefice_frais_livraison'
      $this->db->where('nom', 'benefice_frais_livraison');
      $query = $this->db->get('Config');
      $configBeneficeLivraison = 0;
      // Vérifier s'il y a des résultats
      if ($query->num_rows() > 0) {
         $config = $query->row_array();
         $configBeneficeLivraison = $config['valeur'];  // Récupérer la valeur
      } else {
         // Gérer le cas où la configuration n'est pas trouvée
         return $rapport; // Par exemple, retourner une valeur par défaut ou gérer une erreur
      }

      // Pour chaque jour du mois, calculer les détails des commandes et les tarifs de livraison
      foreach ($commandesParJour as $date => $commandes) {
          $detailsJour = [
              'date' => $date,
              'commandes' => [],
              'totalTarifLivraison' => 0,
              'totalBenefice' => 0,
              'totalSalaire' => 0
          ];
  
          foreach ($commandes as $commande) {
              // Calculer le tarif de livraison pour chaque commande
              $tarifLivraison = $this->CommandeModel->getTarifLivraison($commande['id']);
  
              // Calculer le bénéfice de la livraison (en pourcentage de la config)
              $beneficeLivraison = $tarifLivraison * ($configBeneficeLivraison / 100);
  
              // Ajouter les détails de la commande au rapport
              $detailsCommande = [
                  'id_commande' => $commande['id'],
                  'tarif_livraison' => $tarifLivraison,
                  'benefice_livraison' => $beneficeLivraison,
                  'salaire' => $tarifLivraison - $beneficeLivraison
              ];
  
              $detailsJour['commandes'][] = $detailsCommande;
  
              // Mettre à jour les totaux du rapport
              $detailsJour['totalTarifLivraison'] += $tarifLivraison;
              $detailsJour['totalBenefice'] += $beneficeLivraison;
              $detailsJour['totalSalaire'] += $detailsCommande['salaire'];
          }
  
          // Ajouter les détails du jour au rapport général
          $rapport[$date] = $detailsJour;
      }
  
      return $rapport;
  }
  public function detailsLivreurAnnee($idLivreur, $annee) {
      // Initialiser le rapport
      $rapport = [];
      $this->db->where('nom', 'benefice_frais_livraison');
      $query = $this->db->get('Config');
      $configBeneficeLivraison = 0;
      // Vérifier s'il y a des résultats
      if ($query->num_rows() > 0) {
         $config = $query->row_array();
         $configBeneficeLivraison = $config['valeur'];  // Récupérer la valeur
      } else {
         // Gérer le cas où la configuration n'est pas trouvée
         return $rapport; // Par exemple, retourner une valeur par défaut ou gérer une erreur
      }
      // Boucler sur tous les mois de l'année
      for ($mois = 1; $mois <= 12; $mois++) {
         // Récupérer les commandes payées du livreur pour le mois et l'année spécifiés
         $commandesParJour = $this->getCommandesPayeesByLivreur($idLivreur, $mois, $annee);

         // Initialiser les variables pour le mois
         $detailsMois = [
            'mois' => $mois,
            'nombreLivraisons' => 0,
            'totalTarifLivraison' => 0,
            'totalBenefice' => 0,
            'totalSalaire' => 0,
            'detailsJours' => []
         ];

         // Traiter chaque jour du mois
         foreach ($commandesParJour as $date => $commandes) {
            $detailsJour = [
                  'date' => $date,
                  'commandes' => [],
                  'totalTarifLivraison' => 0,
                  'totalBenefice' => 0,
                  'totalSalaire' => 0
            ];

            foreach ($commandes as $commande) {
                  // Calculer le tarif de livraison pour chaque commande
                  $tarifLivraison = $this->CommandeModel->getTarifCommande($commande['id']);

                  // Calculer le bénéfice de la livraison (en pourcentage de la config)
                  $beneficeLivraison = $tarifLivraison * ($configBeneficeLivraison / 100);

                  // Ajouter les détails de la commande au rapport
                  $detailsCommande = [
                     'id_commande' => $commande['id'],
                     'tarif_livraison' => $tarifLivraison,
                     'benefice_livraison' => $beneficeLivraison,
                     'salaire' => $tarifLivraison - $beneficeLivraison
                  ];

                  $detailsJour['commandes'][] = $detailsCommande;

                  // Mettre a jour les totaux du jour
                  $detailsJour['totalTarifLivraison'] += $tarifLivraison;
                  $detailsJour['totalBenefice'] += $beneficeLivraison;
                  $detailsJour['totalSalaire'] += $detailsCommande['salaire'];

                  // Mettre a jour les totaux du mois
                  $detailsMois['totalTarifLivraison'] += $tarifLivraison;
                  $detailsMois['totalBenefice'] += $beneficeLivraison;
                  $detailsMois['totalSalaire'] += $detailsCommande['salaire'];
            }

            // Ajouter les détails du jour au mois
            $detailsMois['detailsJours'][] = $detailsJour;
            $detailsMois['nombreLivraisons'] += count($commandes);
         }

         // Ajouter les détails du mois au rapport général
         $rapport[$mois] = $detailsMois;
      }

      return $rapport;
   }

   public function getLivraisonLivreurEnUneJourne($idLivreur, $dateRechercher){ 
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

   public function algoCommandeLivreur($id) {
      $this->db->where('id_livreur', $id);
      $query = $this->db->get('v_livreur_commande');
      return $query->result_array();
   }

   public function getCommandeLivreur($id) {
      $this->db->where('id_commande', $id);
      $query = $this->db->get('v_frais_livraison_commission_detail');
      return $query->result_array();
   }

// STATISTIQUE LIVREUR
   public function getTotalFraisLivraisonJour ($idLivreur, $annee, $mois, $jour)
   {
      $sql= 'select* from v_somme_frais_livraison_par_jour WHERE YEAR(date)='.$annee.' AND MONTH(date)='.$mois.' AND DAY(date)='.$jour.' AND id_livreur='.$idLivreur;
      $query= $this->db->query($sql);
      return $query->result_array();
   }

   public function getTotalCommissionJour ($idLivreur, $annee, $mois, $jour)
   {
      $sql= 'select* from v_somme_commission_par_jour WHERE YEAR(date)='.$annee.' AND MONTH(date)='.$mois.' AND DAY(date)='.$jour.' AND id_livreur='.$idLivreur;
      $query= $this->db->query($sql);
      return $query->result_array();
   }
   
   public function getCommandesPayes()
   {
      $query = $this->db->get('v_commande_payes');
      return $query->result_array();
   }


}

?>