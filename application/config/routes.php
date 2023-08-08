<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
/** Error */
$route['error404'] = 'Erreur/erreur404';
$route['BoutiqueNonValid'] = 'Erreur/boutiqueNonValid';
/** Admin */
$route['LoginAdmin'] = 'Admin/LoginAdmin';
$route['Deconnexion'] = 'Admin/LoginAdmin/logout';
$route['VerificationAdmin'] = 'Admin/LoginAdmin/verifylogin';
$route['Dashboard'] = 'Admin/Dashboard';
$routes['listeUtilisateurs'] = 'Admin/Utilisateur';
//$routes['listeProduit'] = 'Admin/Administrateur/listeProduit';
//$routes['Listeboutiques'] = 'Admin/Boutiques/index';
//$route['ValidtationBoutique/(:any)'] = 'Admin/Boutiques/validBoutique/$1';

                        /** Vendeur */

/**** Parametres ****/
$route['Parametres'] = 'Admin/Parametres/index';
$route['Parametres/changerMotPasse'] = 'Admin/Parametres/motPasse';
$route['Parametres/modifierMotPasse'] = 'Admin/Parametres/modificationMotPasse';
$route['Parametres/voirProfile'] = 'Admin/Parametres/voirProfile';
$route['Parametres/ajouterLogo'] = 'Admin/Parametres/ajouterLogo';
$route['Parametres/ajouterProfil'] = 'Admin/Parametres/ajouterProfil';
$route['Produit/listeProduits'] = 'Admin/Produit/listeProduits';
$route['Erreur/erreur404'] = 'Admin/Erreur/index';
$route['Parametres/modifierLogo'] = 'Admin/Parametres/modifierLogo';
$route['Parametres/modificationLogo'] = 'Admin/Parametres/verificationModificationLogo';
$route['Parametres/modifierPhotoProfile'] = 'Admin/Parametres/modifierImageProfile';
$route['Parametres/validationModification'] = 'Admin/Parametres/modificationPhotoProfil';





/**** Produit ****/
$route['Produits/liste'] = 'Admin/Produit/listeProduits';
$route['Produits/ajouter'] = 'Admin/Produit/index';
$route['Produits/modificationProduit/(:any)'] = 'Admin/Produit/modifierProduit/$1';
$route['Produits/modifierImages/(:any)'] = 'Admin/Produit/modificationImages/$1';
$route['Produits/modifierImageProd'] = 'Admin/Produit/updateImageProd';
$route['Produits/modifierUploadFiles'] = 'Admin/Produit/updateUploadFiles';
$route['Produits/modifierPrixQuantite/(:any)'] = 'Admin/produit/modifierPrixQuantiterProduit/$1';
$route['Produits/modifierixQuantiterProduit'] = 'Admin/produit/modificationPrixQuantiterProduit';
$route['Produits/supprimerProduit/(:any)'] = 'Admin/Produit/enleverProduit/$1';

/**** Utilisateurs ****/
$route['Utilisateur/liste'] = 'Admin/Utilisateurs/index';
$route['Utilisateur/ajouter'] = 'Admin/Utilisateurs/ajouterUtilisateur';

/**** Commande ****/
$route['Commande/liste'] = 'Admin/Commande/index';
$route['Utilisateur/ajouter'] = 'Admin/Utilisateurs/ajouterUtilisateur';

/**** Tableau de bord ****/
$route['dashboardVendre'] = 'Admin/TableauBord/index';

/** Users */
$route['default_controller'] = 'Accueil';
$route['Login'] = 'Admin/Login';
$route['DeconnexionUtilisateur'] = 'Admin/Login/logout';
$route['Verification'] = 'Admin/Login/verifylogin';
$route['Boutique'] = 'Boutiques/index';
$route['ajoutBoutique'] = 'Boutiques/ajoutBoutique';
$route['ajoutReussi'] = 'Boutiques/ajoutBoutiqueReussi';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/** Boutique */

/** Contact */



