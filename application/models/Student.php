<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends CI_Model{
    public function find_list_etudiant(){
        $query = $this->db->query('SELECT * FROM Etudiant');
        $result = $query->result_array();
        return $result;
    }
    public function find_list_noteById($idStudent) {
        $query = $this->db->query("SELECT m.UE, m.intituler, m.credit, s.semestre, m.idMatiere, n.note, n.resultat
                                    FROM Matiere m
                                    JOIN Semestre s ON m.idSemestre = s.idSemestre
                                    JOIN Note n ON m.idMatiere = n.idMatiere
                                    WHERE n.idEtudiant=$idStudent");
        $result = $query->result_array();
        return $result;
    }
    public function find_list_noteBySemestre($idStudent, $idSemestre) {
        $query = $this->db->query("SELECT m.UE, m.intituler, m.credit, m.idSemestre, s.semestre, m.idMatiere, n.note, n.resultat
                                    FROM Matiere m
                                    JOIN Semestre s ON m.idSemestre = s.idSemestre
                                    JOIN Note n ON m.idMatiere = n.idMatiere
                                    WHERE n.idEtudiant = $idStudent AND m.idSemestre = $idSemestre");
        $result = $query->result_array();
        return $result;
    }
    

    public function getStudentById($idStudent) {
        $query = $this->db->query("SELECT * FROM Etudiant WHERE idEtudiant =$idStudent");
        $row = $query->row_array();
        return $row;
    }
    
}
?>