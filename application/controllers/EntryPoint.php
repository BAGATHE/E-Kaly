<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EntryPoint extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('AdmisModel');
    }

	public function index()
	{
    $this->load->view('login');
}
}
?>
