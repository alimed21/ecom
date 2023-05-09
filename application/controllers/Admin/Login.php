<?php
/**
 *
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Login_model');
        $this->load->library('form_validation');
        $this->load->helper('string');
    }

    function getDatetimeNow()
    {
        $tz_object = new DateTimeZone('Africa/Djibouti');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y-m-d H:i:s');
    }

    public function index()
    {
        $this->load->view('utilisateur/Login');
    }

    public function verifylogin()
    {
        $this->form_validation->set_rules('username', "Nom d'utilisateur", 'trim|required');
        $this->form_validation->set_rules('pass', 'Password ', 'trim|required');

        if($this->form_validation->run()==true)
        {
            //true
            $username = $this->input->post('username');
            $password = $this->input->post('pass');

            //model function
            $result = $this->Login_model->can_login($username, $password);
            if($result != false)
            {
                $session_data = array(
                    'id_user' => $result[0]->id_user,
                    'email' => $result[0]->email,
                    'username' =>$result[0]->username,
                    'id_boutique' =>$result[0]->id_boutique,
                    'code_boutique' =>$result[0]->code_boutique,
                    'nom_boutique' =>$result[0]->nom_boutique
                );

                $this->session->set_userdata($session_data);
                //$action = "Connexion de l'utilisateur ".$result[0]->username." de la boutique ".$result[0]->nom_boutique;
                $action = "Connexion avec succès";
                $color = "success";
                $this->histoirque($action, $color);
                redirect("Admin/Produit");
            }
            else
            {
                $data['error_message'] = 'Nom d\'utilisateur ou mot de passe incorrect';
                $this->load->view('utilisateur/Login', $data);
            }
        }
        else
        {
            //false
            $this->index();
        }
    }

    //forget password
    public function motPasseOublier()
    {
        $this->load->view('admin/motpasseoublier_view');
    }

    public function sendLinkEmail()
    {
        $this->form_validation->set_rules('email', "email", 'trim|required|valid_email');

        if($this->form_validation->run()==true)
        {
            $email = $this->input->post('email');

            $emailExist = $this->Login_model->findEmail($email);

            if($emailExist == True)
            {
                $this->Email($email);
            }
            else{
                $data['error_message'] = "Votre mail n'est pas enregistre";
                $this->load->view('user/ForgetPassword_view', $data);
            }
        }
        else{
            $this->motPasseOublier();
        }
    }

    public function Email($email)
    {
        $token = rand(1000, 9999);

        $message = "Veuillez cliquer sur ce lien pour <br>  <a href='".base_url('Admin/Login/reset?token=').$token."'>réinitialiser votre mot de passe</a>";

        $sujet = "Lien de réinitialisation de votre mot de passe";


        # Config...
        $config = array(
            'protocol'  =>  'mail',
            'smtp_host' => 'mail.riyadexpress.com',
            'smtp_port' => 465,
            'smtp_crypto' => 'ssl',
            'smtp_user' => 'contact@riyadexpress.com',
            'smtp_pass' => 'Home@1234',
            'mailtype'  => 'html',
            'charset'   => 'utf8',
            'wordwrap'  => TRUE
        );


        $this->email->initialize($config);
        $this->load->library('email', $config);
        $this->email->from('contact@riyadexpress.com');
        $this->email->to($email);
        $this->email->subject($sujet);
        $this->email->message($message);
        $this->email->set_newline("\r\n");
        $result = $this->email->send();
        if($result){
            $data = array(
                'password' => $token
            );
            $updatePassword = $this->Login_model->resetPassword($data, $email);
            $data['error_message'] = "Veuillez consulter votre mail";
            $this->load->view('user/ForgetPassword_view', $data);
        }
        else{
            $data['error_message'] = "Une erreur s'est produit veuillez consulter l'administrateur";
            $this->load->view('user/ForgetPassword_view', $data);
        }
    }

    public function reset(){
        $token = $this->input->get('token');
        $_SESSION['token'] =$token;
        $this->load->view('user/pages/resetpass');
    }

    public function changResetPassword()
    {
        $this->form_validation->set_rules('pass', "mot de passe", 'trim|required');
        $this->form_validation->set_rules('cnfpass', "confirmation du mot de passe", 'trim|required');


        if($this->form_validation->run()==true)
        {
            $token = $_SESSION['token'];

            $pass = md5($this->input->post('pass'));
            $cnfpass = md5($this->input->post('cnfpass'));

            if($pass == $cnfpass)
            {

                $data = array(
                    'password' => $pass
                );

                $updatePassword = $this->Login_model->updatePassword($data, $token);

                if($updatePassword == true)
                {
                    $data['error_message'] = "Veuillez vous connectez";
                    $this->load->view('admin/Login_view', $data);
                }
                else
                {
                    $data['error_message'] = "Veuillez envoyer un mail à l'amdinistrateur";
                    $this->load->view('admin/Login_view', $data);
                }
            }
            else
            {
                $data['error_message'] = "les deux mots des passes ne sont pas identiques";
                $this->load->view('admin/ForgetPassword_view', $data);
            }
        }
        else{
            $this->reset();
        }
    }


    //Logout function
    public function logout()
    {
        $action = "Déconnexion";
        $color = "danger";
        $this->histoirque($action, $color);
        $this->session->unset_userdata('id_user');
        session_destroy();
        redirect('Login', 'refresh');
    }

     /** Historique */
    public function histoirque($action, $color)
    {
        $data = array(
            'id_user'       =>$this->session->userdata('id_user'),
            'action_user'   => $action,
            'his_color'     => $color,
            'date_his'      =>$this->getDatetimeNow()
        );
        $this->Login_model->log_manager_user($data);
    }
}

?>
