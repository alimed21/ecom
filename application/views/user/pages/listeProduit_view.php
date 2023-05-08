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

        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Liste des produits</h5>
                        <?php if ( $this->session->flashdata( 'error' ) ) :?>
                            <h2 class="infoMessage"><?php echo $this->session->flashdata('error'); ?></h2>
                        <?php endif;?>
                        <?php if ( $this->session->flashdata( 'success' ) ) :?>
                            <h2 class="infoMessage"><?php echo $this->session->flashdata('success'); ?></h2>
                        <?php endif;?>
                        <div class="table-responsive">
                            <table class="mb-0 table">
                                <thead>
                                <tr>
                                    <th>N°Produit</th>
                                    <th>Produit</th>
                                    <th>Quantité</th>
                                    <th>Sous-Catégorie</th>
                                    <th>Prix</th>
                                    <th>Téléphone</th>
                                    <th>Ajouter par</th>
                                    <th>Ajouter le</th>
                                    <th>Modifier</th>
                                    <th>Modifier la quantiter</th>
                                    <th>Modifier image</th>
                                    <th>Modifier images</th>
                                    <th>Enlever</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if($listeProduitsUser != NULL):?>
                                        <?php foreach($listeProduitsUser as $pro):?>
                                            <tr>
                                                <td>
                                                    <?php echo $pro->token;?>
                                                </td>
                                                <td>
                                                    <?php echo $pro->prod;?>
                                                </td>
                                                <td>
                                                    <?php echo $pro->quantite;?>
                                                </td>
                                                <td>
                                                    <?php echo $pro->titre_ss_cate;?>
                                                </td>
                                                <td>
                                                    <?php echo $pro->prix;?>
                                                </td>
                                                <td>
                                                    <?php echo $pro->telephone;?>
                                                </td>
                                                <td>
                                                    <?php echo $pro->username;?>
                                                </td>
                                                <td>
                                                    <?php echo date("d-m-Y", strtotime($pro->date_prod));?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url();?>Admin/Produit/modifierProduit/<?php echo $pro->token;?>">
                                                        <i class="fa fa-edit" style="color:cornflowerblue"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url();?>Admin/Produit/modifierQuantiterProduit/<?php echo $pro->token;?>">
                                                        <i class="fa fa-edit" style="color:cornflowerblue"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url();?>Admin/Produit/modificationImagePrincipale/<?php echo $pro->token;?>">
                                                        <i class="fa fa-image" style="color:cornflowerblue"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url();?>Admin/Produit/modificationImages/<?php echo $pro->token;?>">
                                                        <i class="fa fa-images" style="color:cornflowerblue"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url();?>Admin/Produit/enleverProduit/<?php echo $pro->token;?>">
                                                        <i class="fa fa-ban" style="color:red"></i>
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
