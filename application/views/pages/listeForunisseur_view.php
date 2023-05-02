<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Nos boutiques en ligne</h3>
    </div>
</div>

<div class="banner-bootom-w3-agileits">
    <div class="container">
        <?php if($row == 0):?>
            <h3 class="wthree_text_info">Aucun résultat de recherche pour "<?php echo $row;?>"</h3>
        <?php else:?>
            <h3 class="wthree_text_info">Nous comptons <?php echo $row;?> boutique(s) en ligne</h3>
            <div class="col-md-12 products-right">
                <?php if($allFournisseurs != FALSE):?>
                    <?php foreach ($allFournisseurs as $four):?>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <?php if($four->logo_four != NULL):?>
                                        <img src="<?php echo base_url();?>uploads/logo/<?php echo $four->logo_four;?>" alt="" class="pro-image-front" style="height: 286px;">
                                        <img src="<?php echo base_url();?>uploads/logo/<?php echo $four->logo_four;?>" alt="" class="pro-image-back" style="height: 286px;">
                                    <?php else:?>
                                        <img src="<?php echo base_url();?>assets/image/logo2.png" alt="" class="pro-image-front" style="height: 286px;">
                                        <img src="<?php echo base_url();?>assets/image/logo2.png" alt="" class="pro-image-back" style="height: 286px;">
                                    <?php endif;?>
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="<?php echo base_url();?>Fournisseur/page/<?php echo $four->lien_four;?>"><?php echo $four->nom_four;?></a></h4>
                                    <h4><?php echo $four->adresse_four;?></h4>
                                    <h4><?php echo $four->telephone_four;?></h4>
                                    <h4><?php echo $four->adr_email;?></h4>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                        <a href="<?php echo base_url();?>Fournisseur/page/<?php echo $four->lien_four;?>">
                                            <input type="submit" name="submit" value="Voir détail" class="button" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                <?php endif;?>
            </div>
        <?php endif;?>
    </div>
</div>