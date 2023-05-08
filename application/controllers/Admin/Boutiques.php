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


        /** Configuration email */

        $message = "Veuillez cliquer sur ce lien pour <br>  <a href='".base_url('Inscription/?token=').$token."'>la création de votre compte.</a>";

        $sujet = "Création de votre compte";

        # Config...
        $config = array(
            'protocol'  =>  'mail',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_crypto' => 'ssl',
            'smtp_user' => 'alimohamedeali@gmail.com',
            'smtp_pass' => 'Home@2109',
            'mailtype'  => 'html',
            'charset'   => 'utf8',
            'wordwrap'  => TRUE
        );

        $this->email->initialize($config);
        $this->load->library('email', $config);
        $this->email->from('contact@gmail.com');
        $this->email->to($resp);
        $this->email->subject($sujet);
        $this->email->message($message);
        $this->email->set_newline("\r\n");
        $result = $this->email->send();
        if($result){
            echo "oui";
        }
        else{
            echo $this->email->print_debugger();
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