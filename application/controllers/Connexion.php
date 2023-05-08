<?php

class Connexion extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Clients_model');
        $this->load->model('Accueil_model');
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
        $titreAffiche = 'Connexion';
        $data['titreAffiche'] = $titreAffiche;

        $data['back'] = $_SERVER['HTTP_REFERER'];

        if(!$this->session->userdata('id_client')){
            $id_client = NULL;
        }
        else{
            $id_client = $this->session->userdata('id_client');
        }
        /** Count panier */
        $countPanier= $this->Accueil_model->countPanier($id_client);
        $data['countPanier'] = $countPanier;

        $this->load->view('template/header_view', $data);
        $this->load->view('page/connexion_view', $data);
        $this->load->view('template/footer_view');
    }

    public function verificationConnexion(){
        $this->form_validation->set_rules('username', "nom d'utilisateur", 'trim|required');
        $this->form_validation->set_rules('pass', 'mot de passe ', 'trim|required');

        $ref = $this->input->post('ref');

        if ($this->form_validation->run() == true)
        {
            //True
            $username = $this->input->post('username');
            $password = $this->input->post('pass');

            //model function
            if($loginUser = $this->Clients_model->loginClient($username, $password))
            {
                if($loginUser)
                {
                    $session_data = array(
                        'id_client' => $loginUser[0]->id_client,
                        'username' => $loginUser[0]->username
                    );
                }
                $this->session->set_userdata($session_data);
                $this->session->set_flashdata('success', 'Vous êtes connecté');
                redirect(''.$ref.'');
            }
            else
            {
                $this->session->set_flashdata('error', 'Nom d\'utilisateur ou mot de passe incorrect');
                redirect('Connexion');
            }
        }
        else{
            //False
            $this->index();
        }
    }

    public function deconnexion()
    {
        $action = "Déconnexion";
        $this->histoirque($action);
        $this->session->unset_userdata('id_client');
        session_destroy();
        redirect('Connexion', 'refresh');
    }
}