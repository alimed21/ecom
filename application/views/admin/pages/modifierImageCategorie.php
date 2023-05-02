<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                    </div>
                    <div>Gestion des catégories
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Modification l'image d'une catégorie</h5>
                        <form action="<?php echo base_url();?>Admin/Administrateur/modifierImageCategorie" method="post" enctype="multipart/form-data">
                            <?php foreach ($detailCategorie as $detail):?>
                                <input type="hidden" name="id" value="<?php echo $detail->id_cate;?>">
                            <?php endforeach;?>
                            <div class="position-relative row form-group">
                                <label for="exampleEmail" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <?php if (isset($error_message)) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $error_message; ?>
                                        </div>
                                    <?php } ?>
                                    <input name="userfile" id="userfile" type="file" class="form-control">
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
                    <div class="card-body"><h5 class="card-title">Liste des catégories</h5>
                        <div class="table-responsive">
                            <?php if ( $this->session->flashdata( 'error' ) ) :?>
                                <h2 class="infoMessage"><?php echo $this->session->flashdata('error'); ?></h2>
                            <?php endif;?>
                            <?php if ( $this->session->flashdata( 'success' ) ) :?>
                                <h2 class="infoMessage"><?php echo $this->session->flashdata('success'); ?></h2>
                            <?php endif;?>
                            <table class="mb-0 table">
                                <thead>
                                <tr>
                                    <th>Catégorie</th>
                                    <th>Photo</th>
                                    <th>Ajouter par</th>
                                    <th>Ajouter le</th>
                                    <th>Modifier</th>
                                    <th>Modifier l'image</th>
                                    <th>Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($listesCategories != NULL):?>
                                    <?php foreach($listesCategories as $cate):?>
                                        <tr>
                                            <td>
                                                <?php echo $cate->cate;?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>uploads/img_cate/<?php echo $cate->image;?>" target="_blank">
                                                    <i class="fa fa-eye" style="color:cornflowerblue"></i>
                                                </a>

                                            </td>
                                            <td>
                                                <?php echo $cate->login_admin;?>
                                            </td>
                                            <td>
                                                <?php echo $cate->date_add;?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>Admin/Administrateur/modificationCategorie/<?php echo $cate->id_cate;?>">
                                                    <i class="fa fa-edit" style="color:cornflowerblue"></i>
                                                </a>

                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>Admin/Administrateur/modificationImageCategorie/<?php echo $cate->id_cate;?>">
                                                    <i class="fa fa-picture-o" style="color:cornflowerblue"></i>
                                                </a>

                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>Admin/Administrateur/suppressionCategorie/<?php echo $cate ->id_cate;?>">
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
