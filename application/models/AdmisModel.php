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
            if(isset($data['id']))
               $this->setId($data['id']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
            if(isset($data['nom']))
               $this->setNom($data['nom']);
         } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
         }
         try {
            if(isset($data['prenom']))
               $this->setPrenom($data['prenom']);
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
      $query = $this->db->get('Admis');

      if ($query->num_rows() === 1) {
          $row = $query->row_array();
          return $row;
      } else {
          return null;
      }
  }

   public function save($datas) {
      $data = [
         'nom' => $datas["nom"],
         'prenom' => $datas["prenom"],
         'email' => $datas["email"],
         'mot_de_pass' => $datas["mot_de_pass"],
      ];

      $this->db->insert('Admis', $data);
   }

   public function getById($id) {
      $this->db->where('id',$id);
      $query = $this->db->get('Admis');
      return $query->row_array();
   }

   public function getAll() {
      $query = $this->db->get('Admis');
      return $query->result_array();
   }

   public function edit($id,$data) {
      $this->db->where('id',$id);
      return $this->db->update('Admis', $data);
   }

   public function delete($id) {
      $this->db->where('id',$id);
      return $this->db->delete('Admis');
   }

   public function search($criteria = []) {
      $this->db->select('Admis.id,Admis.nom,Admis.prenom,Admis.email,Admis.mot_de_pass');
      $this->db->from('Admis');
      if (!empty($criteria['id'])) {
            $this->db->like('Admis.id', $criteria['id']);
      }
      if (!empty($criteria['nom'])) {
            $this->db->like('Admis.nom', $criteria['nom']);
      }
      if (!empty($criteria['prenom'])) {
            $this->db->like('Admis.prenom', $criteria['prenom']);
      }
      if (!empty($criteria['email'])) {
            $this->db->like('Admis.email', $criteria['email']);
      }
      if (!empty($criteria['mot_de_pass'])) {
            $this->db->like('Admis.mot_de_pass', $criteria['mot_de_pass']);
      }
      $query = $this->db->get('Admis');
      return $query->result_array();
   }
}

?>