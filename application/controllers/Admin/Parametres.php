<?php


class Parametres extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin/Produit_model");
        $this->load->model("Admin/Boutiques_model");
        $this->load->model("Admin/Login_model");
        $this->load->model('Admin/Categories_model');
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
        $titreAffiche = 'Paramètres';
        $data['titreAffiche'] = $titreAffiche;

        $this->load->view('utilisateur/templates/header_view', $data);
        $this->load->view('utilisateur/pages/parametres_view', $data);
        $this->load->view('utilisateur/templates/footer_view');
    }

    /** Mot de passe */
    public function motPasse(){
        /** Count commande */
        $boutique = $this->session->userdata('id_boutique');
        $countCommandes = $this->Commande_model->countCommande($boutique);
        $data['countCommandes'] = $countCommandes;

        /** Titre */
        $titreAffiche = 'Modifier votre mot de passe';
        $data['titreAffiche'] = $titreAffiche;

        $this->load->view('utilisateur/templates/header_view', $data);
        $this->load->view('utilisateur/pages/modificationMotPasse_view', $data);
        $this->load->view('utilisateur/templates/footer_view');
    }

    public function modificationMotPasse()
    {
        $this->form_validation->set_rules('ancienpass', 'ancien mot de passe', 'trim|required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('nouveaupass', 'nouveau mot de passe', 'trim|required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('cnfpass', 'confirmation du nouveau mot de passe ', 'trim|required|min_length[8]|max_length[20]');

        if ($this->form_validation->run() == true)
        {
            $id = $this->session->userdata('id_user');

            $password = $this->input->post('ancienpass');
            $nouveaupass = $this->input->post('nouveaupass');
            $cnfpass    =  $this->input->post('cnfpass');

            $verifiePassword = $this->Login_model->verifyPassword($id, $password);

            if($verifiePassword == true)
            {
                if($nouveaupass == $cnfpass)
                {
                    $data = array(
                        'password' => password_hash($nouveaupass, PASSWORD_BCRYPT)
                    );

                    $nouveauPass = $this->Login_model->changerMotPasse($data, $id);

                    if ($nouveauPass = true)
                    {
                        $action = "Modification mot de passe ".$id;
                        $this->histoirque($action);
                        redirect('Admin/Login/logout');
                    }
                    else{
                        $this->session->set_flashdata('error', 'Veuillez réessayer.');
                        redirect('Parametres/changerMotPasse');
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Les deux mots de passe ne sont pas identiques.');
                    redirect('Parametres/changerMotPasse');
                }
            }
            else{
                $this->session->set_flashdata('error', 'Votre ancien mot de passe est incorrect.');
                redirect('Parametres/changerMotPasse');
            }
        }
        else{
            $this->motPasse();
        }
    }

    /** INformation boutique */
    public function informationBoutique(){
        $id_four = $this->session->userdata('id_four');
        /** Count commande */
        $countCommandes = $this->Commande_model->countCommande($id_four);
        $data['countCommandes'] = $countCommandes;
        $informations = $this->Parametres_model->getInformationBoutique($id_four);
        $data["informations"] = $informations;

        $this->load->view('user/templates/header_view', $data);
        $this->load->view('user/pages/modifierInformationBoutique_view', $data);
        $this->load->view('user/templates/footer_view');
    }

    public function verificationBoutique(){
        $this->form_validation->set_rules('nom', "nom du fournisseur", 'trim|required');
        $this->form_validation->set_rules('adresse', 'adresse du fournisseur ', 'trim|required');
        $this->form_validation->set_rules('tele', 'téléphone du fournisseur', 'trim|required');
        $this->form_validation->set_rules('email', 'email ', 'trim|required|valid_email');

        if ($this->form_validation->run() == true)
        {
            //True
            $nom = $this->input->post('nom');
            $adresse = $this->input->post('adresse');
            $tele    = $this->input->post('tele');
            $email = $this->input->post('email');
            $id_four = $this->session->userdata('id_four');
            $id_user = $this->session->userdata('id_user');


            $data = array(
                'nom_four' => $nom,
                'adresse_four' => $adresse,
                'telephone_four '   => $tele,
                'adr_email' => $email
            );

            $updateFournisseur = $this->Parametres_model->updateFournisseur($data, $id_four);

            if ($updateFournisseur == true)
            {;
                $action = "Modification des information de la boutique n° ".$id_four." par l'utilisateur ".$id_user;
                $this->histoirque($action);
                $this->session->set_flashdata('sucess', "modification des informations de votre boutique a bien été enregistré");
                redirect('Admin/Parametres/informationBoutique');
            }
            else{
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Admin/Parametres/informationBoutique');
            }
        }
        else{
            $this->informationBoutique();
        }
    }

    /** Historique */
    public function histoirque($action)
    {
        $data = array(
            'id_user' =>$this->session->userdata('id_user'),
            'action' => $action,
            'date_his' =>$this->getDatetimeNow()
        );
        $this->Login_model->log_manager($data);
    }
}