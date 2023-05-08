<?php


class Photo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin/Photo_model");
        $this->load->model("Admin/Login_model");
        $this->load->model('Admin/Categorie_model');
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

    /** Gestion des produits */
    public function index(){
        $listesCategories = $this->Categorie_model->getAllCategories();
        $data['listesCategories'] = $listesCategories;

        $this->load->view('user/templates/header_view');
        $this->load->view('user/pages/produit_view', $data);
        $this->load->view('user/templates/footer_view');
    }
}