<div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1>ShopyGram</h1>
                                <p>Plateforme e-commerce.</p>
                            </div>
                            <div>
                                <a href="<?php echo base_url();?>Produits/liste" class="btn btn-link btn-primary">
                                    Liste des produits
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-header-img">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header1.png" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header2.png" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header3.png" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header4.png" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
                <img src="<?php echo base_url();?>assets/images/dashboard/top-header5.png" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
            </div>
        </div>          <!-- Nav Header Component End -->
        <!--Nav End-->
    </div>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
<div>
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Ajout d'un produit</h4>
                    </div>
                </div>
                <div class="card-body">
                    <p><span style="color:red">*</span> champs obligatoires</p>
                    <?php if (isset($error_message)) :?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($message_promo)) :?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $message_promo; ?>
                        </div>
                    <?php endif; ?>

                    <form class="form-horizontal" action="<?php echo base_url();?>Admin/Produit/ajoutProduit" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Produit :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="prod" name="prod" placeholder="Titre du produit">
                                <span class="infoMessage"><?php echo form_error('prod'); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="choices-single-default">Catégorie</label>
                            <div class="col-sm-9">
                                <select class="form-select" data-trigger name="cate" id="cate">
                                    <option disabled selected>Choisissez une catégorie</option>
                                    <?php if($listesCategories != FALSE):?>
                                        <?php foreach($listesCategories as $cate):?>
                                            <option value="<?php echo $cate->id_cate;?>"><?php echo $cate->cate;?></option>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </select>
                                <span class="infoMessage"><?php echo form_error('cate'); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="choices-single-default">Sous-catégorie</label>
                            <div class="col-sm-9">
                                <select class="form-select" data-trigger name="subcate" id="subcate">
                                </select>
                                <span class="infoMessage"><?php echo form_error('subcate'); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Prix :</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="prix" name="prix" placeholder="Prix du produit">
                                <span class="infoMessage"><?php echo form_error('prix'); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Quantité :</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="quantite" name="quantite" placeholder="Quantité du produit">
                                <span class="infoMessage"><?php echo form_error('quantite'); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Déscription :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="text" name="text" placeholder="Déscription du produit"></textarea>
                                <span class="infoMessage"><?php echo form_error('text'); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Produit en promotion :</label>
                            <div class="col-sm-9">
                                <input class="form-check-input" type="radio" name="promo" value="oui" id="oui">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Oui
                                </label>

                                <input class="form-check-input" type="radio" name="promo" value="non" id="non">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Non
                                </label>
                                <span class="infoMessage"><?php echo form_error('promo'); ?></span>
                            </div>
                        </div>

                        <div class="form-group row" id="promo">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Prix promotion :</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="prixpromo" name="prixpromo" placeholder="Prix promotion du produit">
                                <span class="infoMessage"><?php echo form_error('prixpromo'); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Photo principal :</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="userfile" id="userfile" type="file">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Autres photos :</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="file_upload[]" id="file" type="file" multiple>
                                <p class="p-b-28">
                                    Très important : les types des images autorisées sont : jpg, jpeg et png. Le nombre des images séléctionner sont aux nombres de 3.
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