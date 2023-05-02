<?php

class Produit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Accueil_model');
        $this->load->model('Produit_model');
        $this->load->model('Commande_model');
        $this->load->model('Categorie_model');
        $this->load->model('Recherche_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->helper('string');
    }

    function getDatetimeNow()
    {
        $tz_object = new DateTimeZone('Africa/Djibouti');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y-m-d H:i:s');
    }

    public function tousLesProduits(){
        if(!$this->session->userdata('id_client')){
            $id_client = NULL;
        }
        else{
            $id_client = $this->session->userdata('id_client');
        }
        /** Count panier */
        $countPanier= $this->Accueil_model->countPanier($id_client);
        $data['countPanier'] = $countPanier;

        /** Categorie */
        $cateHomme = 'Hommes';
        $cateFemme = 'Femmes';
        $cateEnfant = 'Enfants';
        $cateAutre = 'Autres';

        /** Id sous-cat */
        $idH = $this->Categorie_model->getIdCatH($cateHomme);
        $data['idH'] = $idH;

        $idF = $this->Categorie_model->getIdCatH($cateFemme);
        $data['idF'] = $idF;

        $idE = $this->Categorie_model->getIdCatH($cateEnfant);
        $data['idE'] = $idE;

        $idA = $this->Categorie_model->getIdCatH($cateAutre);
        $data['idA'] = $idA;

        /** Get sous-category */
        $ssCatH = $this->Categorie_model->getSSCatByCat($idH);
        $data['ssCatH'] = $ssCatH;

        $ssCatF = $this->Categorie_model->getSSCatByCat($idF);
        $data['ssCatF'] = $ssCatF;

        $ssCatE = $this->Categorie_model->getSSCatByCat($idE);
        $data['ssCatE'] = $ssCatE;

        $ssCatA = $this->Categorie_model->getSSCatByCat($idA);
        $data['ssCatA'] = $ssCatA;


        $row =  $this->Produit_model->record_count();

        $config = array();

        $config["base_url"] = base_url() . "Produit/tousLesProduits";

        $config["total_rows"] = $row;

        $config["per_page"] = 12;

        $config["uri_segment"] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="page-item active">';
        $config['cur_tag_close'] = '</a>';

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        $allProduit = $this->Produit_model->getallProduit($config["per_page"], $page);
        $data['allProduit'] = $allProduit;

        $links = explode('&nbsp;',$str_links );
        $data['links'] = $links;

        /** Categorie */
        $categories = $this->Categorie_model->getAllCategorie();
        $data['categories'] = $categories;

        /** Meilleurs produit vendu */
        $meilleursProduits= $this->Accueil_model->getMeilleursProduit();
        $data['meilleursProduits'] = $meilleursProduits;

        /** Meilleurs produit vendu */
        $topBoutiques= $this->Accueil_model->getTopBoutiques();
        $data['topBoutiques'] = $topBoutiques;


        /** Titre */
        $titreAffiche = 'Tous les produits';
        $data['titreAffiche'] = $titreAffiche;

        $this->load->view('template/header_view', $data);
        $this->load->view('page/produits_view', $data);
        $this->load->view('template/footer_view');
    }

    public function tousLesProduitsPromotions(){
        if(!$this->session->userdata('id_client')){
            $id_client = NULL;
        }
        else{
            $id_client = $this->session->userdata('id_client');
        }
        /** Count panier */
        $countPanier= $this->Accueil_model->countPanier($id_client);
        $data['countPanier'] = $countPanier;

        /** Categorie */
        $cateHomme = 'Hommes';
        $cateFemme = 'Femmes';
        $cateEnfant = 'Enfants';
        $cateAutre = 'Autres';

        /** Id sous-cat */
        $idH = $this->Categorie_model->getIdCatH($cateHomme);
        $data['idH'] = $idH;

        $idF = $this->Categorie_model->getIdCatH($cateFemme);
        $data['idF'] = $idF;

        $idE = $this->Categorie_model->getIdCatH($cateEnfant);
        $data['idE'] = $idE;

        $idA = $this->Categorie_model->getIdCatH($cateAutre);
        $data['idA'] = $idA;

        /** Get sous-category */
        $ssCatH = $this->Categorie_model->getSSCatByCat($idH);
        $data['ssCatH'] = $ssCatH;

        $ssCatF = $this->Categorie_model->getSSCatByCat($idF);
        $data['ssCatF'] = $ssCatF;

        $ssCatE = $this->Categorie_model->getSSCatByCat($idE);
        $data['ssCatE'] = $ssCatE;

        $ssCatA = $this->Categorie_model->getSSCatByCat($idA);
        $data['ssCatA'] = $ssCatA;

        /** Produit en promotion $row */
        $promotion = "oui";


        $row =  $this->Produit_model->record_countPromotion($promotion);

        $config = array();

        $config["base_url"] = base_url() . "Produit/tousLesProduitsPromotions";

        $config["total_rows"] = $row;

        $config["per_page"] = 12;

        $config["uri_segment"] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="page-item active">';
        $config['cur_tag_close'] = '</a>';

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        $allProduitPromotion = $this->Produit_model->getallProduitPromotion($config["per_page"], $page, $promotion);
        $data['allProduitPromotion'] = $allProduitPromotion;

        $links = explode('&nbsp;',$str_links );
        $data['links'] = $links;

        /** Categorie */
        $categories = $this->Categorie_model->getAllCategorie();
        $data['categories'] = $categories;

        /** Meilleurs produit vendu */
        $meilleursProduits= $this->Accueil_model->getMeilleursProduit();
        $data['meilleursProduits'] = $meilleursProduits;

        /** Meilleurs produit vendu */
        $topBoutiques= $this->Accueil_model->getTopBoutiques();
        $data['topBoutiques'] = $topBoutiques;

        /** Titre */
        $titreAffiche = 'Tous les produits en promotions';
        $data['titreAffiche'] = $titreAffiche;

        $this->load->view('template/header_view', $data);
        $this->load->view('page/produitsPromotion_view', $data);
        $this->load->view('template/footer_view');
    }

    public function getsubcategory(){
        $data = $this->input->get();
        $catid = $data['cid'];
        $this->db->where(array('id_cate'=>$catid));
        $this->db->where("date_delete is null");
        $subcategory=$this->db->get('sscategorie')->result_array();
        $subSsCat = "subCat";
        foreach ($subcategory as $sub){
            echo "<option value=".$sub['titre_ss_cate'].">".$sub['titre_ss_cate']."</option>";
        }
    }

    public function detail($token = null){
        if($token == null){
            redirect("Erreur/erreur404_Produit");
        }
        else{
            /** Id du client */
            if(!$this->session->userdata('id_client')){
                $id_client = NULL;
            }
            else{
                $id_client = $this->session->userdata('id_client');
            }

            /** Categorie */
            $cateHomme = 'Hommes';
            $cateFemme = 'Femmes';
            $cateEnfant = 'Enfants';
            $cateAutre = 'Autres';

            /** Id sous-cat */
            $idH = $this->Categorie_model->getIdCatH($cateHomme);
            $data['idH'] = $idH;

            $idF = $this->Categorie_model->getIdCatH($cateFemme);
            $data['idF'] = $idF;

            $idE = $this->Categorie_model->getIdCatH($cateEnfant);
            $data['idE'] = $idE;

            $idA = $this->Categorie_model->getIdCatH($cateAutre);
            $data['idA'] = $idA;
            /** Get sous-category */
            $ssCatH = $this->Categorie_model->getSSCatByCat($idH);
            $data['ssCatH'] = $ssCatH;

            $ssCatF = $this->Categorie_model->getSSCatByCat($idF);
            $data['ssCatF'] = $ssCatF;

            $ssCatE = $this->Categorie_model->getSSCatByCat($idE);
            $data['ssCatE'] = $ssCatE;

            $ssCatA = $this->Categorie_model->getSSCatByCat($idA);
            $data['ssCatA'] = $ssCatA;


            /** Count panier */
            $countPanier= $this->Accueil_model->countPanier($id_client);
            $data['countPanier'] = $countPanier;

            /** Get id boutique */
            $idBoutique = $this->Produit_model->getIdBoutique($token);
            $data['idBoutique'] = $idBoutique;

            /** Get nom boutique */
            $nomBoutique = $this->Produit_model->getNomBoutique($idBoutique);
            $data['nomBoutique'] = $nomBoutique;

            /** Detail produit */
            $produitDetail = $this->Produit_model->getDetailProduit($token);
            $data['produitDetail'] = $produitDetail;

            if ($produitDetail == null){
                redirect("Erreur/erreur404_Produit");
            }

            /** Photos du même produit */
            $photosProduit = $this->Produit_model->getPhotos($token);
            $data['photosProduit'] = $photosProduit;

            /** Produit du même boutique */
            $plusProduit = $this->Produit_model->getProduitBoutique($idBoutique, $token);
            $data['plusProduit'] = $plusProduit;

            /** Nom du produit */
            $nomProduit = $this->Produit_model->getNomProduit($token);
            $data['nomProduit'] = $nomProduit;

            /** Meilleurs produit vendu */
            $meilleursProduits= $this->Accueil_model->getMeilleursProduit();
            $data['meilleursProduits'] = $meilleursProduits;

            /** Meilleurs produit vendu */
            $topBoutiques= $this->Accueil_model->getTopBoutiques();
            $data['topBoutiques'] = $topBoutiques;

            /** Titre */
            $titreAffiche = $nomProduit;
            $data['titreAffiche'] = $titreAffiche;

            $this->load->view('template/header_view', $data);
            $this->load->view('page/produitDetail_view', $data);
            $this->load->view('template/footer_view');
        }
    }

    public function commanderProduit(){
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
                    $idFour = $infoFournisseur->id_boutique;
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
            $this->detail($token_prod);
        }
    }

    public function modifierQuantite($quantite, $token_prod){
        /** Récupère la quantité par défaut**/
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
    }

    /** Produit par catégorie **/
    public function produitCategorie($namCat = null){
        if($namCat == null){
            redirect("Erreur/erreur404_Categorie");
        }
        else{
            $cate = $this->Categorie_model->getNameCategorie($namCat);

            if($cate == true){
                if(!$this->session->userdata('id_client')){
                    $id_client = NULL;
                }
                else{
                    $id_client = $this->session->userdata('id_client');
                }
                /** Count panier */
                $countPanier= $this->Accueil_model->countPanier($id_client);
                $data['countPanier'] = $countPanier;

                /** Categorie */
                $cateHomme = 'Hommes';
                $cateFemme = 'Femmes';
                $cateEnfant = 'Enfants';
                $cateAutre = 'Autres';

                /** Id sous-cat */
                $idH = $this->Categorie_model->getIdCatH($cateHomme);
                $data['idH'] = $idH;

                $idF = $this->Categorie_model->getIdCatH($cateFemme);
                $data['idF'] = $idF;

                $idE = $this->Categorie_model->getIdCatH($cateEnfant);
                $data['idE'] = $idE;

                $idA = $this->Categorie_model->getIdCatH($cateAutre);
                $data['idA'] = $idA;

                /** Get sous-category */
                $ssCatH = $this->Categorie_model->getSSCatByCat($idH);
                $data['ssCatH'] = $ssCatH;

                $ssCatF = $this->Categorie_model->getSSCatByCat($idF);
                $data['ssCatF'] = $ssCatF;

                $ssCatE = $this->Categorie_model->getSSCatByCat($idE);
                $data['ssCatE'] = $ssCatE;

                $ssCatA = $this->Categorie_model->getSSCatByCat($idA);
                $data['ssCatA'] = $ssCatA;

                /** Meilleurs produit vendu */
                $meilleursProduits= $this->Accueil_model->getMeilleursProduit();
                $data['meilleursProduits'] = $meilleursProduits;

                /** Meilleurs produit vendu */
                $topBoutiques= $this->Accueil_model->getTopBoutiques();
                $data['topBoutiques'] = $topBoutiques;

                $row =  $this->Produit_model->record_count_Cat($namCat);

                $config = array();

                $config["base_url"] = base_url() . "Produit/produitCategrie/".$namCat."/";

                $config["total_rows"] = $row;

                $config["per_page"] = 12;

                $config["uri_segment"] = 4;
                $config['cur_tag_open'] = '&nbsp;<a class="page-item active">';
                $config['cur_tag_close'] = '</a>';

                $config['first_link'] = 'First';
                $config['last_link'] = 'Last';
                $this->pagination->initialize($config);

                $page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0;

                $str_links = $this->pagination->create_links();
                $data["links"] = explode('&nbsp;',$str_links );

                $allProduitCategorie = $this->Produit_model->getallProduitByCaT($config["per_page"], $page, $namCat);
                $data['allProduitCategorie'] = $allProduitCategorie;

                $links = explode('&nbsp;',$str_links );
                $data['links'] = $links;

                /** Categorie */
                $categories = $this->Categorie_model->getAllCategorie();
                $data['categories'] = $categories;

                /** Titre */
                $titreAffiche = 'Tous les produits de la catégorie '.$namCat;
                $data['titreAffiche'] = $titreAffiche;

                /** Categorie */
                $nomCategorie = $namCat;
                $data['nomCategorie'] = $nomCategorie;

                $this->load->view('template/header_view', $data);
                $this->load->view('page/produitsCategorie_view', $data);
                $this->load->view('template/footer_view');
            }else{
                redirect("Erreur/erreur404_Categorie_nonFound");
            }
        }
    }

    /** Produit SousCategorie */
    public function SousCategorie($namSsCat = null){
        if($namSsCat == null){
            redirect("Erreur/erreur404_Sous_Categorie");
        }
        else{
            $sscate = $this->Categorie_model->getNameSsCategorie($namSsCat);

            if($sscate == true){
                if(!$this->session->userdata('id_client')){
                    $id_client = NULL;
                }
                else{
                    $id_client = $this->session->userdata('id_client');
                }
                /** Count panier */
                $countPanier= $this->Accueil_model->countPanier($id_client);
                $data['countPanier'] = $countPanier;

                /** Categorie */
                $cateHomme = 'Hommes';
                $cateFemme = 'Femmes';
                $cateEnfant = 'Enfants';
                $cateAutre = 'Autres';

                /** Id sous-cat */
                $idH = $this->Categorie_model->getIdCatH($cateHomme);
                $data['idH'] = $idH;

                $idF = $this->Categorie_model->getIdCatH($cateFemme);
                $data['idF'] = $idF;

                $idE = $this->Categorie_model->getIdCatH($cateEnfant);
                $data['idE'] = $idE;

                $idA = $this->Categorie_model->getIdCatH($cateAutre);
                $data['idA'] = $idA;

                /** Get sous-category */
                $ssCatH = $this->Categorie_model->getSSCatByCat($idH);
                $data['ssCatH'] = $ssCatH;

                $ssCatF = $this->Categorie_model->getSSCatByCat($idF);
                $data['ssCatF'] = $ssCatF;

                $ssCatE = $this->Categorie_model->getSSCatByCat($idE);
                $data['ssCatE'] = $ssCatE;

                $ssCatA = $this->Categorie_model->getSSCatByCat($idA);
                $data['ssCatA'] = $ssCatA;

                /** Meilleurs produit vendu */
                $meilleursProduits= $this->Accueil_model->getMeilleursProduit();
                $data['meilleursProduits'] = $meilleursProduits;

                /** Meilleurs produit vendu */
                $topBoutiques= $this->Accueil_model->getTopBoutiques();
                $data['topBoutiques'] = $topBoutiques;

                $row =  $this->Produit_model->record_count_SsCat($namSsCat);

                $config = array();

                $config["base_url"] = base_url() . "Produit/SousCategorie/".$namSsCat."/";

                $config["total_rows"] = $row;

                $config["per_page"] = 12;

                $config["uri_segment"] = 4;
                $config['cur_tag_open'] = '&nbsp;<a class="page-item active">';
                $config['cur_tag_close'] = '</a>';

                $config['first_link'] = 'First';
                $config['last_link'] = 'Last';
                $this->pagination->initialize($config);

                $page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0;

                $str_links = $this->pagination->create_links();
                $data["links"] = explode('&nbsp;',$str_links );

                $allProduit = $this->Produit_model->getallProduitBySsCaT($config["per_page"], $page, $namSsCat);
                $data['allProduit'] = $allProduit;

                $links = explode('&nbsp;',$str_links );
                $data['links'] = $links;

                /** Categorie */
                $categories = $this->Categorie_model->getAllCategorie();
                $data['categories'] = $categories;

                /** Titre */
                $titreAffiche = 'Tous les produits de catégorie '.$namSsCat;
                $data['titreAffiche'] = $titreAffiche;

                $this->load->view('template/header_view', $data);
                $this->load->view('page/produitsSousCategorie_view', $data);
                $this->load->view('template/footer_view');
            }
            else{
                redirect("Erreur/erreur404_SousCategorie_nonFound");
            }


        }
    }



    public function produitSousCategorie(){
        $this->form_validation->set_rules('cate', 'catégorie', 'trim|required');
        $this->form_validation->set_rules('subcate', 'sous-catégorie', 'trim|required');
        if($this->form_validation->run() == False)
        {
            $this->tousLesProduits();
        }
        else{
            $subcate = $this->input->post('subcate');
            $this->search_results($subcate);
        }
    }

    public function search_results($search_r = null)
    {
        if($search_r == null){
            redirect('Produit/tousLesProduits');
        }
        else{
            if(!$this->session->userdata('id_client')){
                $id_client = NULL;
            }
            else{
                $id_client = $this->session->userdata('id_client');
            }
            /** Count panier */
            $countPanier= $this->Accueil_model->countPanier($id_client);
            $data['countPanier'] = $countPanier;

            /** Categorie */
            $cateHomme = 'Hommes';
            $cateFemme = 'Femmes';
            $cateEnfant = 'Enfants';
            $cateAutre = 'Autres';

            /** Id sous-cat */
            $idH = $this->Categorie_model->getIdCatH($cateHomme);
            $data['idH'] = $idH;

            $idF = $this->Categorie_model->getIdCatH($cateFemme);
            $data['idF'] = $idF;

            $idE = $this->Categorie_model->getIdCatH($cateEnfant);
            $data['idE'] = $idE;

            $idA = $this->Categorie_model->getIdCatH($cateAutre);
            $data['idA'] = $idA;

            /** Get sous-category */
            $ssCatH = $this->Categorie_model->getSSCatByCat($idH);
            $data['ssCatH'] = $ssCatH;

            $ssCatF = $this->Categorie_model->getSSCatByCat($idF);
            $data['ssCatF'] = $ssCatF;

            $ssCatE = $this->Categorie_model->getSSCatByCat($idE);
            $data['ssCatE'] = $ssCatE;

            $ssCatA = $this->Categorie_model->getSSCatByCat($idA);
            $data['ssCatA'] = $ssCatA;

            /** Meilleurs produit vendu */
            $meilleursProduits= $this->Accueil_model->getMeilleursProduit();
            $data['meilleursProduits'] = $meilleursProduits;

            /** Meilleurs produit vendu */
            $topBoutiques= $this->Accueil_model->getTopBoutiques();
            $data['topBoutiques'] = $topBoutiques;
            /** Produit **/
            $search = urldecode($search_r);
            $data['search'] = $search;

            /** Compter le nombre de resulter trouver */
            $num_row_produit =  $this->Recherche_model->record_count_produit($search);
            $data['num_row_produit'] = $num_row_produit;

            /** Rechercher les articles */
            $result_produit = $this->Recherche_model->fetch_produit($search);
            $data['result_produit'] = $result_produit;
            /** Categorie */
            $categories = $this->Categorie_model->getAllCategorie();
            $data['categories'] = $categories;

            /** Titre */
            $titreAffiche = 'Tous les produits de la sous-catégorie '.$search;
            $data['titreAffiche'] = $titreAffiche;

            $this->load->view('template/header_view', $data);
            $this->load->view('page/rechercheParSousCategorie_view', $data);
            $this->load->view('template/footer_view');
        }
    }
}