<?php


class TableauBord extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Admin/Produit_model");
        $this->load->model("Admin/Dashbord_model");
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
        /** Titre **/
        $titreAffiche = 'Tableau de bord';
        $data['titreAffiche'] = $titreAffiche;

        $idBoutique = $this->session->userdata('id_boutique');

        /** Total vendu **/
        $totalVendu = $this->Dashbord_model->totalVendu($idBoutique);
        $data['totalVendu'] = $totalVendu;

        /** Total client **/
        $totalClient = $this->Dashbord_model->totalClient($idBoutique);
        $data['totalClient'] = $totalClient;

        /** Total produit **/
        $promo = 'non';
        $totalProduit = $this->Dashbord_model->totalProduit($idBoutique, $promo);
        $proNonPromo = $totalProduit->totalProduit;

        /** Total produit promo **/
        $promo = 'oui';
        $totalProduitPromo = $this->Dashbord_model->totalProduitPromo($idBoutique, $promo);
        $proPromo = $totalProduitPromo->totalProduitPromo;

        /** Total investi **/
        $produitTotal=$proNonPromo+$proPromo;
        $data['produitTotal'] = $produitTotal;

        /** Total des vends **/
        $totalVente = $this->Dashbord_model->totalVente($idBoutique);
        $data['totalVente'] = $totalVente;

        /** Total des produit en stock **/
        $totalStock = $this->Dashbord_model->totalStock($idBoutique);
        $data['totalStock'] = $totalStock;

        /** Total des produits vendu **/
        $totalStockVendu = $this->Dashbord_model->totalStockVendu($idBoutique);
        $data['totalStockVendu'] = $totalStockVendu;

        /** Total des commande par mois **/
        $cmdMois = $this->Dashbord_model->commandeParMois($idBoutique);
        $data['cmdMois'] = $cmdMois;

        /** Total des commande **/
        $cmdTotal = $this->Dashbord_model->commandesTotal($idBoutique);
        $data['cmdTotal'] = $cmdTotal;

        /** Les commandes en attend */
        $listeCommande = $this->Dashbord_model->listeCommande($idBoutique);
        $data['listeCommande'] = $listeCommande;

        /**Historique de l'utilisateur **/
        $id_user = $this->session->userdata('id_user');
        $historyUser = $this->Login_model->historyUser2($id_user);
        $data['historyUser'] = $historyUser;

        /** Commande par genre */
        $homme = "Homme";
        $femme = "Femme";
        $commandeGenreH = $this->Commande_model->countCommandeGenreHomme($homme, $idBoutique);
        $data['commandeGenreH'] = $commandeGenreH;

        $commandeGenreF = $this->Commande_model->countCommandeGenreFemme($femme, $idBoutique);
        $data['commandeGenreF'] = $commandeGenreF;

        //Commande par mois
        $commandeMois = $this->Commande_model->countCommandeParMois($idBoutique);
        $data['commandeMois'] = $commandeMois;

        /** Count commande */
        $boutique = $this->session->userdata('id_boutique');
        $countCommandes = $this->Commande_model->countCommande($boutique);
        $data['countCommandes'] = $countCommandes;


        $this->load->view('utilisateur/templates/header_view', $data);
        $this->load->view('utilisateur/pages/dashbord_view', $data);
        $this->load->view('utilisateur/templates/footer_view');
    }

}