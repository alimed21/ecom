<?php


class Inscription extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Boutiques_model');
        $this->load->model('Clients_model');
        $this->load->model('Accueil_model');
        $this->load->library('form_validation');
        $this->load->helper('string');
    }

    function getDatetimeNow()
    {
        $tz_object = new DateTimeZone('Africa/Djibouti');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y-m-d');
    }

    public function index($token = null)
    {
        if ($token == null) {
            redirect("Erreur/erreur404_Boutique");
        } else {

            /** Vérification du token */
            $verificationBoutique = $this->Boutiques_model->verificationBoutique($token);
            $data['verificationBoutique'] = $verificationBoutique;

            if($verificationBoutique != false){
                /** Titre */
                $titreAffiche = 'Création du compte';
                $data['titreAffiche'] = $titreAffiche;

                /** Token */
                $codeBoutique = $token;
                $data['codeBoutique'] = $codeBoutique;

                /** Données de la boutique */
                foreach ($verificationBoutique as $bou){
                    $id = $bou->id_boutique;
                    $nom = $bou->nom_boutique;
                }

                $data['id'] = $id;
                $data['nom'] = $nom;

                $this->load->view('utilisateur/inscriptionUtilisateur_view', $data);
            }else{
                redirect("BoutiqueNonValid");
            }

        }
    }

    public function VerifyForm()
    {
        $this->form_validation->set_rules('username', "nom d'utilisateur", 'trim|required|is_unique[utilisateur.username]');
        $this->form_validation->set_rules('password', 'mot de passe ', 'trim|required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('cnfpass', 'confirmation du mot de passe ', 'trim|required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('adrmail', 'adresse électronique ', 'trim|required|valid_email|is_unique[utilisateur.email]');

        $code = $this->input->post('codeBoutique');

        if ($this->form_validation->run() == true)
        {
            //True
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email    = $this->input->post('adrmail');
            $cnfpass  = $this->input->post('cnfpass');
            $id       = $this->input->post('id');
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

                $inscriptionUser = $this->Boutiques_model->addUser($data);

                if ($inscriptionUser = true)
                {
                    redirect('Inscription/compteCreer');
                }
                else{
                    $this->session->set_flashdata('error', 'Veuillez réessayer une erreur s\'est produit.');
                    redirect('Inscription/index/'.$code);
                }
            }else{
                $this->session->set_flashdata('error', 'les deux mot de passe ne sont pas identiques.');
                redirect('Inscription/index/'.$code);
            }
        }
        else{
            $this->index($code);
        }
    }

    public function compteCreer()
    {
        /** Titre */
        $titreAffiche = 'Création du compte réussi';
        $data['titreAffiche'] = $titreAffiche;

        $this->load->view('boutiques/compteCreer_view', $data);
    }

    /*
     *  Client
     */

    public function client(){
        if(!$this->session->userdata('id_client')){
            $id_client = NULL;
        }
        else{
            $id_client = $this->session->userdata('id_client');
        }
        /** Count panier */
        $countPanier= $this->Accueil_model->countPanier($id_client);
        $data['countPanier'] = $countPanier;

        $titreAffiche = 'Inscription';
        $data['titreAffiche'] = $titreAffiche;

        $this->load->view('template/header_view', $data);
        $this->load->view('page/inscription_view', $data);
        $this->load->view('template/footer_view');
    }

    public function verificationInscription(){
        $this->form_validation->set_rules('username', "nom d'utilisateur", 'trim|required|is_unique[client.username]');
        $this->form_validation->set_rules('pass', 'mot de passe ', 'trim|required');
        $this->form_validation->set_rules('cnfpass', 'confirmation mot de passe ', 'trim|required');
        $this->form_validation->set_rules('nom', "votre nom", 'trim|required');
        $this->form_validation->set_rules('adr', "votre adresse", 'trim|required');
        $this->form_validation->set_rules('adrEmail', 'votre adresse électronique ', 'trim|required|valid_email|is_unique[client.email]');
        $this->form_validation->set_rules('tele', 'votre numéro de téléphone', 'trim|required');
        $this->form_validation->set_rules('genre', 'votre genre', 'trim|required');

        if ($this->form_validation->run() == true)
        {
            //True
            $username = $this->input->post('username');
            $genre = $this->input->post('genre');
            $password = $this->input->post('pass');
            $cnfpass = $this->input->post('cnfpass');
            $email    = $this->input->post('adrEmail');
            $nom     = $this->input->post('nom');
            $adresse = $this->input->post('adr');
            $telephone = $this->input->post('tele');
            $date_add = $this->getDatetimeNow();


            if($password == $cnfpass){
                $data = array(
                    'nom' => $nom,
                    'adresse' => $adresse,
                    'telephone' => $telephone,
                    'email'  => $email,
                    'genre' => $genre,
                    'username' => $username,
                    'password'  => $password,
                    'date_inscrit' => $date_add
                );

                $addClient = $this->Clients_model->addUser($data);

                if ($addClient = true)
                {
                    $this->session->set_flashdata('success', 'Votre inscription s\' dérouler, veuillez-vous connecter.');
                    redirect('Connexion');
                }
                else{
                    $this->session->set_flashdata('error', 'Veuillez réessayer.');
                    redirect('Inscription/client');
                }
            }
            else{
                //False
                $this->session->set_flashdata('error', 'Les mots de passes ne sont pas identiques.');
                redirect('Inscription/client');
            }
        }
        else{
            //False
            $this->client();
        }
    }

}