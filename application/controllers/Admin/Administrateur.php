<?php


class Administrateur extends CI_Controller
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

    /** Produit */
    public function listeProduit(){
        /** Titre */
        $titreAffiche = 'Liste des produits ajouter';
        $data['titreAffiche'] = $titreAffiche;

        $listeProduits = $this->Admin_model->getAllProduitsNonValid();
        $data['listeProduits'] = $listeProduits;

        $countCommandeEnAttend = $this->Admin_model->countCommandeEnAttend();
        $data['countCommandeEnAttend'] = $countCommandeEnAttend;

        /** Images restant **/
        $autresImages = $this->Admin_model->getAllImages();
        $data['autresImages'] = $autresImages;

        $this->load->view('administrateur/templates/header_view', $data);
        $this->load->view('administrateur/pages/listeProduitsNonValid_view', $data);
        $this->load->view('administrateur/templates/footer_view');
    }

    public function validProduit($tokenProd){
        if($tokenProd == null)
        {
            $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
            redirect("Admin/Administrateur/listeProduit");
        }
        else
        {
            $id_admin = $this->session->userdata('id_admin');
            $date_valid = $this->getDatetimeNow();

            $data = array(
                'id_admin_valid' => $id_admin,
                'date_valid' => $date_valid
            );

            $validProduit = $this->Admin_model->validProduit($data, $tokenProd);
            if($validProduit == true)
            {
                $this->session->set_flashdata('success', 'Produit valider.');
                redirect("Admin/Administrateur/listeProduit");
            }
            else
            {
                $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
                redirect("Admin/Administrateur/listeProduit");
            }
        }
    }

    public function rejetterProduit($tokenProd){
        if($tokenProd == null)
        {
            $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
            redirect("Admin/Administrateur/listeProduit");
        }
        else
        {
            $id_admin = $this->session->userdata('id_admin');
            $date_valid = $this->getDatetimeNow();

            $data = array(
                'id_admin_delete' => $id_admin,
                'date_delete' => $date_valid
            );

            $rejetteProduit = $this->Admin_model->rejetteProduit($data, $tokenProd);
            if($rejetteProduit == true)
            {
                $this->session->set_flashdata('success', 'Produit rejeter.');
                redirect("Admin/Administrateur/listeProduit");
            }
            else
            {
                $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
                redirect("Admin/Administrateur/listeProduit");
            }
        }
    }

    /** Tableau de bord */
    public function tableauDeBord(){
        /** Boutiques */
        $boutiques = $this->Admin_model->countAllBoutiques();
        $data['boutiques'] = $boutiques;

        /** Clients */
        $clients = $this->Admin_model->countAllClients();
        $data['clients'] = $clients;

        /** Commande passer */
        $commandes = $this->Admin_model->countAllCommandes();
        $data['commandes'] = $commandes;

        /** Dernieres commande*/
        $listesCommandes = $this->Admin_model->listesCommandes();
        $data['listesCommandes'] = $listesCommandes;

        /** Nombres des produits */
        $listesProduits = $this->Admin_model->listesProduits();
        $data['listesProduits'] = $listesProduits;

        /** Quantites disponibles */
        $quantiteStock = $this->Admin_model->quantiteStock();
        $data['quantiteStock'] = $quantiteStock;
        
        $this->load->view('admin/templates/header_view');
        $this->load->view('admin/pages/tableaudebord_view', $data);
        $this->load->view('admin/templates/footer_view');
    }
