<?php

if (!defined('BASEPATH')) exit('No direct access allowed');

class  AdmisModel extends CI_Model {
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
      $query = $this->db->get('admis');

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

      $this->db->insert('admis', $data);
   }

   public function getById($id) {
      $this->db->where('id',$id);
      $query = $this->db->get('admis');
      return $query->row_array();
   }

}

?>