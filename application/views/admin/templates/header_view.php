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

    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="<?php echo base_url();?>assets/main.css" rel="stylesheet">
    <style>
        .infoMessage{
            color:red;
            font-size: 15px;
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
        </div>
        <div class="app-header__content">
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                        <?php echo $this->session->userdata('login_admin');?><br>
                                        Administrateur
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                        <button type="button" tabindex="0" class="dropdown-item">Profil</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Paramètre</button>
                                        <button type="button" tabindex="0" class="dropdown-item">
                                            <a href="<?php echo base_url();?>Admin/LoginAdmin/logout" style="color: black">
                                                Déconnexion
                                            </a>
                                        </button>
                                    </div>
                                </div>
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
                        <li class="app-sidebar__heading">Statistique</li>
                        <li>
                            <a href="<?php echo base_url();?>Admin/Administrateur/tableauDeBord">
                                <i class="metismenu-icon pe-7s-rocket"></i>
                                Tableau de bord
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Gestions</li>
                        <li>
                            <a href="<?php echo base_url();?>Admin/Administrateur">
                                <i class="metismenu-icon pe-7s-diamond"></i>
                                Rôles
                            </a>

                        <li>
                            <a href="<?php echo base_url();?>Admin/Administrateur/ajouterCategorie">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Catégorie
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>Admin/Administrateur/ajouterSousCategorie">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Sous-catégorie
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>Admin/Administrateur/ajoutUtilisateur">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Utilisateurs
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>Admin/Administrateur/addFournisseur">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Fournisseur
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>Admin/Administrateur/Clients">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Clients
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>Admin/Administrateur/slider">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Photos
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>