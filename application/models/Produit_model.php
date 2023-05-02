<?php


class Produit_model extends CI_Model
{
    public function getDetailProduit($token){
        $this->db->select('id_prod, prod, prix, description, token, date_prod, titre_ss_cate, cate, quantite, nom_boutique, image');
        $this->db->from('produit');
        $this->db->join('sscategorie as ssc', 'produit.id_sscate = ssc.id_ss_cate');
        $this->db->join('categorieproduit as c', 'ssc.id_cate = c.id_cate');
        $this->db->join('boutiques as b', 'produit.id_boutique = b.id_boutique');
        $this->db->where('token', $token);
        $this->db->where('produit.id_admin_valid is not null');
        $this->db->where('produit.date_valid is not null');
        $this->db->where('produit.id_admin_delete is null');
        $this->db->where('produit.date_delete is null');
        $this->db->where('produit.id_user_delete is null');
        $this->db->where('produit.date_user_delete is null');

        $this->db->where('b.id_admin_valid is not null');
        $this->db->where('b.date_valid is not null');
        $this->db->where('b.id_admin_delete is null');
        $this->db->where('b.date_delete is null');

        $this->db->where('ssc.id_admin_delete is null');
        $this->db->where('ssc.date_delete is null');

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

    public function getPhotos($token){
        $this->db->select('photo_name');
        $this->db->from('photo_joint');
        $this->db->where('token_post', $token);
        $this->db->where('user_delete is null');
        $this->db->where('date_delete is null');
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

    public function getIdBoutique($token){
        $this->db->select('id_boutique');
        $this->db->from('produit');
        $this->db->where('token', $token);

        $this->db->where('produit.id_admin_valid is not null');
        $this->db->where('produit.date_valid is not null');
        $this->db->where('produit.id_admin_delete is null');
        $this->db->where('produit.date_delete is null');
        $this->db->where('produit.id_user_delete is null');
        $this->db->where('produit.date_user_delete is null');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $row = $query->row();
            return $row->id_boutique;
        }
        else
        {
            return false;
        }
    }

    public function getNomProduit($token){
        $this->db->select('prod');
        $this->db->from('produit');
        $this->db->where('token', $token);

        $this->db->where('produit.id_admin_valid is not null');
        $this->db->where('produit.date_valid is not null');
        $this->db->where('produit.id_admin_delete is null');
        $this->db->where('produit.date_delete is null');
        $this->db->where('produit.id_user_delete is null');
        $this->db->where('produit.date_user_delete is null');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $row = $query->row();
            return $row->prod;
        }
        else
        {
            return false;
        }
    }