/**  Gestion des rôles */
    public function index()
    {
        $listesRoles = $this->Roles_model->getAllRoles();
        $data['listesRoles'] = $listesRoles;

        $this->load->view('admin/templates/header_view');
        $this->load->view('admin/pages/ajoutRole', $data);
        $this->load->view('admin/templates/footer_view');
    }

    public function ajoutRole(){
        $this->form_validation->set_rules('role', "rôle", 'trim|required');

        if ($this->form_validation->run() == true) {
            //True
            $role = $this->input->post('role');
            $id_admin = $this->session->userdata('id_admin');
            $date_add = $this->getDatetimeNow();
            $data = array(
                'role' => $role,
                'id_admin_add' => $id_admin,
                'date_add ' => $date_add
            );

            $addrole = $this->Roles_model->addRole($data);

            if ($addrole = true) {
                //var_dump('oui');die();
                $this->session->set_flashdata('success', 'Ajout rôle réussi');
                redirect('Admin/Administrateur');
            } else {
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Admin/Administrateur/ajoutRole');
            }
        }
        else{
            $this->index();
        }
    }

    public function modificationRole($id){
        $listesRoles = $this->Roles_model->getAllRoles();
        $data['listesRoles'] = $listesRoles;

        $detailRole = $this->Roles_model->getDetailRole($id);
        $data['detailRole'] = $detailRole;

        $this->load->view('admin/templates/header_view');
        $this->load->view('admin/pages/modifierRole', $data);
        $this->load->view('admin/templates/footer_view');
    }

    public function modificationValider(){
        $this->form_validation->set_rules('role', "rôle", 'trim|required');
        $id = $this->input->post('id');
        if ($this->form_validation->run() == true) {
            //True
            $role = $this->input->post('role');

            $data = array(
                'role' => $role
            );

            $updaterole = $this->Roles_model->updateRole($data, $id);

            if ($updaterole = true) {
                $this->session->set_flashdata('success', 'Modification rôle réussi');
                redirect('Admin/Administrateur');
            } else {
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Admin/Administrateur/modificationRole'.$id);
            }
        }
        else{
            $this->modificationRole($id);
        }
    }

    public function suppressionRole($id){
        $id_admin = $this->session->userdata('id_admin');
        $date_add = $this->getDatetimeNow();
        $data = array(
            'id_admin_delete' => $id_admin,
            'date_delete'     => $date_add
        );

        $deleterole = $this->Roles_model->deleteRole($data, $id);

        if ($deleterole = true) {
            $this->session->set_flashdata('success', 'Suppression rôle réussi');
            redirect('Admin/Administrateur');
        } else {
            $this->session->set_flashdata('error', 'Veuillez réessayer.');
            redirect('Admin/Administrateur/');
        }
    }

    /** Gestion categories */
    public function ajouterCategorie(){

        $titreAffiche = 'Ajouter une catégorie';
        $data['titreAffiche'] = $titreAffiche;

        $listesCategories = $this->Categories_model->getAllCategories();
        $data['listesCategories'] = $listesCategories;

        $countCommandeEnAttend = $this->Admin_model->countCommandeEnAttend();
        $data['countCommandeEnAttend'] = $countCommandeEnAttend;

        $this->load->view('administrateur/templates/header_view', $data);
        $this->load->view('administrateur/pages/ajoutCategorie_view', $data);
        $this->load->view('administrateur/templates/footer_view');
    }

    public function ajoutCategorie(){
        $this->form_validation->set_rules('cate', "catégorie", 'trim|required');

        if ($this->form_validation->run() == true) {
            //True
            $cate = $this->input->post('cate');
            $id_admin = $this->session->userdata('id_admin');
            $date_add = $this->getDatetimeNow();


            $data = array(
                'cate' => $cate,
                'id_admin_add' => $id_admin,
                'date_add ' => $date_add
            );

            $addcategorie = $this->Categories_model->addCategorie($data);

            if ($addcategorie = true) {
                $this->session->set_flashdata('success', 'Ajout catégorie réussi');
                redirect('Admin/Administrateur/ajouterCategorie');
            } else {
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Admin/Administrateur/ajouterCategorie');
            }
        }
        else{
            $this->ajouterCategorie();
        }
    }

    public function suppressionCategorie($id){
        if($id == null)
        {
            $this->session->set_flashdata('error', 'Veuillez réessayer.');
            redirect("Admin/Administrateur/ajouterCategorie");
        }
        else{
            $id_admin = $this->session->userdata('id_admin');
            $date_add = $this->getDatetimeNow();
            $data = array(
                'id_admin_delete' => $id_admin,
                'date_delete'     => $date_add
            );

            $deletecategorie = $this->Categories_model->deleteCategorie($data, $id);

            if ($deletecategorie = true) {
                $this->session->set_flashdata('success', 'Suppression catégorie réussi');
                redirect('Admin/Administrateur/ajouterCategorie');
            } else {
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Admin/Administrateur/ajouterCategorie');
            }
        }

    }

    public function modifierCategorie($id){
        if($id == null)
        {
            $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
            redirect("Admin/Administrateur/ajouterCategorie");
        }
        else{
            $titreAffiche = 'Ajouter une catégorie';
            $data['titreAffiche'] = $titreAffiche;

            $listesCategories = $this->Categories_model->getAllCategories();
            $data['listesCategories'] = $listesCategories;

            $detailCategorie = $this->Categories_model->getDetailCategorie($id);
            $data['detailCategorie'] = $detailCategorie;

            $countCommandeEnAttend = $this->Admin_model->countCommandeEnAttend();
            $data['countCommandeEnAttend'] = $countCommandeEnAttend;

            $this->load->view('administrateur/templates/header_view', $data);
            $this->load->view('administrateur/pages/modifierCategorie_view', $data);
            $this->load->view('administrateur/templates/footer_view');
        }
    }

    public function modificationCategorie(){
        $this->form_validation->set_rules('cate', "catégorie", 'trim|required');

        $id = $this->input->post('id');

        if ($this->form_validation->run() == true) {
            //True
            $cate = $this->input->post('cate');

            $data = array(
                'cate' => $cate
            );

            $updatecate = $this->Categories_model->updateCate($data, $id);

            if ($updatecate = true) {
                $this->session->set_flashdata('success', 'Modification catégorie réussi');
                redirect('Admin/Administrateur/ajouterCategorie');
            } else {
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Admin/Administrateur/modifierCategorie'.$id);
            }
        }
        else{
            $this->modifierCategorie($id);
        }
    }
    /** Sous-categorie */
    public function ajouterSousCategorie(){
        $titreAffiche = 'Ajouter une sous-catégorie';
        $data['titreAffiche'] = $titreAffiche;

        $listesSousCategories = $this->Categories_model->getAllSousCategories();
        $data['listesSousCategories'] = $listesSousCategories;

        $listesCategories = $this->Categories_model->getAllCategories();
        $data['listesCategories'] = $listesCategories;

        $countCommandeEnAttend = $this->Admin_model->countCommandeEnAttend();
        $data['countCommandeEnAttend'] = $countCommandeEnAttend;

        $this->load->view('administrateur/templates/header_view', $data);
        $this->load->view('administrateur/pages/ajoutSousCategorie_view', $data);
        $this->load->view('administrateur/templates/footer_view');
    }

    public function ajoutSsCategorie(){
        $this->form_validation->set_rules('sscate', "sous-catégorie", 'trim|required');
        $this->form_validation->set_rules('idcate', "catégorie", 'trim|required');

        if ($this->form_validation->run() == true) {
            //True
            $sscate = $this->input->post('sscate');
            $cate = $this->input->post('idcate');
            $id_admin = $this->session->userdata('id_admin');
            $date_add = $this->getDatetimeNow();

            $data = array(
                'titre_ss_cate' => $sscate,
                'id_cate' => $cate,
                'id_admin_add' => $id_admin,
                'date_add ' => $date_add
            );

            $addsscategorie = $this->Categories_model->addSousCategorie($data);

            if ($addsscategorie = true) {
                $this->session->set_flashdata('success', 'Ajout sous-catégorie réussi');
                redirect('Admin/Administrateur/ajouterSousCategorie');
            } else {
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Admin/Administrateur/ajouterSousCategorie');
            }
        }
        else{
            $this->ajouterSousCategorie();
        }
    }

    public function suppressionSousCategorie($id){
        if($id == null)
        {
            $this->session->set_flashdata('error', 'Veuillez réessayer.');
            redirect("Admin/Administrateur/ajouterSousCategorie");
        }
        else
        {
            $id_admin = $this->session->userdata('id_admin');
            $date_add = $this->getDatetimeNow();
            $data = array(
                'id_admin_delete' => $id_admin,
                'date_delete'     => $date_add
            );

            $deletesouscategorie = $this->Categories_model->deleteSousCategorie($data, $id);

            if ($deletesouscategorie = true) {
                $this->session->set_flashdata('success', 'Suppression sous-catégorie réussi');
                redirect('Admin/Administrateur/ajouterSousCategorie');
            } else {
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Admin/Administrateur/ajouterSousCategorie');
            }
        }
    }

    public function modificationSousCategorie($id_sscate){
        if($id_sscate == null)
        {
            $this->session->set_flashdata('error', 'Veuillez réessayer.');
            redirect("Admin/Administrateur/ajouterSousCategorie");
        }
        else{
            $titreAffiche = 'Modification d\'une sous-catégorie';
            $data['titreAffiche'] = $titreAffiche;

            $detailSousCategories = $this->Categories_model->getDetailSousCategories($id_sscate);
            $data['detailSousCategories'] = $detailSousCategories;

            $listesSousCategories = $this->Categories_model->getAllSousCategories();
            $data['listesSousCategories'] = $listesSousCategories;

            $listesCategories = $this->Categories_model->getAllCategories();
            $data['listesCategories'] = $listesCategories;

            $countCommandeEnAttend = $this->Admin_model->countCommandeEnAttend();
            $data['countCommandeEnAttend'] = $countCommandeEnAttend;

            $this->load->view('administrateur/templates/header_view', $data);
            $this->load->view('administrateur/pages/modifierSousCategorie_view', $data);
            $this->load->view('administrateur/templates/footer_view');
        }
    }
    
    public function modifierSsCategorie()
    {
        $this->form_validation->set_rules('sscate', "sous-catégorie", 'trim|required');
        $this->form_validation->set_rules('idcate', "catégorie", 'trim|required');
        $idsscate = $this->input->post("idsscate");

        if ($this->form_validation->run() == true) {
            //True
            $sscate = $this->input->post('sscate');
            $cate = $this->input->post('idcate');
           
            $data = array(
                'titre_ss_cate' => $sscate,
                'id_cate' => $cate
            );

            $updatesscategorie = $this->Categories_model->updateSousCategorie($data, $idsscate);

            if ($updatesscategorie = true) {
                $this->session->set_flashdata('success', 'Modification sous-catégorie réussi');
                redirect('Admin/Administrateur/ajouterSousCategorie');
            } else {
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Admin/Administrateur/modificationSousCategorie'.$idsscate);
            }
        }
        else{
            $this->modificationSousCategorie($idsscate);
        }
    }
    /** Gestion Utilisateur */

    public function ajoutUtilisateur()
    {
        $roles = $this->Roles_model->getAllRoles();
        $data['roles'] = $roles;

        $fournisseurs = $this->Utilisateurs_model->getAllFournisseur();
        $data['fournisseurs'] = $fournisseurs;

        $listesUtilisateurs = $this->Utilisateurs_model->getAllUser();
        $data['listesUtilisateurs'] = $listesUtilisateurs;

        $this->load->view('admin/templates/header_view');
        $this->load->view('admin/pages/ajoutUtilisateur_view', $data);
        $this->load->view('admin/templates/footer_view');
    }

    public function VerifyForm()
    {
        $this->form_validation->set_rules('username', "nom d'utilisateur", 'trim|required|is_unique[utilisateur.username]');
        $this->form_validation->set_rules('password', 'mot de passe ', 'trim|required');
        $this->form_validation->set_rules('email', 'email ', 'trim|required|valid_email|is_unique[utilisateur.email]');
        $this->form_validation->set_rules('role', 'rôle', 'trim|required');

        if ($this->form_validation->run() == true)
        {
            //True
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $email    = $this->input->post('email');
            $role     = $this->input->post('role');
            $four = $this->input->post('four');
            $id_admin = $this->session->userdata('id_admin');
            $date_add = $this->getDatetimeNow();

            $data = array(
                'username' => $username,
                'password' => $password,
                'email '   => $email,
                'id_four'  => $four,
                'id_role'  => $role,
                'id_admin_add' => $id_admin,
                'date_add' => $date_add
            );

            $addUser = $this->Utilisateurs_model->addUser($data);

            if ($addUser = true)
            {
                $this->session->set_flashdata('success', 'Ajout utilisateur réussi');
                redirect('Admin/Administrateur/ajoutUtilisateur');
            }
            else{
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Admin/Administrateur/ajoutUtilisateur');
            }
        }
        else{
            $this->ajoutUtilisateur();
        }
    }

    public function bloquerUtilisateur($id)
    {        $this->form_validation->set_rules('email', 'email ', 'trim|required|valid_email|is_unique[utilisateur.email]');

        $data = array(
            'id_admin_delete' => $this->session->userdata('id_admin'),
            'date_delete' => $this->getDatetimeNow()
        );

        $deleteUser = $this->Utilisateurs_model->suppressionUtilisateur($id, $data);

        if ($deleteUser = true)
        {
            $this->session->set_flashdata('sucess', 'Suppression utilisateur réussi');
            redirect('Admin/Administrateur/ajoutUtilisateur');
        }
        else{
            $this->session->set_flashdata('error', 'Veuillez réessayer.');
            redirect('Admin/Administrateur/ajoutUtilisateur');
        }
    }

    public function modificationUtilisateur($id){
        $roles = $this->Roles_model->getAllRoles();
        $data['roles'] = $roles;

        $listesUtilisateurs = $this->Utilisateurs_model->getAllUser();
        $data['listesUtilisateurs'] = $listesUtilisateurs;

        $detailUtilisateur = $this->Utilisateurs_model->getDetailUser($id);
        $data['detailUtilisateur'] = $detailUtilisateur;

        $this->load->view('admin/templates/header_view');
        $this->load->view('admin/pages/modifierUtilisateur_view', $data);
        $this->load->view('admin/templates/footer_view');
    }

    public function modificationUtilisateurValider(){
        $this->form_validation->set_rules('username', "nom d'utilisateur", 'trim|required');
        $this->form_validation->set_rules('email', 'email ', 'trim|required|valid_email|is_unique[utilisateur.email]');
        $this->form_validation->set_rules('role', 'rôle', 'trim|required');
        $id = $this->input->post('id');

        if ($this->form_validation->run() == true) {
            //True
            $cate = $this->input->post('cate');

            $data = array(
                'cate' => $cate
            );

            $updatecate = $this->Categories_model->updateCate($data, $id);

            if ($updatecate = true) {
                $this->session->set_flashdata('sucess', 'Modification rôle réussi');
                redirect('Admin/Administrateur/ajouterCategorie');
            } else {
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Admin/Administrateur/modificationCategorie'.$id);
            }
        }
        else{
            $this->modificationCategorie($id);
        }
    }

    /** Fournisseur */
    public function addFournisseur(){

        $listesFournisseurs = $this->Utilisateurs_model->getAllFournisseur();
        $data['listesFournisseurs'] = $listesFournisseurs;

        $this->load->view('admin/templates/header_view');
        $this->load->view('admin/pages/addFournisseur_view', $data);
        $this->load->view('admin/templates/footer_view');
    }

    public function verificationFournisseur(){
        $this->form_validation->set_rules('nom', "nom du fournisseur", 'trim|required');
        $this->form_validation->set_rules('adresse', 'adresse du fournisseur ', 'trim|required');
        $this->form_validation->set_rules('tele', 'téléphone du fournisseur', 'trim|required');
        $this->form_validation->set_rules('email', 'email ', 'trim|required|valid_email|is_unique[fournisseur.adr_email]');

        if ($this->form_validation->run() == true)
        {
            //True
            $nom = $this->input->post('nom');
            $adresse = $this->input->post('adresse');
            $tele    = $this->input->post('tele');
            $email = $this->input->post('email');
            $id_admin = $this->session->userdata('id_admin');
            $date_add = $this->getDatetimeNow();

            $data = array(
                'nom_four' => $nom,
                'adresse_four' => $adresse,
                'telephone_four '   => $tele,
                'adr_email' => $email,
                'admin_add_four' => $id_admin,
                'date_add_four' => $date_add
            );

            $addFournisseur = $this->Utilisateurs_model->addFournisseur($data);

            if ($addFournisseur = true)
            {
                $this->session->set_flashdata('sucess', 'Ajout fournisseur réussi');
                redirect('Admin/Administrateur/addFournisseur');
            }
            else{
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Admin/Administrateur/addFournisseur');
            }
        }
        else{
            $this->addFournisseur();
        }
    }

    public function validerFournisseur($id)
    {
        $data = array(
            'user_valid' => $this->session->userdata('id_admin'),
            'date_valid' => $this->getDatetimeNow()
        );

        $validFour = $this->Utilisateurs_model->validationFournisseur($id, $data);

        if ($validFour = true)
        {
            $this->session->set_flashdata('sucess', 'validation fournisseur réussi');
            redirect('Admin/Administrateur/addFournisseur');
        }
        else{
            $this->session->set_flashdata('error', 'Veuillez réessayer.');
            redirect('Admin/Administrateur/addFournisseur');
        }
    }
    public function bloquerFournisseur($id)
    {
        $data = array(
            'admin_delete_four' => $this->session->userdata('id_admin'),
            'date_delete_four' => $this->getDatetimeNow()
        );

        $bloquerFour = $this->Utilisateurs_model->bloquerFournisseur($id, $data);

        if ($bloquerFour = true)
        {
            $this->session->set_flashdata('sucess', 'blocage fournisseur réussi');
            redirect('Admin/Administrateur/addFournisseur');
        }
        else{
            $this->session->set_flashdata('error', 'Veuillez réessayer.');
            redirect('Admin/Administrateur/addFournisseur');
        }
    }
    public function modificationFournisseur($id){
        $listesFournisseurs = $this->Utilisateurs_model->getDetailFournisseur($id);
        $data['listesFournisseurs'] = $listesFournisseurs;

        $this->load->view('admin/templates/header_view');
        $this->load->view('admin/pages/modificationFournisseur_view', $data);
        $this->load->view('admin/templates/footer_view');
    }

    public function modifierFournisseur(){
        $this->form_validation->set_rules('nom', "nom du fournisseur", 'trim|required');
        $this->form_validation->set_rules('adresse', 'adresse du fournisseur ', 'trim|required');
        $this->form_validation->set_rules('tele', 'téléphone du fournisseur', 'trim|required');
        $this->form_validation->set_rules('email', 'email ', 'trim|required|valid_email|is_unique[fournisseur.adr_email]');

        $id = $this->input->post("idFour");

        if ($this->form_validation->run() == true)
        {
            //True
            $nom = $this->input->post('nom');
            $adresse = $this->input->post('adresse');
            $tele    = $this->input->post('tele');
            $email = $this->input->post('email');
            $id_admin = $this->session->userdata('id_admin');
            $date_add = $this->getDatetimeNow();

            $data = array(
                'nom_four' => $nom,
                'adresse_four' => $adresse,
                'telephone_four '   => $tele,
                'adr_email' => $email,
                'admin_add_four' => $id_admin,
                'date_add_four' => $date_add
            );

            $addFournisseur = $this->Utilisateurs_model->addFournisseur($data);

            if ($addFournisseur = true)
            {
                $this->session->set_flashdata('sucess', 'Ajout fournisseur réussi');
                redirect('Admin/Administrateur/addFournisseur');
            }
            else{
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Admin/Administrateur/addFournisseur');
            }
        }
        else{
            $this->addFournisseur();
        }
    }

    /** CLients */
    public function Clients(){
        $listeClients = $this->Admin_model->getListesClients();
        $data['listeClients'] = $listeClients;

        $this->load->view('admin/templates/header_view');
        $this->load->view('admin/pages/listeClients_view', $data);
        $this->load->view('admin/templates/footer_view');
    }
    /** Slider */
    public function slider(){
        $listesPhotos = $this->Admin_model->getListesPhotos();
        $data['listesPhotos'] = $listesPhotos;

        $this->load->view('admin/templates/header_view');
        $this->load->view('admin/pages/slider_view', $data);
        $this->load->view('admin/templates/footer_view');
    }
    public function ajoutPhoto(){
        $this->form_validation->set_rules('titre', "titre", 'trim|required');
        $this->form_validation->set_rules('type', "type", 'trim|required');

        //Config image
        $config['upload_path'] = './uploads/slider';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2000;
        $config['max_width'] = 2000;
        $config['max_height'] = 1500;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if ($this->form_validation->run() == true) {

            if (!$this->upload->do_upload('userfile')) {
                $data['error_message'] = $this->upload->display_errors();

                $this->load->view('admin/templates/header_view');
                $this->load->view('admin/pages/slider_view', $data);
                $this->load->view('admin/templates/footer_view');
            }
            else{
                $titre = $this->input->post('titre');
                $type = $this->input->post('type');
                $full_path = $this->upload->data('file_name');
                $token =  random_string('alnum', 7);

                $id_admin = $this->session->userdata('id_admin');
                $date_add = $this->getDatetimeNow();

                $data = array(
                    'titre_slide' => $titre,
                    'image_slide' => $full_path,
                    'token_slide ' => $token,
                    'type_slide ' => $type,
                    'id_admin_add ' => $id_admin,
                    'date_add ' => $date_add
                );

                $addSlider = $this->Admin_model->addSlider($data);

                if ($addSlider = true) {
                    $this->session->set_flashdata('success', 'Votre photo à été ajouté');
                    redirect('Admin/Administrateur/slider/', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Veuillez réessayer.');
                    redirect('Admin/Administrateur/slider/');
                }
            }
        }
        else{
            $this->slider();
        }
    }

    public function suppressionPhoto($token){
        $data = array(
            'id_admin_delete' => $this->session->userdata('id_admin'),
            'date_delete' => $this->getDatetimeNow()
        );

        $bloquerSlider = $this->Admin_model->bloquerSlider($token, $data);

        if ($bloquerSlider = true)
        {
            $this->session->set_flashdata('sucess', 'suppression de la photo réussi');
            redirect('Admin/Administrateur/slider');
        }
        else{
            $this->session->set_flashdata('error', 'Veuillez réessayer.');
            redirect('Admin/Administrateur/slider');
        }
    }
}