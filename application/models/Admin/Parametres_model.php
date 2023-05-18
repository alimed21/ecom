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

    public function getInfoProfil($id_user){
        $this->db->select('nom_complet, adresse, telephone, photo, p.date_add, u.email, u.username');
        $this->db->from('profil_user as p');
        $this->db->join('utilisateur as u', 'u.id_user = p.id_user');
        $this->db->where('p.id_user', $id_user);

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

    public function addProfile($data){
        $this->db->insert('profil_user', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}