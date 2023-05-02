<!DOCTYPE html>
<html lang="en">
<head>
    <title>MyExpress - Connexion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/image/LOGO_mini.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/l2/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/l2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/l2/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/l2/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/l2/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/l2/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="v<?php echo base_url();?>assets/login/l2/endor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/l2/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/l2/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/l2/css/main.css">
    <!--===============================================================================================-->
</head>
<body>


<div class="container-login100" style="background-image: url('<?php echo base_url();?>assets/login/l2/images/bg-01.jpg');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
        <form class="login100-form validate-form" action="<?php echo base_url();?>Admin/Login/verifylogin" method="post">
            <div style="text-align: center">
                <img src="<?php echo base_url();?>assets/image/logoMyExpress.png" alt="" style="width: 200px;height: auto">
            </div>
            <span class="login100-form-title p-b-37">
                Initialiser votre mot de passe
            </span>

            <?php if (isset($error_message)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>


            <div class="wrap-input100 validate-input m-b-20" data-validate="Entrer votre adresse électronique">
                <input class="input100" type="email" name="email" placeholder="Adresse électronique">
                <span class="focus-input100"></span>
            </div>


            <div class="container-login100-form-btn">
                <button class="login100-form-btn" style="background: #529dbd">
                    Initialisation
                </button>
            </div>

            <div class="text-center">
                <a href="<?php echo base_url();?>Admin/Login/" class="txt2 hov1">
                   Vous avez un compte?
                </a>
            </div>
        </form>


    </div>
</div>



<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/login/l2/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/login/l2/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/login/l2/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url();?>assets/login/l2/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/login/l2/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/login/l2/vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/login/l2/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/login/l2/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/login/l2/js/main.js"></script>

</body>
</html>