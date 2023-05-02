<?php

class Boutiques_model extends CI_Model
{
    public function addBoutique($data){
        $this->db->insert('boutiques', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function verificationBoutique($token){
        $this->db->select('nom_boutique, id_boutique');
        $this->db->from('boutiques');
        $this->db->where('code_boutique', $token);
        $this->db->where('id_admin_valid is not null');
        $this->db->where('date_valid is not null');
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function addUser($data){
        $this->db->insert('utilisateur', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}