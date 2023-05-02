<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                    </div>
                    <div>
                        Paramètres
                    </div>
                </div>
                <div class="page-title-actions">
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                <div class="row">
                    <div class="col-md-4">
                        <div class="main-card mb-3 card"><img width="100%" src="<?php echo base_url();?>assets/image/pass.jpg" alt="Card image cap" class="card-img-top">
                            <div class="card-body"><h5 class="card-title" style="text-align: center">Mot de passe</h5>
                                <p style="color: black; font-size: 14px; text-align: center">
                                    Modifier votre ancien mot de passe.
                                </p>
                                <div class="card-text text-sm-center">
                                    <a href="<?php echo base_url();?>Admin/Parametres/motPasse" style="color: #007bff;text-decoration: none;background-color: transparent;">
                                        <button class="btn btn-primary">Cliquer ici</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-card mb-3 card">
                            <?php if($logoBoutique != FALSE):?>
                                <?php foreach ($logoBoutique as $logo):?>
                                    <img style="width: 354px;" width="61%" src="<?php echo base_url();?>uploads/logo/<?php echo $logo->logo_four;?>" alt="Card image cap" class="card-img-top">
                                <?php endforeach;?>
                            <?php else:?>
                                <img style="width: 354px;" width="61%" src="<?php echo base_url();?>assets/image/logo2.png" alt="Card image cap" class="card-img-top">
                            <?php endif;?>
                            <div class="card-body"><h5 class="card-title" style="text-align: center">Logo boutique</h5>
                                <p style="color: black; font-size: 14px; text-align: center">
                                    Modifier le logo de votre boutique.
                                </p>
                                <div class="card-text text-sm-center">
                                    <a href="<?php echo base_url();?>Admin/Parametres/logoFournisseur" style="color: #007bff;text-decoration: none;background-color: transparent;">
                                        <button class="btn btn-primary">Cliquer ici</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-card mb-3 card"><img width="100%" src="<?php echo base_url();?>assets/image/boutique.png" alt="Card image cap" class="card-img-top">
                            <div class="card-body"><h5 class="card-title" style="text-align: center">Information boutique</h5>
                                <p style="color: black; font-size: 14px; text-align: center">
                                    Modifier les informations de votre boutique.
                                </p>
                                <div class="card-text text-sm-center">
                                    <a href="<?php echo base_url();?>Admin/Parametres/informationBoutique" style="color: #007bff;text-decoration: none;background-color: transparent;">
                                        <button class="btn btn-primary">cliquer ici</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
