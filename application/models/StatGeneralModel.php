<?php 
    if (!defined('BASEPATH')) exit('No direct access allowed');

    class StatGeneralModel extends CI_Model {

        public function RevenuParMois ($idLivreur, $mois, $annee) {      
            $this->load->model('LivreurModel', 'ModeleLivreur');
            $this->load->model('StatRestoModel', 'ModelStatResto');

            $statResto= $this->ModelStatResto->getStatRestoJour($mois, $annee);
            $statLivreur= $this->ModeleLivreur->detailsLivreurMois($idLivreur, $mois, $annee);
            
            $statGeneral=[];

            foreach ($statLivreur as $date => $statJourLivreur) {
                foreach ($statResto as $statRestau)
                {
                    // Créer une clé de date à partir de "year", "month" et "day" du restaurant
                    $restaurantDate = $statRestau['year'] . '-' . $statRestau['month'] . '-' . $statRestau['day'];
                
                    // Vérifier si la date existe dans les statistiques du restaurant
                    if ($date === $restaurantDate) {

                        $revenu = $statRestau['revenu'];
                        $beneficeLivraison = $statJourLivreur['totalBenefice'];
                
                        $total= $revenu+$beneficeLivraison;
                        $statGeneral[$date]= $total;
                    }
                }
                
            }
            return $statGeneral;
        }

        public function RevenuParAn ($idLivreur, $annee) {
            $this->load->model('LivreurModel', 'ModeleLivreur');
            $this->load->model('StatRestoModel', 'ModelStatResto');

            $statResto= $this->ModelStatResto->getStatRestoMois($annee);
            $statLivreur= $this->ModeleLivreur->detailsLivreurAnnee($idLivreur, $annee);
            
            $statGeneral= [];

            foreach ($statLivreur as $mois => $detailsMoisLivreur) {
                foreach ($statResto as $statRestau) {
                    // Vérifier si le mois existe dans les statistiques du restaurant
                    if ($statRestau['month'] == $mois) {
                        $revenuResto = $statRestau['revenu'];
                        $totalBeneficeLivreur = $detailsMoisLivreur['totalBenefice'];
                
                        $total = $revenuResto + $totalBeneficeLivreur;
                        $statGeneral[$mois] = $total;
                    }
                }
            }
            return $statGeneral;
        }


    }
?>