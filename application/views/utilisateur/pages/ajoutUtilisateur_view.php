<div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1>ShopyGram</h1>
                                <p>Plateforme e-commerce.</p>
                            </div>
                            <div>
                                <a href="<?php echo base_url();?>Utilisateur/liste" class="btn btn-link btn-primary">
                                    Liste utilisateur
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-header-img">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header1.png" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header2.png" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header3.png" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header4.png" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header5.png" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
            </div>
        </div>          <!-- Nav Header Component End -->
        <!--Nav End-->
    </div>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
<div>
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Ajout d'un utilisateur pour votre boutique</h4>
                    </div>
                </div>
                <div class="card-body">
                    <?php if($verifieBoutique == true):?>
                        <p><span style="color:red">*</span> champs obligatoires</p>
                        <?php if ( $this->session->flashdata( 'error' ) ) :?>
                            <div class="alert alert-danger" role="alert">
                                <h2 style="font-size: 14px;"><?php echo $this->session->flashdata('error'); ?></h2>
                            </div>
                        <?php endif;?>
                        <form class="form-horizontal" action="<?php echo base_url();?>Admin/Utilisateurs/verificationAjout" method="post">
                            <div class="form-group row">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Nom d'utilisateur :</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Veuillez saisir le nom d'utilisateur">
                                    <span class="infoMessage"><?php echo form_error('username'); ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Mot de passe :</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Veuillez saisir votre mot de passe">
                                    <span class="infoMessage"><?php echo form_error('password'); ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Confirmation :</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="cnfpass" name="cnfpass" placeholder="Veuillez saisir la confirmation de votre mot de passe">
                                    <span class="infoMessage"><?php echo form_error('cnfpass'); ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Email :</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="adrmail" name="adrmail" placeholder="Veuillez saisir votre adresse électronique">
                                    <span class="infoMessage"><?php echo form_error('adrmail'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <button type="submit" class="btn btn-danger">Annuler</button>
                            </div>
                        </form>
                    <?php else:?>
                        <div style="text-align: center">
                            <h3>
                                Veuillez contactez l'administrateur.
                            </h3>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>