<?php

if (!defined('BASEPATH')) exit('No direct access allowed');

class  MiseEnAvantModel extends CI_Model {
   protected $id;
   protected $id_resto;
   protected $id_prix;
   protected $prix;
   protected $date;
   protected $duree;
   protected $errors = [];

   public function __construct($data = []) {
      parent::__construct();

      if (!empty($data)) {
          $this->errors = array_fill(0, 6, "");
         try {
         if(isset($data['id']))
            $this->setId($data['id']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
         if(isset($data['id_resto']))
            $this->setId_resto($data['id_resto']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
         if(isset($data['id_prix']))
            $this->setId_prix($data['id_prix']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
         if(isset($data['prix']))
            $this->setPrix($data['prix']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
         if(isset($data['date']))
            $this->setDate($data['date']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
         if(isset($data['duree']))
            $this->setDuree($data['duree']);
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

   public function getId_resto(){
      return $this->id_resto;
   }

   public function getId_prix(){
      return $this->id_prix;
   }

   public function getPrix(){
      return $this->prix;
   }

   public function getDate(){
      return $this->date;
   }

   public function getDuree(){
      return $this->duree;
   }

   public function setId($id){
      $this->id = $id ;
   }

   public function setId_resto($id_resto){
      $this->id_resto = $id_resto ;
   }

   public function setId_prix($id_prix){
      $this->id_prix = $id_prix ;
   }

   public function setPrix($prix){
      $this->prix = $prix ;
   }

   public function setDate($date){
      $this->date = $date ;
   }

   public function setDuree($duree){
      $this->duree = $duree ;
   }

   public function getAll() {
      $this->db->select('mise_en_avant.id, mise_en_avant.id_resto, mise_en_avant.id_prix, mise_en_avant.prix, mise_en_avant.date, mise_en_avant.duree, resto.email, Prix_mise_en_avant.prix');
      $this->db->from('mise_en_avant');
      $this->db->join('resto', 'mise_en_avant.id_resto = resto.id');
      $this->db->join('Prix_mise_en_avant', 'mise_en_avant.id_prix = Prix_mise_en_avant.id');
      $query = $this->db->get();
      return $query->result_array();
  }
  

   public function edit($id,$data) {
      $this->db->where('id',$id);
      return $this->db->update('mise_en_avant', $data);
   }

   public function delete($id) {
      $this->db->where('id',$id);
      return $this->db->delete('mise_en_avant');
   }

   public function getById($id) {
      $this->db->where('id',$id);
      $query = $this->db->get('mise_en_avant');
      return $query->row_array();
   }

   public function search($criteria = []) {
      $this->db->select('mise_en_avant.id,mise_en_avant.id_resto,mise_en_avant.id_prix,mise_en_avant.prix,mise_en_avant.date,mise_en_avant.duree,resto.email,Prix_mise_en_avant.prix');
      $this->db->from('mise_en_avant');
      $this->db->join('resto', 'mise_en_avant.id_resto = resto.id');
      $this->db->join('Prix_mise_en_avant', 'mise_en_avant.id_prix = Prix_mise_en_avant.id');
      if (!empty($criteria['id'])) {
            $this->db->like('mise_en_avant.id', $criteria['id']);
      }
      if (!empty($criteria['id_resto'])) {
            $this->db->like('mise_en_avant.id_resto', $criteria['id_resto']);
      }
      if (!empty($criteria['id_prix'])) {
            $this->db->like('mise_en_avant.id_prix', $criteria['id_prix']);
      }
      if (!empty($criteria['prix'])) {
            $this->db->like('mise_en_avant.prix', $criteria['prix']);
      }
      if (!empty($criteria['date'])) {
            $this->db->like('mise_en_avant.date', $criteria['date']);
      }
      if (!empty($criteria['duree'])) {
            $this->db->like('mise_en_avant.duree', $criteria['duree']);
      }
      $query = $this->db->get();
      return $query->result_array();
   }

   public function getPrixInPrix($id) {
      $this->db->where('id', $id);
      $query = $this->db->get('Prix_mise_en_avant');
      return $query->row_array();
  }
  
  public function save($data) {
     return $this->db->insert('Mise_en_avant', $data);
  }

  public function getValidRestoMiseEnAvantByDate($date) {
      $this->db->where('date_expiration >=', $date);
      $query = $this->db->get('v_mise_en_avant_dates');
      return $query->result_array();
  }

  public function update($id,$data){
      $this->db->where('id', $id);
      return $this->db->update('mise_en_avant', $data);
  }

}

?>