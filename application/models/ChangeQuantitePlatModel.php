<?php

if (!defined('BASEPATH')) exit('No direct access allowed');

class  ChangeQuantitePlatModel extends CI_Model {
   protected $id;
   protected $id_plat;
   protected $date;
   protected $production;
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
         if(isset($data['id_plat']))
            $this->setId_plat($data['id_plat']);
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
         if(isset($data['production']))
            $this->setProduction($data['production']);
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

   public function getId_plat(){
      return $this->id_plat;
   }

   public function getDate(){
      return $this->date;
   }

   public function getProduction(){
      return $this->production;
   }

   public function setId($id){
      $this->id = $id ;
   }

   public function setId_plat($id_plat){
      $this->id_plat = $id_plat ;
   }

   public function setDate($date){
      $this->date = $date ;
   }

   public function setProduction($production){
      $this->production = $production ;
   }

   public function save() {
      $data = [
         'id_plat' => $this->id_plat,
         'date' => $this->date,
         'production' => $this->production,
      ];

      $this->db->insert('change_quantite_plat', $data);
   }

   public function getAll() {
      $this->db->select('change_quantite_plat.id,change_quantite_plat.id_plat,change_quantite_plat.date,change_quantite_plat.production,plat.id_resto');
      $this->db->from('change_quantite_plat');
      $this->db->join('plat', 'change_quantite_plat.id_plat = plat.id');
      $query = $this->db->get();
      return $query->result_array();
   }

   public function edit($id,$data) {
      $this->db->where('id',$id);
      return $this->db->update('change_quantite_plat', $data);
   }

   public function delete($id) {
      $this->db->where('id',$id);
      return $this->db->delete('change_quantite_plat');
   }

   public function getById($id) {
      $this->db->where('id',$id);
      $query = $this->db->get('change_quantite_plat');
      return $query->row_array();
   }

   public function search($criteria = []) {
      $this->db->select('change_quantite_plat.id,change_quantite_plat.id_plat,change_quantite_plat.date,change_quantite_plat.production,plat.id_resto');
      $this->db->from('change_quantite_plat');
      $this->db->join('plat', 'change_quantite_plat.id_plat = plat.id');
      if (!empty($criteria['id'])) {
            $this->db->like('change_quantite_plat.id', $criteria['id']);
      }
      if (!empty($criteria['id_plat'])) {
            $this->db->like('change_quantite_plat.id_plat', $criteria['id_plat']);
      }
      if (!empty($criteria['date'])) {
            $this->db->like('change_quantite_plat.date', $criteria['date']);
      }
      if (!empty($criteria['production'])) {
            $this->db->like('change_quantite_plat.production', $criteria['production']);
      }
      $query = $this->db->get();
      return $query->result_array();
   }

}

?>