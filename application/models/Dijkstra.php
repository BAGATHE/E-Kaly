<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dijkstra extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Chargement des modèles nécessaires
        $this->load->model('AdresseModel');
        $this->load->model('LienAdresseModel');
    }

    /**
     * Trouve le chemin le plus court entre deux adresses en utilisant l'algorithme de Dijkstra.
     *
     * @param int $id_depart Identifiant de l'adresse de départ.
     * @param int $id_arrivee Identifiant de l'adresse d'arrivée.
     * @return array Tableau contenant la distance totale et le chemin le plus court.
     */
    public function trouverCheminPlusCourt($id_depart, $id_arrivee) {
        $adresses = $this->AdresseModel->getAll();
        $distances = [];
        $precedents = [];
        $file_attente = new SplPriorityQueue();

        foreach ($adresses as $adresse) {
            $distances[$adresse['id']] = INF;
            $precedents[$adresse['id']] = null;
        }

        $distances[$id_depart] = 0;
        $file_attente->insert($id_depart, 0);

        while (!$file_attente->isEmpty()) {
            $id_courant = $file_attente->extract();

            if ($id_courant == $id_arrivee) {
                break;
            }

            $this->relaxerNoeud($id_courant, $distances, $precedents, $file_attente);
        }

        return $this->construireChemin($id_depart, $id_arrivee, $distances, $precedents);
    }

    /**
     * Réduit la distance à un noeud voisin si un chemin plus court est trouvé.
     *
     * @param int $id_courant Identifiant du noeud courant.
     * @param array $distances Tableau des distances aux noeuds.
     * @param array $precedents Tableau des précédents noeuds pour reconstruire le chemin.
     * @param SplPriorityQueue $file_attente File de priorité pour les noeuds à traiter.
     */
    private function relaxerNoeud($id_courant, &$distances, &$precedents, &$file_attente) {
        $liens = $this->LienAdresseModel->getByAddressId($id_courant);
        
        foreach ($liens as $lien) {
            $id_voisin = ($lien['id_adresse1'] == $id_courant) ? $lien['id_adresse2'] : $lien['id_adresse1'];
            $alt = $distances[$id_courant] + $lien['distance'];
            
            if ($alt < $distances[$id_voisin]) {
                $distances[$id_voisin] = $alt;
                $precedents[$id_voisin] = $id_courant;
                $file_attente->insert($id_voisin, $alt);
            }
        }
    }

    /**
     * Construit le chemin le plus court à partir des noeuds précédents.
     *
     * @param int $id_depart Identifiant de l'adresse de départ.
     * @param int $id_arrivee Identifiant de l'adresse d'arrivée.
     * @param array $distances Tableau des distances aux noeuds.
     * @param array $precedents Tableau des précédents noeuds pour reconstruire le chemin.
     * @return array Tableau contenant la distance totale et le chemin le plus court.
     */
    private function construireChemin($id_depart, $id_arrivee, &$distances, &$precedents) {
        $chemin = [];
        $id_courant = $id_arrivee;

        while ($precedents[$id_courant] !== null) {
            array_unshift($chemin, $id_courant);
            $id_courant = $precedents[$id_courant];
        }

        if ($distances[$id_arrivee] != INF) {
            array_unshift($chemin, $id_depart);
        }

        return ['distance' => $distances[$id_arrivee], 'chemin' => $chemin];
    }
}
?>