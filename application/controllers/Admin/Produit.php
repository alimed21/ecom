<?php


class Produit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin/Produit_model");
        $this->load->model("Admin/Login_model");
        $this->load->model('Admin/Categories_model');
        $this->load->model('Admin/Commande_model');
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

    function getDatetimeDelete()
    {
        $tz_object = new DateTimeZone('Africa/Djibouti');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y-m-d H:i:s');
    }

    /** Gestion des produits */
    public function index(){
        $listesCategories = $this->Categories_model->getAllCategories();
        $data['listesCategories'] = $listesCategories;

        /** Count commande */
        $boutique = $this->session->userdata('id_boutique');
        $countCommandes = $this->Commande_model->countCommande($boutique);
        $data['countCommandes'] = $countCommandes;

        /** Titre */
        $titreAffiche = 'Ajouter un produit';
        $data['titreAffiche'] = $titreAffiche;

        $this->load->view('utilisateur/templates/header_view', $data);
        $this->load->view('utilisateur/pages/ajoutProduit_view', $data);
        $this->load->view('utilisateur/templates/footer_view');
    }

    public function ajoutProduit(){
        //Config image
        $config['upload_path'] = './uploads/produit';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2000;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('userfile')) {
            $data['error_message'] = $this->upload->display_errors();

            /** Count commande */
            $boutique = $this->session->userdata('id_boutique');
            $countCommandes = $this->Commande_model->countCommande($boutique);
            $data['countCommandes'] = $countCommandes;


            $listesCategories = $this->Categories_model->getAllCategories();
            $data['listesCategories'] = $listesCategories;

            /** Titre */
            $titreAffiche = 'Ajouter un produit';
            $data['titreAffiche'] = $titreAffiche;

            $this->load->view('utilisateur/templates/header_view', $data);
            $this->load->view('utilisateur/pages/ajoutProduit_view', $data);
            $this->load->view('utilisateur/templates/footer_view');
        }
        else{
            $this->form_validation->set_rules('prod', "titre", 'trim|required');
            $this->form_validation->set_rules('cate', "catégorie", 'trim|required');
            $this->form_validation->set_rules('subcate', "sous-catégorie", 'trim|required');
            $this->form_validation->set_rules('prix', "prix", 'trim|required');
            $this->form_validation->set_rules('quantite', "quantite", 'trim|required');
            $this->form_validation->set_rules('text', "déscription", 'trim|required');
            $this->form_validation->set_rules('promo', "article en promotion", 'trim|required');

            if ($this->form_validation->run() == true){
                $promo = $this->input->post('promo');

                if($promo == "oui"){
                    $this->form_validation->set_rules('prixpromo', "prix promotion", 'trim|required');

                    if ($this->form_validation->run() == true){
                        //Déclaration variable
                        $titre = $this->input->post('prod');
                        $prix = $this->input->post('prix');
                        $text = $this->input->post('text');
                        $quantite = $this->input->post('quantite');
                        $promo = $this->input->post('promo');
                        $prixpromo = $this->input->post('prixpromo');
                        $subcate = $this->input->post('subcate');
                        $full_path = strtolower($this->upload->data('file_name'));
                        $token =  random_string('alnum', 7);
                        $boutique = $this->session->userdata('id_boutique');
                        $id_user = $this->session->userdata('id_user');
                        $date_add = $this->getDatetimeNow();

                        $data = array(
                            'prod' => $titre,
                            'prix' => $prix,
                            'description ' => $text,
                            'promo ' => $promo,
                            'prix_promo ' => $prixpromo,
                            'quantite' => $quantite,
                            'id_boutique ' => $boutique,
                            'image ' => $full_path,
                            'token ' => $token,
                            'id_sscate' => $subcate,
                            'date_prod ' => $date_add,
                            'id_user_add ' => $id_user
                        );


                        $addProduit = $this->Produit_model->addProduit($data);

                        if ($addProduit = true) {

                            $upload_files = $this->upload_files($token);

                            if($upload_files == TRUE)
                            {
                                $action = "Produit n°".$token." a été ajouter avec succès";
                                $color = "primary";
                                $this->histoirque($action, $color);
                                $this->session->set_flashdata('success', 'Votre produit a été ajouté');
                                redirect('Admin/Produit/listeProduits', 'refresh');
                            }
                            else
                            {
                                $this->session->set_flashdata('success', "Votre produit n'a pas été ajouté");
                                redirect('Admin/Produit/listeProduits', 'refresh');
                            }
                        } else {
                            $this->session->set_flashdata('error', 'Veuillez réessayer.');
                            redirect('Admin/Produit/listeProduits');
                        }
                    }
                    else{
                        $message_promo = "Le champs prix promotion est obligatoire";
                        $data['message_promo'] = $message_promo;

                        /** Count commande */
                        $boutique = $this->session->userdata('id_boutique');
                        $countCommandes = $this->Commande_model->countCommande($boutique);
                        $data['countCommandes'] = $countCommandes;


                        $listesCategories = $this->Categories_model->getAllCategories();
                        $data['listesCategories'] = $listesCategories;

                        /** Titre */
                        $titreAffiche = 'Ajouter un produit';
                        $data['titreAffiche'] = $titreAffiche;

                        $this->load->view('utilisateur/templates/header_view', $data);
                        $this->load->view('utilisateur/pages/ajoutProduit_view', $data);
                        $this->load->view('utilisateur/templates/footer_view');
                    }
                }
                else{
                    //Déclaration variable
                    $titre = $this->input->post('prod');
                    $prix = $this->input->post('prix');
                    $text = $this->input->post('text');
                    $quantite = $this->input->post('quantite');
                    $promo = $this->input->post('promo');
                    $prixpromo = $this->input->post('prixpromo');
                    $subcate = $this->input->post('subcate');
                    $full_path = strtolower($this->upload->data('file_name'));
                    $token =  random_string('alnum', 7);
                    $boutique = $this->session->userdata('id_boutique');
                    $id_user = $this->session->userdata('id_user');
                    $date_add = $this->getDatetimeNow();

                    $data = array(
                        'prod' => $titre,
                        'prix' => $prix,
                        'description ' => $text,
                        'promo ' => $promo,
                        'prix_promo ' => $prixpromo,
                        'quantite' => $quantite,
                        'id_boutique ' => $boutique,
                        'image ' => $full_path,
                        'token ' => $token,
                        'id_sscate' => $subcate,
                        'date_prod ' => $date_add,
                        'id_user_add ' => $id_user
                    );


                    $addProduit = $this->Produit_model->addProduit($data);

                    if ($addProduit = true) {

                        $upload_files = $this->upload_files($token);

                        if($upload_files == TRUE)
                        {
                            $action = "Produit n°".$token." a été ajouter avec succès";
                            $color = "primary";
                            $this->histoirque($action, $color);
                            $this->session->set_flashdata('success', 'Votre produit a été ajouté');
                            redirect('Admin/Produit/listeProduits', 'refresh');
                        }
                        else
                        {
                            $this->session->set_flashdata('success', "Votre produit n'a pas été ajouté");
                            redirect('Admin/Produit/listeProduits', 'refresh');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Veuillez réessayer.');
                        redirect('Admin/Produit/listeProduits');
                    }
                }

            }else{
                $this->index();
            }
        }
    }

    /**
	 * @param $token
	 * @return bool
	 */
	public function upload_files($token){
		$result = FALSE;
		$cpt = count($_FILES ['file_upload'] ['name']);
		// var_dump($cpt);die;
		for ($i = 0; $i < $cpt; $i++){
			$_FILES['userfile']['name']     = $_FILES['file_upload']['name'][$i];
			$_FILES['userfile']['type']     = $_FILES['file_upload']['type'][$i];
			$_FILES['userfile']['tmp_name'] = $_FILES['file_upload']['tmp_name'][$i];
			$_FILES['userfile']['error']    = $_FILES['file_upload']['error'][$i];
			$_FILES['userfile']['size']     = $_FILES['file_upload']['size'][$i];

			$config = array(
				'allowed_types' => 'jpg|jpeg|png',
				'max_size'      => 3000,
				'max_width'      => 2000,
				'max_height'      => 2000,
				'overwrite'     => true,
				'encrypt_name'  => TRUE,
				'upload_path' =>'uploads/images/'
			);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$result = FALSE;
			if ( !$this->upload->do_upload('userfile')){
				$result = FALSE;
			}else{
                //var_dump($token);die;
				$final_files_data = $this->upload->data();
				$this->Produit_model->othPhoto($final_files_data['file_name'], $token);
			}
			$result = TRUE;
		}
		return $result;
	}

	public function listeProduits(){
        /** Titre */
        $titreAffiche = 'Liste des produits';
        $data['titreAffiche'] = $titreAffiche;

        $idBoutique = $this->session->userdata('id_boutique');

        /** Count commande */
        $boutique = $this->session->userdata('id_boutique');
        $countCommandes = $this->Commande_model->countCommande($boutique);
        $data['countCommandes'] = $countCommandes;


        $listeProduitsUser = $this->Produit_model->getAllProduitByUser($idBoutique);
        $data['listeProduitsUser'] = $listeProduitsUser;

        $this->load->view('utilisateur/templates/header_view', $data);
        $this->load->view('utilisateur/pages/listeProduits_view', $data);
        $this->load->view('utilisateur/templates/footer_view');
    }

    /**public function test(){
        $token = "3fjQkYs";
        $idBoutique = $this->session->userdata('id_boutique');

        /** Images restant
        $autresImages = $this->Produit_model->getAllImages($token);
        $data['autresImages'] = $autresImages;

        var_dump($autresImages);die;


        if($autresImages != NULL){
            foreach ($autresImages as $ph){
                $output['photo_name'] = $ph->photo_name;
            }
            var_dump($output['photo_name']);
        }
        else{
            $output['failed'] = '<font color="#ff0000" style="font-size: 20px;">Data not available</font>';
            echo json_encode($output);
        }
    }**/

     public function getOtherPict(){
        $data = $this->input->get();
        $token = $data['token'];

        $idBoutique = $this->session->userdata('id_boutique');

        /** Images restant **/
        $autresImages = $this->Produit_model->getAllImages($token);
        $data['autresImages'] = $autresImages;


        if($autresImages != NULL){
            echo json_encode($data['autresImages']);
        }
        else{
            $output['failed'] = '<font color="#ff0000" style="font-size: 20px;">Data not available</font>';
            echo json_encode($output);
        }

    }

    public function modifierProduit($token){
        /** Titre **/
        $titreAffiche = 'Modification d\'un produit';
        $data['titreAffiche'] = $titreAffiche;

        $idBoutique = $this->session->userdata('id_boutique');

        /** Count commande */
        $boutique = $this->session->userdata('id_boutique');
        $countCommandes = $this->Commande_model->countCommande($boutique);
        $data['countCommandes'] = $countCommandes;


        $listesCategories = $this->Categories_model->getAllCategories();
        $data['listesCategories'] = $listesCategories;

        $detailProd = $this->Produit_model->getDetailProduit($idBoutique, $token);
        $data['detailProd'] = $detailProd;

        $this->load->view('utilisateur/templates/header_view', $data);
        $this->load->view('utilisateur/pages/modifierProduits_view', $data);
        $this->load->view('utilisateur/templates/footer_view');
    }

    public function modificationProduit(){
        $this->form_validation->set_rules('prod', "titre", 'trim|required');
        $this->form_validation->set_rules('cate', "catégorie", 'trim|required');
        $this->form_validation->set_rules('subcate', "sous-catégorie", 'trim|required');
        $this->form_validation->set_rules('prix', "prix", 'trim|required');
        $this->form_validation->set_rules('quantite', "quantite", 'trim|required');
        $this->form_validation->set_rules('text', "déscription", 'trim|required');
        $this->form_validation->set_rules('promo', "article en promotion", 'trim|required');
        //token
        $token = $this->input->post("token");

        if ($this->form_validation->run() == true) {
            $promo = $this->input->post('promo');
            if($promo == "oui") {
                $this->form_validation->set_rules('prixpromo', "prix promotion", 'trim|required');
                if ($this->form_validation->run() == true){
                    //Déclaration des variables
                    $titre = $this->input->post('prod');
                    $prix = $this->input->post('prix');
                    $text = $this->input->post('text');
                    $quantite = $this->input->post('quantite');
                    $promo = $this->input->post('promo');
                    $prixpromo = $this->input->post('prixpromo');
                    $subcate = $this->input->post('subcate');

                    //Config image
                    $config['upload_path'] = './uploads/produit';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = 2000;
                    $config['max_width'] = 2000;
                    $config['max_height'] = 2000;
                    $config['encrypt_name'] = TRUE;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('userfile')) {
                        $data = array(
                            'prod' => $titre,
                            'prix' => $prix,
                            'description ' => $text,
                            'promo ' => $promo,
                            'prix_promo ' => $prixpromo,
                            'quantite' => $quantite,
                            'id_sscate' => $subcate
                        );
                        $updateProduit = $this->Produit_model->updateProduit($data, $token);

                        if ($updateProduit = true) {
                            $action = "Vous venez de modifier le produit n°".$token.".";
                            $color = "warning";
                            $this->histoirque($action, $color);
                            $this->session->set_flashdata('success', 'Votre produit a été modifier');
                            redirect('Admin/Produit/listeProduits', 'refresh');
                        } else {
                            $this->session->set_flashdata('error', 'Veuillez réessayer.');
                            redirect('Admin/Produit/listeProduits');
                        }
                    }
                    else {
                        $full_path = strtolower($this->upload->data('file_name'));

                        $data = array(
                            'prod' => $titre,
                            'prix' => $prix,
                            'description ' => $text,
                            'promo ' => $promo,
                            'prix_promo ' => $prixpromo,
                            'quantite' => $quantite,
                            'image ' => $full_path,
                            'id_sscate' => $subcate
                        );

                        $updateProduit = $this->Produit_model->updateProduit($data, $token);

                        if ($updateProduit = true) {
                            $action = "Vous venez de modifier le produit n°".$token.".";
                            $color = "warning";
                            $this->histoirque($action, $color);
                            $this->session->set_flashdata('success', 'Votre produit a été modifier');
                            redirect('Admin/Produit/listeProduits', 'refresh');
                        } else {
                            $this->session->set_flashdata('error', 'Veuillez réessayer.');
                            redirect('Admin/Produit/listeProduits');
                        }
                    }
                }
                else{

                    $this->session->set_flashdata('error', 'Le champs prix promotion est obligatoire.');
                    redirect('Admin/Produit/modifierProduit/'.$token);
                }
            }
            else{
                //Déclaration variable
                $titre = $this->input->post('prod');
                $prix = $this->input->post('prix');
                $text = $this->input->post('text');
                $quantite = $this->input->post('quantite');
                $promo = $this->input->post('promo');
                $prixpromo = $this->input->post('prixpromo');
                $subcate = $this->input->post('subcate');

                //Config image
                $config['upload_path'] = './uploads/produit';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 2000;
                $config['max_width'] = 2000;
                $config['max_height'] = 2000;
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('userfile')) {
                    $data = array(
                        'prod' => $titre,
                        'prix' => $prix,
                        'description ' => $text,
                        'promo ' => $promo,
                        'prix_promo ' => $prixpromo,
                        'quantite' => $quantite,
                        'id_sscate' => $subcate
                    );
                    $updateProduit = $this->Produit_model->updateProduit($data, $token);

                    if ($updateProduit = true) {
                        $action = "Vous venez de modifier le produit n°".$token.".";
                        $color = "warning";
                        $this->histoirque($action, $color);
                        $this->session->set_flashdata('success', 'Votre produit a été modifier');
                        redirect('Admin/Produit/listeProduits', 'refresh');
                    } else {
                        $this->session->set_flashdata('error', 'Veuillez réessayer.');
                        redirect('Admin/Produit/listeProduits');
                    }
                }
                else{
                    $full_path = strtolower($this->upload->data('file_name'));

                    $data = array(
                        'prod' => $titre,
                        'prix' => $prix,
                        'description ' => $text,
                        'promo ' => $promo,
                        'prix_promo ' => $prixpromo,
                        'quantite' => $quantite,
                        'image ' => $full_path,
                        'id_sscate' => $subcate
                    );

                    $updateProduit = $this->Produit_model->updateProduit($data, $token);

                    if ($updateProduit = true) {
                        $action = "Vous venez de modifier le produit n°".$token.".";
                        $color = "warning";
                        $this->histoirque($action, $color);
                        $this->session->set_flashdata('success', 'Votre produit a été modifier');
                        redirect('Admin/Produit/listeProduits', 'refresh');
                    } else {
                        $this->session->set_flashdata('error', 'Veuillez réessayer.');
                        redirect('Admin/Produit/listeProduits');
                    }
                }
            }
        }
        else{
            $this->modifierProduit($token);
        }
    }

    public function getsubcategory(){
        $data = $this->input->get();
        $catid = $data['cid'];
        $this->db->where(array('id_cate'=>$catid));
        $this->db->where("date_delete is null");
        $subcategory=$this->db->get('sscategorie')->result_array();
        foreach ($subcategory as $sub){
            echo "<option value=".$sub['id_ss_cate'].">".$sub['titre_ss_cate']."</option>";
        }
    }
    public function modifierPrixQuantiterProduit($token){
        /** Titre **/
        $titreAffiche = 'Modification d\'un produit';
        $data['titreAffiche'] = $titreAffiche;

        $idBoutique = $this->session->userdata('id_boutique');

        /** Count commande */
        $boutique = $this->session->userdata('id_boutique');
        $countCommandes = $this->Commande_model->countCommande($boutique);
        $data['countCommandes'] = $countCommandes;


        $listesCategories = $this->Categories_model->getAllCategories();
        $data['listesCategories'] = $listesCategories;

        $detailProd = $this->Produit_model->getDetailProduit($idBoutique, $token);
        $data['detailProd'] = $detailProd;

        $this->load->view('utilisateur/templates/header_view', $data);
        $this->load->view('utilisateur/pages/modifierQuantiteProduit_view', $data);
        $this->load->view('utilisateur/templates/footer_view');
    }

    public function modificationPrixQuantiterProduit(){
        $this->form_validation->set_rules('promo', "article en promotion", 'trim|required');
        $this->form_validation->set_rules('quantite', "quantite", 'trim|required');
        $this->form_validation->set_rules('prix', "prix", 'trim|required');
        //token
        $token = $this->input->post("token");

        if ($this->form_validation->run() == true) {
            //True
            $promo = $this->input->post('promo');

            if($promo == "oui") {
                $this->form_validation->set_rules('prixpromo', "prix promotion", 'trim|required');

                if ($this->form_validation->run() == true) {
                    $quantite = $this->input->post('quantite');
                    $prix = $this->input->post('prix');
                    $prixpromo = $this->input->post('prixpromo');

                    $data = array(
                        'prix' => $prix,
                        'promo' => $promo,
                        'prix_promo' => $prixpromo,
                        'quantite' => $quantite
                    );

                    //update
                    $updateProduit = $this->Produit_model->updateProduit($data, $token);

                    if ($updateProduit = true) {
                        $this->produitNonValid($token);
                    } else {
                        $this->session->set_flashdata('error', 'Veuillez réessayer.');
                        redirect('Admin/Produit/modifierPrixQuantiterProduit'.$token);
                    }

                }else{
                    $this->session->set_flashdata('error', 'Le champs prix promotion est obligatoire.');
                    redirect('Admin/Produit/modifierPrixQuantiterProduit/'.$token);
                }
            }
            else{
                $quantite = $this->input->post('quantite');
                $prix = $this->input->post('prix');

                $data = array(
                    'prix' => $prix,
                    'promo' => $promo,
                    'quantite' => $quantite
                );

                //update
                $updateProduit = $this->Produit_model->updateProduit($data, $token);

                if ($updateProduit = true) {
                    //Désactiver le produit
                    $this->produitNonValid($token);

                } else {
                    $this->session->set_flashdata('error', 'Veuillez réessayer.');
                    redirect('Admin/Produit/modifierPrixQuantiterProduit'.$token);
                }
            }
        }
        else{
            $this->modifierPrixQuantiterProduit($token);
        }
    }

    public function produitNonValid($token){
        if($token == null)
        {
            $this->session->set_flashdata('error', 'Veuillez réessayer.');
            redirect("Admin/Produit/listeProduits");
        }
        else
        {
            $id_admin_valid = NULL;
            $date_add_valid = NULL;
            $data = array(
                'id_admin_valid' => $id_admin_valid,
                'date_valid' => $date_add_valid
            );

            $desactiveProduit = $this->Produit_model->desactiveProduit($data, $token);

            if ($desactiveProduit = true) {
                $action = "Vous venez de modifier le prix ou la quantité du produit n°".$token.".";
                $color = "warning";
                $this->histoirque($action, $color);
                $this->session->set_flashdata('success', 'La quantité ou le prix de votre produit a été modifié');
                redirect('Admin/Produit/listeProduits', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Admin/Produit/modifierPrixQuantiterProduit'.$token);
            }
        }
    }
/**
    public function modifierProduit($token){
        $idFour = $this->session->userdata('if_four');
        /** Count commande
        $countCommandes = $this->Commande_model->countCommande($idFour);
        $data['countCommandes'] = $countCommandes;

        $detailProduit = $this->Produit_model->getDetailProduit($token);
        $data['detailProduit'] = $detailProduit;

        $listesCategories = $this->Categories_model->getAllCategories();
        $data['listesCategories'] = $listesCategories;

        $this->load->view('user/templates/header_view', $data);
        $this->load->view('user/pages/modifierProduit_view', $data);
        $this->load->view('user/templates/footer_view');
    }
 **/


    public function modificationImagePrincipale($token){
        $idFour = $this->session->userdata('if_four');
        /** Count commande */
        $countCommandes = $this->Commande_model->countCommande($idFour);
        $data['countCommandes'] = $countCommandes;

        $detailProduit = $this->Produit_model->getDetailProduit($token);
        $data['detailProduit'] = $detailProduit;

        $this->load->view('user/templates/header_view', $data);
        $this->load->view('user/pages/modifierImagePrincipaleProduit_view', $data);
        $this->load->view('user/templates/footer_view');
    }

    public function modifierImage(){
        //Config image
        $config['upload_path'] = './uploads/produit';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2000;
        $config['max_width'] = 2000;
        $config['max_height'] = 1500;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $token = $this->input->post("token");

        if (!$this->upload->do_upload('userfile')) {
            $idFour = $this->session->userdata('if_four');
            /** Count commande */
            $countCommandes = $this->Commande_model->countCommande($idFour);
            $data['countCommandes'] = $countCommandes;
            $data['error_message'] = $this->upload->display_errors();

            $detailProduit = $this->Produit_model->getDetailProduit($token);
            $data['detailProduit'] = $detailProduit;

            $this->load->view('user/templates/header_view', $data);
            $this->load->view('user/pages/modifierImagePrincipaleProduit_view', $data);
            $this->load->view('user/templates/footer_view');
        }
        else{
            //True
            $full_path = $this->upload->data('file_name');

            $data = array(
                'image ' => $full_path
            );

            $updateImageProduit = $this->Produit_model->updateImageProduit($data, $token);

            if ($updateImageProduit = true) {
                $this->session->set_flashdata('success', "L'image principale a bien été modifié");
                redirect('Admin/Produit/listeProduits', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Veuillez réessayer.');
                redirect('Admin/Produit/modificationImagePrincipale'.$token);
            }
        }
    }

    public function modificationImages($token){
        $idFour = $this->session->userdata('if_four');
        /** Count commande */
        $countCommandes = $this->Commande_model->countCommande($idFour);
        $data['countCommandes'] = $countCommandes;
        $detailProduit = $this->Produit_model->getDetailProduit($token);
        $data['detailProduit'] = $detailProduit;

        $this->load->view('user/templates/header_view', $data);
        $this->load->view('user/pages/modifierImages_view', $data);
        $this->load->view('user/templates/footer_view');
    }

    public function updateUploadFiles(){
        $result = FALSE;
        $token = $this->input->post("token");
        $cpt = count($_FILES ['file_upload'] ['name']);
        // var_dump($cpt);die;
        for ($i = 0; $i < $cpt; $i++){
            $_FILES['userfile']['name']     = $_FILES['file_upload']['name'][$i];
            $_FILES['userfile']['type']     = $_FILES['file_upload']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES['file_upload']['tmp_name'][$i];
            $_FILES['userfile']['error']    = $_FILES['file_upload']['error'][$i];
            $_FILES['userfile']['size']     = $_FILES['file_upload']['size'][$i];

            $config = array(
                'allowed_types' => 'jpg|jpeg|png',
                'max_size'      => 3000,
                'max_width'      => 1999,
                'max_height'      => 1999,
                'overwrite'     => true,
                'encrypt_name'  => TRUE,
                'upload_path' =>'uploads/images/'
            );
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $result = FALSE;
            if ( !$this->upload->do_upload('userfile')){
               $data['error_message'] = $this->upload->display_errors();

                $detailProduit = $this->Produit_model->getDetailProduit($token);
                $data['detailProduit'] = $detailProduit;

                $idFour = $this->session->userdata('if_four');
                /** Count commande */
                $countCommandes = $this->Commande_model->countCommande($idFour);
                $data['countCommandes'] = $countCommandes;

                $this->load->view('user/templates/header_view', $data);
                $this->load->view('user/pages/modifierImages_view', $data);
                $this->load->view('user/templates/footer_view');
            }else{
                $final_files_data = $this->upload->data();
                $this->Produit_model->othPhoto($final_files_data['file_name'], $token);
                $result = TRUE;
                if ($result == TRUE) {
                    $this->session->set_flashdata('success', "Les images ont bien été modifiés");
                    redirect('Admin/Produit/listeProduits', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Veuillez réessayer.');
                    redirect('Admin/Produit/modificationImages'.$token);
                }
            }
        }
    }


    public function enleverProduit($token = null){
        if($token == null)
        {
            redirect("Admin/Produit/listeProduits");
        }
        else
        {
            $verificationProduit = $this->Produit_model->verificationProduit($token);

            if($verificationProduit == true){
                $this->session->set_flashdata('error', 'Vous n\'avez pas l\'autorisation de supprimer ce produit.');
                redirect("Admin/Produit/listeProduits");
            }
            else{
                $id_user = $this->session->userdata('id_user');
                $date_delete = $this->getDatetimeDelete();
                $etat = 1;

                $data = array(
                    'id_user_delete' => $id_user,
                    'date_user_delete' => $date_delete
                );
                //Annonce premium
                if($this->Produit_model->validProduit($data, $token))
                {
                    $action = "Vous venez de supprimer le produit n°".$token.".";
                    $color = "danger";
                    $this->histoirque($action, $color);
                    $this->session->set_flashdata('success', 'Produit enlever.');
                    redirect("Admin/Produit/listeProduits");
                }
                else
                {
                    $this->session->set_flashdata('error', 'Erreur survenu, veuillez réessayer.');
                    redirect("Admin/Produit/listeProduits");
                }
            }
        }
    }


     /** Historique */
    public function histoirque($action, $color)
    {
        $data = array(
            'id_user'       =>$this->session->userdata('id_user'),
            'action_user'   => $action,
            'his_color'     => $color,
            'date_his'      =>$this->getDatetimeDelete()
        );
        $this->Login_model->log_manager_user($data);
    }
}