<?php


class Parametres_model extends CI_Model
{
    public function updateLogo($data, $id_four){
        $this->db->where('id_four', $id_four );
        $this->db->update('fournisseur', $data);
        return true;
    }
    public function getLogo($idfour){
        $this->db->select('logo_four');
        $this->db->from('fournisseur');
        $this->db->where('id_four', $idfour);
        $this->db->where("date_delete_four is null");

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
    public function getInformationBoutique($id_four){
        $this->db->select('*');
        $this->db->from('fournisseur');
        $this->db->where('id_four', $id_four);
        $this->db->where("date_delete_four is null");

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
    public function updateFournisseur($data, $id_four){
        $this->db->where('id_four', $id_four );
        $this->db->update('fournisseur', $data);
        return true;
    }
}