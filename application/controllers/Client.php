<?php

class Client extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Accueil_model');
        $this->load->model('Produit_model');
        $this->load->model('Commande_model');
        $this->load->model('Clients_model');
        $this->load->library('form_validation');
        $this->load->helper('string');
        if(!$this->session->userdata('id_client'))
        {
            redirect('Connexion');
        }
    }

    function getDatetimeNow()
    {
        $tz_object = new DateTimeZone('Africa/Djibouti');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y-m-d H:i:s');
    }

    public function panier(){
        $id_client = $this->session->userdata('id_client');

        /** Count panier */
        $countPanier= $this->Accueil_model->countPanier($id_client);
        $data['countPanier'] = $countPanier;

        /** Les commandes du clients */
        $cmdClient = $this->Commande_model->getInfoPanier($id_client);
        $data['cmdClient'] = $cmdClient;

        /** Nom du client */
        $nomClient= $this->Clients_model->infoClient($id_client);
        $data['nomClient'] = $nomClient;

        /** Total prix*/
        $totalPrix = $this->Commande_model->totalPrixCommande($id_client);
        $data['totalPrix'] = $totalPrix;


        /** Titre */
        $titreAffiche = 'Votre panier';
        $data['titreAffiche'] = $titreAffiche;

        $this->load->view('template/header_view', $data);
        $this->load->view('page/panier_view', $data);
        $this->load->view('template/footer_view');
    }

    public function validerCommande(){
        $idClient = $this->session->userdata('id_client');
        $date_valid = $this->getDatetimeNow();

        $data = array(
            'valid_client_cmd' => $idClient,
            'date_valid_client' => $date_valid
        );

        $validCmd = $this->Commande_model->validCmd($data, $idClient);
        if ($validCmd = TRUE){
            $this->session->set_flashdata('success', 'Votre commande a bien été envoyée. Merci chère client le fournisseur va bientôt vous contactez.');
            redirect('Client/panier');
        }
        else{
            $this->session->set_flashdata('error', 'Une erreur s\'est produit veuillez contactez le fournisseur.');
            redirect('Client/panier');
        }
    }

    public function supprimerCmd($code_cmd, $quantite){
        //Recuper l'id du client
        $idClient = $this->session->userdata('id_client');
        //Récupèrer l'id du produit qu'on veut supprimer
        $idProduit = $this->Produit_model->getIdProduit($code_cmd);

        foreach ($idProduit as $quant){
            $id_prod = $quant->id_prod;
        }

        //Requete pour récuperer la quantite du stock avec l'id du produit
        $quantitStock = $this->Produit_model->getQuantiteStock($id_prod);

        //Nouvel variable qui va contenir la nouvelle quantite
        $nouvQuantite = $quantitStock->quantite + $quantite;

        $data = array(
            'quantite' => $nouvQuantite
        );


        $updateQuantite = $this->Produit_model->updateQuantiteStock($id_prod, $data);


        if ($updateQuantite = TRUE){
            $rejetCmd = $this->Commande_model->rejetCmd($idClient, $code_cmd);
            $this->session->set_flashdata('success', 'Votre commande a bien été supprimé de votre panier.');
            redirect('Commande/panier');
        }
        else{
            $this->session->set_flashdata('error', "Vous n'avez pas la permission de faire cette action.");
            redirect('Commande/panier');
        }
    }
}