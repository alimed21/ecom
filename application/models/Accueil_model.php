<?php


class Accueil_model extends CI_Model
{
    /** Sliders */
    public function getSliders($slide){
        $this->db->select('id_slide, titre_slide, image_slide');
        $this->db->from('slider');
        $this->db->where('type_slide', $slide);
        $this->db->where('date_delete is null');
        $this->db->limit(4);
        $this->db->order_by("date_add", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getPhotoPub($pub){
        $this->db->select('id_slide, titre_slide, image_slide');
        $this->db->from('slider');
        $this->db->where('type_slide', $pub);
        $this->db->where('date_delete is null');
        $this->db->limit(2);
        $this->db->order_by("date_add", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getNewArticles($promotion)
    {
        $this->db->select('id_prod, prod, prix, p.token, date_prod, titre_ss_cate, image');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->where('p.promo', $promotion);
        $this->db->where('p.date_valid is not null');
        $this->db->where('p.id_admin_valid is not null');
        $this->db->where('p.id_admin_delete is null');
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_user_delete is null');
        $this->db->where('p.date_user_delete is null');
        $this->db->order_by("date_prod", "desc");
        $this->db->limit(6);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function getAllProduitPromo($promotion){
        $this->db->select('id_prod, prod, prix, p.token, date_prod, titre_ss_cate, image, promo, prix_promo');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->where('p.promo', $promotion);
        $this->db->where('p.date_valid is not null');
        $this->db->where('p.id_admin_valid is not null');
        $this->db->where('p.id_admin_delete is null');
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_user_delete is null');
        $this->db->where('p.date_user_delete is null');
        $this->db->order_by("date_prod", "desc");
        $this->db->limit(3);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function getAllProduitPromo2($promotion){
        $this->db->select('id_prod, prod, prix, p.token, date_prod, titre_ss_cate, image, promo, prix_promo');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->where('p.promo', $promotion);
        $this->db->where('p.date_valid is not null');
        $this->db->where('p.id_admin_valid is not null');
        $this->db->where('p.id_admin_delete is null');
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_user_delete is null');
        $this->db->where('p.date_user_delete is null');
        $this->db->order_by("date_prod", "desc");
        $this->db->limit(6,3);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function getProduitByCategorie(){
        $this->db->select('id_prod, prod, prix, p.token, date_prod, titre_ss_cate, image, cate, titre_ss_cate');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->join('categorieproduit as c', 'ssc.id_cate  = c.id_cate');
        $this->db->where('p.date_valid is not null');
        $this->db->where('p.id_admin_valid is not null');
        $this->db->where('p.id_admin_delete is null');
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_user_delete is null');
        $this->db->where('p.date_user_delete is null');
        $this->db->where('ssc.id_admin_delete is null');
        $this->db->where('ssc.date_delete is null');
        $this->db->where('c.id_admin_delete is null');
        $this->db->where('c.date_delete is null');
        $this->db->order_by("date_prod", "desc");
        $this->db->limit(4);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function getAllProduitH($idH){
        $this->db->select('id_prod, prod, prix, p.token, date_prod, titre_ss_cate, image, promo, prix_promo');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->where('ssc.id_cate', $idH);
        $this->db->where('p.date_valid is not null');
        $this->db->where('p.id_admin_valid is not null');
        $this->db->where('p.id_admin_delete is null');
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_user_delete is null');
        $this->db->where('p.date_user_delete is null');

        $this->db->where('ssc.id_admin_delete is null');
        $this->db->where('ssc.date_delete is null');

        $this->db->order_by("p.date_prod", "desc");
        $this->db->limit(4);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function getAllProduitF($idF){
        $this->db->select('id_prod, prod, prix, p.token, date_prod, titre_ss_cate, image, promo, prix_promo');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->where('ssc.id_cate', $idF);

        $this->db->where('p.date_valid is not null');
        $this->db->where('p.id_admin_valid is not null');
        $this->db->where('p.id_admin_delete is null');
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_user_delete is null');
        $this->db->where('p.date_user_delete is null');

        $this->db->where('ssc.id_admin_delete is null');
        $this->db->where('ssc.date_delete is null');

        $this->db->order_by("p.date_prod", "desc");
        $this->db->limit(4);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function getAllProduitE($idE){
        $this->db->select('id_prod, prod, prix, p.token, date_prod, titre_ss_cate, image, promo, prix_promo');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->where('ssc.id_cate', $idE);

        $this->db->where('p.date_valid is not null');
        $this->db->where('p.id_admin_valid is not null');
        $this->db->where('p.id_admin_delete is null');
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_user_delete is null');
        $this->db->where('p.date_user_delete is null');

        $this->db->where('ssc.id_admin_delete is null');
        $this->db->where('ssc.date_delete is null');

        $this->db->order_by("p.date_prod", "desc");
        $this->db->limit(4);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function getAllProduitA($idA){
        $this->db->select('id_prod, prod, prix, p.token, date_prod, titre_ss_cate, image, promo, prix_promo');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->where('ssc.id_cate', $idA);

        $this->db->where('p.date_valid is not null');
        $this->db->where('p.id_admin_valid is not null');
        $this->db->where('p.id_admin_delete is null');
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_user_delete is null');
        $this->db->where('p.date_user_delete is null');

        $this->db->where('ssc.id_admin_delete is null');
        $this->db->where('ssc.date_delete is null');

        $this->db->order_by("p.date_prod", "desc");
        $this->db->limit(4);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    public function countPanier($idClient){
        $this->db->select('COUNT(code_cmd) as totalCmd');
        $this->db->from('commande as cmd');
        $this->db->where('cmd.id_client', $idClient);
        $this->db->where('cmd.valid_client_cmd is null');
        $this->db->where('cmd.date_valid_client is null');
        $this->db->where('cmd.valid_four_cmd is null');
        $this->db->where('cmd.date_valid_four is null');
        $this->db->where('date_delete_cmd is null');
        $this->db->where('date_delete_cmd is null');
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else {
            return false;
        }
    }
    public function getPromoArticle($promo){

        $this->db->select('id_prod, prod, prix, description, telephone, promo, prix_promo, produit.token, date_prod, titre_ss_cate, image');
        $this->db->from('produit');
        $this->db->join('sscategorie as ssc', 'produit.id_sscate = ssc.id_ss_cate');
        //$this->db->join('categorieproduit as c', 'ssc.id_cate = c.id_cate');
        $this->db->where('produit.promo', $promo);
        $this->db->where('produit.date_delete is null');
        $this->db->limit(4);
        $this->db->order_by("date_prod", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllCategorie(){
        $this->db->select('id_cate, cate, image');
        $this->db->from('categorieproduit');
        $this->db->where('date_delete is null');
        $this->db->order_by('id_cate', 'ASC');
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    /** Sous-Menu*/
    public function getAllSousCategories(){
        $this->db->select("id_ss_cate, titre_ss_cate, ssc.id_cate");
        $this->db->from("sscategorie as ssc");
        //$this->db->join("categorieproduit as c", "c.id_cate  = ssc.id_cate");
        $this->db->where("ssc.date_delete is null");
        $this->db->order_by('id_ss_cate',"ASC");
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    public function getAllSousCategories2(){
        $this->db->select("id_ss_cate, titre_ss_cate, ssc.id_cate");
        $this->db->from("sscategorie as ssc");
        //$this->db->join("categorieproduit as c", "c.id_cate  = ssc.id_cate");
        $this->db->where("ssc.date_delete is null");
        $this->db->order_by('id_ss_cate',"ASC");
        $this->db->limit(7, 7);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function getSousCategories(){
        $this->db->select("id_ss_cate, titre_ss_cate, id_cate");
        $this->db->from("sscategorie as ssc");
        $this->db->where("ssc.date_delete is null");
        $this->db->order_by('id_ss_cate',"ASC");;
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    /** Articles promotion */
    public function getCategorieHommePromo($idcateH, $quantite, $promo){
        $this->db->select('id_prod, prod, prix, prix_promo, p.token, date_prod, p.image');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->join('categorieproduit as c', 'ssc.id_cate = c.id_cate');
        $this->db->where('c.id_cate', $idcateH);
        $this->db->where("quantite != ", $quantite);
        $this->db->where("promo", $promo);
        $this->db->where('p.date_delete is null');
        $this->db->limit(8);
        $this->db->order_by("date_prod", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /** categorie homme */
    public function getCategorieHomme($idcateH, $quantite, $promo){
        $this->db->select('id_prod, prod, prix, p.token, date_prod, p.image');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->join('categorieproduit as c', 'ssc.id_cate = c.id_cate');
        $this->db->where('c.id_cate', $idcateH);
        $this->db->where("quantite != ", $quantite);
        $this->db->where("promo != ", $promo);
        $this->db->where('p.date_delete is null');
        $this->db->limit(8);
        $this->db->order_by("date_prod", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getCategorieFemmePromo($idcateF, $quantite, $promo){
        $this->db->select('id_prod, prod, prix, prix_promo, p.token, date_prod, p.image');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->join('categorieproduit as c', 'ssc.id_cate = c.id_cate');
        $this->db->where('c.id_cate', $idcateF);
        $this->db->where("quantite != ", $quantite);
        $this->db->where("promo", $promo);
        $this->db->where('p.date_delete is null');
        $this->db->limit(8);
        $this->db->order_by("date_prod", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getCategorieEnfantPromo($idcateE, $quantite, $promo){
        $this->db->select('id_prod, prod, prix, prix_promo, p.token, date_prod, p.image');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->join('categorieproduit as c', 'ssc.id_cate = c.id_cate');
        $this->db->where('c.id_cate', $idcateE);
        $this->db->where("quantite != ", $quantite);
        $this->db->where("promo", $promo);
        $this->db->where('p.date_delete is null');
        $this->db->limit(8);
        $this->db->order_by("date_prod", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getCategorieAutrePromo($idcateA, $quantite, $promo){
        $this->db->select('id_prod, prod, prix, prix_promo, p.token, date_prod, p.image');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->join('categorieproduit as c', 'ssc.id_cate = c.id_cate');
        $this->db->where('c.id_cate', $idcateA);
        $this->db->where("quantite != ", $quantite);
        $this->db->where("promo", $promo);
        $this->db->where('p.date_delete is null');
        $this->db->limit(8);
        $this->db->order_by("date_prod", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /** categorie femme */
    public function getCategorieFemme($idcateF, $quantite, $promo){
        $this->db->select('id_prod, prod, prix, p.token, date_prod, p.image');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->join('categorieproduit as c', 'ssc.id_cate = c.id_cate');
        $this->db->where('c.id_cate', $idcateF);
        $this->db->where("quantite != ", $quantite);
        $this->db->where("promo != ", $promo);
        $this->db->where('p.date_delete is null');
        $this->db->limit(8);
        $this->db->order_by("date_prod", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /** categorie enfant */
    public function getCategorieEnfant($idcateE, $quantite, $promo){
        $this->db->select('id_prod, prod, prix, p.token, date_prod, p.image');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->join('categorieproduit as c', 'ssc.id_cate = c.id_cate');
        $this->db->where('c.id_cate', $idcateE);
        $this->db->where("quantite != ", $quantite);
        $this->db->where("promo != ", $promo);
        $this->db->where('p.date_delete is null');
        $this->db->limit(8);
        $this->db->order_by("date_prod", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /** categorie autre */
    public function getCategorieAutre($idcateA, $quantite, $promo){
        $this->db->select('id_prod, prod, prix, p.token, date_prod, p.image');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->join('categorieproduit as c', 'ssc.id_cate = c.id_cate');
        $this->db->where('c.id_cate', $idcateA);
        $this->db->where("quantite != ", $quantite);
        $this->db->where("promo != ", $promo);
        $this->db->where('p.date_delete is null');
        $this->db->limit(8);
        $this->db->order_by("date_prod", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /** Les dernières boutiques */
    public function getLastShoap(){
        $this->db->select('id_four, lien_four, logo_four');
        $this->db->from('fournisseur');
        $this->db->where('logo_four is not null');
        $this->db->where('date_valid is not null');
        $this->db->where('date_delete_four is null');
        $this->db->limit(9);
        $this->db->order_by("date_add_four", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /** titreCategorie**/
    public function titreCategorie($idsscat){
        $this->db->select('id_ss_cate, titre_ss_cate');
        $this->db->from('sscategorie');
        $this->db->where('id_ss_cate', $idsscat);
        $this->db->where('date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }

    /** Client count */
    public function countAllClient()
    {
        $this->db->select('COUNT(id_client) as client');
        $this->db->from('client');
        $query = $this->db->get();
        return $query->row();
    }

    /** Shop count */
    public function countAllShop()
    {
        $this->db->select('COUNT(id_four) as four');
        $this->db->from('fournisseur');
        $query = $this->db->get();
        return $query->row();
    }

    /** Commande count */
    public function countAllCommande()
    {
        $this->db->select('COUNT(id_cmd) as cmd');
        $this->db->from('commande');
        $query = $this->db->get();
        return $query->row();
    }

    /** Sliders */
    public function getLastPhoto(){
        $this->db->select('titre_slide, lien_image, text_image, image_slide, token_slide, id_slide');
        $this->db->from('slider');
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');
        $this->db->order_by("id_slide", "desc");
        $this->db->limit(3);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function getMeilleursProduit(){
        $this->db->select('COUNT(c.id_cmd) as cmd, p.prod, p.token');
        $this->db->from('commande as c');
        $this->db->join("produit as p", "c.id_prod = p.id_prod");

        $this->db->where('c.valid_client_cmd is not null');
        $this->db->where('c.date_valid_client is not null');
        $this->db->where('c.valid_four_cmd is not null');
        $this->db->where('c.date_valid_four is not null');
        $this->db->where('c.date_delete_cmd is null');
        $this->db->where('c.id_four_delete_cmd is null');

        $this->db->where('p.id_admin_valid is not null');
        $this->db->where('p.date_valid is not null');
        $this->db->where('p.id_admin_delete is null');
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_user_delete is null');
        $this->db->where('p.date_user_delete is null');


        $this->db->group_by('p.prod');
        $this->db->order_by("cmd", "desc");
        $this->db->limit(6);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function getTopBoutiques(){
        $this->db->select('COUNT(c.id_cmd) as cmd, b.nom_boutique, b.code_boutique');
        $this->db->from('commande as c');
        $this->db->join("boutiques as b", "c.id_four = b.id_boutique");

        $this->db->where('c.valid_client_cmd is not null');
        $this->db->where('c.date_valid_client is not null');
        $this->db->where('c.valid_four_cmd is not null');
        $this->db->where('c.date_valid_four is not null');
        $this->db->where('c.date_delete_cmd is null');
        $this->db->where('c.id_four_delete_cmd is null');

        $this->db->where('b.id_admin_valid is not null');
        $this->db->where('b.date_valid is not null');
        $this->db->where('b.id_admin_delete is null');
        $this->db->where('b.date_delete is null');


        $this->db->group_by('b.nom_boutique');
        $this->db->order_by("cmd", "desc");
        $this->db->limit(6);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
}