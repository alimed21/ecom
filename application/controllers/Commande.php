<?php

class Commande extends CI_Controller
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
            redirect('Clients');
        }
    }

    function getDatetimeNow()
    {
        $tz_object = new DateTimeZone('Africa/Djibouti');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y-m-d H:i:s');
    }

    public function verificationCommande(){
        $this->form_validation->set_rules('quantite', "quantite", 'trim|required');
        $token_prod = $this->input->post('token');

        if ($this->form_validation->run() == true) {
            //TRUE
            $quantite = $this->input->post('quantite');

            //Vérification de la quantité si elle n'est pas inférieur à 1
            if($quantite>0){
                //Récupération de l'id du produit et sa quantité
                $infoProduit = $this->Produit_model->getProduit($token_prod);
                foreach ($infoProduit as $info){
                    $idprod = $info->id_prod;
                    $quantiteStock = $info->quantite;
                    $prixPromo = $info->prix_promo;
                    $prixNormal = $info->prix;
                    $produitProno= $info->promo;
                }
                //Verification si la qunatite choisie n'est pas supérieur à la quantité du stock
                if($quantiteStock >= $quantite) {
                    //Tant que la quantite choisie n'est pas supérieur à la quantité du stock
                    //Si le produit n'est pas en promotion
                    if($produitProno == "non"){
                        $prixProduit = $prixNormal;
                    }
                    else{
                        $prixProduit = $prixPromo;
                    }
                    $infoFournisseur = $this->Produit_model->getFournisseur($token_prod);
                    $idProd =$idprod;
                    $idFour = $infoFournisseur->id_fournisseur;
                    $idClient = $this->session->userdata('id_client');
                    $codeCmd =  random_string('alnum', 10);
                    $totalPrix = $prixProduit * $quantite;
                    $date_add = $this->getDatetimeNow();

                    //Insertion de la commande
                    $data = array(
                        'id_client' => $idClient,
                        'code_cmd' => $codeCmd,
                        'id_prod' => $idProd,
                        'id_four' => $idFour,
                        'quantite' => $quantite,
                        'prix_unitaire' => $prixProduit,
                        'totalPrix' => $totalPrix,
                        'date_cmd' => $date_add
                    );
                    $insertCmd = $this->Commande_model->insertCmd($data);
                    if($insertCmd = TRUE){
                        $this->modifierQuantite($quantite, $token_prod);
                    }
                    else{
                        $this->session->set_flashdata('error', 'Veuillez contactez le fournisseur.');
                        redirect('Produit/detail/'.$token_prod);
                    }
                }
                else {
                    $this->session->set_flashdata('error', 'Veuillez ne pas dépasser la quantité du stock.');
                    redirect('Produit/detail/'.$token_prod);
                }
            }
            else{
                //Si la quantité est supérieur à la quantité du stock
                $this->session->set_flashdata('error', 'Veuillez saisir une quantité valable.');
                redirect('Produit/detail/'.$token_prod);
            }
        }
        else{
            //FALSE
            $this->index();
        }
    }

   /** public function modifierQuantite($quantite, $token_prod){
        /** Récupère la quantité par défaut
        $quantitStock = $this->Produit_model->getProduitStock($token_prod);
        foreach ($quantitStock as $quant){
            $quantitS = $quant->quantite;
            $promo = $quant->promo;
        }
        $newQuantite = $quantitS - $quantite;

        $data = array(
            'quantite' => $newQuantite
        );
        $modifierQuantite = $this->Produit_model->updateQuantiteProduit($data, $token_prod);
        if ($modifierQuantite == TRUE){
            if($promo == "non"){
                $this->session->set_flashdata('success', 'Valider votre commande chère client');
                redirect('Produit/Detail/'.$token_prod);
            }
            else{
                $this->session->set_flashdata('success', 'Valider votre commande chère client');
                redirect('Produit/PromoDetail/'.$token_prod);
            }
        }
        else{
            if($promo == "non"){
                $this->session->set_flashdata('error', 'Veuillez réessayer votre commande.');
                redirect('Produit/Detail/'.$token_prod);
            }
            else{
                $this->session->set_flashdata('error', 'Veuillez réessayer votre commande.');
                redirect('Produit/PromoDetail/'.$token_prod);
            }
        }
    }**/
}