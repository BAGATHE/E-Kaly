<?php
if (!defined('BASEPATH')) exit('No direct access allowed');

class  StatRestoModel extends CI_Model {

    public function getStatRestoMois($annee) {
        $this->db->where('year',$annee);
        $query = $this->db->get('v_revenu_par_jour_resto_mois');
        return $query->result_array();
    }
    public function getStatRestoJour($mois,$annee) {
        $this->db->where('month',$mois);
        $this->db->where('year',$annee);
        $query = $this->db->get('v_revenu_par_jour_resto_jour');
        return $query->result_array();
    }
}
?>

