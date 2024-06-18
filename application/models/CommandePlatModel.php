<?php

if (!defined('BASEPATH')) exit('No direct access allowed');

class CommandePlatModel extends CI_Model {
   protected $id;
   protected $id_commande;
   protected $id_plat;
   protected $quantite;
   protected $prix;
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
            if(isset($data['id_commande']))
               $this->setIdCommande($data['id_commande']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
            if(isset($data['id_plat']))
               $this->setIdPlat($data['id_plat']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
            if(isset($data['quantite']))
               $this->setQuantite($data['quantite']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
            if(isset($data['prix']))
               $this->setPrix($data['prix']);
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

   public function getIdCommande(){
      return $this->id_commande;
   }

   public function getIdPlat(){
      return $this->id_plat;
   }

   public function getQuantite(){
      return $this->quantite;
   }

   public function getPrix(){
      return $this->prix;
   }

   public function setId($id){
      $this->id = $id ;
   }

   public function setIdCommande($id_commande){
      $this->id_commande = $id_commande ;
   }

   public function setIdPlat($id_plat){
      $this->id_plat = $id_plat ;
   }

   public function setQuantite($quantite){
      $this->quantite = $quantite ;
   }

   public function setPrix($prix){
      $this->prix = $prix ;
   }
/*
   public function save() {
      $data = [
         'id_commande' => $this->id_commande,
         'id_plat' => $this->id_plat,
         'quantite' => $this->quantite,
         'prix' => $this->prix,
      ];

      $this->db->insert('Commande_plat', $data);
   }
*/
public function save($data) {
   $this->db->insert('Commande_plat', $data);
}
   public function getAll() {
      $query = $this->db->get('Commande_plat');
      return $query->result_array();
   }

   public function edit($id, $data) {
      $this->db->where('id', $id);
      return $this->db->update('Commande_plat', $data);
   }

   public function delete($id) {
      $this->db->where('id', $id);
      return $this->db->delete('Commande_plat');
   }

   public function getById($id) {
      $this->db->where('id', $id);
      $query = $this->db->get('Commande_plat');
      return $query->row_array();
   }

   public function search($criteria = []) {
      $this->db->select('Commande_plat.id, Commande_plat.id_commande, Commande_plat.id_plat, Commande_plat.quantite, Commande_plat.prix');
      $this->db->from('Commande_plat');
      if (!empty($criteria['id'])) {
            $this->db->like('Commande_plat.id', $criteria['id']);
      }
      if (!empty($criteria['id_commande'])) {
            $this->db->like('Commande_plat.id_commande', $criteria['id_commande']);
      }
      if (!empty($criteria['id_plat'])) {
            $this->db->like('Commande_plat.id_plat', $criteria['id_plat']);
      }
      if (!empty($criteria['quantite'])) {
            $this->db->like('Commande_plat.quantite', $criteria['quantite']);
      }
      if (!empty($criteria['prix'])) {
            $this->db->like('Commande_plat.prix', $criteria['prix']);
      }
      $query = $this->db->get('Commande_plat');
      return $query->result_array();
   }
}

?>
