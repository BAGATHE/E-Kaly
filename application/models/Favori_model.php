<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favori_model extends CI_Model {

    public function isFavorite($id_resto, $id_client) {
        $query = $this->db->where('id_resto', $id_resto)
                          ->where('id_client', $id_client)
                          ->get('Favori_client');
        return $query->num_rows() > 0;
    }

    public function addFavorite($id_resto, $id_client) {
        $data = array(
            'id_resto' => $id_resto,
            'id_client' => $id_client
        );
        $this->db->insert('Favori_client', $data);
    }

    public function removeFavorite($id_resto, $id_client) {
        $this->db->where('id_resto', $id_resto)
                 ->where('id_client', $id_client)
                 ->delete('Favori_client');
    }
    
}
?>
