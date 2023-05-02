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
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Modification des autres images</h5>
                        <?php if (isset($error_message)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } ?>
                        <form action="<?php echo base_url();?>Admin/Produit/updateUploadFiles" method="post" enctype="multipart/form-data">
                            <?php foreach($detailProduit as $detail):?>
                                <input type="hidden" name="token" value="<?php echo $detail->token;?>">
                            <?php endforeach;?>
                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Autres photos</label>
                                <div class="col-sm-10">
                                    <input name="file_upload[]" id="file" type="file" class="form-control-file" multiple>
                                </div>
                            </div>
                            <div class="col-md-8 p-b-30">
                            <p class="p-b-28">
                                Très important : les types des images autorisées sont : jpg, jpeg et png. Le nombre des images séléctionner sont aux nombres de 4.
                            </p>

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

