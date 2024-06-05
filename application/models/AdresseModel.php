<?php

if (!defined('BASEPATH')) exit('No direct access allowed');

class  AdresseModel extends CI_Model {
    protected $id;
    protected $nom;
    protected $errors = [];


    public function findAdresses($string){
        $resultat = array();
            $query = $this->db->query("select * from Adresse where nom like '%$string%'");
            if ($query) {
                foreach($query->result_array() as $row){
                    $resultat[] = array("id"=> $row['id'],"nom"=>$row['nom']);
                }
            } else {
                // Handle database error here
                log_message('error', 'Database error: ' . $this->db->error());
                return false;
            }
            return $resultat;
       }
    
     public function hasErrors() {
        return !empty(array_filter($this->errors));
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function save() {
        $data = ['nom' => $this->nom];
        $this->db->insert('Adresse', $data);
    }

    public function getById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('Adresse');
        return $query->row_array();
    }

    public function getAll() {
        $query = $this->db->get('Adresse');
        return $query->result_array();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('Adresse', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('Adresse');
    }

}

?>