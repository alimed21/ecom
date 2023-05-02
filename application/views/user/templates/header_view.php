<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MyExpress</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Build whatever layout you need with our Architect framework.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/image/LOGO_mini.png" />
    <link href="<?php echo base_url();?>assets/main.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/echarts/dist/echarts.min.js"></script>
    <style>
        .infoMessage{
            color:red;
            font-size: 15px;
        }
        .linkMenu{
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="">
                <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" style="width: 62px;"> MyExpress
            </div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
        </div>    <div class="app-header__content">
            <div class="app-header-left">
                        </div>
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                        <?php echo $this->session->userdata('username');?><br>
                                        Commerçant
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                        <a href="<?php echo base_url();?>Admin/Parametres/informationBoutique" class="linkMenu">
                                            <button type="button" tabindex="0" class="dropdown-item">Profil</button>
                                        </a>
                                        <a href="<?php echo base_url();?>Admin/Parametres/" class="linkMenu">
                                            <button type="button" tabindex="0" class="dropdown-item">Paramètres</button>
                                        </a>
                                        <a href="<?php echo base_url();?>Admin/Login/logout" class="linkMenu">
                                            <button type="button" tabindex="0" class="dropdown-item">Déconnexion</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">

                            </div>
                            <div class="widget-content-right header-user-info ml-3">

                            </div>
                        </div>
                    </div>
                </div>        </div>
        </div>
    </div>
    <div class="app-main">
        <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
            </div>
            <div class="scrollbar-sidebar">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading">Dashboards</li>
                        <li>
                            <a href="<?php echo base_url();?>Admin/TableauBord">
                                <i class="metismenu-icon pe-7s-graph"></i>
                                Tableau de bord
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>Admin/TableauBord/satistique">
                                <i class="metismenu-icon pe-7s-graph"></i>
                                Statistique
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Produit</li>
                        <li>
                            <a href="<?php echo base_url();?>Admin/Produit/">
                                <i class="metismenu-icon pe-7s-plus"></i>
                                Ajouter un produit
                            </a>
                        </li>
                        <?php if($this->session->userdata('id_role') == 3):?>
                            <li>
                                <a href="<?php echo base_url();?>Admin/Produit/listeProduitsNonValid">
                                    <i class="metismenu-icon pe-7s-display2"></i>
                                    Liste des produits non valide
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>Admin/Produit/listeProduits">
                                    <i class="metismenu-icon pe-7s-display2"></i>
                                    Liste des produits
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>Admin/Utilisateur">
                                    <i class="metismenu-icon pe-7s-display2"></i>
                                    Liste des utilisateurs
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>Admin/Photo/">
                                    <i class="metismenu-icon pe-7s-plus"></i>
                                    Ajouter une photo
                                </a>
                            </li>
                        <?php else:?>
                            <li>
                                <a href="<?php echo base_url();?>Admin/Produit/listeProduits">
                                    <i class="metismenu-icon pe-7s-menu"></i>
                                    Liste des produits
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>Admin/Commande/">
                                    <i class="metismenu-icon pe-7s-shopbag"></i>
                                    Commande <span class="badge badge-secondary badge-pill" style="background-color: #d92550;padding: 5px 10px;"><?php echo $countCommandes->totalCmd;?></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>Admin/Parametres/">
                                    <i class="metismenu-icon pe-7s-display2"></i>
                                    Paramètres
                                </a>
                            </li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </div>