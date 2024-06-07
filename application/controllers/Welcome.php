<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('AdmisModel');
    }

	public function index()
	{
    $data['contents'] = "restoPage/Accueil";
    $this->load->view('templates_resto/template', $data);
    //$this->load->view('login');
}
}
?>
