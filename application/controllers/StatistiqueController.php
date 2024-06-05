<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatistiqueController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('StatRestoModel'); 
        $this->load->model('ClientModel'); 
    }

    public function checkStatisiqueGeneral(){
        $mois = $this->input->post('mois');
        $anner = $this->input->post('anner');
        $data = null;
        
        if($mois != 0 && $anner != 0){
            $data = $this->StatRestoModel->getStatRestoJour($mois, $anner);
        } else {
            $data = $this->StatRestoModel->getStatRestoMois($anner);
        }
        if($data==null){
            $data[] = array("day"=>'0',"month"=>'0',"year"=>'0',"revenue"=>'0');
        }
        
        echo json_encode($data);
    }
    
}