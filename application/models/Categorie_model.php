<?php

class Categorie_model extends CI_Model
{
    public function getAllCategorie(){
        $this->db->select('id_cate, cate');
        $this->db->from('categorieproduit');
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');
        $this->db->order_by("id_cate", "asc");

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

    public function getNameCategorie($nameCat){
        $this->db->from('categorieproduit');
        $this->db->where('cate', $nameCat);
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');

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

    public function getNameSsCategorie($nameSsCat){
        $this->db->from('sscategorie');
        $this->db->where('titre_ss_cate', $nameSsCat);
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');

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
    public function getIdCatH($catH){
        $this->db->select('id_cate');
        $this->db->from('categorieproduit');
        $this->db->where('cate', $catH);
        $this->db->where('id_admin_delete is null');
        $this->db->where('date_delete is null');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $row = $query->row();
            return $row->id_cate;
        }
        else
        {
            return false;
        }
    }

    public function getSSCatByCat($idH){
        $this->db->select('titre_ss_cate');
        $this->db->from('sscategorie');
        $this->db->where(' 	id_cate ', $idH);
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
}