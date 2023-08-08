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
                        <a href="<?php echo base_url();?>Parametres/voirProfile" class="btn btn-link btn-primary">
                            Voir votre profil
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
                            <h4 class="card-title">Modifier la photo de votre profile</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p><span style="color:red">*</span> champs obligatoires</p>
                        <?php if (isset($error_message)) :?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( $this->session->flashdata( 'error' ) ) :?>
                            <div class="alert alert-danger" role="alert">
                                <h2 style="font-size: 14px;"><?php echo $this->session->flashdata('error'); ?></h2>
                            </div>
                        <?php endif;?>

                        <form class="form-horizontal" action="<?php echo base_url();?>Parametres/validationModification" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Importer une photo <span style="color:red">*</span>:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="userfile" id="userfile" type="file">
                                    <p class="p-b-28">
                                        Très important : le type du logo autorisé est : jpg, jpeg et png.
                                    </p>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Modifier</button>
                                <button type="submit" class="btn btn-danger">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>