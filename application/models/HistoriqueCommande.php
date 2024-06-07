<?php
    if (!defined('BASEPATH')) exit('No direct access allowed');

    class HistoriqueCommande extends CI_Model {

        public function historiqueCommandeMois ($mois, $annee)
        {
            $sql= 'select* from v_historique_commande_restaurant where MONTH(date)='.$mois.' and YEAR(date)='.$annee;
            $query= $this->db->query($sql);
            return $query->result_array();
        }

        public function historiqueCommandeJour ($date)
        {
            $sql= "select* from v_historique_commande_restaurant where DATE(date)='".$date."'";
            $query= $this->db->query($sql);
            return $query->result_array();
        }

        public function detailsCommmande ($idCommande)
        {
            $this->db->where('id_commande',$idCommande);
            $query = $this->db->get('v_details_commande');
            return $query->result_array();
        }


    }

?>