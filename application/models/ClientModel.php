<?php

if (!defined('BASEPATH')) exit('No direct access allowed');

class  ClientModel extends CI_Model {
   protected $id;
   protected $nom;
   protected $prenom;
   protected $email;
   protected $mot_de_pass;
   protected $errors = [];

   public function __construct($data = []) {
      parent::__construct();

      if (!empty($data)) {
          $this->errors = array_fill(0, 5, "");
         try {
            $this->setId($data['id']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
            $this->setNom($data['nom']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
            $this->setPrenom($data['prenom']);
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

   public function getNom(){
      return $this->nom;
   }

   public function getPrenom(){
      return $this->prenom;
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

   public function setNom($nom){
      $this->nom = $nom ;
   }

   public function setPrenom($prenom){
      $this->prenom = $prenom ;
   }

   public function setEmail($email){
      $this->email = $email ;
   }

   public function setMotDePass($mot_de_pass){
      $this->mot_de_pass = $mot_de_pass ;
   }

   public function checkLogin($email,$mot_de_pass) {
      $this->db->where('email', $email);
      $this->db->where('mot_de_pass', $mot_de_pass);
      $query = $this->db->get('Client');

      if ($query->num_rows() === 1) {
          $row = $query->row_array();
          return new AdmisModel($row);
      } else {
          return null;
      }
  }

   public function save() {
      $data = [
         'id' => $this->id,
         'nom' => $this->nom,
         'prenom' => $this->prenom,
         'email' => $this->email,
         'mot_de_pass' => $this->mot_de_pass,
      ];

      $this->db->insert('Client', $data);
   }

   public function getById($id) {
      $this->db->where('id',$id);
      $query = $this->db->get('Client');
      return $query->row_array();
   }

   public function getAll() {
      $query = $this->db->get('Client');
      return $query->result_array();
   }

   public function edit($id,$data) {
      $this->db->where('id',$id);
      return $this->db->update('Client', $data);
   }

   public function delete($id) {
      $this->db->where('id',$id);
      return $this->db->delete('Client');
   }

   public function search($criteria = []) {
      $this->db->select('Client.id,Client.nom,Client.prenom,Client.email,Client.mot_de_pass');
      $this->db->from('Client');
      if (!empty($criteria['id'])) {
            $this->db->like('Client.id', $criteria['id']);
      }
      if (!empty($criteria['nom'])) {
            $this->db->like('Client.nom', $criteria['nom']);
      }
      if (!empty($criteria['prenom'])) {
            $this->db->like('Client.prenom', $criteria['prenom']);
      }
      if (!empty($criteria['email'])) {
            $this->db->like('Client.email', $criteria['email']);
      }
      if (!empty($criteria['mot_de_pass'])) {
            $this->db->like('Client.mot_de_pass', $criteria['mot_de_pass']);
      }
      $query = $this->db->get('Client');
      return $query->result_array();
   }
}

?>