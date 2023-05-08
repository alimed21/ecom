<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Votre panier</h3>
    </div>
</div>
<!--/Typography-->
<div class="banner_bottom_agile_info">
    <div class="container">
        <h2>Bonjour <?php echo $client->nom;?></h2>
        <div class="bs-docs-example">
            <?php if ( $this->session->flashdata( 'success' ) ) :?>
                <div class="alert alert-success" role="alert">
                    <h2 style="font-size: 14px;"><?php echo $this->session->flashdata('success'); ?></h2>
                </div>
            <?php endif;?>
            <?php if ( $this->session->flashdata( 'error' ) ) :?>
                <div class="alert alert-danger" role="alert">
                    <h2 style="font-size: 14px;"><?php echo $this->session->flashdata('error'); ?></h2>
                </div>
            <?php endif;?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>N°Commande</th>
                    <th>Produit</th>
                    <th>Qauntité</th>
                    <th>Prix</th>
                    <th>Total</th>
                    <th>Supprimer</th>
                </tr>
                </thead>
                <tbody>
                    <?php if($contenuPanier != NULL):?>
                        <?php foreach ($contenuPanier as $panier):?>
                            <tr>
                                <td><?php echo $panier->code_cmd;?></td>
                                <td><?php echo $panier->prod;?></td>
                                <td><?php echo $panier->quantite;?></td>

                                    <td><?php echo $panier->prix_unitaire;?>fdj</td>
                                <td>
                                    <?php echo $panier->totalPrix; ?>fdj
                                </td>
                                <td>
                                    <a href="<?php echo base_url();?>Commande/supprimerCmd/<?php echo $panier->code_cmd;?>/<?php echo $panier->quantite;?>" style="color:red;">
                                        <i class="fa fa-trash"></i> Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif;?>
                </tbody>
            </table>
            <table class="table table-striped" style="width: 25%;float: right;">
                <thead>
                    <tr>
                        <th>Total</th>
                    </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php echo $totalPrix->totalprix; ?>fdj
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="col-md-12">
                <a href="<?php echo base_url();?>Commande/validerCommande">
                    <input type="submit" value="Commander" style="float: right;background: #25507d;color: #fff;width: 117px;height: 36px;border-radius: 7px;margin-top: 11px;">
                </a>
            </div>
        </div>
    </div>
</div>
<!--//Typography-->