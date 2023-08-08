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

    /** liste boutique */
    public function record_count() {
        $this->db->select ( 'COUNT(*) AS `numrows`' );
        $this->db->where('id_admin_valid is not null');
        $this->db->where('date_valid is not null');
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');
        $query = $this->db->get ( 'boutiques' );
        return $query->row ()->numrows;
    }
    public function getAllBoutiques($limit, $start) {
        $this->db->select("code_boutique, nom_boutique, logo_boutique");
        $this->db->limit($limit, $start);

        $this->db->where('id_admin_valid is not null');
        $this->db->where('date_valid is not null');
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');

        $this->db->order_by('date_valid', 'desc');
        $query = $this->db->get("boutiques");



        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;
    }

    public function getIdBoutique($token){
        $this->db->select('id_boutique');
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

    public function addOtp($data, $email){
        $this->db->where('email_gerant', $email );
        $this->db->update('boutiques', $data);
        return true;
    }

    public function supprimerBoutiques($email){
        $this->db->where('email_gerant', $email);
        $this->db->delete('boutiques');
        return true;
    }

    public function verificationOtp($code, $email){
        $this->db->from('boutiques');
        $this->db->where('otp', $code);
        $this->db->where('email_gerant', $email);
        $this->db->where('id_admin_valid is null');
        $this->db->where('date_valid is null');
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}