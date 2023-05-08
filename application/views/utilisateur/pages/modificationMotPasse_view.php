<div>
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Modification du mot de passe</h4>
                    </div>
                </div>
                <div class="card-body">
                    <p><span style="color:red">*</span> champs obligatoires</p>

                    <?php if ( $this->session->flashdata( 'error' ) ) :?>
                        <div class="alert alert-danger" role="alert">
                            <h2 style="font-size: 14px;"><?php echo $this->session->flashdata('error'); ?></h2>
                        </div>
                    <?php endif;?>

                    <form class="form-horizontal" action="<?php echo base_url();?>Admin/Parametres/modificationMotPasse" method="post">
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Ancien :<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="ancienpass" name="ancienpass" placeholder="Ancien mot de passe">
                                <span class="infoMessage"><?php echo form_error('ancienpass'); ?></span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Nouveau :<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="nouveaupass" name="nouveaupass" placeholder="Nouveau mot de passe">
                                <span class="infoMessage"><?php echo form_error('nouveaupass'); ?></span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Confirmation :<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="cnfpass" name="cnfpass" placeholder="Confirmation du nouveau mot de passe">
                                <span class="infoMessage"><?php echo form_error('cnfpass'); ?></span>
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