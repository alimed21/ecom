<?php


class TableauBord extends CI_Controller
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

    public function index(){
        /** Compter le stock */
        $idFour = $this->session->userdata('id_four');
        $promo = "oui";
        $stock = $this->Produit_model->countAllProduitByFournisseur($idFour);
        $data['stock'] = $stock;

        /** 5 dernières produits ajouter */
        $lastProduits = $this->Produit_model->getLast5Produit($idFour);
        $data['lastProduits'] = $lastProduits;

        /** Compteur montant total en terme de prix */
        $totalPrix = $this->Produit_model->countAllPrixByProduitByFournisseur($idFour);
        $data['totalPrix'] = $totalPrix;

        /** Compteur montant total en terme de quantiter */
        $totalQuantite = $this->Produit_model->countAllQuantiteByProduitByFournisseur($idFour);
        $data['totalQuantite'] = $totalQuantite;

        /** Compteur montant total en terme de produit */
        $totalProduit = $this->Produit_model->countAllProduitByProduitByFournisseur($idFour);
        $data['totalProduit'] = $totalProduit;

        /** Compteur montant total promo en terme de prix */
        $totalPrixPromo = $this->Produit_model->countAllPrixPromo($idFour, $promo);
        $data['totalPrixPromo'] = $totalPrixPromo;

        /** Compteur montant total promo en terme de quantiter */
        $totalQuantitePromo = $this->Produit_model->countAllQuantitePromo($idFour, $promo);
        $data['totalQuantitePromo'] = $totalQuantitePromo;

        /** Compteur montant total promo en terme de produit */
        $totalProduitPromo = $this->Produit_model->countAllProduitPromo($idFour, $promo);
        $data['totalProduitPromo'] = $totalProduitPromo;

        /** Count commande */
        $countCommandes = $this->Commande_model->countCommande($idFour);
        $data['countCommandes'] = $countCommandes;

        /** Compteur client par fournisseur */
        $countClient = $this->Produit_model->countAllClientByFour($idFour);
        $data['countClient'] = $countClient;


        $this->load->view('user/templates/header_view', $data);
        $this->load->view('user/pages/dashbord', $data);
        $this->load->view('user/templates/footer_view');
    }

    public function satistique(){
        $idFour = $this->session->userdata('id_four');
        $homme = 'H';
        $femme = 'F';
        $Homme = 1;
        $Femme = 2;
        $Enfant = 3;
        $Autre = 4;
        /** Count commande */
        $countCommandes = $this->Commande_model->countCommande($idFour);
        $data['countCommandes'] = $countCommandes;

        /** Commande par genre */
        $commandeGenreH = $this->Commande_model->countCommandeGenreHomme($homme, $idFour);
        $data['commandeGenreH'] = $commandeGenreH;

        $commandeGenreF = $this->Commande_model->countCommandeGenreFemme($femme, $idFour);
        $data['commandeGenreF'] = $commandeGenreF;

        /** Type de stock */
        $stockHomme = $this->Produit_model->countStockHomme($idFour, $Homme);
        $data['stockHomme'] = $stockHomme;

        $stockFemme = $this->Produit_model->countStockFemme($idFour, $Femme);
        $data['stockFemme'] = $stockFemme;

        $stockEnfant = $this->Produit_model->countStockEnfant($idFour, $Enfant);
        $data['stockEnfant'] = $stockEnfant;

        $stockAutre = $this->Produit_model->countStockAutre($idFour, $Autre);
        $data['stockAutre'] = $stockAutre;

        $this->load->view('user/templates/header_view', $data);
        $this->load->view('user/pages/statistique', $data);
        $this->load->view('user/templates/footer_view');
    }
}