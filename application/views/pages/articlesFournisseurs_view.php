<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>
            <?php echo $detailFournisseur->nom_four;?>
        </h3>
    </div>
</div>

<div class="banner-bootom-w3-agileits">
    <div class="container">
        <?php if($row == 0):?>
            <h3 class="wthree_text_info">Aucun article disponible pour cette boutique</h3>
        <?php else:?>
            <h3 class="wthree_text_info"><?php echo $row;?> article(s)</h3>
            <div class="col-md-12 products-right">
                <?php if($articleParFournisseur != FALSE):?>
                    <?php foreach ($articleParFournisseur as $four):?>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url();?>uploads/produit/<?php echo $four->image;?>" alt="" class="pro-image-front" style="height:350px;">
                                    <img src="<?php echo base_url();?>uploads/produit/<?php echo $four->image;?>" alt="" class="pro-image-back" style="height:350px;">
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="<?php echo base_url();?>Produit/Detail/<?php echo $four->token;?>"><?php echo $four->prod;?></a></h4>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                        <a href="<?php echo base_url();?>Produit/Detail/<?php echo $four->token;?>">
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