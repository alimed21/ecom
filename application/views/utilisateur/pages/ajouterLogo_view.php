<div>
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Ajout d'un logo</h4>
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

                    <form class="form-horizontal" action="<?php echo base_url();?>Admin/Parametres/verificationLogo" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id;?>" />
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Importer un logo <span style="color:red">*</span>:</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="userfile" id="userfile" type="file">
                                <p class="p-b-28">
                                    Très important : le type du logo autorisé est : jpg, jpeg et png.
                                </p>
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