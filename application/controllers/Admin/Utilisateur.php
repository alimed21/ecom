<?php


class Utilisateur extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin/Login_model");
        $this->load->model("Admin/Admin_model");
        $this->load->model("Admin/Utilisateurs_model");
        if(!$this->session->userdata('id_admin'))
        {
            redirect('Admin/LoginAdmin');
        }
    }

    function getDatetimeNow()
    {
        $tz_object = new DateTimeZone('Africa/Djibouti');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y-m-d H:i:s');
    }

    function getDateNow()
    {
        $tz_object = new DateTimeZone('Africa/Djibouti');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y-m-d');
    }

    /** Gestion des produits */
    public function index(){
        $listesUtilisateurs = $this->Utilisateurs_model->getAllUser();
        $data['listesUtilisateurs'] = $listesUtilisateurs;

        /** Titre */
        $titreAffiche = 'Liste des comptes';
        $data['titreAffiche'] = $titreAffiche;

        $countCommandeEnAttend = $this->Admin_model->countCommandeEnAttend();
        $data['countCommandeEnAttend'] = $countCommandeEnAttend;

        $this->load->view('administrateur/templates/header_view', $data);
        $this->load->view('administrateur/pages/listeUtilisateurs_view', $data);
        $this->load->view('administrateur/templates/footer_view');
    }

    public function Bloquer(){
        $listesUtilisateursBloquer = $this->Utilisateurs_model->getAllUserBlock();
        $data['listesUtilisateursBloquer'] = $listesUtilisateursBloquer;

        /** Titre */
        $titreAffiche = 'Liste des comptes bloqués';
        $data['titreAffiche'] = $titreAffiche;

        $countCommandeEnAttend =  $this->Admin_model->countCommandeEnAttend();
        $data['countCommandeEnAttend'] = $countCommandeEnAttend;

        $this->load->view('administrateur/templates/header_view', $data);
        $this->load->view('administrateur/pages/listeUtilisateursBloquer_view', $data);
        $this->load->view('administrateur/templates/footer_view');
    }

    public function validUtilisateur($id = null){
        if($id == null)
        {
            redirect("Admin/Utilisateur/");
        }
        else
        {
            $id_admin = $this->session->userdata('id_admin');
            $date_valid = $this->getDatetimeNow();

            $data = array(
                'id_admin_valid' => $id_admin,
                'date_valid' => $date_valid
            );

            $validUtilisateur = $this->Utilisateurs_model->validUtilisateur($id, $data);
            if($validUtilisateur == true)
            {
                $this->session->set_flashdata('success', 'Compte valider.');
                redirect("Admin/Utilisateur/");
            }
            else
            {
                $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
                redirect("Admin/Utilisateur");
            }
        }
    }

    public function supprimerUtilisateur($id = null)
    {
        if ($id == null) {
            redirect("Admin/Utilisateur/");
        } else {
            $id_admin = $this->session->userdata('id_admin');
            $date_delete = $this->getDatetimeNow();

            $data = array(
                'id_admin_delete' => $id_admin,
                'date_delete' => $date_delete
            );

            $supprimerUtilisateur = $this->Utilisateurs_model->suppressionUtilisateur($id, $data);
            if ($supprimerUtilisateur == true) {
                $this->session->set_flashdata('success', 'Utilisateur bloquer.');
                redirect("Admin/Utilisateur/");
            } else {
                $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
                redirect("Admin/Utilisateur/");
            }
        }
    }

    public function debloquerUtilisateur($id){
        if ($id == null) {
            redirect("Admin/Utilisateur/Bloquer");
        } else {
            $id_admin = NULL;
            $date_delete = NULL;

            $data = array(
                'id_admin_delete' => $id_admin,
                'date_delete' => $date_delete
            );

            $debloquerUtilisateur = $this->Utilisateurs_model->debloquerUtilisateur($id, $data);

            if ($debloquerUtilisateur == true) {

                /** Compte de l'utilisateur */
                $nomUser = $this->Utilisateurs_model->getNomUser($id);
                $date__time_delete = $this->getDateNow();

                /** Historique */
                $admin = $this->session->userdata('login_admin');
                $action = "L'administrateur ".$admin." à débloquer le compte ".$nomUser." le ".$date__time_delete;

                $hsitorique = $this->histoirque($action);

                if($hsitorique == true){

                    $data2 = array(
                        'id_admin_valid' => $id_admin,
                        'date_valid' => $date_delete
                    );

                    /** Annuler la validation du compte*/
                    $annulerValidation = $this->Utilisateurs_model->annulerValidation($id, $data2);

                    if($annulerValidation == true){
                        $this->session->set_flashdata('success', 'Utilisateur débloquer.');
                        redirect("Admin/Utilisateur/");
                    }
                    else{
                        $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
                        redirect("Admin/Utilisateur/Bloquer");
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
                    redirect("Admin/Utilisateur/Bloquer");
                }
            } else {
                $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
                redirect("Admin/Utilisateur/Bloquer");
            }
        }
    }

    /** Historique */
    public function histoirque($action)
    {
        $data = array(
            'id_user' =>$this->session->userdata('id_admin'),
            'action' => $action,
            'date_his' =>$this->getDatetimeNow()
        );
        $this->Login_model->log_manager($data);
    }
}