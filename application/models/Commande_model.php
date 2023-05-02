<?php


class Commande_model extends CI_Model
{
    public function insertCmd($data){
        $this->db->insert('commande', $data);
        return ($this->db->affected_rows() != 1) ? FALSE : TRUE;
    }
    public function getInfoPanier($idClient){
        $this->db->select('prod, code_cmd, id_cmd, prix_unitaire, cmd.quantite, totalPrix');
        $this->db->from('commande as cmd');
        $this->db->join("produit as p", "cmd.id_prod = p.id_prod");
        $this->db->where('cmd.id_client', $idClient);
        $this->db->where('cmd.valid_client_cmd is null');
        $this->db->where('cmd.date_valid_client is null');
        $this->db->where('date_delete_cmd is null');
        $this->db->where('p.date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }
    public function getHistoryPanier($idClient){
        $this->db->select('prod, code_cmd, id_cmd, prix, prix_promo, promo, date_cmd');
        $this->db->from('commande as cmd');
        $this->db->join("produit as p", "cmd.id_prod = p.id_prod");
        $this->db->where('cmd.id_client', $idClient);
        $this->db->where('cmd.valid_client_cmd is not null');
        $this->db->where('cmd.date_valid_client is not null');
        $this->db->where('date_delete_cmd is null');
        $this->db->where('p.date_delete is null');
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else{
            return false;
        }
    }
    public function totalPrixCommande($idclient){
        $this->db->select('sum(totalPrix) as totalprix');
        $this->db->from('commande');
        $this->db->where('id_client', $idclient);
        $this->db->where('valid_client_cmd is null');
        $this->db->where('date_valid_client is null');
        $this->db->where('date_delete_cmd is null');
        $query = $this->db->get();
        return $query->row();
    }
    public function validCmd($data, $idclient){
        $this->db->where('id_client', $idclient );
        $this->db->where('valid_client_cmd is null');
        $this->db->where('date_valid_client is null');
        $this->db->where('date_delete_cmd is null');
        $this->db->update('commande', $data);
        return true;
    }
    public function rejetCmd($idClient, $code_cmd){
        $this->db->where('id_client', $idClient);
        $this->db->where('code_cmd', $code_cmd);
        $this->db->delete('commande');
        return true;
    }
}