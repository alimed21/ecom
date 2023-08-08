<?php
/**
 *
 */
class Login_model extends CI_Model
{
    public function can_login($username, $password)
    {
        $this->db->select('id_user, username, password, email, u.id_boutique, u.code_boutique, nom_boutique');
        $this->db->from('utilisateur as u');
        $this->db->join('boutiques as b', 'b.code_boutique = u.code_boutique');
        $this->db->where('username', $username);
        $this->db->where('b.id_admin_valid is not null');
        $this->db->where('b.date_valid is not null');
        $this->db->where('b.id_admin_delete is null');
        $this->db->where('b.date_delete is null');
        $this->db->where('u.id_admin_valid is not null');
        $this->db->where('u.date_valid is not null');
        $this->db->where('u.id_admin_delete is null');
        $this->db->where('u.date_delete is null');
        $this->db->limit(1);

        $query = $this->db->get();

        $row = $query->row();
        if($row != Null){
            if (password_verify($password,$row->password)) {
                return $query->result();
            } else {
                return false;
            }
        }
        else{
            return false;
        }
    }

    public function historyUser($iduser){
        $this->db->select('id_his, action_user, his_color, date_his');
        $this->db->from('his_user');
        $this->db->where('id_user', $iduser);
        $this->db->order_by("date_his", "desc");

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

    public function historyUser2($iduser){
        $this->db->select('id_his, action_user, his_color, date_his');
        $this->db->from('his_user');
        $this->db->where('id_user', $iduser);
        $this->db->order_by("date_his", "desc");
        $this->db->limit(5);

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

    public function verifyPassword($id, $password){
        $this->db->select('password');
        $this->db->from('utilisateur as u');

        $this->db->where('u.id_user', $id);

        $this->db->where('u.id_admin_valid is not null');
        $this->db->where('u.date_valid is not null');
        $this->db->where('u.id_admin_delete is null');
        $this->db->where('u.date_delete is null');
        $this->db->limit(1);

        $query = $this->db->get();

        $row = $query->row();
        if($row != Null){
            if (password_verify($password,$row->password)) {
                return true;
            } else {
                return false;
            }
        }
        else{
            return false;
        }
    }

    public function changerMotPasse($data, $id){
        $this->db->where('id_user', $id );
        $this->db->update('utilisateur', $data);
        return true;
    }

    public function can_loginAdmin($username, $pass){
        $this->db->select('id_admin, login_admin, email_admin');
        $this->db->from('admin');
        $this->db->where('login_admin', $username);
        $this->db->where('password', $pass);
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
    public function findEmail($email)
    {
        $this->db->select('email');
        $this->db->from('utilisateur');
        $this->db->where('email', $email);
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
    public function resetPassword($data, $email)
    {
        $this->db->where('email', $email);
        $this->db->update('utilisateur', $data);
        return true;
    }
    public function updatePassword($data, $token)
    {
        $this->db->where('password', $token);
        $this->db->update('utilisateur', $data);
        return true;
    }

    public function log_manager_user($data){
        $this->db->insert('his_user', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function log_manager($data)
    {
        $this->db->insert('historique_emarcher', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}


?>
