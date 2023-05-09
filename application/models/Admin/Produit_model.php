<?php


class Produit_model extends CI_Model
{
    public function addProduit($data){
        $this->db->insert('produit', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function othPhoto($filename, $token){
        $data = array(
            'token_post' => $token,
            'photo_name' => $filename,
            'date_add'   =>date('Y-m-d H:i:s')
        );
        $this->db->insert('photo_joint', $data);
    }
    public function getDetailProduit($idBoutique, $token){
        $this->db->select('id_prod, token, prod, prix, description, promo, prix_promo, date_prod, quantite');
        $this->db->from('produit as p');
        $this->db->where('p.id_boutique', $idBoutique);
        $this->db->where('p.token', $token);
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_admin_delete is null');
        $this->db->where('p.id_user_delete is null');
        $this->db->where('p.date_user_delete is null');
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
    public function getAllProduitByUser($idBoutique){
        $this->db->select('id_prod, token, prod, prix, description, image, promo, prix_promo, date_prod, username, titre_ss_cate, quantite, p.id_admin_valid, p.date_valid, p.date_delete, p.id_admin_delete');
        $this->db->from('produit as p');
        //$this->db->join('categorieproduit as c', 'produit.id_cate = c.id_cate');
        $this->db->join('sscategorie as ssc', 'p.id_sscate = ssc.id_ss_cate');
        $this->db->join('boutiques as b', 'b.id_boutique = p.id_boutique');
        $this->db->join('utilisateur as u', 'u.id_user = p.id_user_add');
        $this->db->where('p.id_boutique', $idBoutique);
        $this->db->where('p.id_user_delete is null');
        $this->db->where('p.date_user_delete is null');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllImages($idBoutique){
        $this->db->select('id_photo, token_post, photo_name');
        $this->db->from('photo_joint as ph');
        $this->db->join('produit as p', 'p.token = ph.token_post');
        $this->db->join('boutiques as bou', 'bou.id_boutique = p.id_boutique');
        $this->db->where('bou.id_boutique', $idBoutique);
        $this->db->where('p.id_boutique', $idBoutique);
        //Produit
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_admin_delete is null');
        //Photo joint
        $this->db->where('ph.date_delete is null');
        $this->db->where('ph.user_delete is null');
        //Boutique
        $this->db->where('bou.id_admin_delete is null');
        $this->db->where('bou.date_delete is null');

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

    public function validProduit($data, $token){
        $this->db->where('token', $token );
        $this->db->update('produit', $data);
        return true;
    }
    public function updateProduit($data, $token){
        $this->db->where('token', $token );
        $this->db->update('produit', $data);
        return true;
    }

    public function desactiveProduit($data, $token){
        $this->db->where('token', $token );
        $this->db->update('produit', $data);
        return true;
    }

    public function updateImageProduit($data, $token){
        $this->db->where('token', $token );
        $this->db->update('produit', $data);
        return true;
    }
    /** Count **/
    public function countAllProduitByFournisseur($idFour){
        $this->db->select('SUM(quantite) as prod');
        $this->db->from('produit');
        $this->db->where('id_fournisseur', $idFour);
        $this->db->where('date_delete IS NULL');
        $query = $this->db->get();
        return $query->result();
    }
    public function countAllCategorieProduitByFournisseur($idFour){
        $this->db->select('COUNT(DISTINCT(id_sscate)) as cate');
        $this->db->from('produit');
        $this->db->where('id_fournisseur', $idFour);
        $this->db->where('id_user_delete IS NULL');
        $this->db->where('date_delete IS NULL');
        $query = $this->db->get();
        return $query->result();
    }
    public function getLast5Produit($idFour){
        $this->db->select('id_prod, prod, prix, token, date_prod, quantite');
        $this->db->from('produit');
        $this->db->join('sscategorie as ssc', 'produit.id_sscate = ssc.id_ss_cate');
        $this->db->join('utilisateur as u', 'u.id_user = produit.id_user_add');
        $this->db->where('id_fournisseur', $idFour);
        $this->db->where('produit.date_delete is null');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result();
    }
    public function countAllPrixByProduitByFournisseur($idFour){
        $this->db->select('SUM(totalPrix) as prix');
        $this->db->from('commande');
        $this->db->where('id_four', $idFour);
        $this->db->where('date_valid_client IS NOT NULL');
        $this->db->where('date_valid_four IS NOT NULL');
        $this->db->where('date_delete_cmd IS NULL');
        $query = $this->db->get();
        return $query->row();
    }
    public function countAllQuantiteByProduitByFournisseur($idFour){
        $this->db->select('SUM(quantite) as quantite');
        $this->db->from('produit');
        $this->db->where('id_fournisseur', $idFour);
        $this->db->where('date_delete IS NULL');
        $query = $this->db->get();
        return $query->row();
    }
    public function countAllProduitByProduitByFournisseur($idFour){
        $this->db->select('COUNT(id_prod) as prod');
        $this->db->from('produit');
        $this->db->where('id_fournisseur', $idFour);
        $this->db->where('date_delete IS NULL');
        $query = $this->db->get();
        return $query->row();
    }
    public function countAllPrixPromo($idFour, $promo){
        $this->db->select('SUM(prix) as prix');
        $this->db->from('produit');
        $this->db->where('id_fournisseur', $idFour);
        $this->db->where('promo', $promo);
        $this->db->where('date_delete IS NULL');
        $query = $this->db->get();
        return $query->row();
    }
    public function countAllQuantitePromo($idFour, $promo){
        $this->db->select('SUM(quantite) as quantite');
        $this->db->from('produit');
        $this->db->where('id_fournisseur', $idFour);
        $this->db->where('promo', $promo);
        $this->db->where('date_delete IS NULL');
        $query = $this->db->get();
        return $query->row();
    }
    public function countAllProduitPromo($idFour, $promo){
        $this->db->select('COUNT(id_prod) as prod');
        $this->db->from('produit');
        $this->db->where('id_fournisseur', $idFour);
        $this->db->where('promo', $promo);
        $this->db->where('date_delete IS NULL');
        $query = $this->db->get();
        return $query->row();
    }
    public function countAllClientByFour($idFour){
        $this->db->select('COUNT(DISTINCT(id_client)) as nbreClient');
        $this->db->from('commande');
        $this->db->where('id_four', $idFour);
        $query = $this->db->get();
        return $query->row();
    }
    public function countStockHomme($idFour, $Homme){
        $this->db->select('COUNT(id_prod) as prod');
        $this->db->from('produit');
        $this->db->join('sscategorie as ssc', 'produit.id_sscate = ssc.id_ss_cate');
        $this->db->where('id_fournisseur', $idFour);
        $this->db->where('ssc.id_cate', $Homme);
        $this->db->where('ssc.date_delete IS NULL');
        $this->db->where('produit.date_delete IS NULL');
        $query = $this->db->get();
        return $query->row();
    }
    public function countStockFemme($idFour, $Femme){
        $this->db->select('COUNT(id_prod) as prod');
        $this->db->from('produit');
        $this->db->join('sscategorie as ssc', 'produit.id_sscate = ssc.id_ss_cate');
        $this->db->where('id_fournisseur', $idFour);
        $this->db->where('ssc.id_cate', $Femme);
        $this->db->where('ssc.date_delete IS NULL');
        $this->db->where('produit.date_delete IS NULL');
        $query = $this->db->get();
        return $query->row();
    }
    public function countStockEnfant($idFour, $Enfant){
        $this->db->select('COUNT(id_prod) as prod');
        $this->db->from('produit');
        $this->db->join('sscategorie as ssc', 'produit.id_sscate = ssc.id_ss_cate');
        $this->db->where('id_fournisseur', $idFour);
        $this->db->where('ssc.id_cate', $Enfant);
        $this->db->where('ssc.date_delete IS NULL');
        $this->db->where('produit.date_delete IS NULL');
        $query = $this->db->get();
        return $query->row();
    }
    public function countStockAutre($idFour, $Autre){
        $this->db->select('COUNT(id_prod) as prod');
        $this->db->from('produit');
        $this->db->join('sscategorie as ssc', 'produit.id_sscate = ssc.id_ss_cate');
        $this->db->where('id_fournisseur', $idFour);
        $this->db->where('ssc.id_cate', $Autre);
        $this->db->where('ssc.date_delete IS NULL');
        $this->db->where('produit.date_delete IS NULL');
        $query = $this->db->get();
        return $query->row();
    }

    public function getlastProduit($id){
        $this->db->select('id_prod, prod, description, date_prod, username, image');
        $this->db->from('produit as p');
        $this->db->join('utilisateur as u', 'u.id_user = p.id_user_add');
        $this->db->where('p.id_boutique', $id);
        $this->db->where('p.date_delete is null');
        $this->db->where('p.id_admin_delete is null');
        $this->db->where('p.id_user_delete is null');
        $this->db->where('p.date_user_delete is null');
        $this->db->limit(5);
        $this->db->order_by("date_prod", "desc");

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