<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                    </div>
                    <div>
                        Gestion des photos
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Ajout d'un slider</h5>
                        <?php if ( $this->session->flashdata( 'error' ) ) :?>
                            <h2 class="infoMessage"><?php echo $this->session->flashdata('error'); ?></h2>
                        <?php endif;?>
                        <?php if ( $this->session->flashdata( 'success' ) ) :?>
                            <h2 class="infoMessage"><?php echo $this->session->flashdata('success'); ?></h2>
                        <?php endif;?>
                        <?php if (isset($error_message)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } ?>
                        <form action="<?php echo base_url();?>Admin/Administrateur/ajoutPhoto" method="post" enctype="multipart/form-data">
                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Titre</label>
                                <div class="col-sm-10">
                                    <input name="titre" id="titre" placeholder="Titre de la photo" type="text" class="form-control">
                                </div>
                                <span class="infoMessage"><?php echo form_error('titre'); ?></span>
                            </div>
                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input name="userfile" id="userfile" type="file" class="form-control">
                                </div>
                            </div>

                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-10">
                                    <select name="type" id="type" class="form-control">
                                        <option value="slide">
                                            Slider
                                        </option>
                                        <option value="pub">
                                            Publicitaire
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-check">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-secondary">Ajouter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Liste des photos</h5>
                            <div class="table-responsive">
                                <table class="mb-0 table">
                                    <thead>
                                    <tr>
                                        <th>N°photo</th>
                                        <th>Titre</th>
                                        <th>Type</th>
                                        <th>Ajouter par</th>
                                        <th>Ajouter le</th>
                                        <th>Supprimer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($listesPhotos != NULL):?>
                                        <?php foreach($listesPhotos as $photo):?>
                                            <tr>
                                                <td>
                                                    <?php echo $photo->id_slide;?>
                                                </td>
                                                <td>
                                                    <?php echo $photo->titre_slide;?>
                                                </td>
                                                <td>
                                                    <?php echo $photo->type_slide;?>
                                                </td>
                                                <td>
                                                    <?php echo $photo->date_add;?>
                                                </td>
                                                <td>
                                                    <?php echo $photo->login_admin;?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url();?>Admin/Administrateur/suppressionPhoto/<?php echo $photo->token_slide;?>">
                                                        <i class="fa fa-trash" style="color:red"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>
