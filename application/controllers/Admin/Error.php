<?php
class Error extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Home_model');
        $this->load->model('Admin/Login_model');
        $this->load->model('Admin/Plainte_model');
        $this->load->library('form_validation');
    }

    public function notFound(){
        /** Titre */
        $titreAffiche = 'Erreur';
        $data['titreAffiche'] = $titreAffiche;


        $this->load->view('error/html/noFound_view', $data);
    }
}