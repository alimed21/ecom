<?php
class Boutiques extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Boutiques_model');
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

    /** Gestion des boutiques */
    public function index(){
        
    }
    public function inscriptionBoutique()
    {
        /** Titre */
        $titreAffiche = 'Information de la boutique';
        $data['titreAffiche'] = $titreAffiche;
        $this->load->view('boutiques/infoBoutique_view', $data);
    }

    public function ajoutBoutique()
    {
        $this->form_validation->set_rules('nom_boutique', "nom de la boutique", 'trim|required|is_unique[boutiques.nom_boutique]');
        $this->form_validation->set_rules('num_boutique', "numéro de téléphone de la boutique", 'trim|required');
        $this->form_validation->set_rules('adr_boutique', "adresse de la boutique", 'trim|required');
        $this->form_validation->set_rules('nom_gerant', "nom du gérant", 'trim|required');
        $this->form_validation->set_rules('num_gerant', "numéro de téléphone du gérant", 'trim|required');
        $this->form_validation->set_rules('email_gerant', "l'adresse électronique du gérant", 'trim|required|valid_email|is_unique[boutiques.email_gerant]');
        $this->form_validation->set_rules('compte_bancaire', "numéro de compte bancaire", 'trim|required|is_unique[boutiques.compte_bancaire]');
        $this->form_validation->set_rules('nom_banque', "nom de la banque", 'trim|required');

        //Config image
        $config['upload_path'] = './uploads/patente';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 20000;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->form_validation->run() == true) {
            //Si tous les champs ont bien été saisies
            if (!$this->upload->do_upload('patente')) {
                $data['error_message'] = $this->upload->display_errors();

                /** Titre */
                $titreAffiche = 'Information de la boutique';
                $data['titreAffiche'] = $titreAffiche;

                $this->load->view('boutiques/infoBoutique_view', $data);
            } else {
                $nom_boutique = $this->input->post('nom_boutique');
                $num_boutique = $this->input->post('num_boutique');
                $adr_boutique = $this->input->post('adr_boutique');
                $nom_gerant = $this->input->post('nom_gerant');
                $num_gerant = $this->input->post('num_gerant');
                $email_gerant = $this->input->post('email_gerant');
                $compte_bancaire = $this->input->post('compte_bancaire');
                $nom_banque = $this->input->post('nom_banque');
                $lien_facebook = $this->input->post('lien_facebook');
                $full_path = strtolower($this->upload->data('file_name'));
                $token = random_string('alnum', 7);

                $data = array(
                    'nom_boutique' => $nom_boutique,
                    'tele_boutique' => $num_boutique,
                    'adr_boutique ' => $adr_boutique,
                    'nom_gerant_boutique ' => $nom_gerant,
                    'tele_gerant ' => $num_gerant,
                    'email_gerant ' => $email_gerant,
                    'patente_boutique' => $full_path,
                    'compte_bancaire ' => $compte_bancaire,
                    'nom_banque ' => $nom_banque,
                    'page_facebook ' => $lien_facebook,
                    'code_boutique' => $token
                );

                $ajoutBoutique = $this->Boutiques_model->addBoutique($data);
                if ($ajoutBoutique = true) {
                    redirect('ajoutReussi');
                } else {
                    $this->session->set_flashdata('error', 'Veuillez réessayer.');
                    redirect('Boutique');
                }
            }
        } else {
            $this->index();
        }
    }

    public function ajoutBoutiqueReussi()
    {
        /** Titre */
        $titreAffiche = 'Ajout d\'une boutique réussie';
        $data['titreAffiche'] = $titreAffiche;
        $this->load->view('boutiques/ajoutReussi', $data);
    }

}