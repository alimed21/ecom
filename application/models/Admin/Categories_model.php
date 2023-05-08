<?php


class Categories_model extends CI_Model
{
    public function addCategorie($data)
    {
        $this->db->insert('categorieproduit', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function getAllCategories(){
        $this->db->select('id_cate, cate, date_add, login_admin');
        $this->db->from('categorieproduit');
        $this->db->join('admin as ad', 'categorieproduit.id_admin_add = ad.id_admin');
        $this->db->where('date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }
    public function getDetailCategorie($id){
        $this->db->select('id_cate, cate');
        $this->db->from('categorieproduit');
        $this->db->where('id_cate', $id);
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
    public function updateCate($data, $id){
        $this->db->where('id_cate', $id );
        $this->db->update('categorieproduit', $data);
        return true;
    }
    public function deleteCategorie($data, $id){
        $this->db->where('id_cate', $id );
        $this->db->update('categorieproduit', $data);
        return true;
    }
    /** Sous-categorie */
    public function addSousCategorie($data){
        $this->db->insert('sscategorie', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function getAllSousCategories(){
        $this->db->select('id_ss_cate, titre_ss_cate, cate, ssc.date_add, login_admin');
        $this->db->from('sscategorie as ssc');
        $this->db->join('categorieproduit as cat', 'ssc.id_cate = cat.id_cate');
        $this->db->join('admin as ad', 'ssc.id_admin_add = ad.id_admin');
        $this->db->where('ssc.date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }
    public function deleteSousCategorie($data, $id){
        $this->db->where('id_ss_cate', $id );
        $this->db->update('sscategorie', $data);
        return true;
    }
    public function getDetailSousCategories($id_sscate){
        $this->db->select('id_ss_cate, titre_ss_cate');
        $this->db->from('sscategorie as ssc');
        $this->db->where('id_ss_cate', $id_sscate);
        $this->db->where('ssc.date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }
    public function updateSousCategorie($data, $id)
    {
        $this->db->where('id_ss_cate', $id );
        $this->db->update('sscategorie', $data);
        return true;
    }
}