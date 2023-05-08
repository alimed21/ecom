<?php

class PhotoPub extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Login_model');
        $this->load->model('Admin/Admin_model');
        $this->load->model('Admin/Categories_model');
        $this->load->model('Admin/Utilisateurs_model');
        $this->load->library('form_validation');
        $this->load->helper('string');
        if(!$this->session->userdata('id_admin'))
        {
            redirect('Admin/LoginAdmin');
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
        $titreAffiche = 'Ajouter des photos';
        $data['titreAffiche'] = $titreAffiche;

        $countCommandeEnAttend =  $this->Admin_model->countCommandeEnAttend();
        $data['countCommandeEnAttend'] = $countCommandeEnAttend;


        $this->load->view('administrateur/templates/header_view', $data);
        $this->load->view('administrateur/pages/ajoutPhoto_view');
        $this->load->view('administrateur/templates/footer_view');
    }

    public function ajoutPhoto(){
        $this->form_validation->set_rules('titre', "titre de l'image", 'trim|required');
        $this->form_validation->set_rules('text', "description de l'image", 'trim|required');
        $this->form_validation->set_rules('lien', "lien de l'image", 'trim|required');

        //Config image
        $config['upload_path'] = './uploads/slider';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2000;
        $config['max_width'] = 484;
        $config['max_height'] = 441;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if ($this->form_validation->run() == true) {

            if (!$this->upload->do_upload('userfile')) {
                $data['error_message'] = $this->upload->display_errors();
                /** Titre */
                $titreAffiche = 'Ajouter des photos';
                $data['titreAffiche'] = $titreAffiche;

                $countCommandeEnAttend =  $this->Admin_model->countCommandeEnAttend();
                $data['countCommandeEnAttend'] = $countCommandeEnAttend;


                $this->load->view('administrateur/templates/header_view', $data);
                $this->load->view('administrateur/pages/ajoutPhoto_view', $data);
                $this->load->view('administrateur/templates/footer_view');
            }
            else{
                $titre = $this->input->post('titre');
                $text = $this->input->post('text');
                $lien = $this->input->post('lien');
                $full_path = $this->upload->data('file_name');
                $token =  random_string('alnum', 7);

                $id_admin = $this->session->userdata('id_admin');
                $date_add = $this->getDatetimeNow();

                $data = array(
                    'titre_slide' => $titre,
                    'lien_image'  => $lien,
                    'text_image ' => $text,
                    'image_slide' => $full_path,
                    'token_slide ' => $token,
                    'id_admin_add ' => $id_admin,
                    'date_add ' => $date_add
                );

                $addSlider = $this->Admin_model->addSlider($data);

                if ($addSlider = true) {
                    $this->session->set_flashdata('success', 'Votre photo à été ajouté');
                    redirect('Admin/PhotoPub/listePhoto/', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Veuillez réessayer.');
                    redirect('Admin/PhotoPub/');
                }
            }
        }
        else{
            $this->index();
        }
    }

    public function listePhoto(){
        /** Titre */
        $titreAffiche = 'Ajouter des photos';
        $data['titreAffiche'] = $titreAffiche;

        $countCommandeEnAttend =  $this->Admin_model->countCommandeEnAttend();
        $data['countCommandeEnAttend'] = $countCommandeEnAttend;

        $listePhoto = $this->Admin_model->getListesPhotos();
        $data['listePhoto'] = $listePhoto;


        $this->load->view('administrateur/templates/header_view', $data);
        $this->load->view('administrateur/pages/listePhoto_view', $data);
        $this->load->view('administrateur/templates/footer_view');
    }


}