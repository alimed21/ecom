<?php


class Commande extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin/Login_model");
        $this->load->model("Admin/Commande_model");
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
        return $datetime->format('Y-m-d H:i:s');
    }

    public function index(){
        /** Count commande */
        $boutique = $this->session->userdata('id_boutique');
        $countCommandes = $this->Commande_model->countCommande($boutique);
        $data['countCommandes'] = $countCommandes;

        $listeCommandes = $this->Commande_model->getAllCommande($boutique);
        $data['listeCommandes'] = $listeCommandes;

        /** Titre */
        $titreAffiche = 'Liste des commandes';
        $data['titreAffiche'] = $titreAffiche;


        $this->load->view('utilisateur/templates/header_view', $data);
        $this->load->view('utilisateur/pages/commande_view', $data);
        $this->load->view('utilisateur/templates/footer_view');
    }

    public function validCommande($code_cmd){
        $idFour =  $this->session->userdata('id_boutique');
        $date_valid = $this->getDatetimeNow();

        $data = array(
            'valid_four_cmd' => $idFour,
            'date_valid_four' => $date_valid
        );

        $validCmd = $this->Commande_model->validCmd($data, $idFour, $code_cmd);
        if ($validCmd = TRUE){
            $this->session->set_flashdata('success', 'Commande valider. Merci de contacter le client et le prévenir.');
            redirect('Admin/Commande');
        }
        else{
            $this->session->set_flashdata('error', 'Une erreur s\'est produit veuillez contactez le développeur.');
            redirect('Admin/Commande');
        }
    }
    public function rejetCommande($code_cmd){
        $idFour = $this->session->userdata('id_boutique');
        $date_delete= $this->getDatetimeNow();

        $data = array(
            'date_delete_cmd' => $date_delete,
            'id_four_delete_cmd' => $idFour
        );
        $rejetCmd = $this->Commande_model->rejetCmd($idFour, $code_cmd, $data);

        if ($rejetCmd = TRUE){
            $this->modifierQuantite($code_cmd);
            /*$this->session->set_flashdata('success', 'La commande a bien été supprimé.');
            redirect('Admin/Commande');*/
        }
        else{
            $this->session->set_flashdata('error', "Une erreur s\'est produit veuillez contactez le développeur.");
            redirect('Admin/Commande');
        }
    }
    public function modifierQuantite($code_cmd){
        $quantiteRestorer = $this->Commande_model->QuantiteCmd($code_cmd);
        $id_prod = 0;
        $quantite = 0;
        foreach ($quantiteRestorer as $res){
            $quantite = $res->quantite;
            $id_prod = $res->id_prod;
        }

        //Recupere la quantité actuelle de ce produit
        $quantiteAcutel = $this->Commande_model->QuantiteAActuel($id_prod);
        foreach ($quantiteAcutel as $act){
            $quantiteA = $act->quantite;
        }
        $nouveauQuantite = $quantite + $quantiteA;

        $data = array(
            'quantite' => $nouveauQuantite
        );
        $quantiteAJour = $this->Commande_model->quantiteAJour($id_prod, $data);

        if ($quantiteAJour = TRUE){
            $this->session->set_flashdata('success', 'La commande a bien été supprimé.');
            redirect('Admin/Commande');
        }
        else{
            $this->session->set_flashdata('error', "Une erreur s\'est produit veuillez contactez le développeur.");
            redirect('Admin/Commande');
        }
    }
}