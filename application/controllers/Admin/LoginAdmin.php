<?php


class LoginAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Login_model');
        $this->load->library('form_validation');
    }

    public function index(){
        /** Titre */
        $titreAffiche = 'Connexion';
        $data['titreAffiche'] = $titreAffiche;

        $this->load->view('admin/LoginAdmin_view', $data);
    }

    public function verifylogin()
    {
        $this->form_validation->set_rules('username', "nom d'utilisateur", 'trim|required');
        $this->form_validation->set_rules('pass', 'mot de passe ', 'trim|required');

        if($this->form_validation->run()==true)
        {
            //true
            $username = $this->input->post('username');
            $password = md5($this->input->post('pass'));

            //model function
            if($result = $this->Login_model->can_loginAdmin($username, $password))
            {
                //var_dump($result);die;
                if($result)
                {
                    $session_data = array(
                        'id_admin' => $result[0]->id_admin,
                        'email_admin' => $result[0]->email_admin,
                        'login_admin' =>$result[0]->login_admin
                    );
                }
                $this->session->set_userdata($session_data);
                redirect("Dashboard");
            }
            else
            {
                /** Titre */
                $titreAffiche = 'Connexion';
                $data['titreAffiche'] = $titreAffiche;

                $data['error_message'] = 'Nom d\'utilisateur ou mot de passe incorrect';
                $this->load->view('admin/LoginAdmin_view', $data);
            }

        }
        else
        {
            //false
            $this->index();
        }
    }
    //Logout function
    public function logout()
    {
        $action = "Déconnexion";
        $this->session->unset_userdata('id_admin');
        session_destroy();
        redirect('LoginAdmin', 'refresh');
    }
}