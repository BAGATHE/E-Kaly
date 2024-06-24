<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmisController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AdmisModel');
        $this->load->model('ClientModel');
        $this->load->model('LivreurModel');
        $this->load->model('RestoModel');
        $this->load->model('AdresseModel');
        $this->load->library('upload');
    }

    
    public function index() {
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data['current_administrator'] = $current_administrator; 
        $data['administrators'] = $this->AdmisModel->getAll();
        $data['clients'] = $this->ClientModel->getAll();
        $data["nb_client"] = $this->AdmisModel->getCountClient();
        $data["nb_resto"] = $this->AdmisModel->getCountResto();
        $data["revenu_generer"] = $this->AdmisModel->getRevenu_details(); 
        $data['contents'] = "adminPage/index";
        $this->load->view('templates/template', $data);
    }


    /**recupere donné administrator*/
    public function loadForm($id_admin){
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data['current_administrator'] = $current_administrator; 
        $data['administrator'] = $this->AdmisModel->getById($id_admin);
        $data['contents'] = "adminPage/ModifAdmin";
        $this->load->view('templates/template', $data);
    }

    /**insertion dans la base */
    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mot_de_pass', 'Mot de passe', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['contents'] = "adminPage/Ajout";
            $this->load->view('templates/template', $data);
        } else {
            $data = [
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'email' => $this->input->post('email'),
                'mot_de_pass' => $this->input->post('mot_de_pass')
            ];
            echo "mety";
            $this->AdmisModel->save($data);
            redirect('AdmisController');
        }
    }

    /*insertion livreur dans la base**/
    public function createLivreur() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mot_de_pass', 'Mot de passe', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('AdmisController/insertionPage');
        } else {
            $data = [
                'email' => $this->input->post('email'),
                'mot_de_pass' => $this->input->post('mot_de_pass'),
                'nom_complet' => $this->input->post('nom_complet'),
                'adresse' => $this->input->post('adresse')
            ];
            $this->LivreurModel->save($data);
            redirect('AdmisController/insertionPage');
        }
    }

    /**Fontion insertion de resto dans la base */
    public function createResto() {
                //$config['upload_path'] = './assets/images/';
                $config = array(
                'file_name'=>time(),
                 'upload_path'=>FCPATH . 'assets/images/',
                 'allowed_types'=>'jpg|jpeg|png|gif',
                 'max_size'=>5000,
                 'encrypt_name'=>TRUE
                );
                $this->upload->initialize($config);
                
              
                if($this->upload->do_upload('image')){
                    $data_resto = $this->upload->data();
                    $image_path = $data_resto['file_name'];
                    
                    $data = [
                        'email' => $this->input->post('email'),
                        'mot_de_pass' => $this->input->post('mot_de_pass'),
                        'nom' => $this->input->post('nom'),
                        'adresse' => $this->input->post('adresse'),
                        'description' =>$this->input->post('description'),
                        'heure_ouverture'=>$this->input->post('heure_ouverture'),
                        'heure_fermeture'=>$this->input->post('heure_fermeture'),
                        'image' => $image_path
                    ];
                    $this->RestoModel->save($data);
                    redirect('AdmisController/insertionPage');
                }else{
                    // Si le téléchargement échoue
                   $error = array('error' => $this->upload->display_errors());
                   echo $error['error'];
                }
                
        }

      /***redirection vers une page ajout cote administrateur */
      public function insertionPageAdmin(){
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data["adresses"] = $this->AdresseModel->getAll();
        $data['current_administrator'] = $current_administrator; 
        $data['contents'] = "adminPage/AjoutAdmin";
        $this->load->view('templates/template', $data);
    }
    /*redirection vers page ajout resto*/
    public function insertionPageResto(){
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data["adresses"] = $this->AdresseModel->getAll();
        $data['current_administrator'] = $current_administrator; 
        $data['contents'] = "adminPage/AjoutResto";
        $this->load->view('templates/template', $data);
    }

     /*redirection vers page ajout Livreur*/
     public function insertionPageLivreur(){
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data["adresses"] = $this->AdresseModel->getAll();
        $data['current_administrator'] = $current_administrator; 
        $data['contents'] = "adminPage/AjoutLivreur";
        $this->load->view('templates/template', $data);
    }
    /*modifier les renesignement de l'admin**/
    public function edit() {
        $id = $this->input->post('id');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mot_de_pass', 'Mot de passe', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('AdmisController');
        } else {
            $update_data = [
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'email' => $this->input->post('email'),
                'mot_de_pass' => $this->input->post('mot_de_pass')
            ];
            $this->AdmisModel->edit($id,$update_data);
            redirect('AdmisController');
        }
    }

    /*suppresion*/
    public function delete($id) {
        $this->AdmisModel->delete($id);
        redirect('AdmisController');
    }
    public function deleteClient($id) {
        $this->ClientModel->delete($id);
        redirect('AdmisController');
    }


    /*** recherche multi critère  */
    public function search() {
        $criteria = [
            'id' => $this->input->post('id'),
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'email' => $this->input->post('email'),
            'mot_de_pass' => $this->input->post('mot_de_pass')
        ];
        $data['admis'] = $this->AdmisModel->search($criteria);
        $this->load->view('admis/index', $data);
    }


