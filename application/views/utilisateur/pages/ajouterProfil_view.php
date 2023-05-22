<div>
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Création d'un profile</h4>
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

                    <form class="form-horizontal" action="<?php echo base_url();?>Admin/Parametres/verificationProfile" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Nom :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nom_complet" name="nom_complet" placeholder="Veuillez saisir votre nom complet">
                                <span class="infoMessage"><?php echo form_error('nom_complet'); ?></span>
                            </div>
                        </div>

                     <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Adresse :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="adr" name="adr" placeholder="Veuillez saisir votre adresse">
                                <span class="infoMessage"><?php echo form_error('adr'); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Téléphone :</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="tele" name="tele" placeholder="Veuillez saisir votre téléphone">
                                <span class="infoMessage"><?php echo form_error('tele'); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Photo de profile :</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="userfile" id="userfile" type="file">
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            <button type="submit" class="btn btn-danger">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>