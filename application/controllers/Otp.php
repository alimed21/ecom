<?php

class Otp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Boutiques_model');
        $this->load->model('Categorie_model');
        $this->load->model('Produit_model');
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

    public function inscriptionBoutique()
    {
        /** Titre */
        $titreAffiche = 'Information de la boutique';
        $data['titreAffiche'] = $titreAffiche;
        $this->load->view('boutiques/infoBoutique_view', $data);
    }

    public function testOTP(){
        $this->form_validation->set_rules('nom_boutique', "nom de la boutique", 'trim|required|is_unique[boutiques.nom_boutique]');
        $this->form_validation->set_rules('num_boutique', "numéro de téléphone de la boutique", 'trim|required|min_length[8]|max_length[8]');
        $this->form_validation->set_rules('adr_boutique', "adresse de la boutique", 'trim|required');
        $this->form_validation->set_rules('nom_gerant', "nom du gérant", 'trim|required');
        $this->form_validation->set_rules('num_gerant', "numéro de téléphone du gérant", 'trim|required|is_unique[boutiques.tele_gerant]|min_length[8]|max_length[8]');
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
                    //$this->sendemail($nom_boutique);
                    //redirect('ajoutReussi');
                    // Generate OTP
                    $otp = $this->generate_otp();

                    $data = [
                        'otp'	=> $otp,
                    ];
                    //Inserer OTP
                    $inserOTP = $this->Boutiques_model->addOtp($data, $email_gerant);

                    if($inserOTP == true){

                        //send otp via email
                        $sendOTP = $this->sendOTP($email_gerant, $otp);

                        if($sendOTP == true){
                            //Confirmation otp
                            $essaie = null;
                            $erreur_message = null;
                            $confirmationOTP = $this->confirmationOtp($email_gerant, $essaie, $erreur_message);
                        }
                        else{
                            $this->session->set_flashdata('error', 'Veuillez réessayer.');
                            redirect('Boutique');
                        }

                    }
                    else{
                        $this->session->set_flashdata('error', 'Veuillez réessayer.');
                        redirect('Boutique');
                    }

                } else {
                    $this->session->set_flashdata('error', 'Veuillez réessayer.');
                    redirect('Boutique');
                }

            }
        } else {
            $this->inscriptionBoutique();
        }


    }
    public function generate_otp() {
        $OTP 	=	rand(1,9);
        $OTP 	.=	rand(0,9);
        $OTP 	.=	rand(0,9);
        $OTP 	.=	rand(0,9);
        $OTP 	.=	rand(0,9);
        $OTP 	.=	rand(0,9);
        return $OTP;
    }
    public function sendOTP($email, $otp){


        $sujet = "Votre code de confirmation";
        $message = "Voici votre code de confirmation ".$otp." ne partager pas avec personne.";
        # Config...
        $config = array(
            'smtp_crypto' => 'tls',
            'protocol'  =>  'mail',
            'smtp_host' => 'relay-hosting.secureserver.net',
            'smtp_port' => 25,
            'smtp_user' => 'contact@worldtransitservices.com',
            'smtp_pass' => 'moubaraksaada',
            'mailtype'  => 'html',
            'charset'   => 'utf8',
            'wordwrap'  => TRUE
        );


        $this->email->initialize($config);
        $this->load->library('email', $config);
        $this->email->from('contact@worldtransitservices.com');
        $this->email->to($email);
        $this->email->subject($sujet);
        $this->email->message($message);
        $this->email->set_newline("\r\n");
        $result = $this->email->send();

        if($result){
            return true;
        }
        else{
            /** var_dump('non');die;
            $pr = $this->email->print_debugger();
            var_dump($pr);die;*
            $this->session->set_flashdata('error', 'Erreur survenu lors de l\'envoi du mail, veuillez réessayer.');
            redirect("Admin/Boutiques");*/
            return false;
        }
    }

    public function confirmationOtp($email, $essaie = null, $erreur_message = null){

        if($essaie == null){
            $essaie = 0;
        }
        else{
            $essaie = $essaie;
        }

        if($essaie == 3){
            $suppressionDonnée = $this->Boutiques_model->supprimerBoutiques($email);

            if($suppressionDonnée == true){
                $this->boutiqueRejecter();
            }
            else{
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Boutique');
            }
        }
        else if($essaie < 3){
            /** Email */
            $data['email'] = $email;

            /** Essaie */
            $data['essaie'] = $essaie;

            /** message erreur */
            $data['erreur_message'] = $erreur_message;

            /** Titre */
            $titreAffiche = 'Confirmation du code secret';
            $data['titreAffiche'] = $titreAffiche;

            $this->load->view('boutiques/confirmation_view', $data);
        }
        else{
            $this->boutiqueRejecter();
        }
    }

    public function codeOtp(){
        $this->form_validation->set_rules('code_otp', "code secret", 'trim|required');
        $email = $this->input->post('email');
        $essaie = $this->input->post('essaie');

        if ($this->form_validation->run() == true) {
            //Si tous les champs ont bien été saisies
            $code = $this->input->post('code_otp');

            $verificationOtp = $this->Boutiques_model->verificationOtp($code, $email);

            if($verificationOtp == true) {
                $this->ajoutBoutiqueReussi();
            }else {
                $essaie = $essaie + 1;
                $erreur_message = "Le code que vous avez fourni est erroné, veuillez réessayer";
                $this->confirmationOtp($email, $essaie, $erreur_message);
            }
        } else {
            $erreur_message = "Le code que vous avez fourni est erroné, veuillez réessayer";
            $this->confirmationOtp($email, $essaie, $erreur_message);
        }
    }

    public function boutiqueRejecter(){
        /** Titre */
        $titreAffiche = 'Reject de votre boutique';
        $data['titreAffiche'] = $titreAffiche;

        $this->load->view('boutiques/rejectBoutique', $data);
    }
}