    public function getNomBoutique($idBoutique){
        $this->db->select('nom_boutique');
        $this->db->from('boutiques');
        $this->db->where('id_boutique', $idBoutique);

        $this->db->where('id_admin_valid is not null');
        $this->db->where('date_valid is not null');
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');


        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $row = $query->row();
            return $row->nom_boutique;
        }
        else
        {
            return false;
        }
    }

    public function getProduitBoutique($idBoutique, $token){
        $this->db->select('id_prod, prod, prix, token, date_prod, image');
        $this->db->from('produit');
        $this->db->join('boutiques as b', 'produit.id_boutique = b.id_boutique');
        $this->db->where('produit.id_boutique', $idBoutique);
        $this->db->where('produit.token !=', $token);
        $this->db->where('produit.id_admin_valid is not null');
        $this->db->where('produit.date_valid is not null');
        $this->db->where('produit.id_admin_delete is null');
        $this->db->where('produit.date_delete is null');
        $this->db->where('produit.id_user_delete is null');
        $this->db->where('produit.date_user_delete is null');

        $this->db->where('b.id_admin_valid is not null');
        $this->db->where('b.date_valid is not null');
        $this->db->where('b.id_admin_delete is null');
        $this->db->where('b.date_delete is null');
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
    public function record_count() {
        $this->db->select ( 'COUNT(*) AS `numrows`' );
        $this->db->where('id_admin_valid is not null');
        $this->db->where('date_valid is not null');
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');
        $this->db->where('id_user_delete is null');
        $this->db->where('date_user_delete is null');
        $query = $this->db->get ( 'produit' );
        return $query->row ()->numrows;
    }

    public function record_countPromotion($promo) {
        $this->db->select ( 'COUNT(*) AS `numrows`' );
        $this->db->where('promo', $promo);
        $this->db->where('id_admin_valid is not null');
        $this->db->where('date_valid is not null');
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');
        $this->db->where('id_user_delete is null');
        $this->db->where('date_user_delete is null');
        $query = $this->db->get ( 'produit' );
        return $query->row ()->numrows;
    }

    public function record_count_SsCat($namSsCat){
        $this->db->select ( 'COUNT(id_prod) AS `numrows`' );
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->where('p.id_admin_valid is not null');
        $this->db->where('p.date_valid is not null');
        $this->db->where('p.id_admin_delete is null');
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_user_delete is null');
        $this->db->where('p.date_user_delete is null');
        $this->db->where('ssc.id_admin_delete is null');
        $this->db->where('ssc.date_delete is null');
        $this->db->like('ssc.titre_ss_cate', $namSsCat);
        $query = $this->db->get ( 'produit as p' );
        return $query->row ()->numrows;
    }

    public function record_count_Cat($nameCat){
        $this->db->select ( 'COUNT(id_prod) AS `numrows`' );
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->join('categorieproduit as c', 'ssc.id_cate = c.id_cate');
        $this->db->where('p.id_admin_valid is not null');
        $this->db->where('p.date_valid is not null');
        $this->db->where('p.id_admin_delete is null');
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_user_delete is null');
        $this->db->where('p.date_user_delete is null');

        $this->db->where('ssc.id_admin_delete is null');
        $this->db->where('ssc.date_delete is null');

        $this->db->where('c.id_admin_delete is null');
        $this->db->where('c.date_delete is null');

        $this->db->like('c.cate', $nameCat);
        $query = $this->db->get ( 'produit as p' );
        return $query->row ()->numrows;
    }

    public function getallProduit($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->join('sscategorie as ssc', 'produit.id_sscate = ssc.id_ss_cate');

        $this->db->where('produit.id_admin_valid is not null');
        $this->db->where('produit.date_valid is not null');
        $this->db->where('produit.id_admin_delete is null');
        $this->db->where('produit.date_delete is null');
        $this->db->where('produit.id_user_delete is null');
        $this->db->where('produit.date_user_delete is null');

        $this->db->where('ssc.id_admin_delete is null');
        $this->db->where('ssc.date_delete is null');

        $this->db->order_by('date_prod', 'desc');
        $query = $this->db->get("produit");



        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;

    }

    public function getallProduitPromotion($limit, $start, $promo) {
        $this->db->limit($limit, $start);
        $this->db->join('sscategorie as ssc', 'produit.id_sscate = ssc.id_ss_cate');

        $this->db->where('promo', $promo);
        $this->db->where('produit.id_admin_valid is not null');
        $this->db->where('produit.date_valid is not null');
        $this->db->where('produit.id_admin_delete is null');
        $this->db->where('produit.date_delete is null');
        $this->db->where('produit.id_user_delete is null');
        $this->db->where('produit.date_user_delete is null');

        $this->db->where('ssc.id_admin_delete is null');
        $this->db->where('ssc.date_delete is null');

        $this->db->order_by('date_prod', 'desc');
        $query = $this->db->get("produit");



        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;

    }

    public function getallProduitByCaT($limit, $start, $nameCat){
        $this->db->limit($limit, $start);
        $this->db->join('sscategorie as ssc', 'produit.id_sscate = ssc.id_ss_cate');
        $this->db->join('categorieproduit as c', 'ssc.id_cate = c.id_cate');
        $this->db->like('c.cate', $nameCat);

        $this->db->where('produit.id_admin_valid is not null');
        $this->db->where('produit.date_valid is not null');
        $this->db->where('produit.id_admin_delete is null');
        $this->db->where('produit.date_delete is null');
        $this->db->where('produit.id_user_delete is null');
        $this->db->where('produit.date_user_delete is null');

        $this->db->where('ssc.id_admin_delete is null');
        $this->db->where('ssc.date_delete is null');

        $this->db->where('c.id_admin_delete is null');
        $this->db->where('c.date_delete is null');

        $this->db->order_by('date_prod', 'desc');
        $query = $this->db->get("produit");



        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;

    }

    public function getallProduitBySsCaT($limit, $start, $nameSsCat){
        $this->db->limit($limit, $start);
        $this->db->join('sscategorie as ssc', 'produit.id_sscate = ssc.id_ss_cate');
        $this->db->like('ssc.titre_ss_cate', $nameSsCat);
        $this->db->where('produit.id_admin_valid is not null');
        $this->db->where('produit.date_valid is not null');
        $this->db->where('produit.id_admin_delete is null');
        $this->db->where('produit.date_delete is null');
        $this->db->where('produit.id_user_delete is null');
        $this->db->where('produit.date_user_delete is null');

        $this->db->where('ssc.id_admin_delete is null');
        $this->db->where('ssc.date_delete is null');

        $this->db->order_by('date_prod', 'desc');
        $query = $this->db->get("produit");



        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;

    }

    public function getAllCategorie(){
        $this->db->select("id_cate, cate");
        $this->db->from("categorieproduit");
        $this->db->where('date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }
    public function produitParCategorie($nomCate){
        $this->db->select('id_prod, prod, prix, description, telephone, token, date_prod, titre_ss_cate, image, nom_four');
        $this->db->from('produit');
        //$this->db->join('categorieproduit as c', 'produit.id_cate = c.id_cate');
        $this->db->join('fournisseur as f', 'produit.id_fournisseur = f.id_four');
        $this->db->join('sscategorie as ssc', 'produit.id_sscate = ssc.id_ss_cate');
        $this->db->where("c.cate", $nomCate);
        $this->db->where('produit.date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }

        public function getDetailProduitPromo($token, $promo){
            $this->db->select('id_prod, prod, prix, prix_promo, description, telephone, token, date_prod, titre_ss_cate, cate, nom_four, quantite');
            $this->db->from('produit');
            $this->db->join('sscategorie as ssc', 'produit.id_sscate = ssc.id_ss_cate');
            $this->db->join('categorieproduit as c', 'ssc.id_cate = c.id_cate');
            $this->db->join('fournisseur as f', 'produit.id_fournisseur = f.id_four');
            $this->db->where('token', $token);
            $this->db->where('promo', $promo);
            $this->db->where('produit.date_delete is null');
            $query = $this->db->get();
            return $query->result();
    }
    public function record_countSoucCategorie($idsscate, $quantite){
        $this->db->select ( 'COUNT(*) AS `numrows`' );
        $this->db->where('id_sscate', $idsscate);
        $this->db->where("quantite != ", $quantite);
        $this->db->where('date_delete is null');
        $query = $this->db->get ( 'produit' );
        return $query->row()->numrows;
    }
    public function getallProduitParSousCategorie($limit, $start, $idsscate, $quantite) {
        $this->db->limit($limit, $start);
        $this->db->where('id_sscate', $idsscate);
        $this->db->where("quantite != ", $quantite);
        $this->db->where('date_delete is null');
        $this->db->order_by('date_prod', 'desc');
        $query = $this->db->get("produit");



        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;

    }
    public function getProduitDetail($token){
        $this->db->select('id_prod, prod, token, quantite');
        $this->db->from('produit');
        $this->db->where("token", $token);
        $this->db->where('date_delete is null');
        $query = $this->db->get();
        return $query->row();
    }

    public function getSousCategorieProduit($token){
        $this->db->select('id_sscate');
        $this->db->from('produit');
        $this->db->where("token", $token);
        $this->db->where('date_delete is null');
        $query = $this->db->get();
        return $query->row();
    }

    public function getproduitSuivants($id_ss_cate, $token){
        $this->db->select('id_prod, prod, token, date_prod, image');
        $this->db->from('produit');
        $this->db->where("id_sscate", $id_ss_cate);
        $this->db->where("token != ",$token);
        $this->db->where('produit.date_delete is null');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();
    }
    public function getProduit($token_prod){
        $this->db->select('id_prod, quantite, prix, prix_promo, promo');
        $this->db->from('produit');
        $this->db->where("token", $token_prod);
        $this->db->where('produit.date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }
    public function getFournisseur($token_prod){
        $this->db->select('id_boutique');
        $this->db->from('produit');
        $this->db->where("token", $token_prod);
        $this->db->where('produit.date_delete is null');
        $query = $this->db->get();
        return $query->row();
    }
    public function updateQuantiteProduit($data, $token_prod){
        $this->db->where("token", $token_prod);
        $this->db->update("produit", $data);
        return true;
    }
    public function getIdProduit($cmdCode){
        $this->db->select('id_prod');
        $this->db->from('commande');
        $this->db->where("code_cmd", $cmdCode);
        $this->db->where('date_delete_cmd is null');
        $query = $this->db->get();
        return $query->result();
    }
    public function getProduitStock($token_prod){
        $this->db->select('quantite, id_prod, promo');
        $this->db->from('produit');
        $this->db->where("token", $token_prod);
        $this->db->where('produit.date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }
    public function getQuantiteStock($id_prod){
        $this->db->select('quantite');
        $this->db->from('produit');
        $this->db->where("id_prod", $id_prod);
        $this->db->where('produit.date_delete is null');
        $query = $this->db->get();
        return $query->row();
    }
    public function updateQuantiteStock($id_prod, $data){
        $this->db->where("id_prod", $id_prod);
        $this->db->update("produit", $data);
        return true;
    }
}