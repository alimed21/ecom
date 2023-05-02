<?php


class Admin_model extends CI_Model
{

    public function getAllProduitsNonValid()
    {
        $this->db->select('id_prod, token, prod, prix, description, promo, prix_promo, token, date_prod, username, titre_ss_cate, quantite, nom_boutique, image, tele_boutique, adr_boutique, nom_gerant_boutique, tele_gerant, email_gerant');
        $this->db->from('produit as p');
        $this->db->join('sscategorie as ssc', 'ssc.id_ss_cate = p.id_sscate');
        $this->db->join('boutiques as b', 'b.id_boutique = p.id_boutique');
        $this->db->join('utilisateur as u', 'u.id_user = p.id_user_add');
        //Produit
        $this->db->where('p.id_admin_valid is null');
        $this->db->where('p.date_valid is null');
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_admin_delete is null');
        //Sous-catégorie
        $this->db->where('ssc.date_delete is null');
        $this->db->where('ssc.id_admin_delete is null');
        //Boutique
        $this->db->where('b.id_admin_valid is not null');
        $this->db->where('b.date_valid is not null');
        $this->db->where('b.date_delete is null');
        $this->db->where('b.id_admin_delete is null');
        //Utilisateur
        $this->db->where('u.id_admin_valid is not null');
        $this->db->where('u.date_valid is not null');
        $this->db->where('u.date_delete is null');
        $this->db->where('u.id_admin_delete is null');

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

    public function validProduit($data, $token){
        $this->db->where('token', $token );
        $this->db->update('produit', $data);
        return true;
    }

    public function rejetteProduit($data, $token){
        $this->db->where('token', $token );
        $this->db->update('produit', $data);
        return true;
    }

    public function getAllImages(){
        $this->db->select('id_photo, token_post, photo_name');
        $this->db->from('photo_joint as ph');
        $this->db->join('produit as p', 'p.token = ph.token_post');
        //Produit
        $this->db->where('p.id_admin_valid is null');
        $this->db->where('p.date_valid is null');
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_admin_delete is null');
        //Photo joint
        $this->db->where('ph.date_delete is null');
        $this->db->where('ph.user_delete is null');

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
    public function getInfoAdmin($id_admin)
    {
        $this->db->select('login_admin');
        $this->db->from('administrateur');
        $this->db->where('id_admin', $id_admin);

        $query = $this->db->get();
        return $query->result();
    }
    public function addSlider($data)
    {
        $this->db->insert('slider', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function getListesPhotos(){
        $this->db->select('id_slide, titre_slide, image_slide, token_slide, lien_image, text_image, date_add, login_admin');
        $this->db->from('slider');
        $this->db->join('admin as ad', 'slider.id_admin_add = ad.id_admin');
        $this->db->where('slider.date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }
    public function bloquerSlider($token, $data){
        $this->db->where('token_slide', $token );
        $this->db->update('slider', $data);
        return true;
    }
    public function countAllBoutiques(){
        $this->db->select('COUNT(id_four) as boutique');
        $this->db->from('fournisseur');
        $this->db->where('date_valid IS NOT NULL');
        $this->db->where('date_delete_four IS NULL');
        $query = $this->db->get();
        return $query->result();
    }
    public function countAllClients(){
        $this->db->select('COUNT(id_client) as client');
        $this->db->from('client');
        $query = $this->db->get();
        return $query->result();
    }
    public function countAllCommandes(){
        $this->db->select('COUNT(id_cmd ) as commande');
        $this->db->from('commande');
        $this->db->where('valid_client_cmd IS NOT NULL');
        $this->db->where('date_valid_client IS NOT NULL');
        $this->db->where('id_four_delete_cmd IS NULL');
        $query = $this->db->get();
        return $query->row();
    }
    public function listesCommandes(){
        $this->db->select('id_cmd, code_cmd, cmd.quantite, totalPrix, cl.username, f.nom_four, p.prod, p.promo, cmd.date_valid_four');
        $this->db->from('commande as cmd');
        $this->db->join('client as cl', 'cl.id_client = cmd.id_client');
        $this->db->join('fournisseur as f', 'f.id_four = cmd.id_four');
        $this->db->join('produit as p', 'p.id_prod = cmd.id_prod');
        $this->db->where('cmd.date_valid_client is not null');
        $this->db->where('cmd.date_delete_cmd is null');
        $query = $this->db->get();
        return $query->result();
    }
    public function listesProduits(){
        $this->db->select('COUNT(id_prod ) as prod');
        $this->db->from('produit');
        $this->db->where('date_delete IS NULL');
        $query = $this->db->get();
        return $query->row();
    }
    public function quantiteStock(){
        $this->db->select('SUM(quantite ) as quantite');
        $this->db->from('produit');
        $this->db->where('date_delete IS NULL');
        $query = $this->db->get();
        return $query->row();
    }
    public function getListesClients(){
        $this->db->select('id_client, nom, adresse, telephone, email, genre, username, password, date_inscrit');
        $this->db->from('client');
        $query = $this->db->get();
        return $query->result();
    }


    /** Commande */
    public function countCommandeEnAttend(){
        $this->db->select('COUNT(code_cmd) as totalCmd');
        $this->db->from('commande as cmd');
        //$this->db->join('boutiques as b', 'b.id_boutique = cmd.id_four');
        $this->db->where('cmd.valid_client_cmd is not null');
        $this->db->where('cmd.date_valid_client is not null');
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

    public function getAllCommande(){
        $this->db->select('prod, code_cmd, id_cmd, totalPrix, prix, prix_promo, promo, date_cmd, nom, cl.telephone, email, adresse, cmd.quantite, cmd.valid_four_cmd, cmd.date_valid_four');
        $this->db->from('commande as cmd');
        $this->db->join("produit as p", "cmd.id_prod = p.id_prod");
        $this->db->join("client as cl", "cmd.id_client = cl.id_client");
        $this->db->where('cmd.valid_client_cmd is not null');
        $this->db->where('cmd.date_valid_client is not null');
        $this->db->where('cmd.valid_four_cmd is null');
        $this->db->where('cmd.date_valid_four is null');
        $this->db->where('date_delete_cmd is null');
        $this->db->where('p.date_delete is null');
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else {
            return false;
        }
    }
}