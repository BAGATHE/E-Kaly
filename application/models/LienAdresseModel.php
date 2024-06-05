<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LienAdresseModel extends CI_Model {
    protected $id;
    protected $id_adresse_1;
    protected $id_adresse_2;
    protected $distance;
    protected $errors = [];

    public function __construct($data = []) {
        parent::__construct();

        if (!empty($data)) {
            $this->errors = array_fill(0, 4, "");
            try {
                if (isset($data['id'])) $this->setId($data['id']);
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }
            try {
                if (isset($data['id_adresse_1'])) $this->setIdAdresse1($data['id_adresse_1']);
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }
            try {
                if (isset($data['id_adresse_2'])) $this->setIdAdresse2($data['id_adresse_2']);
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }
            try {
                if (isset($data['distance'])) $this->setDistance($data['distance']);
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }
        }
    }

    public function hasErrors() {
        return !empty(array_filter($this->errors));
    }

    public function getId() {
        return $this->id;
    }

    public function getIdAdresse1() {
        return $this->id_adresse_1;
    }

    public function getIdAdresse2() {
        return $this->id_adresse_2;
    }

    public function getDistance() {
        return $this->distance;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdAdresse1($id_adresse_1) {
        $this->id_adresse_1 = $id_adresse_1;
    }

    public function setIdAdresse2($id_adresse_2) {
        $this->id_adresse_2 = $id_adresse_2;
    }

    public function setDistance($distance) {
        $this->distance = $distance;
    }

    public function save() {
        $data = [
            'id_adresse_1' => $this->id_adresse_1,
            'id_adresse_2' => $this->id_adresse_2,
            'distance' => $this->distance,
        ];
        $this->db->insert('LienAdresse', $data);
    }

    public function getById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('LienAdresse');
        return $query->row_array();
    }

    public function getAll() {
        $query = $this->db->get('LienAdresse');
        return $query->result_array();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('LienAdresse', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('LienAdresse');
    }
    public function getByAddressId($id_adresse) {
        $this->db->where('id_adresse_1', $id_adresse);
        $this->db->or_where('id_adresse_2', $id_adresse);
        $query = $this->db->get('Lien_adresse');
        return $query->result_array();
    }
}
?>
