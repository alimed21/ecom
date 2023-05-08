<?php

class Erreur extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function getDatetimeNow()
    {
        $tz_object = new DateTimeZone('Africa/Djibouti');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y-m-d');
    }
    public function erreur404_Boutique(){
        /** Titre */
        $titreAffiche = 'Erreur';
        $data['titreAffiche'] = $titreAffiche;

        /** Données */
        $titreErreur = "Les données de votre boutique est bien enregistré.";
        $data['titreErreur'] = $titreErreur;

        $messageErreur = "Nous allons vous envoyer un mail prochainement, merci d'avoir utilisé notre solution.";
        $data['messageErreur'] = $messageErreur;

        $lienAccueil = "Accueil";
        $data['lienAccueil'] = $lienAccueil;

        $this->load->view('erreur/noFound_view', $data);
    }

    public function erreur404_Produit(){
        /** Titre */
        $titreAffiche = 'Erreur';
        $data['titreAffiche'] = $titreAffiche;

        /** Données */
        $titreErreur = "Les données du produit n'ont pas été retrouvés.";
        $data['titreErreur'] = $titreErreur;

        $messageErreur = "Veuillez cliquer sur le bouton pour revenir à la page d'accueil, merci d'avoir utilisé notre solution.";
        $data['messageErreur'] = $messageErreur;

        $lienAccueil = "Accueil";
        $data['lienAccueil'] = $lienAccueil;

        $this->load->view('erreur/noFoundProduit_view', $data);
    }

    public function erreur404_Sous_Categorie(){
        /** Titre */
        $titreAffiche = 'Erreur';
        $data['titreAffiche'] = $titreAffiche;

        /** Données */
        $titreErreur = "Veuillez spécifier la sous-catégorie.";
        $data['titreErreur'] = $titreErreur;

        $messageErreur = "Veuillez cliquer sur le bouton pour revenir à la page d'accueil, merci d'avoir utilisé notre solution.";
        $data['messageErreur'] = $messageErreur;

        $lienAccueil = "Accueil";
        $data['lienAccueil'] = $lienAccueil;

        $this->load->view('erreur/noFoundProduit_view', $data);
    }

    public function erreur404_Categorie(){
        /** Titre */
        $titreAffiche = 'Erreur';
        $data['titreAffiche'] = $titreAffiche;

        /** Données */
        $titreErreur = "Veuillez spécifier la catégorie.";
        $data['titreErreur'] = $titreErreur;

        $messageErreur = "Veuillez cliquer sur le bouton pour revenir à la page d'accueil, merci d'avoir utilisé notre solution.";
        $data['messageErreur'] = $messageErreur;

        $lienAccueil = "Accueil";
        $data['lienAccueil'] = $lienAccueil;

        $this->load->view('erreur/noFoundProduit_view', $data);
    }

    public function erreur404_Categorie_nonFound(){
        /** Titre */
        $titreAffiche = 'Erreur';
        $data['titreAffiche'] = $titreAffiche;

        /** Données */
        $titreErreur = "La catégorie n'existe pas.";
        $data['titreErreur'] = $titreErreur;

        $messageErreur = "La ctégorie que vous cherchez n'existe pas veuillez vérifier, merci d'avoir utilisé notre solution.";
        $data['messageErreur'] = $messageErreur;

        $lienAccueil = "Accueil";
        $data['lienAccueil'] = $lienAccueil;

        $this->load->view('erreur/noFoundProduit_view', $data);
    }

    public function erreur404_SousCategorie_nonFound(){
        /** Titre */
        $titreAffiche = 'Erreur';
        $data['titreAffiche'] = $titreAffiche;

        /** Données */
        $titreErreur = "La sous-catégorie n'existe pas.";
        $data['titreErreur'] = $titreErreur;

        $messageErreur = "La sous-ctégorie que vous cherchez n'existe pas veuillez vérifier, merci d'avoir utilisé notre solution.";
        $data['messageErreur'] = $messageErreur;

        $lienAccueil = "Accueil";
        $data['lienAccueil'] = $lienAccueil;

        $this->load->view('erreur/noFoundProduit_view', $data);
    }

    public function boutiqueNonValid(){
        /** Titre */
        $titreAffiche = 'Boutique non valide';
        $data['titreAffiche'] = $titreAffiche;

        /** Données */
        $titreErreur = "Votre boutique est en cours de validation.";
        $data['titreErreur'] = $titreErreur;

        $messageErreur = "Nous allons vous envoyer un mail prochainement, merci d'avoir utilisé notre solution.";
        $data['messageErreur'] = $messageErreur;

        $lienAccueil = "Accueil";
        $data['lienAccueil'] = $lienAccueil;

        $this->load->view('erreur/boutiqueNonValid_view', $data);
    }
}