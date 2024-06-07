<?php 
    if (!defined('BASEPATH')) exit('No direct access allowed');

    class StatGeneralModel extends CI_Model {
  
        public function revenuParMois ($mois, annee){
            $this->db->where('month',$mois);
            $this->db->where('year',$annee);
            $query = $this->db->get('v_revenu_par_mois');
            return $query->result_array();
        }

        public function revenuParAn ($annee) {
            $this->db->where('year',$annee);
            $query = $this->db->get('v_revenu_par_an');
            return $query->result_array();
        }

    }
?>