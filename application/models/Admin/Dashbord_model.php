<?php

class Dashbord_model extends CI_Model{
    public function totalVendu($idBou){
        $this->db->select('SUM(totalPrix) as totalVendu');
        $this->db->from('commande as cmd');
        $this->db->where('cmd.id_four', $idBou);
        $this->db->where('cmd.valid_client_cmd is not null');
        $this->db->where('cmd.date_valid_client is not null');
        $this->db->where('cmd.valid_four_cmd is not null');
        $this->db->where('cmd.date_valid_four is not null');
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
    
    public function totalClient($idBou){
        $this->db->select('COUNT(DISTINCT(id_client)) as totalClient');
        $this->db->from('commande as cmd');
        $this->db->where('cmd.id_four', $idBou);
        $this->db->where('cmd.valid_client_cmd is not null');
        $this->db->where('cmd.date_valid_client is not null');
        $this->db->where('cmd.valid_four_cmd is not null');
        $this->db->where('cmd.date_valid_four is not null');
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
    
     public function totalProduit($idBou, $promo){
        $this->db->select_sum('(prix * quantite)', 'totalProduit');
        $this->db->from('produit');
        $this->db->where('id_boutique', $idBou);
        $this->db->where('promo', $promo);
        $this->db->where('id_admin_valid is not null');
        $this->db->where('date_valid is not null');
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');
        $this->db->where('id_user_delete is null');
        $this->db->where('date_user_delete is null');
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else {
            return false;
        }
    }
     public function totalProduitPromo($idBou, $promo){
        $this->db->select_sum('(prix_promo * quantite)', 'totalProduitPromo');
        $this->db->from('produit');
        $this->db->where('id_boutique', $idBou);
        $this->db->where('promo', $promo);
        $this->db->where('id_admin_valid is not null');
        $this->db->where('date_valid is not null');
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');
        $this->db->where('id_user_delete is null');
        $this->db->where('date_user_delete is null');
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else {
            return false;
        }
    }
    
     public function totalVente($idBou){
        $this->db->select('COUNT(id_cmd) as totalVent');
        $this->db->from('commande as cmd');
        $this->db->where('cmd.id_four', $idBou);
        $this->db->where('cmd.valid_client_cmd is not null');
        $this->db->where('cmd.date_valid_client is not null');
        $this->db->where('cmd.valid_four_cmd is not null');
        $this->db->where('cmd.date_valid_four is not null');
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

    public function totalStock($idBou){
        $this->db->select('SUM(quantite) as totalstock');
        $this->db->from('produit');
        $this->db->where('id_boutique', $idBou);
        $this->db->where('id_admin_valid is not null');
        $this->db->where('date_valid is not null');
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');
        $this->db->where('id_user_delete is null');
        $this->db->where('date_user_delete is null');
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else {
            return false;
        }
    }

    public function totalStockVendu($idBou){
        $this->db->select('SUM(quantite) as totalstockvendu');
        $this->db->from('commande as cmd');
        $this->db->where('cmd.id_four', $idBou);
        $this->db->where('cmd.valid_client_cmd is not null');
        $this->db->where('cmd.date_valid_client is not null');
        $this->db->where('cmd.valid_four_cmd is not null');
        $this->db->where('cmd.date_valid_four is not null');
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

    public function commandeParMois($idBou){
        $this->db->select('COUNT(id_cmd) as totalCommandeMois');
        $this->db->from('commande');
        $this->db->where('id_four', $idBou);
        $this->db->where('MONTH(date_cmd)', date('m'));
        $this->db->where('YEAR(date_cmd)', date('Y'));
        $this->db->where('valid_client_cmd is not null');
        $this->db->where('date_valid_client is not null');
        $this->db->where('valid_four_cmd is not null');
        $this->db->where('date_valid_four is not null');
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

    public function commandesTotal($idBou){
        $this->db->select('COUNT(id_cmd) as totalCommande');
        $this->db->from('commande');
        $this->db->where('id_four', $idBou);
        $this->db->where('valid_client_cmd is not null');
        $this->db->where('date_valid_client is not null');
        $this->db->where('valid_four_cmd is not null');
        $this->db->where('date_valid_four is not null');
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

    public function listeCommande($idBou){
        $this->db->select('prod, code_cmd, id_cmd, totalPrix, prix, prix_promo, promo, date_cmd, nom, cl.telephone, email, adresse, cmd.quantite');
        $this->db->from('commande as cmd');
        $this->db->join("produit as p", "cmd.id_prod = p.id_prod");
        $this->db->join("client as cl", "cmd.id_client = cl.id_client");
        $this->db->where('cmd.id_four', $idBou);
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
