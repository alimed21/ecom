<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                    </div>
                    <div>Gestion des sous-catégories
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Modification d'un sous-catégorie</h5>
                        <form action="<?php echo base_url();?>Admin/Administrateur/modifierSsCategorie" method="post">
                            <?php foreach ($detailSousCategories as $detail):?>
                            <input type="hidden" name="idsscate" value="<?php echo $detail->id_ss_cate;?>">
                                <div class="position-relative row form-group">
                                    <label for="exampleEmail" class="col-sm-2 col-form-label">Sous-catégorie</label>
                                    <div class="col-sm-10"><input name="sscate" id="sscate" placeholder="Saisi d'un sous-catégorie" type="text" class="form-control" value="<?php echo $detail->titre_ss_cate;?>"></div>
                                    <span class="infoMessage"><?php echo form_error('sscate'); ?></span>
                                </div>
                                <div class="position-relative row form-group">
                                    <label for="exampleEmail" class="col-sm-2 col-form-label">Catégorie</label>
                                    <div class="col-sm-10">
                                        <select name="idcate" class="form-control">
                                            <option value=""></option>
                                            <?php foreach ($listesCategories as $cate):?>
                                                <option value="<?php echo $cate->id_cate;?>"><?php echo $cate->cate;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <span class="infoMessage"><?php echo form_error('idcate'); ?></span>
                                </div>

                                <div class="position-relative row form-check">
                                    <div class="col-sm-10 offset-sm-2">
                                        <button class="btn btn-secondary">Ajouter</button>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
