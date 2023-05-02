


<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-com | Connexion</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo/favicon.png" />

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
            color: red;
            font-size: 15px;
        }
        .logoDiv{
            text-align: center;
        }
        .logoDiv img{
            width: 90%;
            height: auto;
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
                                <div class="logoDiv">
                                    <img src="<?php echo base_url();?>assets/images/logo/logo.png" alt="Logo">
                                </div>
                                <h2 class="mb-2 text-center">Connexion</h2>
                                <p class="text-center">Veuillez vous connectez.</p>
                                <?php if (isset($error_message)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error_message; ?>
                                    </div>
                                <?php } ?>
                                <form action="<?php echo base_url();?>Verification" method="post">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Nom d'utilisateur</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Veuillez saisir votre nom d'utilisateur">
                                                <span class="infoMessage"><?php echo form_error('username'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="password" class="form-label">Mot de passe</label>
                                                <input type="password" class="form-control" id="password" name="pass" placeholder="Veuillez saisir votre mot de passe">
                                                <span class="infoMessage"><?php echo form_error('pass'); ?></span>
                                            </div>
                                        </div>

                                        <br>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Connexion</button>
                                    </div>
                                </form>
                                <div class="col-lg-12 d-flex justify-content-center" style="margin-top: 10px;">
                                    <a href="#">Mot de passer oublié?</a>
                                </div>
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