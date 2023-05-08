<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                    </div>
                    <div>Gestion des produits
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button>
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
                                            </span>
                            Buttons
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-inbox"></i>
                                        <span>
                                                            Inbox
                                                        </span>
                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-book"></i>
                                        <span>
                                                            Book
                                                        </span>
                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-picture"></i>
                                        <span>
                                                            Picture
                                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a disabled href="javascriptjavascript:void(0);" class="nav-link disabled">
                                        <i class="nav-link-icon lnr-file-empty"></i>
                                        <span>
                                            File Disabled
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>    </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Modification d'un produit</h5>
                        <?php if (isset($error_message)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } ?>
                        <form action="<?php echo base_url();?>Admin/Produit/modificationProduit" method="post">
                            <?php foreach ($detailProduit as $detail):?>
                                <input type="hidden" name="token" value="<?php echo $detail->token;?>">
                                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Produit</label>
                                    <div class="col-sm-10">
                                        <input name="prod" id="prod" placeholder="Titre du produit" type="text" value="<?php echo $detail->prod;?>" class="form-control">
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
                                        <input name="prix" id="prix" placeholder="Prix du produit" type="number" class="form-control" value="<?php echo $detail->prix;?>">
                                    </div>
                                    <span class="infoMessage"><?php echo form_error('prix'); ?></span>
                                </div>

                                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Téléphone</label>
                                    <div class="col-sm-10">
                                        <input name="tele" id="tele" placeholder="Votre numéro de contact" type="number" class="form-control" value="<?php echo $detail->telephone;?>">
                                    </div>
                                    <span class="infoMessage"><?php echo form_error('tele'); ?></span>
                                </div>

                                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Déscription</label>
                                    <div class="col-sm-10">
                                        <textarea name="text" id="exampleText" class="form-control" placeholder="Déscription du produit">
                                            <?php echo $detail->description;?>
                                        </textarea>
                                    </div>
                                    <span class="infoMessage"><?php echo form_error('text'); ?></span>
                                </div>

                                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Article en promotion</label>
                                    <div class="col-sm-10">
                                        <?php if($detail->prod == 'oui'):?>
                                        <div class="position-relative form-check"><label class="form-check-label"><input name="promo" type="radio" class="form-check-input" value="oui" id="oui" checked> Oui</label></div>
                                        <div class="position-relative form-check"><label class="form-check-label"><input name="promo" type="radio" class="form-check-input" value="non" id="non"> Non</label></div>
                                        <?php else:?>
                                            <div class="position-relative form-check"><label class="form-check-label"><input name="promo" type="radio" class="form-check-input" value="oui" id="oui" > Oui</label></div>
                                            <div class="position-relative form-check"><label class="form-check-label"><input name="promo" type="radio" class="form-check-input" value="non" id="non" checked> Non</label></div>
                                        <?php endif;?>
                                    </div>
                                    <span class="infoMessage"><?php echo form_error('promo'); ?></span>
                                </div>

                                <div class="position-relative row form-group" id="promo"><label for="exampleEmail" class="col-sm-2 col-form-label">Prix promotion</label>
                                    <div class="col-sm-10">
                                        <input name="prixpromo" id="prixPromo" placeholder="Prix promotion du produit" type="number" class="form-control" value="<?php echo $detail->prix_promo;?>">
                                    </div>
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

