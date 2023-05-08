<?php

class Utilisateurs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin/Produit_model");
        $this->load->model("Admin/Login_model");
        $this->load->model('Admin/Categories_model');
        $this->load->model('Admin/Utilisateurs_model');
        $this->load->model('Admin/Boutiques_model');
        $this->load->model('Admin/Commande_model');
        $this->load->library('form_validation');
        $this->load->helper('string');
        if(!$this->session->userdata('id_user'))
        {
            redirect('Admin/Login');
        }
    }

    function getDatetimeNow()
    {
        $tz_object = new DateTimeZone('Africa/Djibouti');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y-m-d');
    }

    public function index(){
        /** Count commande */
        $boutique = $this->session->userdata('id_boutique');
        $countCommandes = $this->Commande_model->countCommande($boutique);
        $data['countCommandes'] = $countCommandes;

        /** Titre */
        $titreAffiche = 'Liste des utilisateurs';
        $data['titreAffiche'] = $titreAffiche;

        /** liste des utilisateurs */
        $listesUtilisateurs = $this->Utilisateurs_model->getAllUserByShop($boutique);
        $data['listesUtilisateurs'] = $listesUtilisateurs;

        $this->load->view('utilisateur/templates/header_view', $data);
        $this->load->view('utilisateur/pages/listeUtilisateurs_view', $data);
        $this->load->view('utilisateur/templates/footer_view');
    }

    public function ajouterUtilisateur(){
        $boutique = $this->session->userdata('id_boutique');
        /** vérification boutique */
        $verifieBoutique = $this->verificationBoutique($boutique);
        $data['verifieBoutique'] = $verifieBoutique;
        /** Count commande */
        $countCommandes = $this->Commande_model->countCommande($boutique);
        $data['countCommandes'] = $countCommandes;
        /** Titre */
        $titreAffiche = 'Ajouter un utilisateur';
        $data['titreAffiche'] = $titreAffiche;

        $this->load->view('utilisateur/templates/header_view', $data);
        $this->load->view('utilisateur/pages/ajoutUtilisateur_view', $data);
        $this->load->view('utilisateur/templates/footer_view');
    }

    public function verificationBoutique($idBou){
        /** Count numbers users */
        $countUsers = $this->Utilisateurs_model->countUsersByBoutique($idBou);

        if($countUsers == 2) {
            /** Count numbers users */
            $etatBoutique = $this->Boutiques_model->etatBoutique($idBou);

            if ($etatBoutique == 0) {
                return false;
            }
            else {
                return true;
            }
        }
        else {
            return true;
        }
    }


    public function verificationAjout(){
        $this->form_validation->set_rules('username', "nom d'utilisateur", 'trim|required|is_unique[utilisateur.username]');
        $this->form_validation->set_rules('password', 'mot de passe ', 'trim|required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('cnfpass', 'confirmation du mot de passe ', 'trim|required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('adrmail', 'adresse électronique ', 'trim|required|valid_email|is_unique[utilisateur.email]');

        if ($this->form_validation->run() == true)
        {
            //True
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email    = $this->input->post('adrmail');
            $cnfpass  = $this->input->post('cnfpass');
            $id       = $this->session->userdata('id_boutique');
            $code     = $this->session->userdata('code_boutique');
            $date_add = $this->getDatetimeNow();

            if($password == $cnfpass){
                $data = array(
                    'username'          => $username,
                    'password'          => password_hash($password, PASSWORD_BCRYPT),
                    'email '            => $email,
                    'code_boutique'     => $code,
                    'id_boutique'       => $id,
                    'date_inscrit'      => $date_add
                );

                $inscriptionUser = $this->Utilisateurs_model->addUser($data);

                if ($inscriptionUser = true)
                {
                    $this->session->set_flashdata('success', 'Utilisateur créer avec succès.');
                    redirect('Admin/Utilisateurs');
                }
                else{
                    $this->session->set_flashdata('error', 'Veuillez réessayer une erreur s\'est produit.');
                    redirect('Admin/Utilisateurs/ajouterUtilisateur/');
                }
            }else{
                $this->session->set_flashdata('error', 'les deux mot de passe ne sont pas identiques.');
                redirect('Admin/Utilisateurs/ajouterUtilisateur/');
            }
        }
        else{
            $this->ajouterUtilisateur();
        }
    }
}