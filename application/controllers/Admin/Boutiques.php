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

            $emailAdresse = $this->Boutiques_model->getEmail($token);

            $resp = $emailAdresse;

            $validBoutique = $this->Boutiques_model->validBoutique($data, $token);
            if($validBoutique == true)
            {
                $response = true;
                $this->sendMail($token, $response, $resp);
            }
            else
            {
                $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
                redirect("Admin/Boutiques");
            }
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

            $emailAdresse = $this->Boutiques_model->getEmail($token);

            $email = $emailAdresse;

            $supprimerBoutique = $this->Boutiques_model->supprimerBoutique($data, $token);

            if($supprimerBoutique == true)
            {
                $response = false;
                $this->sendMail($token, $response, $email);
            }
            else
            {
                $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
                redirect("Admin/Boutiques");
            }
        }
    }

    public function sendMail($token, $res, $emailToSend){
        $data['res'] = $res;

        /** Configuration email */
        if($res == true){
            $sujet = "Création de votre compte";
        }
        else{
            $sujet = "Inscription rejecter";
        }

        $data['sujet'] = $sujet;


        $data['contente']="La première plateforme e-commerce pour les Djiboutiens/ennes";
        $message = $this->load->view('utilisateur/pages/email_view',$data,true);

        # Config...
        $config = array(
            'smtp_crypto' => 'tls',
            'protocol'  =>  'mail',
            'smtp_host' => '**************',
            'smtp_port' => 25,
            'smtp_user' => '*************',
            'smtp_pass' => '****************',
            'mailtype'  => 'html',
            'charset'   => 'utf8',
            'wordwrap'  => TRUE
        );


        $this->email->initialize($config);
        $this->load->library('email', $config);
        $this->email->from('************************');
        $this->email->to($emailToSend);
        $this->email->subject($sujet);
        $this->email->message($message);
        $this->email->set_newline("\r\n");
        $result = $this->email->send();





        if($result){
            if($res == true){
                $this->session->set_flashdata('success', 'Boutique valider.');
                redirect("Admin/Boutiques");
            }
            else{
                $this->session->set_flashdata('success', 'Boutique rejecter.');
                redirect("Admin/Boutiques/");
            }

        }
        else{
           /** var_dump('non');die;
            $pr = $this->email->print_debugger();
            var_dump($pr);die;**/
            $this->session->set_flashdata('error', 'Erreur survenu lors de l\'envoi du mail, veuillez réessayer.');
            redirect("Admin/Boutiques");
        }
    }


}