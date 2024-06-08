<?php
    if (!defined('BASEPATH')) exit('No direct access allowed');

    class HistoriqueCommande extends CI_Model {

        public function historiqueCommandeMois ($mois, $annee,$id_resto)
        {
            $sql= 'select* from v_historique_commande_restaurant_avec_nom_client where MONTH(date)='.$mois.' and YEAR(date)='.$annee.' and id_resto='.$id_resto;
            $query= $this->db->query($sql);
            return $query->result_array();
        }

        public function historiqueCommandeJour ($date,$id_resto)
        {
            $sql= "select * from v_historique_commande_restaurant_avec_nom_client where DATE(date)='".$date."' and id_resto=".$id_resto;
            $query= $this->db->query($sql);
            return $query->result_array();
        }
        public function detailsCommandeHistorique ($id_commande)
        {
            $sql= "select * from v_historique_commande_restaurant_avec_nom_client where id_commande=".$id_commande;
            $query= $this->db->query($sql);
            return $query->result_array();
        }
        public function detailsCommmande ($idCommande)
        {
            $this->db->where('id_commande',$idCommande);
            $query = $this->db->get('v_details_commande_avec_nom_plat');
            return $query->result_array();
        }


    }

?>