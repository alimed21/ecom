<!DOCTYPE html>
<html>
<head>
<title>MyExpress</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
    <link rel = "icon" href="<?php echo base_url();?>assets/img/newL.png" type = "image/x-icon">

    <link href="<?php echo base_url();?>assets/front/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url();?>assets/front/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url();?>assets/front/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/front/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/flexslider.css" type="text/css" media="screen" />


    <!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
    <style>
        #pagination {
            color: #c3c3c3;
            font-size: 12px;
            font-weight: 500;
            margin: 14px 0 15px;
        }

        ul.tsc_pagination li a
        {
            color: #646464;
            border: 1px solid #ececec;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            display: block;
            font-size: 12px;
            float: left;
            width: 36px;
            height: 36px;
            padding: 6px;
            margin: 0 5px 10px 0;
            text-align: center;
            text-decoration: none;
        }
        ul.tsc_pagination li a:hover,
        ul.tsc_pagination li a.current
        {
            background: #51a3ff;
            border-color: #51a3ff;
            color: #fff;
            width: 36px;
            height: 36px;
        }
        #pagination a:visited{
            color:black;
        }
        .btnLogin{
            font-size: 13px;
            color: #fff;
            background: #519dbe;
            text-decoration: none;
            position: relative;
            border: none;
            border-radius: 0;
            width: 32%;
            text-transform: uppercase;
            padding: .5em 0;
            outline: none;
            letter-spacing: 1px;
            font-weight: 600;
        }
        .infoMessage{
            color: red;
        }
    </style>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v9.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/fr_FR/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution="setup_tool"
     page_id="103433538262054"
     theme_color="#519dbe"
     logged_in_greeting="Salut! Comment pouvons-nous vous aider?"
     logged_out_greeting="Salut! Comment pouvons-nous vous aider?">
</div><!-- header -->
<div class="header" id="home">
	<div class="container">
		<ul>
		    <li>
                <?php if(!$this->session->userdata('id_client')):?>
                    <a href="<?php echo base_url();?>Clients"> <!--data-toggle="modal" data-target="#myModal"--><i class="fa fa-unlock-alt" aria-hidden="true"></i> Se connecter</a>
                <?php else:?>
                    <i class="fa fa-user" aria-hidden="true"></i><?php echo $this->session->userdata('username');?>
                    |
                    <a href="<?php echo base_url();?>Clients/deconnexion">
                        <i class="glyphicon glyphicon-log-out"></i>Déconnexion
                    </a>
                <?php endif;?>
            </li>
			<li>
                <?php if(!$this->session->userdata('id_client')):?>
                    <a href="<?php echo base_url();?>Clients/inscription"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> S'inscrire</a>
                <?php else:?>
                    <a href="#" data-toggle="modal" data-target="#historiquePanier"><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i> Historique commande</a>
                <?php endif;?>
            </li>
			<li><i class="fa fa-phone" aria-hidden="true"></i> Appel : +253-77580622</li>
			<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:contact@riyadexpress.com">contact@riyadexpress.com</a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<div class="col-md-4 header-middle">
			<form action="<?php echo base_url();?>Recherche" method="post">
					<input type="search" name="search" placeholder="Chercher ici..." required="">
					<input type="submit" value=" ">
				<div class="clearfix"></div>
			</form>
		</div>
		    <!-- header-bot -->
            <div class="col-md-4 logo_agile">
				<h1><a href="<?php echo base_url();?>"><span>M</span>yExpress <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i></a></h1>
			</div>
            <!-- header-bot -->
		<div class="col-md-4 agileits-social top_content">
            <ul class="social-nav model-3d-0 footer-social w3_agile_social">
                <li class="share">Suivez-nous sur : </li>
                <li>
                    <a href="https://www.facebook.com/MyExpressOfficial" class="facebook">
                        <div class="front">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </div>
                        <div class="back">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/riyadexpress/" class="instagram">
                        <div class="front">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </div>
                        <div class="back">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </div>
                    </a>
                </li>
            </ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="menu__item"><a class="menu__link" href="<?php echo base_url();?>">Accueil <span class="sr-only">(current)</span></a></li>
					<?php if($allCategorie != NULL):?>
                        <?php foreach($allCategorie as $cate):?>
                            <li class="dropdown menu__item">
                                <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $cate->cate;?> <span class="caret"></span></a>
                                <?php if($allSousCategories != NULL ||  $allSousCategories2 != NULL):?>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                                            <a href="#"><img src="<?php echo base_url();?>uploads/img_cate/<?php echo $cate->image;?>" alt=" "/></a>
                                        </div>
                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <?php foreach($allSousCategories as $sscate):?>
                                                    <?php if($cate->id_cate == $sscate->id_cate):?>
                                                        <li><a href="<?php echo base_url();?>Produit/produitsParSousCategories/<?php echo $sscate->id_ss_cate;?>"><?php echo $sscate->titre_ss_cate;?></a></li>
                                                    <?php endif;?>
                                                <?php endforeach;?>
                                            </ul>
                                        </div>
                                    </ul>
                                <?php endif;?>
                            </li>
                        <?php endforeach;?>
                    <?php endif;?>
                    <li class=" menu__item"><a class="menu__link" href="<?php echo base_url();?>Fournisseur/listeDesFournisseurs">Boutiques</a></li>
					<li class=" menu__item"><a class="menu__link" href="<?php echo base_url();?>Contact">Contact</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1">
                <a  href="<?php echo base_url();?>Commande/panier">
                    <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                </a>
            </div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
<!-- Historique panier -->
<div class="modal fade" id="historiquePanier" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="col-md-12 modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Votre historique </h3>
                    <?php if($historiquePanier != false):?>
                    <div class="bs-docs-example">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>N°cmd</th>
                                <th>Article</th>
                                <th>Prix</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($historiquePanier as $history):?>
                                    <tr>
                                        <td><?php echo $history->code_cmd;?></td>
                                        <td><?php echo $history->prod;?></td>
                                        <?php if($history->promo == "non"):?>
                                        <td><?php echo $history->prix;?>fdj</td>
                                        <?php else:?>
                                        <td><?php echo $history->prix_promo;?>fdj</td>
                                        <?php endif;?>
                                        <td><?php echo date ("d/m/Y h:ia",strtotime($history->date_cmd));?></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <?php else:?>
                        <p>
                            Votre historique est vide pour l'instant.
                        </p>
                    <?php endif;?>
                </div>
                <div class="col-md-0 modal_body_right modal_body_right1">
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- End historique panier -->