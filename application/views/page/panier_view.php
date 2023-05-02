<section id="cart_items">
    <div class="container">

        <div class="review-payment">
            <h2>Bonjour, <?php echo $nomClient->nom;?></h2>
        </div>

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
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">N°Commande</td>
                    <td class="description">Produit</td>
                    <td class="price">Prix</td>
                    <td class="quantity">Qauntité</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                    <?php if($cmdClient != NULL):?>
                        <?php foreach ($cmdClient as $panier):?>
                            <tr>
                                <td class="cart_product">
                                    <?php echo $panier->code_cmd;?>
                                </td>
                                <td class="cart_description">
                                    <h4><?php echo $panier->prod;?></h4>
                                </td>
                                <td class="cart_price">
                                    <p><?php echo $panier->prix_unitaire;?>fdj</p>
                                </td>
                                <td class="cart_quantity">
                                    <?php echo $panier->quantite;?>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"><?php echo $panier->totalPrix; ?>fdj</p>
                                </td>
                                <td class="cart_delete">
                                    <a href="<?php echo base_url();?>Client/supprimerCmd/<?php echo $panier->code_cmd;?>/<?php echo $panier->quantite;?>" class="cart_quantity_delete" ><i class="fa fa-times" style="color:red;"></i></a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif;?>
                </tbody>
            </table>
            <table class="table table-condensed" style="width: 25%;float: right;margin-top: 10px;">
                <thead>
                <tr class="cart_menu">
                    <td class="total">Total</td>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="cart_total">
                            <p class="cart_total_price"><?php echo $totalPrix->totalprix;?>fdj</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="col-md-12" style="margin-bottom: 10px;">
                <a href="<?php echo base_url();?>Client/validerCommande">
                    <input type="submit" value="Confirmer" style="float: right;background: #25507d;color: #fff;width: 117px;height: 36px;border-radius: 7px;margin-top: 11px;">
                </a>
            </div>
        </div>
    </div>
</section> <!--/#cart_items-->