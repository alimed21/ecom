<?php

class CommandeAdmin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Login_model');
        $this->load->model('Admin/Admin_model');
        $this->load->model('Admin/Roles_model');
        $this->load->model('Admin/Categories_model');
        $this->load->model('Admin/Utilisateurs_model');
        $this->load->library('form_validation');
        $this->load->helper('string');
        if(!$this->session->userdata('id_admin'))
        {
            redirect('Admin/LoginAdmin');
        }
        //if($this->session->userdata(''))
    }

    function getDatetimeNow()
    {
        $tz_object = new DateTimeZone('Africa/Djibouti');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y-m-d');
    }

    public function index(){
        /** Titre */
        $titreAffiche = 'Liste des commandes';
        $data['titreAffiche'] = $titreAffiche;

        $commandeListe = $this->Admin_model->getAllCommande();
        $data['commandeListe'] = $commandeListe;

        $countCommandeEnAttend =  $this->Admin_model->countCommandeEnAttend();
        $data['countCommandeEnAttend'] = $countCommandeEnAttend;

        /** Images restant **/
        $autresImages = $this->Admin_model->getAllImages();
        $data['autresImages'] = $autresImages;

        $this->load->view('administrateur/templates/header_view', $data);
        $this->load->view('administrateur/pages/listeCommande_view', $data);
        $this->load->view('administrateur/templates/footer_view');
    }
}