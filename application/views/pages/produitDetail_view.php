<div class="page-head_agile_info_w3l">
    <div class="container">
        <?php if($detailProduit != NULL):?>
            <?php foreach ($detailProduit as $pro) :?>
                <h3><?php echo $pro->prod;?></h3>
            <?php endforeach;?>
        <?php endif;?>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <?php if($photos != NULL):?>
            <div class="col-md-4 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">
                            <ul class="slides">
                                <?php foreach($photos as $ph):?>
                                    <li data-thumb="<?php echo base_url();?>uploads/images/<?php echo $ph->photo_name;?>">
                                        <div class="thumb-image"> <img src="<?php echo base_url();?>uploads/images/<?php echo $ph->photo_name;?>" data-imagezoom="true" class="img-responsive"> </div>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        <?php endif;?>
        <div class="col-md-8 single-right-left simpleCart_shelfItem">
            <?php foreach ($detailProduit as $prod):?>
                <h3><?php echo $prod->prod; ?></h3>
                <p>Prix : <span class="item_price"><?php echo $prod->prix;?></span>fdj</p>
                <p>Quantité : <span class="item_price"><?php echo $prod->quantite;?> artilce(s) disponible</span></p>
                <p>Sous-catégorie : <span class="item_price"><?php echo $prod->titre_ss_cate;?></span></p>
                <p>Fournisseur : <span class="item_price"><?php echo $prod->nom_four;?></span></p>
                <p>Déscription : <span class="item_price"><?php echo $prod->description;?></span></p>

                <div class="occasion-cart">
                    <form action="<?php echo base_url();?>Commande/verificationCommande" method="post">
                        <input type="hidden" name="token" value="<?php echo $prod->token;?>">
                        <div class="color-quality">
                            <div class="color-quality-right">
                                <p>Quantité :</p>
                                <input type="number" name="quantite" id="quantite" class="control-form" min="1" value="1">
                            </div>
                        </div>
                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                            <input type="submit" name="submit" value="Commander" class="button">
                        </div>
                    </form>
                </div>
            <?php endforeach;?>
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
        </div>
        <div class="clearfix"> </div>

        <!--/slider_owl-->

        <div class="w3_agile_latest_arrivals">
            <h3 class="wthree_text_info">Articles <span>suivants</span></h3>
            <?php if($produitSuivants != NULL):?>
                <?php foreach ($produitSuivants as $prodS):?>
                    <div class="col-md-3 product-men single">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="<?php echo base_url();?>uploads/produit/<?php echo $prodS->image;?>" alt="" class="pro-image-front">
                                <img src="<?php echo base_url();?>uploads/produit/<?php echo $prodS->image;?>" alt="" class="pro-image-back">
                                <span class="product-new-top">New</span>
                            </div>
                            <div class="item-info-product ">
                                <h4><a href="s<?php echo base_url();?>Produit/Detail/<?php echo $prodS->token;?>"><?php echo $prodS->prod;?></a></h4>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <a href="<?php echo base_url();?>Produit/Detail/<?php echo $prodS->token;?>">
                                        <input type="submit" name="submit" value="Voir détail" class="button" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
            <div class="clearfix"> </div>
            <!--//slider_owl-->
        </div>
    </div>
</div>