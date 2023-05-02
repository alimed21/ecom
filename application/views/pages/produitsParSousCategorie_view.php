<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <?php foreach($titreCategorie as $cateT):?>
            <h3><?php echo $cateT->titre_ss_cate;?></h3>
        <?php endforeach;?>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="#">Catégorie</a><i>|</i></li>
                    <?php foreach($titreCategorie as $cateT):?>
                        <li><?php echo $cateT->titre_ss_cate;?></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <!-- mens -->
        <div class="col-md-4 products-left">
            <div class="css-treeview">
                <h4>Categories</h4>
                <ul class="tree-list-pad">
                    <?php if($allCategorie != NULL):?>
                        <?php foreach($allCategorie as $cate):?>
                            <li><input type="checkbox" <?php if($cate->id_cate == 1):?>checked="checked" <?php endif;?> id="item-<?php echo $cate->id_cate;?>" /><label for="item-<?php echo $cate->id_cate;?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i><?php echo $cate->cate;?></label>
                                <ul>
                                    <?php foreach($sousCategories as $sscate):?>
                                        <?php if($cate->id_cate == $sscate->id_cate):?>
                                            <li>
                                                <a href="<?php echo base_url();?>Produit/produitsParSousCategories/<?php echo $sscate->id_ss_cate;?>"><?php echo $sscate->titre_ss_cate;?></a>
                                            </li>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </ul>
                            </li>
                        <?php endforeach;?>
                    <?php endif;?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-8 products-right">
            <h5>Articles par catégorie</h5>
            <div class="men-wear-bottom">
                <div class="col-sm-8 men-wear-right">
                    <?php foreach($titreCategorie as $cateT):?>
                        <h4><?php echo $cateT->titre_ss_cate;?></h4>
                    <?php endforeach;?>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php if($allProduitParCategories != FALSE):?>
                <?php foreach ($allProduitParCategories as $prod):?>
                    <div class="col-md-4 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="<?php echo base_url();?>uploads/produit/<?php echo $prod->image;?>" alt="" class="pro-image-front">
                                <img src="<?php echo base_url();?>uploads/produit/<?php echo $prod->image;?>" alt="" class="pro-image-back">
                            </div>
                            <div class="item-info-product ">
                                <h4><a href="<?php echo base_url();?>Produit/Detail/<?php echo $prod->token;?>"><?php echo $prod->prod;?></a></h4>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <a href="<?php echo base_url();?>Produit/Detail/<?php echo $prod->token;?>">
                                        <input type="submit" name="submit" value="Voir détail" class="button" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>


            <div class="clearfix"></div>
            <div id="pagination" class="col-md-12">
                <ul class="tsc_pagination">

                    <!-- Show pagination links -->
                    <?php foreach ($links as $link) {
                        echo "<li style='margin:10px; display:block;'>". $link."</li>";
                    } ?>
                </ul>
            </div>
        </div>

    </div>
</div>