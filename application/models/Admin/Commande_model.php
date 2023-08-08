<?php


class Commande_model extends CI_Model
{
    public function countCommande($idFour){
        $this->db->select('COUNT(code_cmd) as totalCmd');
        $this->db->from('commande as cmd');
        $this->db->where('cmd.id_four', $idFour);
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
    public function getAllCommande($idFour){
        $this->db->select('prod, code_cmd, id_cmd, totalPrix, prix, prix_promo, promo, date_cmd, nom, cl.telephone, email, adresse, cmd.quantite');
        $this->db->from('commande as cmd');
        $this->db->join("produit as p", "cmd.id_prod = p.id_prod");
        $this->db->join("client as cl", "cmd.id_client = cl.id_client");
        $this->db->where('cmd.id_four', $idFour);
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
    public function validCmd($data, $idFour, $code_cmd){
        $this->db->where('id_four', $idFour );
        $this->db->where('valid_four_cmd is null');
        $this->db->where('date_valid_four is null');
        $this->db->where('date_delete_cmd is null');
        $this->db->where('code_cmd', $code_cmd);
        $this->db->update('commande', $data);
        return true;
    }
    public function rejetCmd($idFour, $code_cmd, $data){
        $this->db->where('id_four', $idFour);
        $this->db->where('code_cmd', $code_cmd);
        $this->db->update('commande', $data);
        return true;
    }
    public function countCommandeGenreHomme($homme, $idFour)
    {
        $this->db->select('COUNT(cl.id_client) as sexe');
        $this->db->from('commande as cmd');
        $this->db->join("client as cl", "cmd.id_client = cl.id_client");
        $this->db->where('id_four', $idFour);
        $this->db->where('genre', $homme);
        $query = $this->db->get();
        return $query->row();
    }
    public function countCommandeGenreFemme($femme, $idFour)
    {
        $this->db->select('COUNT(cl.id_client) as sexe');
        $this->db->from('commande as cmd');
        $this->db->join("client as cl", "cmd.id_client = cl.id_client");
        $this->db->where('id_four', $idFour);
        $this->db->where('genre', $femme);
        $query = $this->db->get();
        return $query->row();
    }
    public function QuantiteCmd($code_cmd){
        $this->db->select('quantite, id_prod');
        $this->db->from('commande as cmd');
        $this->db->where('code_cmd', $code_cmd);
        $query = $this->db->get();
        return $query->result();
    }
    public function QuantiteAActuel($id_prod){
        $this->db->select('quantite');
        $this->db->from('produit');
        $this->db->where('id_prod', $id_prod);
        $query = $this->db->get();
        return $query->result();
    }
    public function quantiteAJour($id_prod, $data){
        $this->db->where('id_prod', $id_prod);
        $this->db->update('produit', $data);
        return true;
    }

    public function countCommandeParMois()
    {
        $this->db->select('COUNT(id_cmd) as count, DATE_FORMAT(date_cmd,"%m") as month');
        $this->db->from('commande');
        $this->db->where('valid_client_cmd is not null');
        $this->db->where('date_valid_client is not null');
        $this->db->where('date_delete_cmd is null');
        $this->db->where('id_four_delete_cmd is null');
        $this->db->group_by('DATE_FORMAT(date_cmd,"%m")');
        $query = $this->db->get();
        return $query->result();
    }

    
}