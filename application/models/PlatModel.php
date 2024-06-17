<?php

if (!defined('BASEPATH')) exit('No direct access allowed');

class PlatModel extends CI_Model {
   protected $id;
   protected $id_resto;
   protected $description;
   protected $prix;
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
            if(isset($data['id_resto']))
               $this->setIdResto($data['id_resto']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
            if(isset($data['description']))
               $this->setDescription($data['description']);
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

   public function getIdResto(){
      return $this->id_resto;
   }

   public function getDescription(){
      return $this->description;
   }

   public function getPrix(){
      return $this->prix;
   }

   public function setId($id){
      $this->id = $id ;
   }

   public function setIdResto($id_resto){
      $this->id_resto = $id_resto ;
   }

   public function setDescription($description){
      $this->description = $description ;
   }

   public function setPrix($prix){
      $this->prix = $prix ;
   }

   public function save($data) {
      $this->db->insert('Plat', $data);
   }

   public function getAllInfo($idResto) {
      $this->db->where('id_resto', $idResto);
      $query = $this->db->get('v_info_global_plat_resto');
      return $query->result_array();
   }

   public function edit($id, $data) {
      $this->db->where('id', $id);
      return $this->db->update('Plat', $data);
   }

   public function delete($id) {
      $this->db->where('id', $id);
      return $this->db->delete('Plat');
   }

   public function getById($id) {
      $this->db->where('id', $id);
      $query = $this->db->get('Plat');
      return $query->row_array();
   }
   
   public function getLastPLatId() {
      $this->db->select('id');
      $this->db->order_by('id', 'DESC');
      $query = $this->db->get('Plat', 1);
      $result = $query->row_array();
      return $result ? $result['id'] : null;
   }

   public function search($criteria = []) {
      $this->db->select('Plat.id, Plat.id_resto, Plat.description, Plat.prix');
      $this->db->from('Plat');
      if (!empty($criteria['id'])) {
            $this->db->like('Plat.id', $criteria['id']);
      }
      if (!empty($criteria['id_resto'])) {
            $this->db->like('Plat.id_resto', $criteria['id_resto']);
      }
      if (!empty($criteria['description'])) {
            $this->db->like('Plat.description', $criteria['description']);
      }
      if (!empty($criteria['prix'])) {
            $this->db->like('Plat.prix', $criteria['prix']);
      }
      $query = $this->db->get('Plat');
      return $query->result_array();
   }

   /* Info plat avec note */
   public function getListplatRestaurantByIdRestaurantwithNote($id){
      $this->db->where('id_resto', $id);
      $query = $this->db->get('v_infoPlatNote');
      return $query->result_array();
   }

   //recheche multi-critere 2.0
   public function searchPlatWithCriteria ($prixMin, $prixMax, $nom)
   {
      $this->db->from('Plat');
      if (!empty($nom) || $nom!=null) {
         $this->db->like('Plat.description', $nom);
      }
      if (!empty($prixMin) || $prixMin!=null) {
         $this->db->where('Plat.prix >=', $prixMin); 
      }
      if (!empty($prixMax) || $prixMax!=null) {
         $this->db->where('Plat.prix <=', $prixMax); 
      }

      $query = $this->db->get();
      return $query->result_array();
   }
}

?>
