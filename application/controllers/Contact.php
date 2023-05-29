<?php

class Contact extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Accueil_model');
        $this->load->model('Boutiques_model');
        $this->load->model('Categorie_model');
        $this->load->library('form_validation');
        $this->load->helper('string');
    }

    function getDatetimeNow()
    {
        $tz_object = new DateTimeZone('Africa/Djibouti');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y-m-d');
    }

    public function index(){
        /** Id du client */
        if(!$this->session->userdata('id_client')){
            $id_client = NULL;
        }
        else{
            $id_client = $this->session->userdata('id_client');
        }

        $categories = $this->Categorie_model->getAllCategorie();
        $data['categories'] = $categories;

        /** Titre */
        $titreAffiche = 'Contact';
        $data['titreAffiche'] = $titreAffiche;

        $data['menuActive'] = "Contact";

        $this->load->view('template/header_view', $data);
        $this->load->view('page/contact_view', $data);
        $this->load->view('template/footer_view');
    }
}