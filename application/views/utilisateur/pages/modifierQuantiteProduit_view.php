<div>
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Modification d'un produit</h4>
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

                    <?php if ($this->session->flashdata( 'error' )):?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif;?>

                    <?php if($detailProd != false):?>
                        <form class="form-horizontal" action="<?php echo base_url();?>Produits/modifierixQuantiterProduit" method="post">
                            <?php foreach($detailProd as $prod):?>
                                <input type="hidden" name="token" value="<?php echo $prod->token;?>">

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Prix :</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="prix" name="prix" placeholder="Prix du produit" value="<?php echo $prod->prix;?>">
                                        <span class="infoMessage"><?php echo form_error('prix'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Quantité :</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="quantite" name="quantite" placeholder="Quantité du produit" value="<?php echo $prod->quantite;?>">
                                        <span class="infoMessage"><?php echo form_error('quantite'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Produit en promotion :</label>
                                    <div class="col-sm-9">
                                        <?php if($prod->promo == "oui"):?>
                                            <input class="form-check-input" type="radio" name="promo" value="oui" id="oui" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Oui
                                            </label>

                                            <input class="form-check-input" type="radio" name="promo" value="non" id="non">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Non
                                            </label>
                                            <span class="infoMessage"><?php echo form_error('promo'); ?></span>
                                        <?php else:?>
                                            <input class="form-check-input" type="radio" name="promo" value="oui" id="oui">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Oui
                                            </label>

                                            <input class="form-check-input" type="radio" name="promo" value="non" id="non" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Non
                                            </label>
                                            <span class="infoMessage"><?php echo form_error('promo'); ?></span>
                                        <?php endif;?>
                                    </div>
                                </div>

                                <div class="form-group row" id="promo">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Prix promotion :</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="prixpromo" name="prixpromo" placeholder="Prix promotion du produit" value="<?php echo $prod->prix_promo;?>">
                                        <span class="infoMessage"><?php echo form_error('prixpromo'); ?></span>
                                    </div>
                                </div>
                            <?php endforeach;?>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Modifier</button>
                                <button type="submit" class="btn btn-danger">Annuler</button>
                            </div>
                        </form>
                    <?php endif;?>

                </div>
            </div>
        </div>
    </div>
</div>