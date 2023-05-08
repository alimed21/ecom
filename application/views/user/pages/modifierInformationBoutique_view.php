<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                    </div>
                    <div>Information de votre boutique
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Modification d'un produit</h5>
                        <?php if ( $this->session->flashdata( 'error' ) ) :?>
                            <div class="alert alert-danger">
                                <h2 class="infoMessage"><?php echo $this->session->flashdata('error'); ?></h2>
                            </div>
                        <?php endif;?>
                        <?php if ( $this->session->flashdata( 'success' ) ) :?>
                            <div class="alert alert-success">
                                <h2 class="infoMessage"><?php echo $this->session->flashdata('success'); ?></h2>
                            </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>Admin/Parametres/verificationBoutique" method="post">
                            <?php foreach ($informations as $info):?>
                                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Nom</label>
                                    <div class="col-sm-10">
                                        <input name="nom" id="nom" value="<?php echo $info->nom_four;?>" class="form-control">
                                    </div>
                                    <span class="infoMessage"><?php echo form_error('nom'); ?></span>
                                </div>

                                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Adresse</label>
                                    <div class="col-sm-10">
                                        <input name="adresse" id="adresse" type="text" class="form-control" value="<?php echo $info->adresse_four;?>">
                                    </div>
                                    <span class="infoMessage"><?php echo form_error('adresse'); ?></span>
                                </div>

                                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Téléphone</label>
                                    <div class="col-sm-10">
                                        <input name="tele" id="tele" placeholder="Votre numéro de contact" type="number" class="form-control" value="<?php echo $info->telephone_four;?>">
                                    </div>
                                    <span class="infoMessage"><?php echo form_error('tele'); ?></span>
                                </div>

                                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input name="email" id="email" type="email" class="form-control" value="<?php echo $info->adr_email;?>">
                                    </div>
                                    <span class="infoMessage"><?php echo form_error('email'); ?></span>
                                </div>
                            <?php endforeach;?>
                            <div class="position-relative row form-check">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-primary">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

