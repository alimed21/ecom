<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                    </div>
                    <div>
                        Mot de passe
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Modification du mot de passe</h5>
                        <?php if ( $this->session->flashdata( 'error' ) ) :?>
                            <h2 class="infoMessage"><?php echo $this->session->flashdata('error'); ?></h2>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>Admin/Parametres/modificationMotPasse" method="post">
                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Ancien</label>
                                <div class="col-sm-10">
                                    <input name="ancienpass" id="ancienpass" placeholder="Saissiez votre ancien mot de passe..." type="password" class="form-control">
                                </div>
                                <span class="infoMessage"><?php echo form_error('ancienpass'); ?></span>
                            </div>

                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Nouveau</label>
                                <div class="col-sm-10">
                                    <input name="nouveaupass" id="nouveaupass" placeholder="Saissiez votre nouveau mot de passe..." type="password" class="form-control">
                                </div>
                                <span class="infoMessage"><?php echo form_error('nouveaupass'); ?></span>
                            </div>


                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Confirmation</label>
                                <div class="col-sm-10">
                                        <input name="cnfpass" id="cnfpass" placeholder="Confirmation du nouveau mot de passe..." type="password" class="form-control">
                                </div>
                                <span class="infoMessage"><?php echo form_error('cnfpass'); ?></span>
                            </div>

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

