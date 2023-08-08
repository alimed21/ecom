<div>
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Modification de l'image principale d'un produit</h4>
                    </div>
                </div>
                <div class="card-body">
                    <p><span style="color:red">*</span> champs obligatoires</p>
                    <?php if (isset($error_message_img)) :?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error_message_img; ?>
                        </div>
                    <?php endif; ?>

                    <form class="form-horizontal" action="<?php echo base_url();?>Produits/modifierImageProd" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="token" value="<?= $token;?>">

                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Photo principal :</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="userfile" id="userfile" type="file">
                                <p class="p-b-28">
                                    Très important : les types des images autorisées sont : jpg, jpeg et png.
                                </p>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                            <button type="submit" class="btn btn-danger">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Modification des images d'un produit</h4>
                    </div>
                </div>
                <div class="card-body">
                    <p><span style="color:red">*</span> champs obligatoires</p>
                    <?php if (isset($error_message)) :?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>

                    <form class="form-horizontal" action="<?php echo base_url();?>Produits/modifierUploadFiles" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="token" value="<?= $token;?>">

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
                            <button type="submit" class="btn btn-primary">Modifier</button>
                            <button type="submit" class="btn btn-danger">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>