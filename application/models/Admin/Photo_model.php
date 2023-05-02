<?php


class Photo_model extends CI_Model
{
    public function getInfoAdmin($id_admin)
    {
        $this->db->select('login_admin');
        $this->db->from('administrateur');
        $this->db->where('id_admin', $id_admin);

        $query = $this->db->get();
        return $query->result();
    }

}