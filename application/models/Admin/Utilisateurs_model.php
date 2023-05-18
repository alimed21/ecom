<?php


class Utilisateurs_model extends CI_Model
{
    public function addUser($data)
    {
        $this->db->insert('utilisateur', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function getAllUser()
    {
        $this->db->select('id_user, username, email, u.code_boutique, date_inscrit, nom_boutique, u.id_admin_valid, u.date_valid');
        $this->db->from('utilisateur as u');
        $this->db->join('boutiques as bou', 'u.id_boutique = bou.id_boutique');
        $this->db->where('u.id_admin_delete is null');
        $this->db->where('u.date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllUserByShop($bou){
        $this->db->select('id_user, username, email, u.code_boutique, date_inscrit, nom_boutique, u.id_admin_valid, u.date_valid, u.id_admin_delete, u.date_delete');
        $this->db->from('utilisateur as u');
        $this->db->join('boutiques as bou', 'u.id_boutique = bou.id_boutique');
        $this->db->where('u.id_boutique', $bou);
        $this->db->where('u.id_admin_delete is null');
        $this->db->where('u.date_delete is null');
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

    public function countUsersByBoutique($id){
        $this->db->select('COUNT(id_user) as users');
        $this->db->from('utilisateur as u');
        $this->db->join('boutiques as bou', 'u.id_boutique = bou.id_boutique');
        $this->db->where('u.id_boutique', $id);
        $this->db->where('u.id_admin_delete is null');
        $this->db->where('u.date_delete is null');
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $row = $query->row();
            return $row->users;
        }
        else
        {
            return false;
        }
    }

    public function getAllUserBlock(){
        $this->db->select('id_user, username, email, u.code_boutique, date_inscrit, nom_boutique, u.date_delete, ad.login_admin');
        $this->db->from('utilisateur as u');
        $this->db->join('boutiques as bou', 'u.id_boutique = bou.id_boutique');
        $this->db->join('admin as ad', 'u.id_admin_delete = ad.id_admin');
        $this->db->where('u.id_admin_delete is not null');
        $this->db->where('u.date_delete is not null');
        $query = $this->db->get();
        return $query->result();
    }
    public function suppressionUtilisateur($id, $data)
    {
        $this->db->where('id_user', $id );
        $this->db->update('utilisateur', $data);
        return true;
    }

    public function validUtilisateur($id, $data)
    {
        $this->db->where('id_user', $id );
        $this->db->update('utilisateur', $data);
        return true;
    }
    public function debloquerUtilisateur($id, $data)
    {
        $this->db->where('id_user', $id );
        $this->db->update('utilisateur', $data);
        return true;
    }

    public function getNomUser($id){
        $this->db->select('username');
        $this->db->from('utilisateur');
        $this->db->where('id_user', $id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $row = $query->row();
            return $row->username;
        }
        else
        {
            return false;
        }
    }

    public function annulerValidation($id, $data2){
        $this->db->where('id_user', $id );
        $this->db->update('utilisateur', $data2);
        return true;
    }

    public function verificationUtilisateurs($id){
        $this->db->from('utilisateur as u');
        $this->db->where('u.id_user', $id);
        $this->db->where('u.id_admin_valid is not null');
        $this->db->where('u.date_valid is not null');
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}