<?php

class Accueil extends CI_Controller
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
        /** Categorie */
        $cateHomme = 'Hommes';
        $data['cateHomme'] = $cateHomme;

        $cateFemme = 'Femmes';
        $data['cateFemme'] = $cateFemme;

        $cateEnfant = 'Enfants';
        $data['cateEnfant'] = $cateEnfant;

        $cateAutre = 'Autres';
        $data['cateAutre'] = $cateAutre;

        $promotion = 'non';

        /** Id du client */
        if(!$this->session->userdata('id_client')){
            $id_client = NULL;
        }
        else{
            $id_client = $this->session->userdata('id_client');
        }

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

        $nouveauArticles = $this->Accueil_model->getNewArticles($promotion);
        $data['nouveauArticles'] = $nouveauArticles;

        $nouveauArticlesSecond = $this->Accueil_model->getNewArticles2($promotion);
        $data['nouveauArticlesSecond'] = $nouveauArticlesSecond;

        $categories = $this->Categorie_model->getAllCategorie();
        $data['categories'] = $categories;

        /*$produitCategories = $this->Accueil_model->getProduitByCategorie();
        $data['produitCategories'] = $produitCategories;**/

        $produitH = $this->Accueil_model->getAllProduitH($idH);
        $data['produitH'] = $produitH;

        $produitF = $this->Accueil_model->getAllProduitF($idF);
        $data['produitF'] = $produitF;

        $produitE = $this->Accueil_model->getAllProduitE($idE);
        $data['produitE'] = $produitE;

        $produitA = $this->Accueil_model->getAllProduitA($idA);
        $data['produitA'] = $produitA;

        /** Articles en promotion */
        $promotion = 'oui';
        $produitPromo = $this->Accueil_model->getAllProduitPromo($promotion);
        $data['produitPromo'] = $produitPromo;

        $produitPromo2 = $this->Accueil_model->getAllProduitPromo2($promotion);
        $data['produitPromo2'] = $produitPromo2;

        /** Count panier */
        $countPanier= $this->Accueil_model->countPanier($id_client);
        $data['countPanier'] = $countPanier;

        /** Slider */
        $photos= $this->Accueil_model->getLastPhoto();
        $data['photos'] = $photos;

        /** Meilleurs produit vendu */
        $meilleursProduits= $this->Accueil_model->getMeilleursProduit();
        $data['meilleursProduits'] = $meilleursProduits;

        /** Meilleurs produit vendu */
        $topBoutiques= $this->Accueil_model->getTopBoutiques();
        $data['topBoutiques'] = $topBoutiques;

        /** Menu active */
        $data['menuActive'] = "Accueil";

        /** Titre */
        $titreAffiche = 'Accueil';
        $data['titreAffiche'] = $titreAffiche;

        $this->load->view('template/header_view', $data);
        $this->load->view('page/index_view', $data);
        $this->load->view('template/footer_view');

    }

    public function getsubcategory(){
        $data = $this->input->get();
        $catid = $data['cid'];
        $this->db->where(array('id_cate'=>$catid));
        $this->db->where("date_delete is null");
        $subcategory=$this->db->get('sscategorie')->result_array();
        foreach ($subcategory as $sub){
            echo "<option value=".$sub['id_ss_cate'].">".$sub['titre_ss_cate']."</option>";
        }
    }
}