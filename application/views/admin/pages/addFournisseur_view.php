<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon" style="background: #495057;">
                        <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                    </div>
                    <div>Gestion des fournisseurs
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Ajout d'un fournisseur</h5>
                        <form class="" action="<?php echo base_url();?>Admin/Administrateur/verificationFournisseur" method="post">
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Nom</label>
                                <input name="nom" id="nom" placeholder="Saisissez le nom du fournisseur " type="text" class="form-control">
                            </div>

                            <div class="position-relative form-group">
                                <label for="examplePassword" class="">Adresse</label>
                                <input name="adresse" id="adresse" placeholder="Saisissez l'adresse du fournisseur" type="text" class="form-control">
                            </div>

                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Téléphone</label>
                                <input name="tele" id="tele" placeholder="Saisissez le numéro du fournisseur " type="number" class="form-control">
                            </div>

                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Email</label>
                                <input name="email" id="email" placeholder="Saisissez le mail du fournisseur" type="email" class="form-control">
                            </div>
                            <button class="mt-1 btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Liste des utilisateurs</h5>
                        <div class="table-responsive">
                            <table class="mb-0 table">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Adresse</th>
                                    <th>N° de téléphone</th>
                                    <th>Adresse email</th>
                                    <th>Ajouter le</th>
                                    <th>Modifier</th>
                                    <th>Bloquer</th>
                                    <th>Valider</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($listesFournisseurs != NULL):?>
                                    <?php foreach($listesFournisseurs as $four):?>
                                        <tr>
                                            <td>
                                                <?php echo $four->nom_four;?>
                                            </td>
                                            <td>
                                                <?php echo $four->adresse_four;?>
                                            </td>
                                            <td>
                                                <?php echo $four->telephone_four;?>
                                            </td>
                                            <td>
                                                <?php echo $four->adr_email;?>
                                            </td>
                                            <td>
                                                <?php echo $four->date_add_four;?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>Admin/Administrateur/modificationFournisseur/<?php echo $four->id_four;?>">
                                                    <i class="fa fa-edit" style="color:cornflowerblue"></i>
                                                </a>

                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>Admin/Administrateur/bloquerFournisseur/<?php echo $four->id_four;?>">
                                                    <i class="fa fa-ban" style="color:red"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <?php if($four->user_valid == NULL):?>
                                                    <a href="<?php echo base_url();?>Admin/Administrateur/validerFournisseur/<?php echo $four->id_four;?>">
                                                        <i class="fa fa-check" style="color:dodgerblue"></i>
                                                    </a>
                                                <?php endif;?>
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
<?php
