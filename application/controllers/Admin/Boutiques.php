<?php

class Boutiques extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Login_model');
        $this->load->model('Admin/Boutiques_model');
        $this->load->model('Admin/Admin_model');
        $this->load->library('form_validation');
        $this->load->helper('string');
        if(!$this->session->userdata('id_admin'))
        {
            redirect('LoginAdmin');
        }
        //if($this->session->userdata(''))
    }

    function getDatetimeNow()
    {
        $tz_object = new DateTimeZone('Africa/Djibouti');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y-m-d');
    }

    public function index(){
        /** Titre */
        $titreAffiche = 'Liste des boutiques';
        $data['titreAffiche'] = $titreAffiche;

        $countCommandeEnAttend =  $this->Admin_model->countCommandeEnAttend();
        $data['countCommandeEnAttend'] = $countCommandeEnAttend;

        $listeBoutiques = $this->Boutiques_model->getAllBoutique();
        $data['listeBoutiques'] = $listeBoutiques;

        $this->load->view('administrateur/templates/header_view', $data);
        $this->load->view('administrateur/pages/listeBoutiques_view', $data);
        $this->load->view('administrateur/templates/footer_view');
    }

    public function validBoutique($token = null){
        if($token == null)
        {
            $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
            redirect("Admin/Boutiques/");
        }
        else
        {
            $id_admin = $this->session->userdata('id_admin');
            $date_valid = $this->getDatetimeNow();

            $data = array(
                'id_admin_valid' => $id_admin,
                'date_valid' => $date_valid
            );

            $validBoutique = $this->Boutiques_model->validBoutique($data, $token);
            if($validBoutique == true)
            {
                $this->sendMail($token);
                /*$this->session->set_flashdata('success', 'Boutique valider.');
                redirect("Admin/Produit/listeProduits");*/
            }
            else
            {
                $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
                redirect("Admin/Boutiques");
            }
        }
    }

    public function sendMail($token){
        /** Get email store */
        $emailAdresse = $this->Boutiques_model->getEmail($token);

        $resp = $emailAdresse;

        $data['token'] = $token;

        /** Configuration email */


        $sujet = "Création de votre compte";

        $data['contente']="La première plateforme e-commerce pour les Djiboutiens/ennes";
        $message = $this->load->view('utilisateur/pages/email_view',$data,true);

        # Config...
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
        $this->email->to($resp);
        $this->email->subject($sujet);
        $this->email->message($message);
        $this->email->set_newline("\r\n");
        $result = $this->email->send();



        if($result){
            $this->session->set_flashdata('success', 'Boutique valider.');
            redirect("Admin/Boutiques");
        }
        else{
            $this->session->set_flashdata('error', 'Erreur survenu lors de l\'envoi du mail, veuillez réessayer.');
            redirect("Admin/Boutiques");
        }
    }

    public function supprimerBoutique($token = null){
        if($token == null)
        {
            $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
            redirect("Admin/Boutiques/");
        }
        else
        {
            $id_admin = $this->session->userdata('id_admin');
            $date_delete = $this->getDatetimeNow();

            $data = array(
                'id_admin_delete' => $id_admin,
                'date_delete' => $date_delete
            );

            $supprimerBoutique = $this->Boutiques_model->supprimerBoutique($data, $token);
            if($supprimerBoutique == true)
            {
                $this->session->set_flashdata('success', 'Boutique supprimer.');
                redirect("Admin/Boutiques/");
            }
            else
            {
                $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
                redirect("Admin/Boutiques");
            }
        }
    }
}