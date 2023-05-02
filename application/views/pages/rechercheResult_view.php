<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Resultat de la <span>recherche </span></h3>
    </div>
</div>

<div class="banner-bootom-w3-agileits">
    <div class="container">
        <?php if($rows_all_count == 0):?>
            <h3 class="wthree_text_info">Aucun résultat de recherche pour "<?php echo $searchWord;?>"</h3>
        <?php else:?>
            <h3 class="wthree_text_info">Résultat pour "<?php echo $searchWord;?>" :<span> <?php echo $rows_all_count;?> résultat(s)</span></h3>
            <div class="col-md-8 products-right">
                <?php if($resultsearch != FALSE):?>
                    <?php foreach ($resultsearch as $res):?>
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url();?>uploads/produit/<?php echo $res->image;?>" alt="" class="pro-image-front">
                                    <img src="<?php echo base_url();?>uploads/produit/<?php echo $res->image;?>" alt="" class="pro-image-back">
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="<?php echo base_url();?>Produit/Detail/<?php echo $res->token;?>"><?php echo $res->prod;?></a></h4>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                        <a href="<?php echo base_url();?>Produit/Detail/<?php echo $res->token;?>">
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