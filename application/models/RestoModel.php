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

   public function save($data) {
      $data_resto = [
         'email' => $data['email'],
         'mot_de_pass' => $data['mot_de_pass'],
      ];
      
      $this->db->insert('Resto', $data_resto);
      $id_dernier_insertion = $this->RestoModel->getLastRestoId();

      $data_resto_info = [
         'id_resto' => $id_dernier_insertion,
         'nom' => $data['nom'],
         'adresse' => $data['adresse'],
         'description' => $data['description'],
         'heure_ouverture' => $data['heure_ouverture'],
         'heure_fermeture' => $data['heure_fermeture'],
      ];
      $this->db->insert('Info_resto', $data_resto_info);
   }

   public function getAll() {
      $query = $this->db->get('Resto');
      return $query->result_array();
   }
   public function getAllWithInfo() {
      $this->db->select('resto.id, resto.email, info_resto.nom, info_resto.adresse as id_adresse,adresse.nom as adresse, info_resto.description, info_resto.heure_ouverture, info_resto.heure_fermeture');
      $this->db->from('Resto resto');
      $this->db->join('Info_resto info_resto', 'resto.id = info_resto.id_resto');
      $this->db->join('Adresse adresse', 'info_resto.adresse = adresse.id');
      $query = $this->db->get();
      return $query->result_array();
  }
  

  public function edit($nom_table,$condition,$id,$data) {
   $this->db->where($condition,$id);
   return $this->db->update($nom_table, $data);
}

   public function delete($id) {
      $this->db->where('id',$id);
      return $this->db->delete('Resto');
   }

   public function getById($id) {
      $this->db->select('resto.id, resto.email, info_resto.nom, info_resto.adresse,info_resto.description,info_resto.heure_ouverture,info_resto.heure_fermeture');
      $this->db->from('Resto resto');
      $this->db->join('Info_resto info_resto', 'resto.id = info_resto.id_resto');
      $this->db->where('resto.id',$id);
      $query = $this->db->get();
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


   public function getLastRestoId() {
      $this->db->select('id');
      $this->db->order_by('id', 'DESC');
      $query = $this->db->get('Resto', 1);
      $result = $query->row_array();
      return $result ? $result['id'] : null;
   }
   public function getStatForRestoMois($annee) {
      $this->db->where('year',$annee);
      $query = $this->db->get('v_revenu_depense_chiffre_mois_for_resto');
      return $query->result_array();
   }
   public function getStatForRestoJour($mois,$annee) {
      $this->db->where('month',$mois);
      $this->db->where('year',$annee);
      $query = $this->db->get('v_revenu_depense_chiffre_jour_for_resto');
      return $query->result_array();
   }

   public function checkLogin($email,$mot_de_pass) {
      $this->db->where('email', $email);
      $this->db->where('mot_de_pass', $mot_de_pass);
      $query = $this->db->get('Resto');

      if ($query->num_rows() === 1) {
          $row = $query->row_array();
          return $row;
      } else {
          return null;
      }
  }

}

?>