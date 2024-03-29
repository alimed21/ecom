<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $titreAffiche;?> | Ecom</title>
    <link href="<?php echo base_url();?>assets/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/front/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/front/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/front/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/front/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/front/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/front/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]-->
    <script src="<?php echo base_url();?>assets/front/js/html5shiv.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>assets/front/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>assets/front/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>assets/front/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>assets/front/images/ico/apple-touch-icon-57-precomposed.png">
    <style>
        .divForm{
            margin-left: 30%;
        }
        .divForm h2{
            text-align: center;
            font-weight: bold;
            font-size: 30px;
        }
        .infoMessage p{
            color: red;
            font-size: 15px;
        }
        .lienVoirPlus{
            margin-bottom: 9px;
            font-size: 18px;
            font-weight: bold;
        }
        .lienVoirPlus a{
            float:right;
        }
        .pagination .page-item .active{
            background-color: #FE980F !important;
            color: white !important;
        }
        .slidImg{
            margin-top: 10px;
            adding: 10px;
        }
        .btnSearch{
            margin-top: 27px !important;
        }
    </style>
</head><!--/head-->

<body>
<header id="header"><!--header-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="<?= base_url();?>"><img src="<?php echo base_url();?>assets/front/images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php if(!$this->session->userdata('id_client')):?>
                                <li><a href="<?php echo base_url();?>Inscription/client"><i class="fa fa-user"></i> Inscription</a></li>
                                <li><a href="<?php echo base_url();?>Connexion"><i class="fa fa-lock"></i> Connexion</a></li>
                            <?php else:?>
                                <li><a href="<?php echo base_url();?>Profil"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username');?></a></li>
                                <li><a href="<?php echo base_url();?>Client/panier"><i class="fa fa-shopping-cart"></i> Panier<span class="badge badge-secondary badge-pill" style="background-color: #d92550;padding: 5px 10px;"><?php echo $countPanier->totalCmd;?></span></a></li>
                                <li><a href="<?php echo base_url();?>Connexion/deconnexion"><i class="fa fa-lock"></i> Déconnexion</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?= base_url();?>">Accueil</a></li>
                            <li>
                                <a href="<?= base_url();?>Boutiques">
                                    Boutiques
                                </a>
                            </li>
                            <li class="dropdown"><a href="#">Catégories<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <?php if($categories != false):?>
                                        <?php foreach ($categories as $cat):?>
                                            <li><a href="<?= base_url();?>Produit/produitCategorie/<?= $cat->cate;?>"><?= $cat->cate;?></a></li>
                                        <?php endforeach;?>
                                    <?php else:?>
                                    <?php endif;?>
                                </ul>
                            </li>
                            <li><a href="<?= base_url();?>Contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->