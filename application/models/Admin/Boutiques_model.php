<?php

class Boutiques_model extends CI_Model
{
    public function getAllBoutique()
    {
        $this->db->select('id_boutique, nom_boutique, tele_boutique, adr_boutique, nom_gerant_boutique, tele_gerant, email_gerant, patente_boutique, compte_bancaire, nom_banque, page_facebook, code_boutique, date_valid, id_admin_valid');
        $this->db->from('boutiques');
        $this->db->where('id_admin_delete is null');
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

    public function validBoutique($data, $token){
        $this->db->where('code_boutique', $token );
        $this->db->update('boutiques', $data);
        return true;
    }

    public function getEmail($token){
        $this->db->select('email_gerant');
        $this->db->from('boutiques');
        $this->db->where('code_boutique', $token);
        $this->db->where('id_admin_valid is not null');
        $this->db->where('date_valid is not null');
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $row = $query->row();
            return $row->email_gerant;
        }
        else
        {
            return false;
        }
    }

    public function supprimerBoutique($data, $token){
        $this->db->where('code_boutique', $token );
        $this->db->update('boutiques', $data);
        return true;
    }

    public function etatBoutique($id){
        $this->db->select('premium');
        $this->db->from('boutiques');
        $this->db->where('id_boutique', $id);
        $this->db->where('id_admin_valid is not null');
        $this->db->where('date_valid is not null');
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $row = $query->row();
            return $row->premium;
        }
        else
        {
            return false;
        }
    }
}