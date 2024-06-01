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
            $this->setId($data['id']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
            $this->setEmail($data['email']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
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

   public function save() {
      $data = [
         'id' => $this->id,
         'email' => $this->email,
         'mot_de_pass' => $this->mot_de_pass,
      ];

      $this->db->insert('Resto', $data);
   }

   public function getAll() {
      $query = $this->db->get('Resto');
      return $query->result_array();
   }

   public function edit($id,$data) {
      $this->db->where('id',$id);
      return $this->db->update('Resto', $data);
   }

   public function delete($id) {
      $this->db->where('id',$id);
      return $this->db->delete('Resto');
   }

   public function getById($id) {
      $this->db->where('id',$id);
      $query = $this->db->get('Resto');
      return $query->row_array();
   }

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

}

?>