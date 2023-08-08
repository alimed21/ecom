<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-com - <?php echo $titreAffiche;?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/core/libs.min.css" />


    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/hope-ui.min.css?v=1.2.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.min.css?v=1.2.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/dark.min.css"/>

    <!-- Customizer Css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/rtl.min.css"/>

    <style>
        .infoMessage{
            color:red;
            font-size:15px;
        }
    </style>

</head>
<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
<!-- loader Start -->
<div id="loading">
    <div class="loader simple-loader">
        <div class="loader-body"></div>
    </div>    </div>
<!-- loader END -->

<div class="wrapper">
    <section class="login-content">
        <div class="row m-0 align-items-center bg-white vh-100">
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                            <div class="card-body">
                                <a href="<?php echo base_url();?>dashboard/index.html" class="navbar-brand d-flex align-items-center mb-3">
                                    <!--Logo start-->
                                    <svg width="30" class="" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                    </svg>
                                    <!--logo End-->                              <h4 class="logo-title ms-3">Hope UI</h4>
                                </a>
                                <h2 class="mb-2 text-center">Information</h2>
                                <p class="text-center">Veuillez renseigner les informations de votre boutique.</p>
                                <?php if (isset($error_message)):?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error_message; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($erreur_message)):?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $erreur_message; ?>
                                    </div>
                                <?php endif; ?>
                                <form action="<?php echo base_url();?>Boutiques/ajoutBoutique" method="post"  enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Boutique</label>
                                                <input type="text" class="form-control" id="nom_boutique" name="nom_boutique" placeholder="Veuillez saisir le nom de la boutique">
                                                <span class="infoMessage"><?php echo form_error('nom_boutique'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Numéro de téléphone</label>
                                                <input type="number" class="form-control" id="num_boutique" name="num_boutique" placeholder="Veuillez saisir le numéro téléphone de la boutique">
                                                <span class="infoMessage"><?php echo form_error('num_boutique'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Adresse</label>
                                                <input type="text" class="form-control" id="adr_boutique" name="adr_boutique" placeholder="Veuillez saisir l'adresse de la boutique">
                                                <span class="infoMessage"><?php echo form_error('adr_boutique'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Nom gérant</label>
                                                <input type="text" class="form-control" id="nom_gerant" name="nom_gerant" placeholder="Veuillez saisir le nom du gérant de la boutique">
                                                <span class="infoMessage"><?php echo form_error('nom_gerant'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Téléphone du gérant</label>
                                                <input type="number" class="form-control" id="num_gerant" name="num_gerant" placeholder="Veuillez saisir le numéro de téléphone du gérant de la boutique">
                                                <span class="infoMessage"><?php echo form_error('num_gerant'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email_gerant" name="email_gerant" placeholder="Veuillez saisir l'adresse électronique du gérant de la boutique">
                                                <span class="infoMessage"><?php echo form_error('email_gerant'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Compte</label>
                                                <input type="number" class="form-control" id="compte_bancaire" name="compte_bancaire" placeholder="Veuillez saisir le numéro de votre compte bancaire">
                                                <span class="infoMessage"><?php echo form_error('compte_bancaire'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Banque</label>
                                                <input type="text" class="form-control" id="nom_banque" name="nom_banque" placeholder="Veuillez saisir le nom de la banque">
                                                <span class="infoMessage"><?php echo form_error('nom_banque'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Lien</label>
                                                <input type="text" class="form-control" id="lien_facebook" name="lien_facebook" placeholder="Veuillez saisir le lien de votre page facebook de votre boutique">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Importer votre patente</label>
                                                <input name="patente" id="patente" type="file" class="form-control-file">
                                                <span class="infoMessage"><?php echo form_error('nom_boutique'); ?></span>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sign-bg">
                    <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.05">
                            <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF"/>
                            <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF"/>
                            <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF"/>
                            <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF"/>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                <img src="<?php echo base_url();?>assets/images/auth/01.png" class="img-fluid gradient-main animated-scaleX" alt="images">
            </div>
        </div>
    </section>
</div>

<!-- Library Bundle Script -->
<script src="<?php echo base_url();?>assets/js/core/libs.min.js"></script>

<!-- External Library Bundle Script -->
<script src="<?php echo base_url();?>assets/js/core/external.min.js"></script>

<!-- Widgetchart Script -->
<script src="<?php echo base_url();?>assets/js/charts/widgetcharts.js"></script>

<!-- mapchart Script -->
<script src="<?php echo base_url();?>assets/js/charts/vectore-chart.js"></script>
<script src="<?php echo base_url();?>assets/js/charts/dashboard.js" ></script>

<!-- fslightbox Script -->
<script src="<?php echo base_url();?>assets/js/plugins/fslightbox.js"></script>

<!-- Settings Script -->
<script src="<?php echo base_url();?>assets/js/plugins/setting.js"></script>

<!-- Slider-tab Script -->
<script src="<?php echo base_url();?>assets/js/plugins/slider-tabs.js"></script>

<!-- Form Wizard Script -->
<script src="<?php echo base_url();?>assets/js/plugins/form-wizard.js"></script>

<!-- AOS Animation Plugin-->

<!-- App Script -->
<script src="<?php echo base_url();?>assets/js/hope-ui.js" defer></script>
</body>
</html>