<?php


class Roles_model extends CI_Model
{
    public function addRole($data)
    {
        $this->db->insert('roles', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function getAllRoles()
    {
        $this->db->select('id_role, role, date_add, login_admin');
        $this->db->from('roles');
        $this->db->join('admin as ad', 'roles.id_admin_add = ad.id_admin');
        $this->db->where('date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }
    public function getDetailRole($id){
        $this->db->select('id_role, role');
        $this->db->from('roles');
        $this->db->where('id_role', $id);
        $this->db->where('date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }
    public function updateRole($data, $id){
        $this->db->where('id_role', $id );
        $this->db->update('roles', $data);
        return true;
    }
    public function deleteRole($data, $id){
        $this->db->where('id_role', $id );
        $this->db->update('roles', $data);
        return true;
    }
}