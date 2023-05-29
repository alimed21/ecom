<?php

class Erreur extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Admin/Produit_model");
        $this->load->model("Admin/Login_model");
        $this->load->model('Admin/Categories_model');
        $this->load->model('Admin/Commande_model');
        $this->load->library('form_validation');
        $this->load->helper('string');
        if(!$this->session->userdata('id_user'))
        {
            redirect('Admin/Login');
        }
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
        $titreAffiche = 'Erreur 404';
        $data['titreAffiche'] = $titreAffiche;

        /** Count commande */
        $boutique = $this->session->userdata('id_boutique');
        $countCommandes = $this->Commande_model->countCommande($boutique);
        $data['countCommandes'] = $countCommandes;

        /** Données */
        $titreErreur = "Erreur, on n'a pas trouvé ce que vous cherchez.";
        $data['titreErreur'] = $titreErreur;

        $messageErreur = "Nous allons vous envoyer un mail prochainement, merci d'avoir utilisé notre solution.";
        $data['messageErreur'] = $messageErreur;


        $lienAccueil = "Produit/listeProduits";
        $data['lienAccueil'] = $lienAccueil;


        $this->load->view('utilisateur/templates/header_view', $data);
        $this->load->view('utilisateur/pages/erreur404_view', $data);
        $this->load->view('utilisateur/templates/footer_view');
    }
}