/**login */
    public function login() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mot_de_pass', 'Mot de passe', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $mot_de_pass = $this->input->post('mot_de_pass');
            $user = $this->AdmisModel->checkLogin($email, $mot_de_pass);
            if ($user !== null) {
                $this->session->set_userdata('admin_session', $user);
                redirect('AdmisController');
            } else {
                $data['error'] = "Invalid email or password";
                $this->load->view('login', $data);
            }
        }
    }
/*login out**/
public function adminLogout() {
    $this->session->unset_userdata('admin_session');
    $this->session->sess_destroy();
    $this->load->view('login');
}
/*liste restaurant avec mise en avant */
public function miseEnAvant(){
     $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data = array();      
        $data['current_administrator'] = $current_administrator;
        $data["list_resto"] =$this->RestoModel->getAllMiseEnAvant(); 
        $data['contents'] = "adminPage/MiseEnAvant";
        $this->load->view('templates/template',$data);
}




    /**page de revenue*/
    public function revenue(){
        $data['contents'] = "adminPage/Revenu";
        $this->load->view('templates/template', $data);
        
    }
    /**page livreur payer */
    public function livreurPaye(){
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data = array();      
        $data['current_administrator'] = $current_administrator;

        $data['contents'] = "adminPage/LivreurPaye";
        $this->load->view('templates/template',$data);
    }
    /***recupation de la liste livreur payer dans le mois definis */
    public function RevenuParMoisLivreur(){
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $mois = $this->input->post("mois");
        $anner = $this->input->post("anner");
        $data = array();      
        $data["livreurs_payement"] = $this->AdmisModel->payement_livreur($mois,$anner);
        $data['current_administrator'] = $current_administrator; 
        $data['contents'] = "adminPage/LivreurPaye";
        $this->load->view('templates/template',$data);
    }

    public function listRestoLivreur(){
        $data = array();
        $current_administrator  = null;
        if ($this->session->userdata('admin_session')) {
            $current_administrator = $this->session->userdata('admin_session');
        }
        $data["restaurants"] = $this->RestoModel->getAllWithInfo();
        $data["livreurs"] = $this->LivreurModel->getAllWithInfo();
        $data['current_administrator'] = $current_administrator; 
        $data['contents'] = "adminPage/ListeRestoLivreur";
        $this->load->view('templates/template', $data);
    }

  


     /*statitique general commission gagner par la plateforme commission restaurant + livreur*/
     public function checkStatisiqueGeneral(){
        $mois = $this->input->post('mois');
        $anner = $this->input->post('anner');
        $data = null;
        
        if($mois != 0 && $anner != 0){
            $data=$this->AdmisModel->revenuParMoisPlateForm($mois,$anner);
        } else {
            $data=$this->AdmisModel->revenuParAnPlateForm($anner);
        }
        if($data==null){
            $data[] = array("day"=>'0',"month"=>'0',"year"=>'0',"revenue"=>'0');
        }
        
        echo json_encode($data);
    }
}
?>
