<?php


class Clients_model extends CI_Model
{
    public function addUser($data){
        $this->db->insert('client', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function loginClient($username, $password){
        $this->db->select('id_client, username, email');
        $this->db->from('client');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
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
    public function infoClient($idClient){
        $this->db->select('nom');
        $this->db->from('client');
        $this->db->where('id_client', $idClient);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }
}