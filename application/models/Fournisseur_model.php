<?php


class Fournisseur_model extends CI_Model
{
    public function addFournisseur($data){
        $this->db->insert('fournisseur', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function record_count() {
        $this->db->select ( 'COUNT(id_four) AS `numrows`' );
        $this->db->where('date_delete_four is null');
        $this->db->where('date_valid is not null');
        $query = $this->db->get ( 'fournisseur' );
        return $query->row ()->numrows;
    }
    public function getAllFournisseurs($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('date_valid is not null');
        $this->db->where('date_delete_four is null');
        $this->db->order_by('date_add_four', 'desc');
        $query = $this->db->get("fournisseur");



        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;

    }
    public function record_countArticle($lien, $quantite)
    {
        $this->db->select ( 'COUNT(id_prod) AS `numrows`' );
        $this->db->join('fournisseur as fr', 'produit.id_fournisseur = fr.id_four');
        $this->db->where('fr.lien_four', $lien);
        $this->db->where("quantite != ", $quantite);
        $this->db->where('produit.date_delete is null');
        $this->db->where('fr.date_valid is not null');
        $this->db->where('fr.date_delete_four is null');
        $query = $this->db->get ( 'produit' );
        return $query->row ()->numrows;
    }
    public function getAllArticlesParFournisseurs($limit, $start, $lien, $quantite) {
        $this->db->limit($limit, $start);
        $this->db->join('fournisseur as fr', 'produit.id_fournisseur = fr.id_four');
        $this->db->where('fr.lien_four', $lien);
        $this->db->where("quantite != ", $quantite);
        $this->db->where('produit.date_delete is null');
        $this->db->where('date_valid is not null');
        $this->db->where('fr.date_valid is not null');
        $this->db->where('fr.date_delete_four is null');
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
    public function getDetailFournisseur($lien){
        $this->db->select('nom_four');
        $this->db->from('fournisseur');
        $this->db->where('lien_four', $lien);
        $this->db->where('date_delete_four is null');
        $query = $this->db->get();
        return $query->row();
    }
    /** Sliders */
    public function getAllSliders(){
        $this->db->select('id_slide, titre_slide, image_slide, token_slide');
        $this->db->from('slider');
        $this->db->where('date_delete is null');
        $query = $this->db->get();
        return $query->result();
    }
}