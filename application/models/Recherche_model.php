<?php


class Recherche_model extends CI_Model
{
    // Select total records from articles
    public function record_count_produit($search_r) {
        $this->db->select ( 'COUNT(id_prod) AS `numrows`' );
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->where('p.id_admin_valid is not null');
        $this->db->where('p.date_valid is not null');
        $this->db->where('p.id_admin_delete is null');
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_user_delete is null');
        $this->db->where('p.date_user_delete is null');
        $this->db->where('ssc.id_admin_delete is null');
        $this->db->where('ssc.date_delete is null');
        $this->db->like('ssc.titre_ss_cate', $search_r);
        $query = $this->db->get ( 'produit as p' );
        return $query->row ()->numrows;
    }

    // Get total records from articles
    public function fetch_produit($search_r) {
        //$search = explode(" ", $search_r);
        $this->db->select("prod, token, image, date_prod, prix, promo, prix_promo");
        $this->db->join('sscategorie as ssc', 'produit.id_sscate = ssc.id_ss_cate');

        $this->db->where('produit.id_admin_valid is not null');
        $this->db->where('produit.date_valid is not null');
        $this->db->where('produit.id_admin_delete is null');
        $this->db->where('produit.date_delete is null');
        $this->db->where('produit.id_user_delete is null');
        $this->db->where('produit.date_user_delete is null');

        $this->db->where('ssc.id_admin_delete is null');
        $this->db->where('ssc.date_delete is null');

        $this->db->like('ssc.titre_ss_cate', $search_r);

        $this->db->order_by('date_prod', 'desc');
        $query = $this->db->get("produit");

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;
    }
}