<?php
defined('BASEPATH') OR exit('No direct access allowed');

final class MiseEnAvantModel extends CI_Model {

    private $id;
    private $id_resto;
    private $id_prix;
    private $prix;
    private $date;
    private $duree;
    private $errors;

    public function __construct($data = []) {
        parent::__construct();
        $this->errors = [];

        if (!empty($data)) {
            try {
                if (isset($data['id'])) {
                    $this->set_id($data['id']);
                }
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }
            try {
                if (isset($data['id_resto'])) {
                    $this->set_id_resto($data['id_resto']);
                }
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }
            try {
                if (isset($data['id_prix'])) {
                    $this->set_id_prix($data['id_prix']);
                }
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }
            try {
                if (isset($data['prix'])) {
                    $this->set_prix($data['prix']);
                }
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }
            try {
                if (isset($data['date'])) {
                    $this->set_date($data['date']);
                }
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }
            try {
                if (isset($data['duree'])) {
                    $this->set_duree($data['duree']);
                }
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }
        }
    }

    public function get_id() {
        return $this->id;
    }

    public function get_id_resto() {
        return $this->id_resto;
    }

    public function get_id_prix() {
        return $this->id_prix;
    }

    public function get_prix() {
        return $this->prix;
    }

    public function get_date() {
        return $this->date;
    }

    public function get_duree() {
        return $this->duree;
    }

    public function set_id($id) {
        if (!is_int($id)) {
            throw new Exception('ID must be an integer');
        }
        $this->id = $id;
    }

    public function set_id_resto($id_resto) {
        if (!is_int($id_resto)) {
            throw new Exception('ID Resto must be an integer');
        }
        $this->id_resto = $id_resto;
    }

    public function set_id_prix($id_prix) {
        if (!is_int($id_prix)) {
            throw new Exception('ID Prix must be an integer');
        }
        $this->id_prix = $id_prix;
    }

    public function set_prix($prix) {
        if (!is_numeric($prix)) {
            throw new Exception('Prix must be a numeric value');
        }
        $this->prix = $prix;
    }

    public function set_date($date) {
        if (!strtotime($date)) {
            throw new Exception('Date must be a valid datetime');
        }
        $this->date = $date;
    }

    public function set_duree($duree) {
        if (!is_int($duree)) {
            throw new Exception('Duree must be an integer');
        }
        $this->duree = $duree;
    }

    public function getPrixInPrix($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('Prix');
        return $query->row_array();
    }

    public function save() {
        $prix_in_prix = $this->getPrixInPrix($this->id_prix);
        if ($prix_in_prix) {
            $final_prix = $prix_in_prix['prix'] * $this->duree;
            $data = array(
                'id_resto' => $this->id_resto,
                'id_prix' => $this->id_prix,
                'prix' => $final_prix,
                'date' => $this->date,
                'duree' => $this->duree
            );
            return $this->db->insert('Mise_en_avant', $data);
        } else {
            throw new Exception('Prix in prix not found');
        }
    }

    public function getValidRestoMiseEnAvantByDate($date) {
        $this->load->database();
        $this->db->where('date_expiration >=', $date);
        $query = $this->db->get('v_mise_en_avant_with_expiration');
        return $query->result_array();
    }
    
}
?>