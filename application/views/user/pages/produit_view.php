<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                    </div>
                    <div>
                        Gestion des produits
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Ajout d'un produit</h5>
                    <?php if (isset($error_message)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } ?>
                        <form action="<?php echo base_url();?>Admin/Produit/ajoutProduit" method="post" enctype="multipart/form-data">
                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Produit</label>
                                <div class="col-sm-10">
                                    <input name="prod" id="prod" placeholder="Titre du produit" type="text" class="form-control">
                                </div>
                                <span class="infoMessage"><?php echo form_error('prod'); ?></span>
                            </div>


                            <div class="position-relative row form-group">
                                <label for="exampleEmail" class="col-sm-2 col-form-label">Catégorie</label>
                                <div class="col-sm-10">
                                    <select name="cate" id="cate" class="form-control">
                                        <option>Choisissez une catégorie</option>
                                        <?php if($listesCategories != FALSE):?>
                                            <?php foreach($listesCategories as $cate):?>
                                                <option value="<?php echo $cate->id_cate;?>"><?php echo $cate->cate;?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <span class="infoMessage"><?php echo form_error('cate'); ?></span>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="exampleEmail" class="col-sm-2 col-form-label">Sous-catégorie</label>
                                <div class="col-sm-10">
                                    <select name="subcate" id="subcate" class="form-control">
                                    </select>
                                </div>
                                <span class="infoMessage"><?php echo form_error('subcate'); ?></span>
                            </div>

                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Prix</label>
                                <div class="col-sm-10">
                                    <input name="prix" id="prix" placeholder="Prix du produit" type="number" class="form-control">
                                </div>
                                <span class="infoMessage"><?php echo form_error('prix'); ?></span>
                            </div>

                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Quantité</label>
                                <div class="col-sm-10">
                                    <input name="quantite" id="quantite" placeholder="Quantité du produit" type="number" class="form-control">
                                </div>
                                <span class="infoMessage"><?php echo form_error('quantite'); ?></span>
                            </div>

                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Déscription</label>
                                <div class="col-sm-10">
                                    <textarea name="text" id="exampleText" class="form-control" placeholder="Déscription du produit"></textarea>
                                </div>
                                <span class="infoMessage"><?php echo form_error('text'); ?></span>
                            </div>

                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Article en promotion</label>
                                <div class="col-sm-10">
                                    <div class="position-relative form-check"><label class="form-check-label"><input name="promo" type="radio" class="form-check-input" value="oui" id="oui"> Oui</label></div>
                                    <div class="position-relative form-check"><label class="form-check-label"><input name="promo" type="radio" class="form-check-input" value="non" id="non"> Non</label></div>
                                </div>
                                <span class="infoMessage"><?php echo form_error('promo'); ?></span>
                            </div>

                            <div class="position-relative row form-group" id="promo"><label for="exampleEmail" class="col-sm-2 col-form-label">Prix promotion</label>
                                <div class="col-sm-10">
                                    <input name="prixpromo" id="prixPromo" placeholder="Prix promotion du produit" type="number" class="form-control">
                                </div>
                            </div>

                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Photo principal</label>
                                <div class="col-sm-10">
                                    <input name="userfile" id="userfile" type="file" class="form-control-file">
                                </div>
                            </div>


                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Autres photos</label>
                                <div class="col-sm-10">
                                    <input name="file_upload[]" id="file" type="file" class="form-control-file" multiple>
                                </div>
                            </div>
                            <div class="col-md-8 p-b-30">
					<p class="p-b-28">
						Très important : les types des images autorisées sont : jpg, jpeg et png. Le nombre des images séléctionner sont aux nombres de 4.
					</p>
				</div>
                            <div class="position-relative row form-check">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-primary">Ajouter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!--
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Liste des catégories</h5>
                        <div class="table-responsive">
                            <table class="mb-0 table">
                                <thead>
                                <tr>
                                    <th>Rôle</th>
                                    <th>Ajouter par</th>
                                    <th>Ajouter le</th>
                                    <th>Modifier</th>
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
                                                <?php echo $cate->date_add;?>
                                            </td>
                                            <td>
                                                <?php echo $cate->login_admin;?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>Admin/Administrateur/modificationCategorie/<?php echo $cate->id_cate;?>">
                                                    <i class="fa fa-edit" style="color:cornflowerblue"></i>
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
-->
        </div>
    </div>

