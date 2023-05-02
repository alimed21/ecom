<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                    </div>
                    <div>Logo de la boutique
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Modification du logo de la boutique</h5>
                        <?php if (isset($error_message)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } ?>
                        <?php if ( $this->session->flashdata( 'error' ) ) :?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                        <?php endif;?>
                        <?php if ( $this->session->flashdata( 'success' ) ) :?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>Admin/Parametres/modifierLogo" method="post" enctype="multipart/form-data">
                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Photo principal</label>
                                <div class="col-sm-10">
                                    <input name="userfile" id="userfile" type="file" class="form-control-file">
                                </div>
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

