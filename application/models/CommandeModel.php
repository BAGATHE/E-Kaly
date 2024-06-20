<?php

if (!defined('BASEPATH')) exit('No direct access allowed');

class CommandeModel extends CI_Model {
   protected $id;
   protected $id_client;
   protected $adresse;
   protected $date_commande;
   protected $errors = [];

   public function __construct($data = []) {
      parent::__construct();

      if (!empty($data)) {
          $this->errors = array_fill(0, 4, "");
         try {
            if(isset($data['id']))
               $this->setId($data['id']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
            if(isset($data['id_client']))
               $this->setIdClient($data['id_client']);
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
            if(isset($data['date_commande']))
               $this->setDateCommande($data['date_commande']);
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

   public function getIdClient(){
      return $this->id_client;
   }

   public function getAdresse(){
      return $this->adresse;
   }

   public function getDateCommande(){
      return $this->date_commande;
   }

   public function setId($id){
      $this->id = $id ;
   }

   public function setIdClient($id_client){
      $this->id_client = $id_client ;
   }

   public function setAdresse($adresse){
      $this->adresse = $adresse ;
   }

   public function setDateCommande($date_commande){
      $this->date_commande = $date_commande ;
   }
/*
   public function save() {
      $data = [
         'id_client' => $this->id_client,
         'adresse' => $this->adresse,
         'date_commande' => $this->date_commande,
      ];

      $this->db->insert('Commande', $data);
   }
*/
public function save($data) {
   $this->db->insert('Commande', $data);
}
   public function getAll() {
      $query = $this->db->get('Commande');
      return $query->result_array();
   }

   public function edit($id, $data) {
      $this->db->where('id', $id);
      return $this->db->update('Commande', $data);
   }

   public function delete($id) {
      $this->db->where('id', $id);
      return $this->db->delete('Commande');
   }

   public function getById($id) {
      $this->db->where('id', $id);
      $query = $this->db->get('Commande');
      return $query->row_array();
   }

   public function getDetailsCommandeById($id) {
      $this->db->where('id_commande', $id);
      $query = $this->db->get('v_details_commande');
      return $query->result_array();
   }

   public function search($criteria = []) {
      $this->db->select('Commande.id, Commande.id_client, Commande.adresse, Commande.date_commande');
      $this->db->from('Commande');
      if (!empty($criteria['id'])) {
            $this->db->like('Commande.id', $criteria['id']);
      }
      if (!empty($criteria['id_client'])) {
            $this->db->like('Commande.id_client', $criteria['id_client']);
      }
      if (!empty($criteria['adresse'])) {
            $this->db->like('Commande.adresse', $criteria['adresse']);
      }
      if (!empty($criteria['date_commande'])) {
            $this->db->like('Commande.date_commande', $criteria['date_commande']);
      }
      $query = $this->db->get('Commande');
      return $query->result_array();
   }
   
   public function getRestoByCommandeId($commandeId) {
        $this->db->select('Resto.*');
        $this->db->from('Commande');
        $this->db->join('Commande_plat', 'Commande_plat.id_commande = Commande.id');
        $this->db->join('Plat', 'Plat.id = Commande_plat.id_plat');
        $this->db->join('Resto', 'Resto.id = Plat.id_resto');
        $this->db->where('Commande.id', $commandeId);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }
   /*fonction qui recupere dernier insertion*/ 
public function getLastCommandeId() {
   $this->db->select('id');
   $this->db->order_by('id', 'DESC');
   $query = $this->db->get('Commande', 1);
   $result = $query->row_array();
   return $result ? $result['id'] : null;
}
    
    
}

?>